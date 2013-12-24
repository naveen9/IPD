<?php
session_start();
error_reporting(0);
include('condb.php');
$p_id=$_SESSION['p_id'];
$patient_name=$_POST['name'];
$patient_age=$_POST['age'];
$patient_gender=$_POST['gender'];
$patient_mob=$_POST['phone'];
$ms=$_POST['ms'];
//echo "mail=".$patient_email=$_POST['email'];echo "<br>";
date_default_timezone_set ("Asia/Calcutta");
$current_date=date("d-m-y");
$current_date=date("y-m-d");
$current_time=date("h:i:s");

$proc_status=1;
$uname=$_SESSION['uname'];
if($_POST['create_visit_id'])
{
if($p_id=="")
{
if($patient_name=="" or $patient_age=="" or $patient_gender=="")
{
header("location: s_consultation.php");
}
else
{
$search_p_id=mysql_query("insert into patient_info(p_name, p_mob, p_email, p_gender, p_age,marital_status) values('$patient_name','$patient_mob','$patient_email','$patient_gender','$patient_age','$ms')");
//$search_p_id=mysql_query("select max(patient_id) from ipd_admit");
$fetch_p_id=mysql_fetch_row($search_p_id);
$patient_id=$fetch_p_id[0]; //patient id for a new patient
$_SESSION['p_id']=$patient_id;
$p_id=$_SESSION['p_id'];
$q=mysql_query("select * from patient_info where patient_id='$p_id'");
while($search_result=mysql_fetch_array($q))
{
$_SESSION['p_id']=$search_result['patient_id'];
$_SESSION['p_name']=$search_result['p_name'];
$_SESSION['p_age']=$search_result['p_age'];
$_SESSION['p_gender']=$search_result['p_gender'];
$_SESSION['p_mob']=$search_result['p_mob'];
//$_SESSION['p_email']=$search_result['p_email'];
//$_SESSION['ms']=$search_result['marital_status'];
}
$p_id=$_SESSION['p_id'];
$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
$fet_v_id=mysql_fetch_row($sel_v_id);
echo "line46=".$_SESSION['v_id']=$fet_v_id[0];
echo "line47=".$v_id=$_SESSION['v_id'];//storing visit id in session
mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id',$proc_status)");
$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
$fet_b_id=mysql_fetch_row($sel_b_id);
$_SESSION['b_id']=$fet_b_id[0];
$b_id=$_SESSION['b_id'];//storing bill id in session
header("location: s_consultation.php");
}
}
else
{
echo "helloElseVisit";
$res=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
if($res){echo "insert into visit register";}
$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
$fet_v_id=mysql_fetch_row($sel_v_id);
echo "line61=". $_SESSION['v_id']=$fet_v_id[0];
echo "line62=". $v_id=$_SESSION['v_id'];//storing visit id in session
mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");
$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
$fet_b_id=mysql_fetch_row($sel_b_id);
$_SESSION['b_id']=$fet_b_id[0];
$b_id=$_SESSION['b_id'];//storing bill id in session
header("location: s_consultation.php");
}
}

if($_POST['find1'])

{
    $search=$_POST['search'];

        if($search=="")
        {
            unset($_SESSION['p_id']);
            unset($_SESSION['p_name']);
            unset($_SESSION['p_age']);
            unset($_SESSION['p_gender']);
            unset($_SESSION['p_email']);
            unset($_SESSION['p_mob']);
            unset($_SESSION['v_id']);
            unset($_SESSION['visit_date']);
            unset($_SESSION['ref_dr']);
            unset($_SESSION['bed_no']);
            unset($_SESSION['crnt_gvn_anmt']);
            header("location: s_consultation.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no from patient_info P,visit_register V where V.bed_no='$search' and V.bed_no!=0 and P.patient_id=V.p_id");
            $found=mysql_num_rows($q);
            if($found==0)
            {
                unset($_SESSION['p_id']);
                unset($_SESSION['p_name']);
                unset($_SESSION['p_age']);
                unset($_SESSION['p_gender']);
                unset($_SESSION['p_email']);
                unset($_SESSION['p_mob']);
                unset($_SESSION['v_id']);
                unset($_SESSION['visit_date']);
                unset($_SESSION['ref_dr']);
                unset($_SESSION['bed_no']);
                unset($_SESSION['crnt_gvn_anmt']);
                header("location: s_consultation.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
            }
            else
            {
                while($search_result=mysql_fetch_array($q))
                {

                    $_SESSION['p_id']=$search_result[0];
                    $_SESSION['p_name']=$search_result[1];
                    $_SESSION['p_age']=$search_result[2];
                    $_SESSION['p_gender']=$search_result[3];
                    $_SESSION['p_mob']=$search_result[4];
                    $_SESSION['v_id']=$search_result[5];
                    $_SESSION['bed_no']=$search_result[6];



                }

                $p_id=$_SESSION['p_id'];


                $v_id=$_SESSION['v_id'];//storing visit id in session
                mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
                $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                $fet_b_id=mysql_fetch_row($sel_b_id);
                $_SESSION['b_id']=$fet_b_id[0];
                $b_id=$_SESSION['b_id'];//storing bill id in session
                header("location: s_consultation.php?error_msg1=".urlencode("Patient Found"));
            }
        }




}


?>