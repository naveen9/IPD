<?php
session_start();
require 'condb.php';
$month11=$_SESSION['month1'];
$year11=$_SESSION['year1'];
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("y-m-d");
//echo $billtime=date("H:i:s");

$date111=$year11.$month11.'00';
if (isset($_POST['pay']))
{
    $doc_name=$_POST['doc_name'];
    $current_payment=$_POST['current_payment'];
    $payment=$_POST['payment'];
    $final_amount=$payment-$current_payment;
    
    
   $details=$_POST['details'];
    mysql_query("update doc_payment set due_payment=0,status='paid' where doctor_name='$doc_name' and months_payment='$date111'")or die(mysql_error());

           mysql_query("insert into doc_payment values('','$doc_name','','','','$final_amount','$current_payment','$details','$date111','paid','$billdate')")or die(mysql_error());
           
           
          //mysql_query("insert into doc_payment_details values('','$doc_name','$current_payment','$details','$billdate','$date111','$final_amount','$details','$date111','paid','$billdate')")or die(mysql_error());
    
    header("location: beneficary-payment-new.php");
}
?>