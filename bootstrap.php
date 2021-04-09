<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

define('url', 'http://localhost/suport/');
define('BD', array('host'=>'localhost', 'bd'=>'suport', 'user'=>'root', 'password'=>''));



try {
    require __DIR__ . '/routes/routes.php';
 
} catch(\Exception $e){
     
    echo $e->getMessage();
}