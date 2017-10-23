<?php

// function __autoload($class) {
//     include 'classes/' . $class . '.class.php';
// }

//function my_autoloader($class) {
//    include 'inludes/' . $class . '.php';
//}
//
//spl_autoload_register('my_autoloader');

// Or, using an anonymous function as of PHP 5.3.0
spl_autoload_register(function ($class) {
    $class = strtolower($class);
    $the_path = "includes/{$class}.php";
    if(file_exists($the_path) && is_file($the_path)){
        require($the_path);
    }else{
        die("This file named {$class}.php could not be loaded!");
    }

});

function redirect($location){
    header("Location: {$location}");
}

?>
