<?php 
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select accounting from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['accounting'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}


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
<script type="text/javascript">
	
</script>
  	</head>

<body>
<div id="container">

<?php 
include("header.php"); 
include("menubar.php");

?>
<div class="cls"></div>
<form method="post" action="">
<div id="opd_bill"><span style="margin-left:7px;">Vendor Bill</span></div>
<div style=" width:100%;">
      	<div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><strong>&nbsp;&nbsp;</strong></div>
                <div style="width:16%; float:left"><strong>Bill Date</strong></div>
                <div style="width:12%; float:left; text-align:left"><strong>Bill No</strong></div>
                <div style="width:24%; float:left"><strong>Vendor</strong></div>
                <div style="width:24%; float:left"><strong>Details</strong></div>
                <div style="width:9%; float:left"><strong>Amount</strong></div>
                <div style="width:10%; float:left"><strong>&nbsp;&nbsp;</strong></div>
   </div>
    <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
        <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left">&nbsp;&nbsp;</div>
                        <div style="width:16%; float:left"><input type="date" style="width:80%; height:20px; margin:-2px 0px 0px -5px;"name="bill_date" ></div>
                        <div style="width:12%; float:left; "><input type="text" style="width:60%; margin:0 auto" name="bill_no"></div>
                        <div style="width:24%; float:left"><input type="text" style="width:85%;" name="vendor"></div>
                        <div style="width:24%; float:left"><input type="text"  style="width:85%;" name="details"></div>
                        <div style="width:9%; float:left"><input type="text" style="width:60%;" name="amount"></div>
                        <div style="width:10%; float:left"><input type="submit" value="Submit" name="add_entety" class="btn"></div>
       </div> 
</form>

<?php
if (isset($_POST['add_entety']))
{
    $bill_date=$_POST['bill_date'];
    $bill_no=$_POST['bill_no'];
    $vendor=$_POST['vendor'];
    $details=$_POST['details'];
    $amount=$_POST['amount'];
    
     mysql_query("insert into vender_table values('','$bill_no','$bill_date','$vendor','$details','$amount','','','')")or die(mysql_error());

}
?>




    
      <div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
      <form method="post">
		<div id="opd_bill">
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;">Financial Year &nbsp;</span>
            <span>
            	<span id="f_date1"></span>&nbsp;-&nbsp;<span id="e_date1"></span>
            </span> 
		</div>	
        <div class="r_ht" style=" width:720px;">
    	<div class="f_l" style=" margin-left:450px;">
				<label for="startDate">Start Year:</label>
			    <!--<input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />-->
                                <input type="text" id="yy" maxlength="4"  style=" border-radius:6px; height:20px; width:110px; border:1px solid lightgray;" name="year" onmouseout="show_year()" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
 </div>
      </form>
 <div class="cls"></div>
		<div class="record_feed" style="padding:10px 0px;"> 
                    <form method="post">
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
                    </form>
                    
                    <!--acc. to vender listing........................................................-->
                    
                    <?php
                    
                    if (isset($_POST['update']))
{
   $year=$_POST['year'];
	   
   
    
    $quer_ven = "SELECT * FROM vender_table where YEAR( date ) =  '$year' ";
    
             $que=mysql_query($quer_ven);

}
                    
                    
                    
if (isset($_POST['update12']))
{
   $vendorName=$_POST['vendorName'];
   
    
    $quer_ven = "SELECT * FROM vender_table where ven_id='$vendorName'";
    
             $query=mysql_query($quer_ven);

}


if (isset($_POST['update22']))
{
  
   
		
	    $months=$_POST['monthDate'];
	   $data=explode(" ",$months);
	   $month=$data[0];
	   	 $year=$data[1];
   
    
    $quer_ven = "SELECT * FROM vender_table where YEAR( date ) =  '$year' AND MONTH( date ) =  '$month'";
    
             $query12=mysql_query($quer_ven);

}
?>
                    
                    
                                
        <form method="post">            
        <div class="r_ht" style=" width:720px;">
             
    	<div class="f_l" style=" margin-left:450px;">
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update22" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
</form>
        <div class="cls"></div>
  </div>
	
<div class="cls"></div>
	<div style=" width:100%;">
      	<div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><strong>Bill ID</strong></div>
                <div style="width:16%; float:left"><strong>Bill Date</strong></div>
                <div style="width:12%; float:left; text-align:left"><strong>Bill No</strong></div>
                <div style="width:24%; float:left"><strong>Vendor</strong></div>
                <div style="width:24%; float:left"><strong>Details</strong></div>
                <div style="width:9%; float:left"><strong>Amount</strong></div>
                <div style="width:10%; float:left"><strong>Paid</strong></div>
   </div>
   
<div class="cls" style="margin:3px 0px; border-bottom:1px solid lightgray"></div> 
<?php

 while($docValues122=mysql_fetch_array($que))
  {
?>
          <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><?php echo $docValues122['ven_id']; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues122['date']; ?></div>
                <div style="width:12%; float:left; "><?php echo $docValues122['bill_no']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues122['vendor']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues122['details']; ?> </div>
                <div style="width:9%; float:left"><?php echo $docValues122['amount']; ?></div>
                 <div style="width:5%; float:left"><?php echo $docValues122['pad_amount']; ?></div>
                 
                 <?php
                 $a=$docValues122['amount'];
                 $p=$docValues122['pad_amount'];
                 if($a!=$p)
                 {
                     
                 ?>
                 
                 <div style="width:5%; float:left"><a href="vender_payment.php?id=<?php echo $docValues122['ven_id']; ?>">Pay</a></div>
                 <?php
                 }
                 ?>
       </div>
<?php
  }
  ?>



<?php

 while($docValues12=mysql_fetch_array($query))
  {
?>
          <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><?php echo $docValues12['ven_id']; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues12['date']; ?></div>
                <div style="width:12%; float:left; "><?php echo $docValues12['bill_no']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues12['vendor']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues12['details']; ?> </div>
                <div style="width:9%; float:left"><?php echo $docValues12['amount']; ?></div>
                 <div style="width:5%; float:left"><?php echo $docValues12['pad_amount']; ?></div>
                  <?php
                  $a=0;
                  $p=0;
                 $a=$docValues12['amount'];
                 $p=$docValues12['pad_amount'];
                 if($a!=$p)
                 {
                     
                 ?>
                 
                 <div style="width:5%; float:left"><a href="vender_payment.php?id=<?php echo $docValues12['ven_id']; ?>">Pay</a></div>
                 <?php
                 }
                 ?>
       </div>
<?php
  }
  ?>


<?php
while($docValues22=mysql_fetch_array($query12))
{
  
  ?>
          <div style="height:15px; padding:8px 0px;">
          		<div style="width:5%; float:left"><?php echo $docValues22['ven_id']; ?></div>
                <div style="width:16%; float:left"><?php echo $docValues22['date']; ?></div>
                <div style="width:12%; float:left; "><?php echo $docValues22['bill_no']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues22['vendor']; ?></div>
                <div style="width:24%; float:left"><?php echo $docValues22['details']; ?> </div>
                <div style="width:9%; float:left"><?php echo $docValues22['amount']; ?></div>
                 <div style="width:5%; float:left"><?php echo $docValues22['pad_amount']; ?></div>
                  <?php
                  $a=0;
                  $p=0;
                 $a=$docValues22['amount'];
                 $p=$docValues22['pad_amount'];
                 if($a!=$p)
                 {
                     
                 ?>
                 
                 <div style="width:5%; float:left"><a href="vender_payment.php?id=<?php echo $docValues22['ven_id']; ?>">Pay</a></div>
                 <?php
                 }
                 ?>
       </div>
<?php
  }
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

<!--<div id="opd_bill"><span style="margin-left:7px;">Doctor Payment</span></div>-->
		 
  <div class="cls"></div>
      
</div>
</body>
</html>
