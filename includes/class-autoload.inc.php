<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

<<<<<<< HEAD
if(strpos($url,'includes') || strpos($url,'customer') || strpos($url,'employee')!==false){
=======
if(strpos($url,'includes') || strpos($url,'customer') || strpos($url,'employee') || strpos($url,'admin')!==false){
>>>>>>> 1e507caf383f477b5d0b5ab410019a1c446166cc
    
    $path='../classes/';
}else{
     
    $path="classes/";
}
    $extension=".class.php";
    include_once $path.$className.$extension;
    
}