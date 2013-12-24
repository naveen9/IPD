<style type="text/css">
	input[type="text"]{border:1px solid #CCC; border-radius:5px; height:25px !important;}
</style>

<?php
session_start();
error_reporting(0);
include("header.php"); 
include("menubar.php");
include("condb.php");
?>
   
        <div class="cls"></div>
 		<div id="opd_bill" style="height:20px;">
   			<div style="float:left">
   				<span class="p_adding">Reply form</span>
   			</div>
        <div style="float:right; margin-right:10px;">

  		 </div>
    <div class="cls"></div>
    </div>
   <div id="main_center_container">
    <div class="record_feed">
	
<form method="post" action="search_add-patient.php" autocomplete="off">

		
    	<div id="search_exist">
        	<div class="p_adding">
            	<span>
					<input type="text" name="search" placeholder="pid/name/ph/email" id="inputStringAd" onKeyUp="lookupAd(this.value);"  /></span>
					<span style="float:right; margin-top:5px;">
					<input type="submit" name="find" value="Search" class="btn"/></span>
<div align="left" class="suggestionsBoxAd" id="suggestionsAd" style="display:none;" >
				<div align="left" class="suggestionListAd" id="autoSuggestionsListAd">
</div>
</div>
            </div>
        </div>
		

</form>
		
<form method="post" name="form1" action="addpatient.php">
        <div id="add_new_patient">
    	   	 <div>
            	    	<strong>Name</strong>
        		
				<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:52px;" /> 
                
                

                <strong>Sex&nbsp;</strong>
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />
                   <strong>Email&nbsp;</strong>
                   <input type="text" name="p_email" maxlength="50" class="size_input" id="txtChar" style="width:150px;" value="<?php echo $_SESSION['p_email'];?>" />
                 <?php $pid= $_SESSION['p_id'];?>


                   <?php //echo  $_SESSION['p_email'];?>
                   	<div style="float:right; margin-top:3px">
				 		<input type="submit" name="find" value="Add" class="btn" style="width:69px;;"/>
                 	</div>
		  </div>
		     <div class="cls"></div>
        </div>
     <div class="cls"></div>
  <?php
require 'condb.php';
$cid=$_REQUEST['cid'];
$sql=mysql_query("select * from query where claim_id='$cid' ")or die(mysql_error());
  while($d=mysql_fetch_array($sql))
  {

?>
  <div class="category">
		<div style="width:150px; float:left;">
				<span><strong>Patient ID :</strong></span>
				<span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
		</div>
		<div style=" float:right;  ">
            <span><strong>Claims ID :</strong></span>
				<span><label for><?php echo $d[1]; ?></span>
		</div>	
		<div class="cls"></div>
      </div>

	<div class="cls"></div>
  <div class="cls"></div>
</div>    
    
<div class="query_block">
  <div class="query_type">
    	<span>Query</span>
  </div>
    <div class="query_type">
   	  <input type="file" class="btn" style="width:100%">
  </div>
    <div class="query_type">
    	<div style="float:left; width:50%; margin-top:10px;">DateTime</div>
        <div style="float:left; width:50%"><input type="text" style="width:100%;  margin-top:5px;"></div>
        <div class="cls"></div>
  </div>
    <div class="query_type">
    	<input type="submit" value="Upload" class="btn">
  </div>
   <div class="cls"></div>
</div>
  <div class="cls"></div>
      <div style=" width:100%;">
      	<div class="doc_payment">
          		<div><strong>Name</strong></div>
                <div><strong>Query ID</strong></div>
                <div><strong>TPA</strong></div>
                <div><strong>Query Image</strong></div>
                <div><strong>Date </strong></div>
                <div><strong>Time</strong></div>
                <div><strong>&nbsp;&nbsp;</strong></div>
   </div>
    <div class="cls"></div> 
    <div class="doc_payment">
          		<div><strong>Rahul</strong></div>
                <div><strong>123</strong></div>
                <div><strong>mahindratech</strong></div>
                <div><strong><a href="<?php echo $d[2]; ?>"><img src="<?php echo $d[2]; ?>" alt="query" height="200px" width="200px"/></a> <?php } ?></strong></div>
                <div><strong>26/05/2013</strong></div>
                <div><strong>11:30</strong></div>
                <div><strong><a href="give_reply.php?cid=<?php echo $cid; ?>">Reply</a></strong></div>
   </div>
   <div class="cls"></div>
   
</div>
   
  </body>
</html>
