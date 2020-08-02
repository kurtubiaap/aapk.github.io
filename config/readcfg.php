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
    include_once("func.php");
    include_once("config/config.php");
    // read config

    $iphost = explode('!', $data[$m_user][1])[1];
    $userhost = explode('@|@', $data[$m_user][2])[1];
    $passwdhost = explode('#|#', $data[$m_user][3])[1];
    $hotspotname = explode('%', $data[$m_user][4])[1];
    $dnsname = explode('^', $data[$m_user][5])[1];
    $currency = explode('&', $data[$m_user][6])[1];
    $areload = explode('*', $data[$m_user][7])[1];
    $iface = explode('(', $data[$m_user][8])[1];
    $infolp = explode(')', $data[$m_user][9])[1];
    $idleto = explode('=', $data[$m_user][10])[1];
    $sesname = explode('+', $data[$m_user][10])[1];
    $useradm = explode('<|<', $data['mikhmon'][1])[1];
    $passadm = explode('>|>', $data['mikhmon'][2])[1];
    $livereport = explode('@!@', $data[$m_user][11])[1];
    
}