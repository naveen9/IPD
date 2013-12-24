<?php
session_start();
//error_reporting(0);
//ob_start();
require 'condb.php';
$emp_id=$_SESSION['emp_id'];
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("y-m-d");

if(isset($_POST['pay']))
            {
   
                
                
                $workingday=$_POST['workingday'];
                $emp_salary2=$_POST['emp_salary2'];
                $tds_per=$_POST['tds_per'];
                $tdsamount=$_POST['tdsamount'];
                $medcl=$_POST['medcl'];
                $medclamount=$_POST['medclamount'];
                $ppf=$_POST['ppf'];
                $ppfamount=$_POST['ppfamount'];
                $hra=$_POST['hra'];
                $hraamount=$_POST['hraamount'];
                $othet_details=$_POST['othet_details'];
                $othet_amount=$_POST['othet_amount'];
                $othetamount=$_POST['othetamount'];
                $final_sal=$_POST['final_sal'];
                $payment_sal=$_POST['payment_sal'];
                $due=$final_sal-$payment_sal;
                
                mysql_query("insert into emp_details values('','$emp_id','$workingday','$emp_salary2','$tds_per','$tdsamount','$medcl','$medclamount','$ppf','$ppfamount','$hra','$hraamount','$othet_details','$othet_amount','$othetamount','$final_sal','$payment_sal','$due','$billdate')")or die(mysql_error());
                
                header("location: staff-payment.php");
                
                
            }
            ?>