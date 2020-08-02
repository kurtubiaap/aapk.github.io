<?php 
session_start();
// hide all error
error_reporting(0);
// protect .php
$get_self = explode("/",$_SERVER['PHP_SELF']);
$self[] = $get_self[count($get_self)-1];

if($self[0] !== "index.php"  && $self[0] !==""){
    include_once("./../../core/func.php");

    e502();

}else{ 
    
    include_once("config/readcfg.php");
    
    // array color
  $color = array('1' => 'bg-blue', 'bg-indigo', 'bg-purple', 'bg-pink', 'bg-red', 'bg-yellow', 'bg-green', 'bg-teal', 'bg-cyan', 'bg-grey', 'bg-light-blue');
  

  if (isset($_POST['save'])) {

    $suseradm = ($_POST['useradm']);
    $spassadm = enc_rypt($_POST['passadm']);
    $logobt = ($_POST['logobt']);
    $qrbt = ($_POST['qrbt']);

    $cari = array('1' => "mikhmon<|<$useradm", "mikhmon>|>$passadm");
    $ganti = array('1' => "mikhmon<|<$suseradm", "mikhmon>|>$spassadm");

    for ($i = 1; $i < 3; $i++) {
      $file = file("./config/config.php");
      $content = file_get_contents("./config/config.php");
      $newcontent = str_replace((string)$cari[$i], (string)$ganti[$i], "$content");
      file_put_contents("./config/config.php", "$newcontent");
    }

  

    echo "<script>window.location='./?admin/sessions'</script>";
  }


$is_mobile = $_GET['mobile'];


if(!isset($is_mobile)){
  

    $report_ma = "sidenav_active";
    
    include_once("view/header_html.php");
    include_once("view/menu.php");
    
    



?>
<div class="main">
<script>
  function Pass(id){
    var x = document.getElementById(id);
    if (x.type === 'password') {
    x.type = 'text';
    } else {
    x.type = 'password';
    }}
</script>

<div class="row">
  <div class="col-12">
            <div class="card ">
            <div class="card-header">
                <h3><i class="fa fa-gear"></i>&nbsp; Admin Settings &nbsp; <span id="loadingHeader"></span></h3>
            </div>
            <div class="card-body">
            <div class="row">
              <div class="col-12 mr-b-10">
                    <div class="btn-group">
                        <button class="bg-btn-group" onclick="" id="btn-router-list"><i class="fa fa-server" ></i> Router List</button> 
                        <button class="bg-btn-group" onclick="" id="btn-admin"><i class="fa fa-user-circle" ></i> Admin</button>
                        
                    </div>
                    
                </div>
                <div class="col-12" id="router-list">
                  
                    <div class="card-fixed mr-t-10">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Hotspot Name</th>             
                                <th>Session Name</th>
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          foreach (file('./config/config.php') as $line) {
                            $s = explode("'", $line)[1];
                            $_SESSION["$s"] = $s;
                            $hp = explode('!', $data[$s][1])[1];
                            
                            if ($s == "" || $s == "mikhmon") {
                            } else { ?>

                                <tr><td> <?= explode('%', $data[$s][4])[1]; ?> </td>
                                <td><?= $s; ?> </td>
                                <td><span class="btn bg-success tooltip" onclick="connect('<?= $s; ?>p','<?= $s; ?>')"  id="<?= $s; ?>"><i class="fa fa-globe"></i> Connect <span class="tooltiptext" style="display:none;" id="<?= $s; ?>p"></span></span>&nbsp;<span class="btn bg-primary"  id="<?= $s; ?>"><i class="fa fa-edit"></i> Edit</span>&nbsp;<span class="btn bg-danger"  id="<?= $s; ?>"><i class="fa fa-trash"></i> Remove</span></td>
                              </tr>
             
                                <?php
                              }
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    
                    
                  </div>
                </div>
            </div>
            </div>
            <div class="card-footer"><span id="loading"></span> </div>
            </div>
        </div>
      </div>
    </div>
<?php
      }else if(isset($is_mobile)){ 

  include_once("view/header_html.php");

  ?>
<div class="main-mobile">
<script>
  function Pass(id){
    var x = document.getElementById(id);
    if (x.type === 'password') {
    x.type = 'text';
    } else {
    x.type = 'password';
    }}
</script>

<div class="row">
  <div class="col-12">
            <div class="mobile-card ">
            
                <h3><i class="fa fa-gear"></i>&nbsp; Admin Settings &nbsp; <span id="loadingHeader"></span></h3>
            
            <div class="mr-t-10">
            <div class="row">
              <div class="col-12 mr-b-10">
                    <div class="btn-group">
                        <button class="bg-btn-group" onclick="" id="btn-router-list"><i class="fa fa-server" ></i> Router List</button> 
                        <button class="bg-btn-group" onclick="" id="btn-admin"><i class="fa fa-user-circle" ></i> Admin</button>
                        
                    </div>
                    
                </div>
                <div class="col-12" id="router-list">
                  
                    <div class="card-fixed mr-t-10">

                    <table class="table table-bordered table-hover">
                        <tbody>
                            <?php
                          foreach (file('./config/config.php') as $line) {
                            $s = explode("'", $line)[1];
                            $hp = explode('!', $data[$s][1])[1];
                            
                            if ($s == "" || $s == "mikhmon") {
                            } else { ?>

                                <tr><td><i class="fa fa-server" ></i> <b> <?= explode('%', $data[$s][4])[1]; ?></b> <br>
                                Session Name: <?= $s; ?><br>
                                <span class="btn bg-success tooltip" onclick="connect('<?= $s; ?>p','<?= $s; ?>')"  id="<?= $s; ?>"><i class="fa fa-globe"></i> Connect <span class="tooltiptext" style="display:none;" id="<?= $s; ?>p"></span></span>&nbsp;<span class="btn bg-primary"  id="<?= $s; ?>"><i class="fa fa-edit"></i> Edit</span>&nbsp;<span class="btn bg-danger"  id="<?= $s; ?>"><i class="fa fa-trash"></i> Remove</span></td>
                              </tr>
             
                                <?php
                              }
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    
                    
                  </div>
                </div>
            </div>
            </div>
            <div class="card-footer"><span id="loading"></span> </div>
            </div>
        </div>
      </div>

</div>






<?php }} ?>