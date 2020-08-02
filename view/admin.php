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
	$settings_ma = "sidenav_active";
	// include_once("view/header_html.php");
	// include_once("view/menu.php");
	
	
	if($GLOBALS['page'] == "sessions"){
		include_once("view/admin/sessions.php");
	}

	
		include_once("view/footer_html.php");
}
?>