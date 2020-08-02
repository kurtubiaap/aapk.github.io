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

    
      $force = $_GET['f'];
      $name = $_GET['n'];
      $sesMP = $m_user.'profile_mon'.$name;

    
      if($force == "false" && isset($_SESSION["$sesMP"])){
          
              echo $_SESSION["$sesMP"];
              
      }else if($force == "true" || !isset($_SESSION["$sesMP"])){
          include_once("config/connection.php");
          
          
          $get_profile_mon = $API->comm("/system/scheduler/print", array(
            "?name" => "$name",
            "?disabled" => "false"
          ));
  
   
            // echo json_encode($get_profile_mon);

            $json_data = json_encode($get_profile_mon);

              $d = new jsEncode();

              $json_enc = $d->encodeString($json_data,25);
              echo $json_enc;
      
              $_SESSION["$sesMP"] = $json_enc;
      }    
    
 	
}
 ?>