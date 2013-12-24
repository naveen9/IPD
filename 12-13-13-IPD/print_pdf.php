<?php
session_start();
$v_id=$_SESSION['v_id'];
if($_POST['print_receipt'])
{
if($v_id=="")
{
echo "Please fill all details";
}
else
{
$final_due_amount=$due_amount-$amount-$disc_amount;
mysql_query("update opd_bill set due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$billdate',billedtime='$billtime' where visit_id='$v_id' and bill_id='$bill_id'");
$fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");
while($fetched_p_id=mysql_fetch_array($fetch_p_id))
{
$p_id=$fetched_p_id['p_id'];
}
mysql_query("insert into opd_recpt values('','$bill_id','$name','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode')");
//echo '<script type="text/javascript">window.open( "http://localhost/avantikanew/print.php" )</script>';
header("location:print.php");
}
}
?>