<?php

class Session{
    private $signed_in = false;
    public $user_id;
    public $message;

    function __construct(){
        session_start();
        $this->check_the_login();
        $this->check_message();
    }

    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in=true;
        }

    }
    public function logout(){
        unset($this->user_id);
        $this->signed_in=false;
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }

    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in= true;
        }else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }

    public function message($msg=""){
        if (!empty($msg)){
        $_SESSION['message']=$msg;
        }else{
            return $this->message;
        }
    }

    private function check_message(){
        if(isset($_SESSION['message'])){
            $this->message=$_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }

}
$session = new Session();


?>
