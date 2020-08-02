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
    $m_user_page = array(
    
    // get json
    "get_report" => "json/get_report.php",
    "profiles" => "json/get_profiles.php",
    "user" => "json/get_user.php",
    "users" => "json/get_users.php",
    "get_systime" => "json/get_dashboard.php",
    "get_resource" => "json/get_dashboard.php",
    "get_syshealth" => "json/get_dashboard.php",
    "get_hotspotinfo" => "json/get_dashboard.php",
    "get_log" => "json/get_dashboard.php",
    "get_livereport" => "json/get_dashboard.php",
    "get_traffic" => "json/get_dashboard.php",
    "get_hotspot_active" => "json/get_hotspot_active.php",
    "get_hosts" => "json/get_hosts.php",
    "get_profile_mon" => "json/get_profile_mon.php",
    "get_tot_users" => "json/get_tot_users.php",
    "get_interface" => "json/get_interface.php",
    "get_nat" => "json/get_nat.php",
    "connect" => "json/get_connect.php",
    

    //view
    "dashboard" => "view/dashboard.php",
    "about" => "view/about.php",
    "hotspot_active" => "view/hotspot_active.php",
    "s_report_per_day" => "view/report_per_day.php",
    "s_report" => "view/report_all.php",
    "live_report" => "view/live_report.php",
    "hotspot" => "view/hotspot.php",
    "log" => "view/log.php",
    "report" => "view/report.php",
    "print" => "view/print_voucher.php",
    "set_theme" => "config/settheme.php",
    
);

    $admin_page = array(
    "about" => "view/about.php",    
    "sessions" => "view/admin.php",
    "login" => "view/login.php",
    "set_theme" => "config/settheme.php",
    "ping" => "json/get_ping.php",
   

);

    $err_page = array(
    "404" => "view/404.php",
);


}
?>