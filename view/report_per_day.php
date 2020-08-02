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
include_once("view/header_html.php");
include_once("view/menu.php");


$day = $_GET['day'];
?>

<script src="assets/js/jquery.min.js"></script>
<script>

localStorage.setItem('session',"?<?= $_SESSION['m_user'] ?>");
var session = localStorage.getItem('session') 

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = Number(today.getMonth()); //January is 0!
var yyyy = today.getFullYear();
var mmm = ["jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec"]

localStorage.setItem(session + '_day_report',0);

function getReport(){

    
    
    var d = localStorage.getItem(session + '_day_report');
    
    
    
    if(d.length == 1 && d < 9){
         dn = "0"+ (Number(d) + 1)
     
      localStorage.setItem(session + '_day_report',(Number(d) + 1));
        
    }else{
      	dn = (Number(d) + 1)
             
      localStorage.setItem(session + '_day_report',dn);
    }
      today = mmm[mm] + '/' + dn + '/' + yyyy;
      //return today
      if(Number(d) < Number(dd)){
        loadReport(session +"/report/&day="+today)
        
      }
    
 
}

getReport()



	function loadReport(url){
    
     
    
      totalMonth = localStorage.getItem('totalMonth')
    
		
		$.getJSON(url, function(result){

            $.each(result, function(i, field){
            $("span").append(field['name'] + "<br>");

            
            });

        })

        
        .done(function() {
            
           getReport()
            
        })
        .always(function() {
          
        });
  
               

		   
		}



</script>

<div class="main"><span></span></div>

<?php
include_once("view/footer_html.php");
}
?>
