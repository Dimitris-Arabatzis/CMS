<?php

class Db_object{

    protected static $db_table="users";

    public static function find_all(){
        global $database;

        //$result_set=$database->query("SELECT * FROM users");
        $result_set=self::find_this_query("SELECT * FROM " .self::$db_table . " ;");
        return $result_set;


    }

    public static function find_by_id($id){
        global $database;

        $the_result_array=self::find_this_query("SELECT * FROM " . self::$db_table . " WHERE id=$id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_this_query($sql){
        global $database;
        $result_set=$database->query($sql);

        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[]= self::instantiation($row);
        }
        return $the_object_array;
    }

    public static function instantiation($the_record){
        $calling_class= get_called_class();
        $the_object=new $calling_class;

        foreach($the_record as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute){
        return property_exists($this, $the_attribute);
    }





}



?>
