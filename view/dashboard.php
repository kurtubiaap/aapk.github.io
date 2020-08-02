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

  if(file_exists('assets/img/logo-'.$m_user.'.png')){
    $logo = 'assets/img/logo-'.$m_user.'.png';
  }else{
    $logo = 'assets/img/favicon.png';
  }  

if(!isset($is_mobile)){

$dash_ma = "sidenav_active";

include_once("view/header_html.php");
include_once("view/menu.php");


?>

<div class="main unselect" >
  
  <div class="row">
    <div class="col-12">
      <div class="box box-bordered" style="font-size: 14px; font-weight:bold;">
        <div class="row">
          <!-- <div class="text-left col-4"><?= strtoupper($m_user) ?></div> -->
          <div class="text-left col-6" id="load-json">Loading Data...</div>
          <div class="text-right col-6 unselect">
            <span id="time-zone">-</span> | 
            <span id="time">-</span> | 
            <span id="date">-</span>
          </div>
        </div>
      
      </div>
    </div>
    <div class="col-12">
      <div class="row">
        <div class="col-4">
          <div class="box bmh-60 box-red">
            <div class="box-group">
              
                <div class="box-group-area">
                  
                  <span class="box-group-text" id="hotspot-active">-</span><br>
                  
                </div>
                <div class="box-group-icon"><i class="fa fa-wifi"></i><div>Active</div></div>
            </div>
            
          </div>
        </div>
          <div class="col-4">
            <div class="box bmh-60 box-yellow">
              <div class="box-group">
                  <div class="box-group-area">
                    <span class="box-group-text" id="hotspot-users">-</span>
                  </div>
                  <div class="box-group-icon"><i class="fa fa-users"></i><div>Users</div></div>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="box bmh-60 box-green">
              <div class="box-group">
                  <div class="box-group-area">
                    <span class="box-group-text" id="live-report">-</span>
                  </div>
                  <div class="box-group-icon"><i class="fa fa-money"></i><div>Income</div></div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-8">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3><i class="fa fa-server"></i> Resource</h3>
            </div>
            <div class="card-body">
              
                <table class="table table-hover text-nowrap unselect" style="font-size: 13px;">
                  <tr>
                    <td>CPU Load</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary" id="prog-cpu"><span class="mr-l-5" id="cpu-load">-</span></div>
                      </div>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>Memory</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary"  id="prog-memory"><span class="mr-l-5" id="memory">-</span></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>HDD</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary"  id="prog-hdd"><span class="mr-l-5" id="hdd">-</span></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Health</td>
                    <td><i class="fa fa-bolt"></i> <span id="voltage">-</span></td>
                    <td><i class="fa fa-thermometer-empty"></i> <span id="temperature">-</span></td>
                  </tr>
                </table>
              </div>
          </div>
        </div>
          
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3><i class="fa fa-info-circle"></i> System Info</h3>
              </div>
              <div class="card-body">
                <table class="table table-hover text-nowrap unselect" style="font-size: 13px;">
                  <tr>
                    <td>Uptime</td>
                    <td><span id="uptime">-</span></td>
                  </tr>
                  <tr>
                    <td>Board Name</td>
                    <td><span id="board-name">-</span></td>
                  </tr>
                  <tr>
                    <td>Model</td>
                    <td><span id="model">-</span></td>
                  </tr>
                  <tr>
                    <td>Router OS</td>
                    <td><span id="version">-</span></td>
                  </tr>
                </table>
                  
            </div>
            
          </div>
      </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3><span ><i class="fa fa-area-chart"></i> Traffic Monitor </span>
                
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <select id="iface-name" onchange="setIface(this.value)"></select>
                </div>
                <div class="col-12">
                  <div class="pd-t-10 pd-r-10;" id="trafficMonitor"></div>
                </div>
            </div>
          </div>
          </div>
        
        </div>
    </div>
    </div>
    <div class="col-4">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3><i class="fa fa-file-text"></i> App Log</h3>
              </div>
              <div class="card-body">
                <div style="height: 117px ;" class="overflow" id="applogd">
                  <table class="table table-bordered table-hover unselect" style="font-size: 12px;">
                    <tbody  id="applog">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3><i class="fa fa-file-text"></i> Hotspot Log</h3>
              </div>
              <div class="card-body">
                <div style="height: 320px ;" class="mr-t-10 overflow">
                  <table class="table table-bordered table-hover unselect" style="font-size: 12px;">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>User (IP)</th>
                        <th>Messages</th>
                      </tr>
                    </thead>
                    <tbody  id="log">
                      <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      <tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
          </div>
      </div>
    </div>

  </div>

</div>

<?php 

}else if(isset($is_mobile)){ 

  include_once("view/header_html.php");

  ?>

  <div class="main-mobile" >
    <div class="row">

    <div class="mobile-dashboard-top">
      <div class="pd-r-5">
          <div class="text-right unselect pd-5">
            <span id="time-zone">-</span> | 
            <span id="time">-</span> | 
            <span id="date">-</span>
          </div>
      </div>
      <div class="mobile-head">
        <div class="head-container text-middle">
          <div class="image-circle-box">
            <div class="image-circle-mobile" style="background-image: url('<?= $logo ?>')"></div>
          </div>
          <div class="live-report-mobile">
            <span id="live-report">-</span>
          </div>
    </div>
  </div>

  <div class="text-left pd-l-5" id="load-json">Loading Data...</div>
  </div>



  <div class="mobile-body">
      <div class="row">
        <div class="col-6">
          <div class="box bmh-60 box-red">
            <div class="box-group">
              
                <div class="box-group-area">
                  
                  <span class="box-group-text" id="hotspot-active">-</span><br>
                  
                </div>
                <div class="box-group-icon"><i class="fa fa-wifi"></i><div>Active</div></div>
            </div>
            
          </div>
        </div>
          <div class="col-6">
            <div class="box bmh-60 box-yellow">
              <div class="box-group">
                  <div class="box-group-area">
                    <span class="box-group-text" id="hotspot-users">-</span>
                  </div>
                  <div class="box-group-icon"><i class="fa fa-users"></i><div>Users</div></div>
              </div>
            </div>
          </div>
          
      </div>
  </div>
    <div class="w-12">

         
            <div class="mobile-card">
              <h3><i class="fa fa-server"></i> System Resource</h3>
            
                <table class="table table-hover text-nowrap unselect" style="font-size: 13px;">
                  <tr>
                    <td>CPU Load</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary" id="prog-cpu"><span class="mr-l-5" id="cpu-load">-</span></div>
                      </div>
                      
                    </td>
                  </tr>
                  <tr>
                    <td>Memory</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary"  id="prog-memory"><span class="mr-l-5" id="memory">-</span></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>HDD</td>
                    <td colspan="2">
                      <div class="bg-grey">
                        <div class="bg-primary"  id="prog-hdd"><span class="mr-l-5" id="hdd">-</span></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Health</td>
                    <td><i class="fa fa-bolt"></i> <span id="voltage">-</span></td>
                    <td><i class="fa fa-thermometer-empty"></i> <span id="temperature">-</span></td>
                  </tr>
                  <tr>
                    <td>Uptime</td>
                    <td colspan="2"><span id="uptime">-</span></td>
                  </tr>
                  <tr>
                    <td>Board Name</td>
                    <td colspan="2"><span id="board-name">-</span></td>
                  </tr>
                  <tr>
                    <td>Model</td>
                    <td colspan="2"><span id="model">-</span></td>
                  </tr>
                  <tr>
                    <td>Router OS</td>
                    <td colspan="2"><span id="version">-</span></td>
                  </tr>
                </table>
              </div>
  

            <div class="mobile-card">
              <h3><span><i class="fa fa-area-chart"></i> Traffic Monitor </span></h3>
            
              <div class="row">
                <div class="col-12">
                  <select id="iface-name" onchange="setIface(this.value)"></select>
                </div>
                <div class="col-12">
                  <div class="pd-t-10 pd-r-10;" id="trafficMonitor"></div>
                </div>
            </div>
            </div>
          

              
              <div class="mobile-card">
                <h3><i class="fa fa-file-text"></i> App Log</h3>

                <div style="height: 200px ;" class="mr-t-10  overflow" id="applogd">
                  <table class="table table-bordered table-hover unselect" style="font-size: 12px;">
                    <tbody  id="applog">
                    </tbody>
                  </table>
                </div>
              </div>

            
              <div class="mobile-card">
                <h3><i class="fa fa-file-text"></i> Hotspot Log</h3>
              
                <div style="height: 400px ;" class="mr-t-10 overflow">
                  <table class="table table-bordered table-hover unselect" style="font-size: 12px;">
                    <thead>
                      <tr>
                        <td>Time</td>
                        <td>User (IP)</td>
                        <td>Messages</td>
                      </tr>
                    </thead>
                    <tbody  id="log">
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tbody>
                  </table>
                </div>
              </div>
           
            
          </div>
      </div>

</div>
 



<?php } ?>
<script src="assets/js/highcharts/highcharts.js"></script>
<script src="assets/js/highcharts/highcharts.theme.js"></script>
<script>

// var session = localStorage.getItem('session') 
// var currency = localStorage.getItem(session+'Curr');
// var iface = localStorage.getItem(session+'Iface');


$(document).ready(function() {

if(!localStorage.getItem(session+"_iface")){
        localStorage.setItem(session+"_iface","ether1")
        $("#iface-name").append("<option>ether1</option>")
    }
localStorage.setItem(session+"_profn",0);    
txrx = '[{"name":"Tx","data":["0"]},{"name":"Rx","data":["0"]}]'
localStorage.setItem(session+"_traffic_data",txrx)  

dashboard()
loadInterface()
trafficMonitor(theme)
})

// setTimeout(function(){
//   cachingUProfile()
        
// },10000)

</script>




<?php

include_once("view/footer_html.php");
}
?>
