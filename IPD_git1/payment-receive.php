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
	include("condb.php");
 
?>
    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Payment Receive</span>
        </div>
        <div style="float:right; margin-right:10px;">
        	
        </div>
   </div>
    
  <div id="main_center_container">
    <div style="width:600px; margin:50px auto;">
    	<div>
        
            <a href="dashboard_new1.php?page=4">Go back</a>
        <form method="post" action="">
        
    		<label for=""><strong>From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <input type="text"  name="from" value="" /></label> 
        </div>       	
        <div style="margin:30px 0px;">
    		<label for=""><strong>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <input type="text"  name="amount" value="" /></label> 
        </div>
        
         	
    </div>
  </div>
  <div class="cls"></div>
  

  
      <div class="fill_data">
      			<div style="text-align:right; margin-right:20px;">            
                	<span><input type="submit" name="save" value="Save" class="btn" /></span>
                    <span><a href="#" class="btn">Print</a></span>
              </div>
              </from>
              
              <?php
			  // save data to payment_receive table

			  if(isset($_POST['save'])){
			  $from=$_POST['from'];
			  $amount=$_POST['amount'];
                          $date=$_SESSION['duty_date'];
			  mysql_query("insert into payment_receive values('','$from','$amount','$date','$uname')");
			  }
			  ?>
              
  </div>
<div class="cls"></div>  

  <div style="width:600px; border:1px solid lightgray; margin:30px auto">
  
    <div style="border-bottom:1px solid lightgray; padding:10px 5px;">
            <div class="l_ft n_w"><strong></strong>From</div>
            <div class="l_ft bill_width1">Account</div>
            <div class="l_ft bill_width1">&nbsp;</div>
            <div class="l_ft bill_width1">Date</div>
            <div class="l_ft bill_width1">Cancel</div>
            <div class="cls"></div>
    </div>
  <div style="border-bottom:1px solid lightgray; padding:10px 5px;">
        <?php 
  $paymentQuery=mysql_query("select * from payment_receive");
while($paymentValues=mysql_fetch_array($paymentQuery)){
	    
?>
      <form method="post">
            <div class="l_ft n_w"><strong><?php echo $paymentValues['from'];?></strong></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['account'];?></div>
            <div class="l_ft bill_width1"><input type="hidden" name="chk" value="<?php echo $paymentValues['id'];?>"></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['date'];?></div>
            <div class="l_ft bill_width1"><input type="submit" name="del" value="Delete"></div>
      </form>
                <?php }?>
            <div class="cls"></div>
    </div>
</div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['del']))
{
    $chk=$_POST['chk'];
    mysql_query("delete from payment_receive where id='$chk' ");
    header('location:payment-receive.php'); 
}
?>