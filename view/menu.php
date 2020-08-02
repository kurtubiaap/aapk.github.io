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

  if(file_exists('assets/img/logo-'.$m_user.'.png')){
    $logo = 'assets/img/logo-'.$m_user.'.png';
  }else{
    $logo = 'assets/img/favicon.png';
  }
if($m_user != "admin"){
?>
<div class="sidenav unselect">
  <div class="text-center" id="brand">MIKHMON</div>
  <div class="image-circle" style="background-image: url('<?= $logo ?>')"></div>
  <a href="?<?= $m_user ?>" class="sidenav_item <?= $dash_ma ?>" ><i class="fa fa-th-large"></i> Dashboard</a>
  <a href="?<?= $m_user ?>/hotspot" class="sidenav_item <?= $hotspot_ma ?>"><i class="fa fa-wifi"></i> Hotspot</a>
  <a href="#" class="sidenav_item <?= $voucher_ma ?>" ><i class="fa fa-ticket"></i> Voucher</a>
  <a href="#" class="sidenav_item <?= $quickprint_ma ?>" ><i class="fa fa-print"></i> Quick Print</a>
  <a href="?<?= $m_user ?>/log" class="sidenav_item <?= $log_ma ?>" ><i class="fa fa-file-text"></i> Log</a>
  <a href="?<?= $m_user ?>/report" class="sidenav_item <?= $report_ma ?>" ><i class="fa fa-money"></i> Report</a>
  <a href="?admin/sessions" class="sidenav_item <?= $settings_ma ?>" ><i class="fa fa-gear"></i> Settings</a>
  <a href="?<?= $m_user ?>/about" class="sidenav_item <?= $about_ma ?>" ><i class="fa fa-info-circle"></i> About</a>
  <div class="btn-group sidenav_item text-center">
  <button onclick="setTheme('light')" class="bg-light">&nbsp;</button>
  <button onclick="setTheme('dark')" class="bg-dark">&nbsp;</button>
  <button onclick="setTheme('blue')" class="bg-blue">&nbsp;</button>
  <button onclick="setTheme('green')" class="bg-green">&nbsp;</button>
  <button onclick="setTheme('pink')" class="bg-pink">&nbsp;</button>
  </div>

 
</div>

<?php }else if($m_user == "admin"){ ?>

<div class="sidenav unselect">
  <div class="text-center" id="brand">MIKHMON</div>
  <div class="image-circle" style="background-image: url('<?= $logo ?>')"></div>
  <a href="?<?= $m_user ?>/sessions" class="sidenav_item <?= $settings_ma ?>" ><i class="fa fa-gear"></i> Settings</a>
  <a href="?<?= $m_user ?>/about" class="sidenav_item <?= $about_ma ?>" ><i class="fa fa-info-circle"></i> About</a>
  <div class="btn-group sidenav_item text-center">
  <button onclick="setTheme('light')" class="bg-light">&nbsp;</button>
  <button onclick="setTheme('dark')" class="bg-dark">&nbsp;</button>
  <button onclick="setTheme('blue')" class="bg-blue">&nbsp;</button>
  <button onclick="setTheme('green')" class="bg-green">&nbsp;</button>
  <button onclick="setTheme('pink')" class="bg-pink">&nbsp;</button>
  </div>

 
</div>




<?php }} ?>