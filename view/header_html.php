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
	include_once("config/theme.php");
	if(isset($_SESSION['theme'])){
		$theme = $_SESSION['theme'];
		$themecolor = $_SESSION['themecolor'];
	}else{
		$theme = $theme;
		$themecolor = $themecolor;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>MIKHMON <?= $hotspotname; ?></title>
		<meta charset="utf-8">
		<!-- <meta http-equiv="cache-control" content="private" /> -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Theme color -->
		<meta name="theme-color" content="<?= $themecolor ?>" />
		<!-- Font Awesome -->
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css" />
		<!-- Mikhmon UI -->
		<link rel="stylesheet" href="assets/css/mikhmon-ui.<?= $theme ?>.css" />
		<!-- favicon -->
		<link rel="icon" href="assets/img/favicon.png" />
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		<!-- pace -->
		<link rel="stylesheet" href="assets/css/pace.<?= $theme ?>.css" />
		<script src="assets/js/pace.min.js"></script>

		
		
	</head>
	<body>

<?php } ?>