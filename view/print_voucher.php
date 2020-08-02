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

$comment = $_GET['c'];
$d = $_GET['d'];
$s = $_GET['s'];
$t = $_GET['t'];
if(isset($d)){
    $header = 'template/header.html';
    $row = 'template/row.html';
    $footer = 'template/footer.html';
}
if(isset($s)){
    $header = 'template/header.small.html';
    $row = 'template/row.small.html';
    $footer = 'template/footer.small.html';
}
if(isset($t)){
    $header = 'template/header.thermal.html';
    $row = 'template/row.thermal.html';
    $footer = 'template/footer.thermal.html';
}

echo file_get_contents("$header");
echo '

<script src="assets/js/qrious.min.js"></script>

';

include_once("config/connection.php");
$get_users = $API->comm('/ip/hotspot/user/print', array("?comment" => "$comment", "?uptime" => "0s"));
$TotalReg = count($get_users);  
$getuprofile = $get_users[0]['profile'];


  $getprofile = $API->comm("/ip/hotspot/user/profile/print", array("?name" => "$getuprofile"));
  $getsharedu = $getprofile[0]['shared-users'];
  $ponlogin = $getprofile[0]['on-login'];
  $validity = explode(",", $ponlogin)[3];
  $getprice = explode(",", $ponlogin)[2];
  $getsprice = explode(",", $ponlogin)[4]; 
 

  for ($i = 0; $i < $TotalReg; $i++) {
    $regtable = $get_users[$i];
    $uid = str_replace("=","",base64_encode($regtable['.id']));
    $idqr = str_replace("=","",base64_encode(($regtable['.id']."qr")));
    $username = $regtable['name'];
    $password = $regtable['password'];
    $profile = $regtable['profile'];
    $timelimit = $regtable['limit-uptime'];
    $getdatalimit = $regtable['limit-bytes-total'];
    $comment = $regtable['comment'];
  
     
      
    if ($getdatalimit == 0) {
      $datalimit = "";
    } else {
      $datalimit = formatBytes($getdatalimit, 2);
    }
  
  
  
    $urilogin = "http://$dnsname/login?username=$username&password=$password";
    $qrcode = "
      <canvas class='qrcode' id='".$uid."'></canvas>
      <script>
        (function() {

          var ".$uid." = new QRious({
            element: document.getElementById('".$uid."'),
            value: '".$urilogin."',
            size:'256',
          });
  
        })();
      </script>
      ";
   
    $num = $i + 1;

  
      $template = file_get_contents("$row");
     echo str_replace("%u_username%", $username,
          str_replace("%u_password%", $password,
          str_replace("%u_actualProfileName%", $profile,
          str_replace("%u_limitDownload%", $datalimit,
          str_replace("%u_limitUptime%", $timelimit,
          str_replace("%u_timeLeft%", $validity,
          str_replace("%u_moneyPaid%", $getsprice,
          str_replace("%u_comment%", $comment,
          str_replace("%u_number%", $num,
          str_replace("%u_dnsName%", $dnsname,
          str_replace("%u_owner%", $hotspotname,
          str_replace("%u_currency%", $currency, 
          str_replace("%u_qrCode%", $qrcode, 
          str_replace("%u_phone%", $phone,
          $template))))))))))))));
     
  
    }
    echo "<script>
    document.getElementsByTagName('title')[0].innerHTML = document.getElementsByTagName('title')[0].innerHTML+'_".$comment." ".$datalimit." ".$timelimit."';
    window.onload = window.print();

</script>
        ";
    echo  '
<script src="assets/js/format.js"></script>
    
    ';
    echo file_get_contents("$footer");
  

}
 ?>