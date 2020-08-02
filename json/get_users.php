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

$uprof = $_GET['prof'];
$force = $_GET['f'];

// include "core/jsencode.class.php";

 

    
    if($force == "false" && isset($_SESSION["$m_user.$uprof"])){
        
            echo $_SESSION["$m_user.$uprof"];
    }else if($force == "true" || !isset($_SESSION["$m_user.$uprof"]) || empty($_SESSION["$m_user.$uprof"])){
        include_once("config/connection.php");
        
        
        $get_users = $API->comm("/ip/hotspot/user/print", array("?profile" => "$uprof"));
        

        $json_data = json_encode($get_users);

        $d = new jsEncode();

        $json_enc = $d->encodeString($json_data,25);
        echo $json_enc;

        $_SESSION["$m_user.$uprof"] = $json_enc;


            // echo json_encode($get_users);
            
    
            // $_SESSION["$m_user.$uprof"] = json_encode($get_users);
    }
    
    
    
 	
}
 ?>