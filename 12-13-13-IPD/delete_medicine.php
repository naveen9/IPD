
<?php
	error_reporting(0);
	include("header.php");
	include("menu.php");
    //require 'includes1/searchresults.php';
require 'db_conx.php';
?>

  <!--Nav bar End -->
   <div style="width:990px; margin:0 auto;">
  		 <div class="field_bg">
      		<form>
                <div style="float:left; width:200px; "><strong>Medicine Name</strong></div>
                <div style="float:left; width:150px; margin-right:5px;"><strong>Batch No</strong></div>
                <div style="float:left; width:200px; "><strong>MRP.</strong></div>
                <div style="float:left; width:200px; "><strong>Expiry Date</strong></div>
    		      <div class="cls" style="margin-bottom:15px;"></div>
                   	<div style="float:left; width:200px; margin-right:5px;">Crocin</div>
           			<div style="float:left; width:150px; "><strong>bn324</strong></div>
                    <div style="float:left; width:200px; ">2500</div>
    		        <div style="float:left; width:200px; ">11/02/2013</div>
	            <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>
        </form>
      </div>
      <div class="cls" style="margin-top:20px;"></div>
  
      
  </div>
  <?php 
  	include("footer.php");
  ?>