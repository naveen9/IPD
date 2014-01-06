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
        header("location: discharge.php?error_msg=".urlencode("Please Enter a Searchword!"));
    }
    else
    {
        $q=mysql_query("select * from ipd_admit where patient_id='$search' or p_name='$search' or p_mob='$search'");
        $found=mysql_num_rows($q);
        if($found==0)
        {
            header("location: discharge.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
        }
        else
        {
            while($search_value=mysql_fetch_array($q))
            {
                $source =$search_value['patient_id'];
            }
            $q2= mysql_query("select visit_id from opd_recpt where p_id=$source ");
            while($search_value=mysql_fetch_array($q2))
            {
                $v_id =$search_value['visit_id'];
                $_SESSION['v_id']=$v_id;

            }
            $q1=mysql_query(" SELECT A.patient_id, A.p_name, A.doa, A.bed_no, O.grand_total, A.advance_pay, O.due_amount
             FROM ipd_admit A, opd_bill O WHERE A.patient_id =$source AND O.visit_id =$v_id");
            //$found=mysql_num_rows($q);
            while($search_result=mysql_fetch_array($q1))
            {
                //echo naveen;
                $_SESSION['p_id']=$search_result['patient_id'];
                $_SESSION['p_name']=$search_result['p_name'];
                $_SESSION['doa']=$search_result['doa'];
                $_SESSION['bed_no']=$search_result['bed_no'];
                $_SESSION['grand_total']=$search_result['grand_total'];
                $_SESSION['advance_pay']=$search_result['advance_pay'];
                $_SESSION['due_amount']=$search_result['due_amount'];




//$_SESSION['p_email']=$search_result['p_email'];
            }




        //echo $p_name;
       // $v_id=$_SESSION['v_id'];



        $bed_no=$_SESSION['bed_no'];

//echo $bed_no;

           // $resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id',$proc_status)");
            //$sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
            //$fet_v_id=mysql_fetch_row($sel_v_id);
            //$_SESSION['v_id']=$fet_v_id[0];
           // $v_id=$_SESSION['v_id'];//storing visit id in session
            //mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','$proc_status')");//
            //$sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            //$fet_b_id=mysql_fetch_row($sel_b_id);
            //$_SESSION['b_id']=$fet_b_id[0];
           // $b_id=$_SESSION['b_id'];//storing bill id in session
            header("location: discharge.php?error_msg=".urlencode("Patient Found!"));
        }
    }

}

?>