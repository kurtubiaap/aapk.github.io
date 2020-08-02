<?php

session_start();
// hide all error
error_reporting(0);
// protect .php
$get_self = explode("/",$_SERVER['PHP_SELF']);
$self[] = $get_self[count($get_self)-1];

if($self[0] !== "index.php"  && $self[0] !==""){
    include_once("../core/func.php");

    e502();

}else{



include_once("../core/func.php");
  
   $host = $_GET['h'];
   $port = $_GET['p'];
   if(empty($port)){
        $port = 8728;
    }else{
        $port = $port;
    }
   ping($host,$port);
  
  
    

    
 	
}
 ?>

 