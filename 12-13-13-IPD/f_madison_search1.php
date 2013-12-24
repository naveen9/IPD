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
            unset($_SESSION['visit_id']);
            unset($_SESSION['visit_date']);
            unset($_SESSION['ref_dr']);

            header("location: f_medicine.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no from patient_info P,visit_register V where P.p_name='$search' or P.patient_id='$search' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id group by P.patient_id");
            $found=mysql_num_rows($q);
            if($found==0)
            {
                unset($_SESSION['p_id']);
                unset($_SESSION['p_name']);
                unset($_SESSION['p_age']);
                unset($_SESSION['p_gender']);
                unset($_SESSION['p_email']);
                unset($_SESSION['p_mob']);
                unset($_SESSION['visit_id']);
                unset($_SESSION['visit_date']);
                unset($_SESSION['ref_dr']);

                header("location: f_medicine.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                   $_SESSION['visit_id']=$search_result[5];
                    $_SESSION['bed_no']=$search_result[6];



//$_SESSION['p_email']=$search_result['p_email'];
                }



           $visit_id=$_SESSION['visit_id'];

            //echo $visit_id;
            $p_id=$_SESSION['p_id'];
            mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$visit_id',1)")or die (mysql_error());
            $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['b_id']=$fet_b_id[0];


            $b_id=$_SESSION['b_id'];
            header("location: f_medicine.php?error_msg1=".urlencode("Patient Found! "));






        }
    }
}
    else
    {
        if($user=='billingadmin')
        {
            if($search=="")
            {
                header("location: f_medicine.php?error_msg=".urlencode("Please Enter a Searchword!"));
            }
            else
            {
                $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no from patient_info P,visit_register V where P.p_name='$search' or P.patient_id='$search' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id group by P.patient_id");
                $found=mysql_num_rows($q);
                if($found==0)
                {
                    header("location: f_medicine.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                        $_SESSION['visit_id']=$search_result[5];
                        $_SESSION['bed_no']=$search_result[6];



//$_SESSION['p_email']=$search_result['p_email'];
                    }




                $visit_id=$_SESSION['visit_id'];

                //echo $visit_id;
                $p_id=$_SESSION['p_id'];
                mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$visit_id',1)")or die (mysql_error());
                $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                $fet_b_id=mysql_fetch_row($sel_b_id);
                $_SESSION['b_id']=$fet_b_id[0];


                $b_id=$_SESSION['b_id'];
                header("location: f_medicine.php?error_msg1=".urlencode("Patient Found! "));






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
            unset($_SESSION['visit_id']);
            unset($_SESSION['visit_date']);
            unset($_SESSION['ref_dr']);
            header("location: f_medicine.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no from patient_info P,visit_register V where V.bed_no='$search1' and V.bed_no!=0 and P.patient_id=V.p_id");            $found=mysql_num_rows($q);
            if($found==0)
            {
                unset($_SESSION['p_id']);
                unset($_SESSION['p_name']);
                unset($_SESSION['p_age']);
                unset($_SESSION['p_gender']);
                unset($_SESSION['p_email']);
                unset($_SESSION['p_mob']);
                unset($_SESSION['visit_id']);
                unset($_SESSION['visit_date']);
                unset($_SESSION['ref_dr']);
                header("location: f_medicine.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                    $_SESSION['visit_id']=$search_result[5];
                    $_SESSION['bed_no']=$search_result[6];



//$_SESSION['p_email']=$search_result['p_email'];
                }



                $visit_id=$_SESSION['visit_id'];

                //echo $visit_id;
                $p_id=$_SESSION['p_id'];
                mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$visit_id',1)")or die (mysql_error());
                $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                $fet_b_id=mysql_fetch_row($sel_b_id);
                $_SESSION['b_id']=$fet_b_id[0];


                $b_id=$_SESSION['b_id'];
                header("location: f_medicine.php?error_msg1=".urlencode("Patient Found! "));






            }
        }
    }

?>