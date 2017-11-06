<?php ob_start()?>

<?php
defined('DS') ? null : define('DS' , DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT' , "C:" . DS . "xampp" . DS . "htdocs" . DS . "CMS_oop");

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH' , SITE_ROOT . DS . "admin" .DS. "includes");


?>

<?php require_once("session.php");?>
<?php require_once("new_config.php");?>
<?php require_once("functions.php");?>
<?php require_once("database.php");?>
<?php require_once("db_object.php");?>
<?php require_once("user.php");?>
<?php require_once("photo.php");?>

