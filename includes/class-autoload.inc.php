<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


if(strpos($url,'includes') || strpos($url,'customer') || strpos($url,'employee') || strpos($url,'admin')!==false){
    
    $path='../classes/';
}else{
     
    $path="classes/";
}
    $extension=".class.php";
    include_once $path.$className.$extension;
    
}
