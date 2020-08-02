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
  

    $hotspot_ma = "sidenav_active";
    
    include_once("view/header_html.php");
    include_once("view/menu.php");
    
    



?>
<div class="main">
    <div class="row">
        <div class="col-12">
            <div class="card ">
            <div class="card-header">
                <h3><i class="fa fa-wifi"></i>&nbsp; Hotspot &nbsp; <span id="loadingHeader"></span></h3>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-12 mr-b-10">
                    <div class="btn-group btn-container">
                        <button class="bg-btn-group" id="btn-hotspot-users"><i class="fa fa-users" ></i> Users</button>
                        <button class="bg-btn-group" onclick="loadUserProfiles()" id="btn-user-profiles"><i class="fa fa-pie-chart" ></i> User Profile</button> 
                    </div>
                    <div class="btn-group btn-container">
                        <button class="bg-btn-group" onclick="loadHotspotActive()" id="btn-hotspot-active"><i class="fa fa-wifi" ></i> Active</button>
                        <button class="bg-btn-group" onclick="loadHotspotHosts()" id="btn-hotspot-hosts"><i class="fa fa-laptop" ></i> Hosts</button>
                    </div>
                    
                </div>
                
                <div class="col-12 hide" id="user-profiles">
                    <div class="">
                    <div class="btn-group btn-container">
                    <button class="bg-btn-group table-total" id="total-profiles" >&nbsp;</button>
                                            
                        <button class="bg-btn-group" onclick="loadUserProfiles('true')"><i class="fa fa-refresh" title="Force reload" id="fr-profiles"></i></button>
                        <input type="text" autocomplete = "off" id="filter-profiles" onkeyup="filterTable('profiles','searchProfiles',this.value)" placeholder="Filter" />
                        <button class="bg-btn-group" onclick="filterTable('profiles','filter-profiles','')" title="Clear filter"><i class="fa fa-filter" ></i></button>

                    </div>
                    <div class="btn-group btn-container">
                        <button class="bg-btn-group" onclick="" id="btn-add-user-profiles"><i class="fa fa-plus" ></i>  Add</button> 
                    </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover user-profiles">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Shared Users</th>
                                <th>Rate Linit</th>
                                <th>Epired Mode</th>
                                <th>Validity</th>
                                <th>Price</th>
                                <th>Selling Price</th>
                                <th>User Lock</th>
                            </tr>
                        </thead>
                        <tbody id="profiles">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide" id="hotspot-users">
                    <div class=""id="btn-group-users">
                    <div class="btn-group btn-container" >
                        <button class="bg-btn-group table-total" id="total-users" >&nbsp;</button>
                        
                        <button class="bg-btn-group" onclick="loadUsersPPF('true');" title="Force reload"><i class="fa fa-refresh" id="fr-users"></i></button>
                        <input type="text" autocomplete = "off" id="filter-users" onkeyup="filterTable('users','searchUsers',this.value);printVcr('');" placeholder="Filter" />
                        <button class="bg-btn-group" onclick="filterTable('users','filter-users','');selectFirst('select-profile,select-comment');" title="Clear filter"><i class="fa fa-filter" ></i></button>
                        
                        
                       
                    </div>
                    <div class="btn-group btn-container" >
                        <button class="bg-btn-group" onclick="" id="btn-add-hotspot-users"><i class="fa fa-plus" ></i> Add</button> 
                        <button class="bg-btn-group" onclick="" id="btn-gen-hotspot-users"><i class="fa fa-ticket" ></i> Generate</button>
                    </div>

                    <div class="btn-group btn-container" >
                        <select class="bg-btn-group pointer" id="select-profile" value="" onchange="filterTable('users','searchUsers',this.value);this.title=this.value;">
                            <option value="">Profile</option>
                        </select>
                        <select class="bg-btn-group pointer" id="select-comment" value="" onchange="filterTable('users','searchUsers',this.value);printVcr(this.value);this.title=this.value;">
                            <option value="">Comment</option>
                        </select>
                        <button id='printVcr' title='Print with default template' class='bg-btn-group pointer hide'><i class="fa fa-print"></i> Print</button>
                        <button id='printVcrS' title='Print with small template' class='bg-btn-group pointer hide'><i class="fa fa-print"></i> Small</button>
                    </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-users">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th>Profile</th>
                                <th class="text-right">Uptime</th>
                                <th class="text-right">Bites In</th>
                                <th class="text-right">Bytes Out</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="users">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide" id="hotspot-active">
                    <div class="">
                        <div class="btn-group btn-container">
                            <button class="bg-btn-group table-total" id="total-active" >&nbsp;</button>
                            <button class="bg-btn-group" onclick="loadHotspotActive()" title="Force reload"><i class="fa fa-refresh" id="fr-active"></i></button>
                            <input type="text" autocomplete = "off" id="filter-hotspot-active" onkeyup="filterTable('active','searchActive',this.value)" placeholder="Filter" />
                            <button class="bg-btn-group" onclick="filterTable('active','filter-hotspot-active','');selectFirst('select-server');" title="Clear filter"><i class="fa fa-filter" ></i></button>
                            
                        </div>
                        <div class="btn-group btn-container">
                            <select class="bg-btn-group pointer" id="select-server" value="" onchange="filterTable('active','searchActive',this.value)">
                                <option value="">Server</option>
                            </select>
                        </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-active">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Server</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>MAC Address</th>
                                <th class="text-right">Uptime</th>
                                <th class="text-right">Bites In</th>
                                <th class="text-right">Bytes Out</th>
                                <th>Time Left</th>
                                <th>Login By</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="active">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide" id="hotspot-hosts">
                    <div class="">
                        <div class="btn-group btn-container">
                            <button class="bg-btn-group table-total" id="total-hosts" >&nbsp;</button>
                            <button class="bg-btn-group" onclick="loadHotspotHosts()" title="Force reload"><i class="fa fa-refresh" id="fr-hosts"></i></button>
                            <input type="text" autocomplete = "off" id="filter-hosts" onkeyup="filterTable('hosts','searchHosts',this.value)" placeholder="Filter" />
                            <button class="bg-btn-group" onclick="filterTable('hosts','filter-hosts','')" title="Clear filter"><i class="fa fa-filter" ></i></button>
                            
                       
                        </div>
                        <div class="btn-group btn-container">
                            <button class="bg-btn-group" onclick="filterTable('hosts','searchHosts','bypassed')" title="Filter bypassed">P</button>
                            <button class="bg-btn-group" onclick="filterTable('hosts','searchHosts','authorized')" title="Filter authorized">A</button>

                        </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-hosts">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Mac Address</th>
                                <th>Address</th>
                                <th>To Address</th>
                                <th>Server</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody id="hosts" class="text-nowrap">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
    <div class="row">
        <div class="col-12">
        <div class="mobile-card ">
            
                <h3><i class="fa fa-wifi"></i>&nbsp; Hotspot &nbsp; <span id="loadingHeader"></span></h3>
           
            <div class="mr-t-10" >
            <div class="row">
                <div class="col-12 mr-b-10">
                    <div class="btn-group">
                        <button class="bg-btn-group" id="btn-hotspot-users"><i class="fa fa-users" ></i> Users</button>
                        <button class="bg-btn-group" onclick="loadUserProfiles()" id="btn-user-profiles"><i class="fa fa-pie-chart" ></i> User Profile</button> 
                        <button class="bg-btn-group" onclick="loadHotspotActive()" id="btn-hotspot-active"><i class="fa fa-wifi" ></i> Active</button>
                        <button class="bg-btn-group" onclick="loadHotspotHosts()" id="btn-hotspot-hosts"><i class="fa fa-laptop" ></i> Hosts</button>
                    </div>
                    
                </div>
                
                <div class="col-12 hide" id="user-profiles">
                    <div class="">
                    <div class="btn-group btn-container">
                    <button class="bg-btn-group table-total" id="total-profiles" >&nbsp;</button>
                        <button class="bg-btn-group" onclick="loadUserProfiles('true')"><i class="fa fa-refresh" title="Force reload" id="fr-profiles"></i></button>
                        <input type="text" autocomplete = "off" id="filter-profiles" onkeyup="filterTable('profiles','searchProfiles',this.value)" placeholder="Filter" />
                        <button class="bg-btn-group" onclick="filterTable('profiles','filter-profiles','')" title="Clear filter"><i class="fa fa-filter" ></i></button>

                    </div>

                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover user-profiles">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="profiles">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide " id="hotspot-users">
                    <div class="">
                    <div class="btn-group" id="btn-group-users">
                        <button class="bg-btn-group table-total" id="total-users" >&nbsp;</button>
                        <button class="bg-btn-group" onclick="loadUsersPPF('true');" title="Force reload"><i class="fa fa-refresh" id="fr-users"></i></button>
                        <input type="text" autocomplete = "off" id="filter-users" onkeyup="filterTable('users','searchUsers',this.value);printVcr('');" placeholder="Filter" />
                        <button class="bg-btn-group" onclick="filterTable('users','filter-users','');selectFirst('select-profile,select-comment');" title="Clear filter"><i class="fa fa-filter" ></i></button>
                        
                        <select class="bg-btn-group pointer" id="select-profile" value="" onchange="filterTable('users','searchUsers',this.value);this.title=this.value;">
                            <option value="">Profile</option>
                        </select>
                        <select class="bg-btn-group pointer" id="select-comment" value="" onchange="filterTable('users','searchUsers',this.value);printVcr(this.value);this.title=this.value;">
                            <option value="">Comment</option>
                        </select>
                        <button id='printVcr' title='Print with default template' class='bg-btn-group pointer hide'><i class="fa fa-print"></i> Print</button>
                        <button id='printVcrS' title='Print with small template' class='bg-btn-group pointer hide'><i class="fa fa-print"></i> Small</button>
                       
                    </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-users">
                        <thead>
                            <tr>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody id="users">
                            <tr>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide" id="hotspot-active">
                    <div class="">
                        <div class="btn-group">
                            <button class="bg-btn-group table-total" id="total-active" >&nbsp;</button>
                            <button class="bg-btn-group" onclick="loadHotspotActive()" title="Force reload"><i class="fa fa-refresh" id="fr-active"></i></button>
                            <input type="text" autocomplete = "off" id="filter-hotspot-active" onkeyup="filterTable('active','searchActive',this.value)" placeholder="Filter" />
                            <button class="bg-btn-group" onclick="filterTable('active','filter-hotspot-active','');selectFirst('select-server');" title="Clear filter"><i class="fa fa-filter" ></i></button>
                            <select class="bg-btn-group pointer" id="select-server" value="" onchange="filterTable('active','searchActive',this.value)">
                            <option value="">Server</option>
                        </select>
                        </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-active">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="active">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-12 hide" id="hotspot-hosts">
                    <div class="">
                        <div class="btn-group">
                            <button class="bg-btn-group table-total" id="total-hosts" >&nbsp;</button>
                            <button class="bg-btn-group" onclick="loadHotspotHosts()" title="Force reload"><i class="fa fa-refresh" id="fr-hosts"></i></button>
                            <input type="text" autocomplete = "off" id="filter-hosts" onkeyup="filterTable('hosts','searchHosts',this.value)" placeholder="Filter" />
                            <button class="bg-btn-group" onclick="filterTable('hosts','filter-hosts','')" title="Clear filter"><i class="fa fa-filter" ></i></button>
                            <button class="bg-btn-group" onclick="filterTable('hosts','searchHosts','bypassed')" title="Filter bypassed">P</button>
                            <button class="bg-btn-group" onclick="filterTable('hosts','searchHosts','authorized')" title="Filter authorized">A</button>

                       
                        </div>
                    
                    </div>
                    <div class="card-fixed mr-t-10">
                    
                    <table class="table table-bordered table-hover hotspot-hosts">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="hosts" class="text-nowrap">
                            <tr>
                                <td></td>
                            </tr>
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


<?php } ?>
<script>
    
$(document).ready(function() {
$("#user-profiles").removeClass('hide').addClass('block');
setTimeout(function(){
        setTimeout(function(){
            loadUserProfiles()
        },100)
    // $("#profiles").html("")
},1)



    $(".user-profiles").fancyTable({
    inputId: "searchProfiles",          
    sortColumn:1,
    pagination: true,
    perPage:15,
    globalSearch:true,
    paginationClass: "btn btn-bordered",
    paginationClassActive:"bg-primary",

    });  

    $(".hotspot-users").fancyTable({
    inputId: "searchUsers",            
    sortColumn:2,
    pagination: true,
    perPage:15,
    globalSearch:true,
    paginationClass: "btn btn-bordered",
    paginationClassActive:"bg-primary",

    });

    $(".hotspot-active").fancyTable({
    inputId: "searchActive",            
    sortColumn:1,
    pagination: true,
    perPage:15,
    globalSearch:true,
    paginationClass: "btn btn-bordered",
    paginationClassActive:"bg-primary",

    });   
    
    $(".hotspot-hosts").fancyTable({
    inputId: "searchHosts",            
    sortColumn:2,
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
