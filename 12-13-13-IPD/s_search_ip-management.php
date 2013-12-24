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


//$_SESSION['p_email']=$search_result['p_email'];
                
            $p_id=$_SESSION['p_id'];

            $v_id=$_SESSION['v_id'];
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
            header("location: s_ip-management.php?error_msg1=".urlencode("Patient Found!"));
      

?>