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
//checking if empty
if($_POST['find'])
{
    if($user!=='billingadmin')
    {
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
header("location: ipd_visit_summary.php?error_msg=".urlencode("Please Enter a Searchword!"));
}
else
{
$q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,P.p_email,P.p_address,V.ref_dr,PA.paymode,PA.panel,V.room_type from patient_info P,visit_register V ,patient_panel PA where P.p_name='$search' or P.patient_id='$search' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id and V.visit_id=PA.v_id group by P.patient_id");
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
header("location: ipd_visit_summary.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
$_SESSION['p_email']=$search_result[7];
$_SESSION['p_address']=$search_result[8];
$_SESSION['ref_dr']=$search_result[9];
$_SESSION['mode']=$search_result[10];
                    $_SESSION['panel']=$search_result[11];
                    $_SESSION['room_type']=$search_result[12];



//$_SESSION['p_email']=$search_result['p_email'];
}

$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['v_id'];
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
//$sel_v_id=mysql_query("select * from visit_register where p_id='$p_id'");
//$fet_v_id=mysql_fetch_row($sel_v_id);
//$_SESSION['v_id']=$fet_v_id[0];
    //$_SESSION['bed_no']=$fet_v_id[5];

$q2=mysql_query("select * from opd_bill where visit_id='$v_id'");
            $found=mysql_num_rows($q2);
            while($search_result=mysql_fetch_array($q2))
                //$sum=0;
            {
               $amount= $search_result['paid_amount'];
                $amount1= $search_result['grand_total'];
                $amount2= $search_result['due_amount'];
                $paid_amount1=$paid_amount1+$amount;
                $grand_total=$grand_total+$amount1;
                $due_amount=$due_amount+$amount2;
                //echo $sum;

            }
            $_SESSION['paid_amount1']=$paid_amount1;

            $_SESSION['grand_total']=$grand_total;
            $_SESSION['due_amount']=$due_amount;
            $_SESSION['stats']='Admitted' ;


header("location: ipd_visit_summary.php?error_msg1=".urlencode("Patient Found"));
}
}
    }
    else
    {
        if($user=='billingadmin')
    {
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
            unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
            unset($_SESSION['crnt_gvn_anmt']);
            header("location: ipd_visit_summary.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,P.p_email,P.p_address,V.ref_dr,PA.paymode,PA.panel,V.room_type from patient_info P,visit_register V ,patient_panel PA where P.p_name='$search' or P.patient_id='$search' and V.p_id=P.patient_id and V.visit_id=PA.v_id group by P.patient_id");
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
                unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
                header("location: ipd_visit_summary.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                    $_SESSION['p_email']=$search_result[7];
$_SESSION['p_address']=$search_result[8];
$_SESSION['ref_dr']=$search_result[9];
$_SESSION['mode']=$search_result[10];
                    $_SESSION['panel']=$search_result[11];
                    $_SESSION['room_type']=$search_result[12];




//$_SESSION['p_email']=$search_result['p_email'];
                }

                $p_id=$_SESSION['p_id'];
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
               // $sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
                //$fet_v_id=mysql_fetch_row($sel_v_id);
                //$_SESSION['v_id']=$fet_v_id[0];
               // $_SESSION['bed_no']=$fet_v_id[5];

                $v_id=$_SESSION['v_id'];//storing visit id in session


                $q2=mysql_query("select * from opd_bill where visit_id='$v_id'");
            $found=mysql_num_rows($q2);
            while($search_result=mysql_fetch_array($q2))
                //$sum=0;
            {
               $amount= $search_result['paid_amount'];
                $amount1= $search_result['grand_total'];
                $amount2= $search_result['due_amount'];
                $paid_amount1=$paid_amount1+$amount;
                $grand_total=$grand_total+$amount1;
                $due_amount=$due_amount+$amount2;
                //echo $sum;

            }
            $_SESSION['paid_amount1']=$paid_amount1;

            $_SESSION['grand_total']=$grand_total;
            $_SESSION['due_amount']=$due_amount;
            $_SESSION['stats']='Discharged on' ;
                
                header("location: ipd_visit_summary.php?error_msg1=".urlencode("Patient Found"));
    }
        }
    }
    }
}

if($_POST['find1'])
{

    $search1=$_POST['search1'];
        if($search1=="")
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
    unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
header("location: ipd_visit_summary.php?error_msg=".urlencode("Please Enter a Searchword!"));
}
else
{
$q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,P.p_email,P.p_address,V.ref_dr from patient_info P,visit_register V where V.bed_no='$search1' and V.bed_no!='Discharge patient' and P.patient_id=V.p_id");
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
    unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
header("location: ipd_visit_summary.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
$_SESSION['p_email']=$search_result[7];
$_SESSION['p_address']=$search_result[8];
$_SESSION['ref_dr']=$search_result[9];



//$_SESSION['p_email']=$search_result['p_email'];
}

$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['v_id'];
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
//$sel_v_id=mysql_query("select * from visit_register where p_id='$p_id'");
//$fet_v_id=mysql_fetch_row($sel_v_id);
//$_SESSION['v_id']=$fet_v_id[0];
    //$_SESSION['bed_no']=$fet_v_id[5];

$q2=mysql_query("select * from opd_bill where visit_id='$v_id'");
            $found=mysql_num_rows($q2);
            while($search_result=mysql_fetch_array($q2))
                //$sum=0;
            {
               $amount= $search_result['paid_amount'];
                $amount1= $search_result['grand_total'];
                $amount2= $search_result['due_amount'];
                $paid_amount1=$paid_amount1+$amount;
                $grand_total=$grand_total+$amount1;
                $due_amount=$due_amount+$amount2;
                //echo $sum;

            }
            $_SESSION['paid_amount1']=$paid_amount1;

            $_SESSION['grand_total']=$grand_total;
            $_SESSION['due_amount']=$due_amount;
            $_SESSION['stats']='Admitted' ;


header("location: ipd_visit_summary.php?error_msg1=".urlencode("Patient Found"));
}
}
}






?>