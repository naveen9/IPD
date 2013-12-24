<?php
error_reporting(0);
session_start();

$current_date=date("y-m-d");
$current_time=date("H:i:s");
//making database connection
include("condb.php");
//getting data from search box
$search=$_POST['search'];
$find=$_POST['find'];
$proc_status=1;
$user=$_SESSION['uname'];
$v_id=$_SESSION['v_id'];
//checking if empty




//$_SESSION['p_email']=$search_result['p_email'];
                
                $q2=mysql_query("select * from opd_recpt where p_id ='$p_id'");
                while($search_result=mysql_fetch_array($q2))
                {
                    $_SESSION['crnt_gvn_anmt']=$search_result['crnt_gvn_anmt'];
                }
                $res1=mysql_query("insert into opd_bill (bill_id,status,visit_id,reception) values('','unpaid','$v_id','$user')");
                $res2=mysql_query("select max(bill_id) from opd_bill");
                $search_result1=mysql_fetch_array($res2);

                   echo  $_SESSION['bill_idd']=$search_result1[0];


                //echo $p_id;
//echo $p_id;


                header("location: s_receive_payment1.php?error_msg1=".urlencode("Patient Found!"));
           




























?>