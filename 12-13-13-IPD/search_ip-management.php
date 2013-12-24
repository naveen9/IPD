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
            unset($_SESSION['bed_no1']);
            unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
            header("location: ip-management.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,V.ref_dr from patient_info P,visit_register V where P.p_name='$search' or P.patient_id='$search' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id group by P.patient_id");
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
                unset($_SESSION['bed_no1']);
                unset($_SESSION['paid_amount1']);

                unset($_SESSION['grand_total']);
                unset($_SESSION['due_amount']);
                unset($_SESSION['stats']);
                header("location: ip-management.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                    $_SESSION['bed_no1']=$search_result[6];
                    $_SESSION['ref_dr']=$search_result[7];



//$_SESSION['p_email']=$search_result['p_email'];
                }
            $p_id=$_SESSION['p_id'];

            $v_id=$_SESSION['visit_id'];
            //echo $p_id;
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
            //$_SESSION['paid_amount1'];
           // $q2=mysql_query("select * from opd_recpt where p_id ='$p_id'");
            //while($search_result=mysql_fetch_array($q2))
            //{
               // $_SESSION['crnt_gvn_anmt']=$search_result['crnt_gvn_anmt'];
           // }
            //echo $p_id;
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
            //$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
            //$fet_v_id=mysql_fetch_row($sel_v_id);
            //$_SESSION['v_id']=$fet_v_id[0];
            //$v_id=$_SESSION['visit_id'];//storing visit id in session
            //mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
            //$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            //$fet_b_id=mysql_fetch_row($sel_b_id);
            // $_SESSION['b_id']=$fet_b_id[0];
           // $b_id=$_SESSION['b_id'];//storing bill id in session
            //$id=mysql_query("select visit_id from visit_register WHERE p_id =$p_id")or die(mysql_error());
            //$data=mysql_fetch_array($id);
            //$_SESSION['visit_id']=$data['visit_id'];

            //echo $v_id;
            header("location: ip-management.php?error_msg1=".urlencode("Patient Found!"));
        }
    }
    }
    else
    {
        if($user=='billingadmin')
        {
            if($search=="")
            {
                header("location: ip-management.php?error_msg=".urlencode("Please Enter a Searchword!"));
            }
            else
            {
                $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,V.ref_dr from patient_info P,visit_register V where P.p_name='$search' or P.patient_id='$search' and V.p_id=P.patient_id group by P.patient_id");
                $found=mysql_num_rows($q);
                if($found==0)
                {
                    header("location: ip-management.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                    $_SESSION['bed_no1']=$search_result[6];
                    $_SESSION['ref_dr']=$search_result[7];




//$_SESSION['p_email']=$search_result['p_email'];
                    }
                    $p_id=$_SESSION['p_id'];

                    $v_id=$_SESSION['visit_id'];
                    //echo $p_id;
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
                    //$_SESSION['paid_amount1'];
                    // $q2=mysql_query("select * from opd_recpt where p_id ='$p_id'");
                    //while($search_result=mysql_fetch_array($q2))
                    //{
                    // $_SESSION['crnt_gvn_anmt']=$search_result['crnt_gvn_anmt'];
                    // }
                    //echo $p_id;
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
                    //$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
                    //$fet_v_id=mysql_fetch_row($sel_v_id);
                    //$_SESSION['v_id']=$fet_v_id[0];
                    //$v_id=$_SESSION['visit_id'];//storing visit id in session
                    //mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
                    //$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                    //$fet_b_id=mysql_fetch_row($sel_b_id);
                    // $_SESSION['b_id']=$fet_b_id[0];
                    // $b_id=$_SESSION['b_id'];//storing bill id in session
                    //$id=mysql_query("select visit_id from visit_register WHERE p_id =$p_id")or die(mysql_error());
                    //$data=mysql_fetch_array($id);
                    //$_SESSION['visit_id']=$data['visit_id'];

                    //echo $v_id;
                    header("location: ip-management.php?error_msg1=".urlencode("Patient Found!"));
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
            unset($_SESSION['bed_no1']);
            unset($_SESSION['paid_amount1']);

            unset($_SESSION['grand_total']);
            unset($_SESSION['due_amount']);
            unset($_SESSION['stats']);
            header("location: ip-management.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,V.ref_dr from patient_info P,visit_register V where V.bed_no='$search1' and V.bed_no!='Discharge patient' and P.patient_id=V.p_id");            $found=mysql_num_rows($q);
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
                unset($_SESSION['bed_no1']);
                unset($_SESSION['paid_amount1']);

                unset($_SESSION['grand_total']);
                unset($_SESSION['due_amount']);
                unset($_SESSION['stats']);
                header("location: ip-management.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
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
                    $_SESSION['bed_no1']=$search_result[6];
                    $_SESSION['ref_dr']=$search_result[7];



//$_SESSION['p_email']=$search_result['p_email'];
                }
                $p_id=$_SESSION['p_id'];

                $v_id=$_SESSION['visit_id'];
                //echo $p_id;
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
                //$_SESSION['paid_amount1'];
                // $q2=mysql_query("select * from opd_recpt where p_id ='$p_id'");
                //while($search_result=mysql_fetch_array($q2))
                //{
                // $_SESSION['crnt_gvn_anmt']=$search_result['crnt_gvn_anmt'];
                // }
                //echo $p_id;
//echo $p_id;

//$resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
                //$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
                //$fet_v_id=mysql_fetch_row($sel_v_id);
                //$_SESSION['v_id']=$fet_v_id[0];
                //$v_id=$_SESSION['visit_id'];//storing visit id in session
                //mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
                //$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                //$fet_b_id=mysql_fetch_row($sel_b_id);
                // $_SESSION['b_id']=$fet_b_id[0];
                // $b_id=$_SESSION['b_id'];//storing bill id in session
                //$id=mysql_query("select visit_id from visit_register WHERE p_id =$p_id")or die(mysql_error());
                //$data=mysql_fetch_array($id);
                //$_SESSION['visit_id']=$data['visit_id'];

                //echo $v_id;
                header("location: ip-management.php?error_msg1=".urlencode("Patient Found!"));
            }
        }
    }

?>