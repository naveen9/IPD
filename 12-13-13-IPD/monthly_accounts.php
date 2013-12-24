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


include("header.php"); 
include("menubar.php");




date_default_timezone_set ("Asia/Calcutta");
$billdate=date("d-m-y");
$time=date("H:i:s");
?>


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

<div class="miscel_charge" style="height:20px; color:#FFF">Monthly Accounts</div>    
    
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
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
 </div>
      </form>



 <?php
  $patient_ear=0;
          $other_ear=0;
          $total_ear=0;
 
 
 if(isset($_POST['update']))
 {
        $months = $_POST['monthDate'];
                                $data = explode(" ", $months);
                                $month = $data[0];
                                $year = $data[1];
         $select21=("select sum(paid_amount) from opd_bill where YEAR(billeddate)='$year' and MONTH(billeddate)='$month' and paid_amount !='nall' and paid_amount !=0");
          $result = mysql_query($select21) or die( "Could not execute sql: {$sql}");

           $row = mysql_fetch_array($result);
           
           
           
            $select2=("select sum(amount) from earning_group where YEAR(date)='$year' and MONTH(date)='$month' ");
          $result1 = mysql_query($select2) or die( "Could not execute sql: {$sql}");

           $row1 = mysql_fetch_array($result1);
           
           
          $patient_ear=$row[0];
          $other_ear=$row1[0];
          $total_ear=$patient_ear+$other_ear;
          
          
          $doc_pay=mysql_query("select sum(current_payment),sum(total_tds) from doc_payment where YEAR(date)='$year' and MONTH(date)='$month' ");
          $docpay = mysql_fetch_array($doc_pay);
          
          
          
          $emp_pay=mysql_query("select sum(payment),sum(tds_amount),sum(medcl_amount),sum(ppf_amount) from emp_details where YEAR(date)='$year' and MONTH(date)='$month' ");
          $emppay = mysql_fetch_array($emp_pay);
          
          $ven_pay=mysql_query("select sum(paid_amount) from vendor_details where YEAR(date)='$year' and MONTH(date)='$month' ");
          $venpay = mysql_fetch_array($ven_pay);
          
          $exp_pay=mysql_query("select sum(amount) from expenditure_group where YEAR(date)='$year' and MONTH(date)='$month' ");
          $exppay = mysql_fetch_array($exp_pay);
          
          
          
              $total_payment= $docpay[0]+$docpay[1]+$emppay[0]+$emppay[1]+$emppay[2]+$emppay[3]+$venpay[0]+$exppay[0];
 }
         ?>
           
      <div class="bill_clr">
			    <strong>Monthly Income</strong>
    	</div>
            
            
			 <div class="bill_height" style="background:#FFF">
			          <div class="l_ft" style="margin-right:100px;">IPD Earning</div>
                <div class="l_fteive"><?php echo $patient_ear;?>
				</div>
			
            </div>
			
            <div class="cls"></div>
      	
         <div class="bill_height">
			           <div class="l_ft" style="margin-right:100px;">Other Earning</div>
                <div class="l_ft"><?php echo $other_ear;?></div>
        </div>
            
            <div class="cls"></div>
      	
         <div class="bill_height" style="background:#FFF">
			          <div class="l_ft" style="margin-right:100px;">Total Earning</div>
                <div class="l_ft"><?php echo $total_ear; ?></div>
        </div>
		<div class="cls"></div>	
            <div class="bill_clr">
			         <strong>Monthly Expenditure</strong>
            </div>		
				 <div class="bill_height" style="background:#FFF;">
			         <div class="l_ft"  style="margin-right:100px;">Doctor Payment</div>
                <div class="l_ft"><?php echo $docpay[0]; ?>
				</div>
                
                <div class="l_ft" style="margin:0px 200px;">Doctor Tds</div>
                <div class="l_ft" style="margin-right:100px;"><?php echo $docpay[1]; ?>
			
            </div>
                                 </div>
			
            <div class="cls"></div>
      	
         <div class="bill_height">
			          <div class="l_ft" style="width:120px;">Staff Salary</div>
                <div class="l_ft " style="width:120px;"><?php echo $emppay[0]; ?></div>
                
                <div class="l_ft" style="width:120px;">Staff Tds</div>
                <div class="l_ft" style="width:120px;"><?php echo $emppay[1]; ?></div>
                
                <div class="l_ft" style="width:120px;">Staff Mediclaim</div>
                <div class="l_ft" style="width:120px;"><?php echo $emppay[2]; ?></div>
                
                 <div class="l_ft" style="width:120px;">Staff Ppf</div>
                <div class="l_ft" style="width:120px;"><?php echo $emppay[3]; ?></div>
                
             
        </div>
            <div class="cls"></div>
            
      	
         <div class="bill_height" style="background:#FFF;">
		            <div class="l_ft" style="width:180px;">Vendor Payment</div>
                <div class="l_ft" style="width:120px;"><?php echo $venpay[0]; ?></div>
        </div>
                      
            <div class="bill_height">
			          <div class="l_ft" style="width:180px;">Other Expenditure</div>
                <div class="l_ft" style="width:120px;"><?php echo $exppay[0]; ?></div>
            </div>
            
            <div class="bill_height" style="background:#FFF;">
			          <div class="l_ft" style="width:180px;">Total Payment</div>
                <div class="l_ft" style="width:120px;"><?php echo $total_payment; ?></div>
            </div>
		     </form>