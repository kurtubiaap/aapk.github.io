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
$uname = $_GET['name'];

include_once("config/connection.php");
  
    $get_users = $API->comm("/ip/hotspot/user/print", array("?name" => "$uname"));
  
  
      echo json_encode($get_users);
    
    
 	
}
 ?>