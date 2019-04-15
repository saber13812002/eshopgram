<?php
 
require 'ppp/config.php';   
require 'constants.php';
//require 'util/Auth.php';

// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class) {
    require LIBS . $class .".php";
}
//require LIBS ."Bootstrap.php";
//require LIBS ."Controller.php";
//require LIBS ."Database.php";
//require LIBS ."Hash.php";
//require LIBS ."Model.php";
//require LIBS ."Session.php";
//require LIBS ."View.php";
//require LIBS ."cookie.php";
//require LIBS ."dateconverter.php";
//require LIBS ."public_functions.php";
//require LIBS ."testi.php";

//require 'src/Instagram.php';
 
// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();

//var_dump($_SERVER);