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


if(!isset($is_mobile)){
  

    $log_ma = "sidenav_active";
    
    include_once("view/header_html.php");
    include_once("view/menu.php");
    
    



?>
<div class="main">
    <div class="row">
        <div class="col-12">
            <div class="card ">
            <div class="card-header">
                <h3><i class="fa fa-text"></i>&nbsp; Log &nbsp; <span id="loaginHeader"></span></h3>
            </div>
            <div class="card-body">
            <div class="btn-group">
                <button class="bg-btn-group table-total" id="total-log" >&nbsp;</button>
                <button class="bg-btn-group" onclick="loadLog()" title="Force reload"><i class="fa fa-refresh" ></i></button>
                <input type="text" autocomplete = "off" id="filter-log" onkeyup="filterTable('log','searchLog',this.value)" placeholder="Filter" />
                <button class="bg-btn-group" onclick="filterTable('log','filter-log','')" title="Clear filter"><i class="fa fa-filter" ></i></button>
            </div>
            <div class="card-fixed mr-t-10">
                <table class="table table-bordered table-hover slog">
                    <thead>
                      <tr>
                        <th>Time</th>
                        <th>User (IP)</th>
                        <th>Messages</th>
                      </tr>
                    </thead>
                    <tbody  id="log">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                  </table>
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
    <div class="row">
        <div class="col-12">
            <div class="mobile-card ">
            
                <h3><i class="fa fa-text"></i>&nbsp; Log &nbsp; <span id="loaginHeader"></span></h3>
           
            <div class="card-body">
            <div class="btn-group">
                <button class="bg-btn-group table-total" id="total-log" >&nbsp;</button>
                <button class="bg-btn-group" onclick="loadLog()" title="Force reload"><i class="fa fa-refresh" ></i></button>
                <input type="text" autocomplete = "off" id="filter-log" onkeyup="filterTable('log','searchLog',this.value)" placeholder="Filter" />
                <button class="bg-btn-group" onclick="filterTable('log','filter-log','')" title="Clear filter"><i class="fa fa-filter" ></i></button>
            </div>
            <div class="card-fixed mr-t-10">
                <table class="table table-bordered table-hover slog">
                    <thead>
                      <tr>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody  id="log">
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                  </table>
            </div>
            </div>
            <div class="card-footer"><span id="loading"></span> </div>
            </div>
        </div>
    </div>
</div>


<?php } ?>
<script>
    
$(document).ready(function() {
    loadLog()



    $(".slog").fancyTable({
    inputId: "searchLog",          
    sortColumn:0,
    pagination: true,
    perPage:15,
    globalSearch:true,
    paginationClass: "btn btn-bordered",
    paginationClassActive:"bg-primary",

    });  


})


</script>

<?php
include_once("view/footer_html.php");
}
?>
