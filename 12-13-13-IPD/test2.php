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
//checking if empty
if($_POST['find'])
{
    if($search=="")
    {
        header("location: consultation.php?error_msg=".urlencode("Please Enter a Searchword!"));
    }
    else
    {
        $q=mysql_query("select * from patient_info where patient_id='$search' or p_name='$search' or p_mob='$search'");
        $found=mysql_num_rows($q);
        if($found==0)
        {
            header("location: consultation.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
        }
        else
        {
            while($search_result=mysql_fetch_array($q))
            {
                $_SESSION['p_id']=$search_result['patient_id'];
                $_SESSION['p_name']=$search_result['p_name'];
                $_SESSION['p_age']=$search_result['p_age'];
                $_SESSION['p_gender']=$search_result['p_gender'];
                $_SESSION['p_mob']=$search_result['p_mob'];



//$_SESSION['p_email']=$search_result['p_email'];
            }

            $p_id=$_SESSION['p_id'];
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
            $sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
            $fet_v_id=mysql_fetch_row($sel_v_id);
            $_SESSION['v_id']=$fet_v_id[0];
            $_SESSION['bed_no']=$fet_v_id[5];

            $v_id=$_SESSION['v_id'];//storing visit id in session
            mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
            $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['b_id']=$fet_b_id[0];
            $b_id=$_SESSION['b_id'];//storing bill id in session
            header("location: consultation.php?error_msg=".urlencode("Patient Found"));
        }
    }
}

?>