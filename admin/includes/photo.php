<?php

class Photo extends Db_object{
    protected static $db_table="photo";
    protected static $db_table_fields = array('id','title','caption','description','filename','alternate_text','type','size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory="images";
    public $errors = array();
    public $upload_errors_array = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }

    //This is passing the $_FILES['uploaded_file'] as an argument
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There was no file uploaded here";
            return false;
        }elseif($file['error']!=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }

    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmp_path)){
                $this->errors[] = "The file was not available";
            }

            $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->filename;

            if(file_exists($target_path)){
                $this->errors[]="The file {$this->filename} already exists";
                return false;
            }

            if(move_uploaded_file($this->tmp_path , $target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[] = "Error! The file directory probably does not have permission.";
                return false;

            }

            $this->create();
        }

    }


    public function delete_photo(){

        if($this->delete()){

            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
            return unlink($target_path)  ? true : false;
        }else{
            return false;
        }
    }

}


?>
