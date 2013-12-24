<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	
	<script src="jquery-1.5.js" type="text/javascript"></script>
	<script src="hide_show.js" type="text/javascript"></script>
	
	<script src="jquer-1.9.1-1.js" type="text/javascript"></script>
    <script src="jq.js" type="text/javascript"></script>
	<script type="text/javascript" src="includeBeneficary/jquery-1.2.1.pack.js"></script>
    <script type="text/javascript" src="includeBeneficary/jquerySearch.js"></script>	
	<link rel="stylesheet" type="text/css" href="style_by.css" />
    <link rel="stylesheet" type="text/css" href="tab-code.css" />
	<link rel="stylesheet" href="/resources/demos/style.css" />
	<link rel="stylesheet" type="text/css" href="paging/style_by.css"/>
	<link rel="stylesheet" type="text/css" href="paging/tab-code.css" />
	<link rel="stylesheet" href="paging/paging.css" type="text/css" />
	<link rel="stylesheet" href="includeBeneficary/searchStyle.css" type="text/css">
	
	<script src="ajax-ui.js"></script>
    <script type="text/javascript" src="jquery-ui-min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquey-ui.css">

<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>

<style>
.ui-datepicker-calendar {
    display:none; 
    }
</style>
  	</head>

<body>
<div id="container">
<?php 

include("includeBeneficary/searchResultsBeneficary.php");
include("condb.php");
include("head.php");
include("menu1.php");
 
?>
  
  <!--<form method="post" action="">
  	<div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Hospital Accounting</div> 
        <div class="r_ht">
        <div class="todate_w f_l">
		<select id="select_size" name="months">
				<option value="january">january</option>
				<option value="february">february</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
				</select>
       	  <input type="radio" name="date" checked="checked" style="margin:6px 15px 0px 20px;" />
        </div>
        <div class="f_l">January 2013</div> 
        <div class="todate_w f_l" style="margin-left:30px;"><input type="radio" name="date" style="margin:6px 15px 0px 0px;" /></div> 
        <div class="f_l"><input type="date"  name="startDate"/></div>
        <div class="todate_w f_l" style="margin:0px 15px 0px 20px;"><font color='black'>To</font></div>
        <div class="r_ht" style="margin-right:5px;"><input type="date" name="EndDate" /></div>
        </div>
   </div>
      <div class="right_top bg_head" style="border-bottom:1px solid #FFF">
       
       <span style="margin-left:5px;">Beneficiary Name</span>
	   <?php $docQuery=mysql_query("select * from  doc_master_table");
	   
	   ?>
            <span>
            	<select id="select_size" name="docName">
				
				
				<?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['doc_name']; ?>"><?php echo $docValues['doc_name']; ?></option>
                      <?php } ?>
				</select>
            </span>    
        <span style="margin-left:440px;"><input type="text" name="name" placeholder="Name" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" /></span>
                <span><input type="submit" name="search" value="Search"  style="background:#0000B9; color:#FFF; padding:3px;  width:50px;" />
				<input type="submit" name="update" value="Update"  style="background:#0000B9; color:#FFF; padding:3px;  width:50px;" /></span>
				<div align="left" class="suggestionsBox" id="suggestions" style="display:none;">

<div align="left" class="suggestionList" id="autoSuggestionsList">
</div>
</div>
				
				
				
				
       </div>
</form>-->
		<div id="opd_bill" style="height:23px; background:green"> 
  		<div class="f_l m_r" style="background:red">Hospital Accounting</div> 
		<div class="f_l">
		<span style="margin-left:5px;">Beneficiary Name</span>
            <span>
            	<select id="select_size">
                      <option value="volvo">......................</option>
                      
				</select>
            </span> 
		</div>	
        <div class="r_ht" style="background:red; width:750px;">
        <div class="todate_w f_l">
       	  <input type="radio" name="date" checked="checked" style="margin:6px 15px 0px 20px;" />
        </div>
        <div class="f_l">
				<label for="startDate">Date :</label>
			    <input name="startDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
        <div class="todate_w f_l" style="margin-left:30px;"><input type="radio" name="date" style="margin:6px 15px 0px 0px;" /></div> 
        <div class="f_l"><input type="date" /></div>
        <div class="todate_w f_l" style="margin:0px 15px 0px 20px;">To</div>
        <div class="" style="margin-right:5px;"><input type="date" />
		<input type="button" value="Update" class="btn" /></div>
        </div>
   </div>
      <div class="right_top bg_head" style="border-bottom:1px solid #FFF">
       
          
        <span style="margin-left:440px;"><input type="text" name="search" placeholder="ID/Name/Ph/Email" /></span>
                <span><input type="button" name="search" value="Search"  style="background:#0000B9; color:#FFF; padding:3px;  width:70px;" /></span>
       </div>
		<div class="cls"></div>
		<label for="startDate">Date :</label>
			    <input name="startDate" id="startDate" class="date-picker" />

		<!--my code -->
      		<?php
			
		if(isset($_POST['update'])){
		 $months=$_POST['months'];
	 $docName=$_POST['docName'];
	 $startDate=$_POST['startDate'];
	 $EndDate=$_POST['EndDate'];
	 
	 
	  $query = "SELECT COUNT(*) as num FROM beneficairy_payment where doctor_incharge='$docName'";
    $total_pages = mysql_fetch_array(mysql_query($query));
    $total_pages = $total_pages['num'];
   
    /* Setup vars for query. */
	$page=$_GET['page'];
    $limit = 4;                                 //how many items to show per page
    if($page)
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
   
    /* Get data. */
    $query = "SELECT * FROM beneficairy_payment where doctor_incharge='$docName' LIMIT $start,$limit";
    $benQuery = mysql_query($query);
	include("paging/paging.php");
	 
	 }
	 
	 
	else if($_POST['search'])
	 {
	 $name=$_POST['name'];
	 $query = "SELECT * FROM beneficairy_payment where patient_name='$name'"; 
	 $benQuery = mysql_query($query);
	 }
	 else{
	 
	  $query = "SELECT COUNT(*) as num FROM beneficairy_payment";
    $total_pages = mysql_fetch_array(mysql_query($query));
    $total_pages = $total_pages['num'];
   
    /* Setup vars for query. */
	$page=$_GET['page'];
    $limit = 4;                                 //how many items to show per page
    if($page)
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
   
    /* Get data. */
    $query = "SELECT * FROM beneficairy_payment LIMIT $start,$limit";
    $benQuery = mysql_query($query);
	 include("paging/paging.php");
	 }
		 
		?>
		
		
    <div style="float:left; width:738px;">
          
      <div style="float:left; width:100%;">
      	<div style="background:#E6E6E6;  height:30px; padding-top:10px;">
          <div class="l_ft" style="padding-top:4px; width:38px;">&nbsp;</div>
		  
          		<div class="l_ft bill_width_receive1"><strong>Patient Name</strong></div>
                <div class="l_ft" style="width:50px;"><strong>Bill No</strong></div>
                <div class="l_ft bill_width_receive1"><strong>Item</strong></div>
                <div class="l_ft be_margin"><strong>Deduction</strong></div>
                <div class="l_ft be_margin"><strong>Shared% </strong></div>
                <div class="l_ft be_margin"><strong>TDS%</strong></div>
                <div class="l_ft be_margin"><strong>Remarks</strong></div>
                <div class="cls"></div>
           </div>
           		<div style=" height:30px; padding-top:10px; background:#E6E6E6;">     
					<div class="l_ft" style="padding-top:4px; width:38px;">&nbsp;</div>
                    <div class="l_ft bill_width_receive1">Visit ID</div>
                    <div class="l_ft be_margin" style="width:50px;">Date</div>
                     <div class="l_ft bill_width_receive1">Amount </div>
		              <div class="cls"></div>
                 </div>     
                          
           <form method="post" action="">               
            
<?php 
		  while($benValues=mysql_fetch_array($benQuery)){
		  ?>
	 			
             <div style="background:url(ccc.png); height:30px; padding-top:10px;">
			 
			
             	<div class="l_ft" style="padding-top:4px; width:38px;"><input type="checkbox" name="chk[]" value="<?php echo $benValues['bp_id'];?>" style="width:30px;" /></div>
			
                <div class="l_ft bill_width_receive1"><?php echo $benValues['patient_name']; ?></div>
                <div class="l_ft" style="width:50px;"><?php echo $benValues['bill_id']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['procedure_name']; ?></div>
                <div class="l_ft be_margin"><input type="text" name="deduction<?php echo $benValues['bp_id'];?>" placeholder="1000"  style="width:50px;"  /></div>
                <div class="l_ft be_margin"><input type="text" name="shared<?php echo $benValues['bp_id'];?>"  placeholder="70" style="width:50px;"   /></div>
                <div class="l_ft be_margin"><input type="text" name="tds<?php echo $benValues['bp_id'];?>" placeholder="10.2" style="width:50px;"  /></div>
                <div class="l_ft be_margin" style="width:80px;"><input type="text" name="remarks<?php echo $benValues['bp_id'];?>" style="width:80px;"  /></div>
                <div class="cls"></div> 
             </div>
             <div style=" height:30px; padding-top:10px;">
             	<div class="l_ft" style="width:38px;">&nbsp;</div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['visit_id']; ?></div>
                <div class="l_ft p_w"><?php echo $benValues['date']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['amount']; ?></div>
                <div class="l_ft be_margin">0</div>
                <div class="l_ft be_margin">70</div>
                
             </div>
             <?php } ?>
             
             <div class="pagination">
             	<div class="l_ft bill_width_name"> 
             	
              </div>  
              <div class="r_ht bill_width_name">
              	<div style=" text-align:right; margin-right:5px;"><strong>Total Amount : Rs 1000</strong></div>
              </div>
             </div>
           </div>
          <div class="cls"></div>
      </div>
       <div class="cls"></div>
  <div class="cls"></div>     
          <div class="fill_data">
        <div id="bil_id" style="width:800px"> 
        <div style="float:left;">
			
          </div>
          <div id="dis" style="visibility:hidden; margin-left:170px; font-style:float:left">
           <span>
    <label for="" style="color:#0000A8">&nbsp;&nbsp;&nbsp;Discount to Patient&nbsp;:</label>
           </span> 
				<span><input type="text" placeholder="Amount" style="width:50px;"/></span>          
                
                <span><input type="text" style="width:300px;" /></span>          
              </div>  
          </div>
        <div id="save_clear"> <span>
         <a href="#"> <input type="submit" name="save" value="Save" class="btn" /></a>
          </span> <span>
          
          </span> </div>
      </div>
        </div>
  </div>
  </form>
 <div class="cls"></div>
 <?php if(isset($_POST['save']))
 {
 
    //startDate  EndDate  docName  months
	 $startDate=$_POST['docName'];
	 $startDate=$_POST['months'];
 
	 $startDate=$_POST['startDate'];
	 $startDate=$_POST['EndDate'];
	
     for($i=0;$i<count($_POST['chk']);$i++)
	 {
	     $id=$_POST['chk'][$i];
		 $ded='deduction'.$id;
		$ded=$_POST[$ded];
		
		$shrd='shared'.$id;
		$shrd=$_POST[$shrd];
		
		$tds='tds'.$id;
		$tds=$_POST[$tds];
		
		$rem='remarks'.$id;
		$rem=$_POST[$rem];
		
		//echo $ded,$shrd,$tds,$rem;
		//echo '<br>';
	$update=mysql_query("update beneficairy_payment set deduction='$ded',share='$shrd',tds='$tds',remarks='$rem'where bp_id='$id'");
	
	 }
 }
 ?>
 <?=$pagination?>
    </div>
	
</div>
</div>
</body>
</html>
