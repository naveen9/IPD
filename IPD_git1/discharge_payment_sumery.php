<?php
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];
$user=$_SESSION['uname'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select inventory from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['inventory'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}

    include("header.php");
include("menubar.php");


?>


<div style="width:100%; margin:0 auto;">
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
                <div class="op_vi_s"><strong>Receipt Id</strong></div>
                <div class="op_vi_s"><strong>Date </strong></div>
                <div class="op_vi_s"><strong>Amount </strong></div>
                <div class="op_vi_s"><strong>print</strong></div>
            <div class="cls"></div>
         </div>
         <?php
         $v_id=$_GET['visitId'];
         $select21=("select * from opd_bill where visit_id=$v_id and paid_amount !='nall' and paid_amount !=0");
          $result = mysql_query($select21) or die( "Could not execute sql: {$sql}");

            while ($row = mysql_fetch_array($result))
                 {

         ?>
           <form>
            <div style=" height:25px; padding:5px 5px 5px 5px; background:#FFF;">
            <input type="hidden" name="chk" value="<?php echo $row['bill_id'];?>"/>        
            <div class="op_vi_s">&nbsp;<?php echo $row['bill_id'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['billedtime'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['paid_amount'];?></div>
            <div class="op_vi_s"><input type="submit" name="print1" value="print" class="btn"/></div>
            	<div class="cls"></div>
			</div>
      </form>

            <?php } ?>
        
        <?php
         $v_id=$_SESSION['v_id'];
         //echo $v_id;
         
          $result1 = mysql_query("select SUM(grand_total),SUM(due_amount),SUM(paid_amount) from opd_bill where visit_id=$v_id") or die( "Could not execute sql: {$sql}");

            $row1 = mysql_fetch_row($result1) or die( "Could not execute sql: {$sql}");
            
            
          
                 

         ?>
        <div class="fill_data">
		  <div class="op_vi_s">Total Amount &nbsp; : &nbsp;<?php echo $row1[0];  ?></div>
          <div class="op_vi_s">Receive Amount &nbsp; : &nbsp;<?php echo $row1[2];  ?></div>
          <div class="op_vi_s">Due Amount &nbsp; : &nbsp;<?php echo $row1[1];  ?></div>
          <div class="op_vi_s" style="float:right">
           <a href="bill-summary.php" class="btn">Total Bill Summary</a>
          </div>
    </div>

</div>

<?php

    if(isset($_POST['print1']))
             {
                 $chk=$_POST['chk'];
                 //mysql_query("delete from medicine_store where m_id='$chk'")or die(mysql_error());
                 $_session['chk'];
                 echo '<script type="text/javascript">window.open( "print_duble.php" )</script>';
             }


             ?>
    

</body>
</html>

