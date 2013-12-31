<?php
session_start();
require 'condb.php';
error_reporting(0);
$uid=$_SESSION['uid'];
$uname=$_SESSION['uname'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}

$sql=  mysql_query("select dashboard from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['dashboard'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
	include("header.php");
	include("menubar.php");
	
 
?>
    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Payment To Staff</span>
        </div>
        <div style="float:right; margin-right:10px;">
        	
        </div>
   </div>
    <a href="dashboard_new1.php?page=4" class="btn">Go back</a>
  <div id="main_center_container">
    <div style="width:600px; margin:50px auto; ">
    	<div>
        <form method="post" action="">
    		<label for=""><strong>Staff Name &nbsp;&nbsp;</strong><input type="text" name="staffname" value="" /></label> 
        </div>       	
        <div style="margin:30px 0px;">
    		<label for=""><strong>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><input type="text" name="amount" value="" /></label> 
        </div>
    </div>
  </div>
  <div class="cls"></div>
  
<div class="cls"></div>
  
            <div class="fill_data">
      			<div style="text-align:right; margin-right:20px;">            
                	
                    <span><input type="submit" name="save" value="Save" class="btn" /></span>
                    <span><a href="receive_payment.html" class="btn">Print</a></span>
              </div>
              </form>
              
              <?php
			  // save data to payment_ include("condb.php");
              
              
			  if(isset($_POST['save']))
                           {
			  $from=$_POST['staffname'];
			  $amount=$_POST['amount'];
                          $date=$_SESSION['duty_date'];
			  mysql_query("insert into payment_to_staff values('NULL','$from','$amount','$date','$uname')");
			  }
			  ?>
              
              
  </div>
<div class="cls"></div>  
  <div style="width:600px; border:1px solid lightgray; margin:30px auto">
    <div style="border-bottom:1px solid lightgray; padding:10px 5px;">

            <div class="l_ft n_w"><strong>Name</strong></div>
            <div class="l_ft bill_width1">Amount</div>
            <div class="l_ft bill_width1">&nbsp;</div>
            <div class="l_ft bill_width1">Date</div>
            
            <div class="cls"></div>
    </div>
  <div style="border-bottom:1px solid lightgray; padding:10px 5px;">
  
              <?php 
  $paymentStaff=mysql_query("select * from payment_to_staff");
while($paymentValues=mysql_fetch_array($paymentStaff)){
	    
?>
  
            <div class="l_ft n_w"><strong><?php echo $paymentValues['staff'];?></strong></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['amount'];?></div>
            <div class="l_ft bill_width1">&nbsp;</div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['date'];?></div>
            
            <?php }?>
            <div class="cls"></div>
    </div>
</div>
</div>
</div>
</body>
</html>
