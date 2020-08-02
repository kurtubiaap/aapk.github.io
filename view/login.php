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
    $is_mobile = $_GET['mobile'];
    // include_once('config/config.php');
    include_once('config/readcfg.php');

    if (!isset($is_mobile)) {
      $col = "col-5";
      $marginTop = "20%";
      $urlLogin = "<script>window.location='./?admin/sessions'</script>";
    }else if(isset($is_mobile)){
      $col = "col-12";
      $marginTop = "60px";
      $urlLogin = "<script>window.location='./?admin/sessions/&mobile'</script>";
    }
        include_once("view/header_html.php");

        if (isset($_POST['login'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if ($user == $useradm && $pass == dec_rypt($passadm)) {
                $_SESSION["mikhmon"] = $user;
                echo $urlLogin;
            } else {
             
                $error = '
                <div style="width: 100%; padding:5px 0px 5px 0px; border-radius:5px;display:none;" class="bg-danger"><i class="fa fa-ban"></i> Alert!<br>Invalid username or password.</div>
                <script>$("#btn-login").html("Login");$(".bg-danger").fadeIn(200);setTimeout(function(){$(".bg-danger").fadeOut(300)},3000)</script>';
            }
        } ?>
<div class="row">
  <div class="col-12">
<div class="logo-login"></div>
</div>
<div class="col-12">
<div class="login" style="margin-top: <?= $marginTop ?>">
<div  class="text-left mr-l-10 pd-l-10">
<span style="font-size: 25px;">MIKHMON | </span>
<small>MikroTik Hotspot Monitor</small>
</div>
<div class="login-container">
<div class="row" >
    
    <div class="<?= $col ?>" >
    <center >
      <form autocomplete="off" action="" method="post">
      <table class="table" style="width:90%">
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px; padding:10px;" class="form-control" type="text" name="user" id="_username" placeholder="Username" required="1" autofocus>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px;  padding:10px;" class="form-control" type="password" name="pass" id="_passw" placeholder="Password" required="1">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-right">
            <button id="btn-login" style="height: 35px; font-weight: bold; font-size: 17px; " class="btn bg-primary pointer" type="submit" name="login" >Login</button>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <?= $error; ?>
          </td>
        </tr>
      </table>
      </form>
    </center>
    </div>
    
  </div>
  </div>
  </div>
  </div>
  </div>


<script>
$("body").addClass("bg-textures")
$("#btn-login").click(function(){
  if($("#_username").html() != "" && $("#_passw").html() != ""){
    $("#btn-login").html('&nbsp;<i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;');
  }
})
</script>
<?php
        
    // }else if (isset($is_mobile)) {
    //     include_once('view/header_html.php');

    // }
    include_once('view/footer_html.php');
    
}

?>