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

$day = $_GET['day'];
?>

<script src="assets/js/jquery.min.js"></script>
<script>
localStorage.setItem('session',"<?= $_SESSION['m_user'] ?>");
var session = localStorage.getItem('session') 

		
		$.getJSON(session + "/report", function(result){
            $.each(result, function(i, field){
            $("div").append(field['name'] + "<br>");
            });
        })
       



</script>

<div></div>
<?php }?>