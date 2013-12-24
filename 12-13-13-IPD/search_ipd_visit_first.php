<?php
error_reporting(0);
session_start();
include("condb.php");
$search1=$_REQUEST['visitId'];
echo $search1;
//if($page=='in')
$q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,P.p_email,P.p_address,V.ref_dr,PA.paymode,PA.panel,V.room_type from patient_info P,visit_register V,patient_panel PA where P.patient_id='$search1' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id and V.visit_id=PA.v_id group by P.patient_id")or die(mysql_error());
$found=mysql_num_rows($q);
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
                    
                }






                $p_id=$_SESSION['p_id'];

             

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
            $_SESSION['stats']='Admitted' ;
                
                header("location: ipd_visit_summary.php?error_msg1=".urlencode("Patient Found"));
    
?>