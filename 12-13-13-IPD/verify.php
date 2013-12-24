<?php
session_start();
//error_reporting(0);
//ob_start();
require 'condb.php';
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("y-m-d");
//echo $billtime=date("H:i:s");

if (isset($_POST['save']))
{
    $b=0;
	
    $chk=$_POST['chk'];
        
    
    foreach ($chk as $k => $val) {
            $amount_value=$_POST['amount_value'];
             $bp_id=$_POST['bp_id'];
             
             
             foreach ($bp_id as $z => $id){
                 if ($val==$z)
                 {
                      mysql_query("update beneficairy_payment set verified='1', `check`=2 where bp_id='$id' and `check`='1'")or die(mysql_error());
                      $qu=mysql_query("select doctor_incharge from beneficairy_payment where bp_id='$id'")or die(mysql_error());
                      $qu1=mysql_fetch_array($qu);
                      $_SESSION['doctor_incharge']=$qu1['doctor_incharge'];
                      
                      
                 } 
             }
    
            
           
            foreach ($amount_value as $y => $a) {
            
                  if ($val==$y)
                     {
        
                      
 
                      //echo 'success'.$k;
         echo '<br/>';
         //echo 'amount'.$a;
         $b=$b+$a;
         
  }
   
  }
  

  
  }
 $month1=$_SESSION['month'];
 $year=$_SESSION['year'];
$date12=$year.$month1.'00';
$tds_amount=($b*10)/100;
$final_amount=$b-$tds_amount;
$doctor_incharge=$_SESSION['doctor_incharge'];


mysql_query("insert into doc_payment values('','$doctor_incharge','$b','10','$tds_amount','$final_amount','','','$date12','unpaid','$billdate')")or die(mysql_error());

	

}
header("location: doctor_payment_calculater.php");


if(isset($_POST['cancel']))
             {
                 $chk=$_POST['chk'];
                 foreach ($chk as $k => $val) 
                     
                 {
                 mysql_query("update beneficairy_payment set deduction='', share='', tds='',doc_amount='',remarks='', `check`='',verified='' where bp_id='$val'")or die(mysql_error());
             }

                 header("location: doctor_payment_calculater.php");
             }

             
             
	   	
             
             ?>


  





