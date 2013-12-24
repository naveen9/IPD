<?php
error_reporting(0);
session_start();

$current_date=date("y-m-d");
$current_time=date("H:i:s");
//making database connection
include("condb.php");
//getting data from search box
echo $search=$_POST['search'];
$find=$_POST['find'];
$proc_status=1;
$user=$_SESSION['uname'];



//die;

//checking if empty




                $visit_id=$_SESSION['v_id'];

                //echo $visit_id;
                $p_id=$_SESSION['p_id'];
                mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$visit_id',1)")or die (mysql_error());
                $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                $fet_b_id=mysql_fetch_row($sel_b_id);
                $_SESSION['b_id']=$fet_b_id[0];


                $b_id=$_SESSION['b_id'];
                header("location: s_consumable.php?error_msg1=".urlencode("Patient Found! "));






?>