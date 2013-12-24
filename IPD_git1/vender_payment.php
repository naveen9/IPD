<?php //error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<script src="jquery-1.5.js" type="text/javascript"></script>
	<script src="hide_show.js" type="text/javascript"></script>
	<script src="jquer-1.9.1-1.js" type="text/javascript"></script>
    <script src="jq.js" type="text/javascript"></script>
	<!--<script type="text/javascript" src="includeBeneficary/jquery-1.2.1.pack.js"></script>-->
    <script type="text/javascript" src="includeBeneficary/jquerySearch.js"></script>	
	<link rel="stylesheet" type="text/css" href="style_by.css"/>
    <!--<link rel="stylesheet" type="text/css" href="tab-code.css" />-->
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
        dateFormat: 'mm yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
			var fdate;
			var edate;
			if(month > 2)
				{
					fdate=year;
					edate=++year;
				}
        	else{
					fdate=year-1;
					edate=year;
				}
			document.getElementById('f_date1').innerHTML=fdate;
			document.getElementById('e_date1').innerHTML=edate;
        }
    });
	
});
 /*style="border:1px solid lightgray"*/
 $(document).ready(function(){
 	$("#line").css("border-bottom","1px solid lightgray");
 });
 
</script>

		<style>
        .ui-datepicker-calendar {
            display: none;
            }
        </style>
</head>

<body>
<div id="container">

<?php 
include("header.php"); 
include("menubar.php");
include("condb.php"); 
$id=$_REQUEST['id'];
$query=mysql_query("SELECT * FROM vender_table where ven_id='$id'")or die(mysql_error());
$fetch=  mysql_fetch_array($query);







?>
<div class="cls"></div>

<div id="opd_bill"><span style="margin-left:7px;">Vendor Payment</span></div>
<div style=" width:100%;">
      	<div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><strong>Bill ID</strong></div>
                <div style="width:24%; float:left"><strong>Vendor</strong></div>
                <div style="width:9%; float:left"><strong>Amount</strong></div>
                <div style="width:10%; float:left"><strong>Paid</strong></div>
                <div style="width:16%; float:left"><strong>Date</strong></div>
                <div style="width:12%; float:left; text-align:left"><strong>Payment</strong></div>
                <div style="width:24%; float:left"><strong>Details</strong></div>
         </div>
    <form method="post" action="ven_pay.php?id=<?php echo $id; ?>">
    <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
        <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><?php echo $fetch['ven_id']; ?></div>
                <div style="width:24%; float:left"><label id=""><?php echo $fetch['vendor']; ?></label></div>
                <div style="width:9%; float:left"><label id=""><?php echo $fetch['amount']; ?></label></div>
                <div style="width:10%; float:left"><label id=""><?php echo $fetch['pad_amount']; ?></label></div>
                <div style="width:16%; float:left"><input type="date" style="width:80%; height:20px; margin:-2px 0px 0px -5px;" name="date"></div>
                <div style="width:12%; float:left;"><input type="text" style="width:60%; margin:0 auto" name="payment" value="<?php echo $a=($fetch['amount']-$fetch['pad_amount']); ?>"></div>
                <div style="width:24%; float:left"><input type="text"  style="width:65%;" name="details"><input type="submit" value="Add" class="btn" name="add"/></div>
                
                
       </div>   
    </form>
    
    <form method="post">
      <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 

		<div id="opd_bill">
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;">Financial Year &nbsp;</span>
            <span>
            	<span id="f_date1"></span>&nbsp;-&nbsp;<span id="e_date1"></span>
            </span> 
		</div>	
        <div class="r_ht" style=" width:720px;">
    	<div class="f_l" style=" margin-left:435px;">
				<label for="startDate">Start Year:</label>
		  <!--<input name="monthDate" id="startDate"  autocomplete="off" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />-->
                                <input type="text" id="yy" maxlength="4"  style=" border-radius:6px; height:20px; width:110px; border:1px solid lightgray;" onmouseout="show_year()" name="year" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
 </div>
 <div class="cls"></div>
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;">Vendor</span>
            <span>
            	<select id="select_size" name="vendorName">
				<?php $docQuery=mysql_query("select * from  vender_table");
	   
	                     while($docValues=mysql_fetch_array($docQuery))
                {
                                 ?>
                      <option value="<?php echo $docValues['ven_id']; ?>"><?php echo $docValues['vendor']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
            <span><input type="submit" name="update12" value="Show"  class="btn" /></span>
		</div>	
        <div class="r_ht" style=" width:720px;">
    	<div class="f_l" style=" margin-left:450px;">
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update22" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
    </form>
  <?php
                    
                   
                    
                    
                    




?>
 
 
	
<div class="cls"></div>
	<div style=" width:100%;">
      	<div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><strong>PayID</strong></div>
                <div style="width:16%; float:left"><strong>Date</strong></div>
                <div style="width:9%; float:left"><strong>Amount</strong></div>
                <div style="width:24%; float:left"><strong>Details</strong></div>
                <div style="width:14%; float:left"><strong>Vendor Name</strong></div>
                <div style="width:10%; float:left"><strong>Vendor ID</strong></div>
               <div style="width:10%; float:left"><strong>Amount</strong></div> 
                <div style="width:12%; float:left; text-align:left"><strong>Total Due</strong></div>
      </div>
    <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
    
    <?php
    
     if (isset($_POST['update']))
{
   $year=$_POST['year'];
	   
   
    
    $quer_ven = "SELECT D.se_no,D.date,D.amount,D.details,D.ven_id,D.paid_amount,D.due_amount,T.vendor FROM vender_table T,vendor_details D where YEAR( D.date ) =  '$year' and T.ven_id=D.ven_id ";
    
             $que=mysql_query($quer_ven);



 while($docValues122=mysql_fetch_array($que))
  {
?>
          <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><?php echo $docValues122[0]; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues122[1]; ?></div>
                <div style="width:9%; float:left"><?php echo $docValues122[2]; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues122[3]; ?></div>
                <div style="width:14%; float:left"><?php echo $docValues122[7]; ?></div>
                <div style="width:10%; float:left"><?php echo $docValues122[4]; ?></div>
               <div style="width:10%; float:left"><?php echo $docValues122[5]; ?></div> 
              <div style="width:6%; float:left; text-align:left"><?php echo $docValues122[6]; ?></div>
               <div style="width:6%; float:left; text-align:left"><a href="#">Cancel</a></div>
      </div>
     <?php
}}
                 ?>
       <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
       
       <?php
if (isset($_POST['update12']))
{
   $vendorName=$_POST['vendorName'];
   
    $quer_ven = "SELECT D.se_no,D.date,D.amount,D.details,D.ven_id,D.paid_amount,D.due_amount,T.vendor FROM vender_table T,vendor_details D where D.ven_id='$vendorName' and T.ven_id=D.ven_id ";
    
    
             $query=mysql_query($quer_ven);


 while($docValues12=mysql_fetch_array($query))
  {
?>
          <div style="height:15px; padding:8px 0px;">
          			<div style="width:5%; float:left"><?php echo $docValues12[0]; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues12[1]; ?></div>
                <div style="width:9%; float:left"><?php echo $docValues12[2]; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues12[3]; ?></div>
                <div style="width:14%; float:left"><?php echo $docValues12[7]; ?></div>
                <div style="width:10%; float:left"><?php echo $docValues12[4]; ?></div>
               <div style="width:10%; float:left"><?php echo $docValues12[5]; ?></div> 
              <div style="width:6%; float:left; text-align:left"><?php echo $docValues12[6]; ?></div>
               <div style="width:6%; float:left; text-align:left"><a href="#">Cancel</a></div>
      </div>
     <?php
}}
                 ?>
       
       
       
       
       <?php
       if (isset($_POST['update22']))
{
  
   
		
	    $months=$_POST['monthDate'];
	   $data=explode(" ",$months);
	   $month=$data[0];
	   	 $year=$data[1];
   
    $quer_ven = "SELECT D.se_no,D.date,D.amount,D.details,D.ven_id,D.paid_amount,D.due_amount,T.vendor FROM vender_table T,vendor_details D where YEAR( D.date ) =  '$year' AND MONTH( D.date ) =  '$month' and T.ven_id=D.ven_id ";
   
    
             $query12=mysql_query($quer_ven);
             while($docValues22=mysql_fetch_array($query12))
             {

?>
<div style="height:15px; padding:8px 0px;">
          			<div style="width:5%; float:left"><?php echo $docValues22[0]; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues22[1]; ?></div>
                <div style="width:9%; float:left"><?php echo $docValues22[2]; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues22[3]; ?></div>
                <div style="width:14%; float:left"><?php echo $docValues22[7]; ?></div>
                <div style="width:10%; float:left"><?php echo $docValues22[4]; ?></div>
               <div style="width:10%; float:left"><?php echo $docValues22[5]; ?></div> 
              <div style="width:6%; float:left; text-align:left"><?php echo $docValues22[6]; ?></div>
               <div style="width:6%; float:left; text-align:left"><a href="#">Cancel</a></div>
      </div>
     <?php
}}
                 ?>
            <div class="cls"></div>
     <div class="doc_datafeed">
     		<div><strong>Total</strong>: <label for="">2000</label></div>
            <div></div>
     </div>       
 <!--<?php echo $pagination;?>	-->
</div>	          
    <div id="line"></div>
    <div class="cls"></div>
<form method="post" action="">
<!--<div id="opd_bill"><span style="margin-left:7px;">Doctor Payment</span></div>-->
		 
  <div class="cls"></div>
      
</div>
</body>
</html>
