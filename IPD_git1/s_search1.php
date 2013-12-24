<?php
//error_reporting(0);
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
//checking if empty

    
$p_id=$_SESSION['p_id'];
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
//$sel_v_id=mysql_query("select * from visit_register where p_id='$p_id'");
//$fet_v_id=mysql_fetch_row($sel_v_id);
//$_SESSION['v_id']=$fet_v_id[0];
    //$_SESSION['bed_no']=$fet_v_id[5];

$v_id=$_SESSION['v_id'];//storing visit id in session
mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
$fet_b_id=mysql_fetch_row($sel_b_id);
$_SESSION['b_id']=$fet_b_id[0];
$b_id=$_SESSION['b_id'];//storing bill id in session
header("location: s_visit_proc.php?error_msg1=".urlencode("Patient Found"));
                
                

?>