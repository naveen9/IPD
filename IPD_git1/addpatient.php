<?php
error_reporting(0);
session_start();
include('condb.php');
$p_id=$_SESSION['p_id'];
$bed_no=$_SESSION['bed_no'];
$patient_name=$_POST['name'];
$patient_age=$_POST['age'];
$patient_gender=$_POST['gender'];
$patient_mob=$_POST['phone'];
$patient_email=$_POST['p_email'];
$patient_visit_date=$_POST['visit_date'];
$patient_bed_no=$_POST['bed_no'];
$patient_amount=$_POST['amount'];
$patient_docter=$_POST['doctor'];
$ms=$_POST['ms'];
$patient_room_type=$_POST['room_type'];
$paymentmode=$_POST['paymentmode'];
if(empty($paymentmode))
{
    $paymentmode="";
}
$paymentmode;
$pan1=$_POST['panel'];
$corp=$_POST['corp'];

if($pan1!='0')
{
    $pan= $pan1;
}
elseif ($Pan1='0')
                {
$pan= "";
}
if($corp!='0')
{
    $pan= $corp;
}
elseif ($corp='0')
                {
$pan= "";
}
$pan;
$remarks=$_POST['remarks'];


date_default_timezone_set ("Asia/Calcutta");
$current_date=date("d-m-y");
$current_date=date("y-m-d");
$current_time=date("h:i:s");
$query=mysql_query("select room_charge from room_type where room_type='$patient_room_type'")or die(mysql_error());
$res=mysql_fetch_array($query);
$res1=$res[0];
$proc_status=1;
$uname=$_SESSION['uname'];
$_SESSION['patient_visit_date']=$patient_visit_date;


//on clicking admit patient button

if(isset($_POST['Add_patient']))
{
    

         



if($p_id!=0 and $bed_no!='Discharge patient')
    {
       header("location: admission-ipd.php?error_msg=".urlencode("Admitted patient!"));
        //echo 'naveen';
    }
if( $p_id!=0 and $bed_no=='Discharge patient' )
         {
            $p_id=$_SESSION['p_id'];
            $resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id','$proc_status','$patient_bed_no','$patient_room_type','$patient_docter')");
            $sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
            $fet_v_id=mysql_fetch_row($sel_v_id);

            echo "line46=".$_SESSION['v_id']=$fet_v_id[0];
            echo "line47=".$v_id=$_SESSION['v_id'];//storing visit id in session
            mysql_query("insert into room_charge values('','$p_id','$v_id','$patient_visit_date $current_time','____','','$patient_room_type','$patient_bed_no','$res1','')");//room charge cal and enter the value
           $anuj=mysql_query("insert into opd_bill (bill_id,due_amount,visit_id,proc_status) values('','$patient_amount','$v_id','1')");
            $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['b_id']=$fet_b_id[0];
            $b_id=$_SESSION['b_id'];//storing bill id in session
            $advance=mysql_query("insert into patient_advace (pa_id,bill_id,p_id,visit_id,advace) values('','$b_id','$p_id','$v_id','$patient_amount')");
            $anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
           $bed=mysql_query("update beds_master_table set availability='1',p_id='$p_id' where no_of_bed='$patient_bed_no'")or die(mysql_error()."Error Eding bed");
echo $patient_bed_no;
            mysql_query("insert into patient_panel values('','$p_id','$v_id','','','$pan','','$paymentmode','$remarks','')")or die(mysql_error());
            header("location: receive_payment_addmison.php");
            
         }

    if($p_id=="")
    {
        if($patient_name=="" or $patient_age=="" or $patient_gender=="")
        {
            header("location: admission-ipd.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        

        else
        {
            //echo naveen2;
mysql_query("INSERT INTO `avantikanew`.`patient_info` (`patient_id`, `p_name`, `p_mob`, `p_email`, `p_gender`, `p_age`, `p_address`, `p_guardian`, `p_g_mob`, `p_g_relation`, `p_bgroup`, `p_height`, `p_weight`, `due_amount`, `marital_status`) VALUES ('', '$patient_name', '$patient_mob', '$patient_email', '$patient_gender', '$patient_age', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '')");

            $search_p_id=mysql_query("select max(patient_id) from patient_info");
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
                $_SESSION['p_email']=$search_result['p_email'];
//$_SESSION['ms']=$search_result['marital_status'];
            }
           // echo $patient_bed_no;
            $p_id=$_SESSION['p_id'];
            $resVisit=mysql_query("insert into visit_register values('','$current_date','$current_time','$p_id','$proc_status','$patient_bed_no','$patient_room_type','$patient_docter')");
            $sel_v_id=mysql_query("select max(visit_id) from visit_register where p_id='$p_id'");
            $fet_v_id=mysql_fetch_row($sel_v_id);

            echo "line46=".$_SESSION['v_id']=$fet_v_id[0];
            echo "line47=".$v_id=$_SESSION['v_id'];//storing visit id in session
            mysql_query("insert into room_charge values('','$p_id','$v_id','$patient_visit_date $current_time','____','','$patient_room_type','$patient_bed_no','$res1','')");//room charge cal and enter the value
           $anuj=mysql_query("insert into opd_bill (bill_id,due_amount,visit_id,proc_status) values('','$patient_amount','$v_id','1')");
            $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['b_id']=$fet_b_id[0];
            $b_id=$_SESSION['b_id'];//storing bill id in session
            $advance=mysql_query("insert into patient_advace (pa_id,bill_id,p_id,visit_id,advace) values('','$b_id','$p_id','$v_id','$patient_amount')");
            $anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
           $bed=mysql_query("update beds_master_table set availability='1',p_id='$p_id' where no_of_bed='$patient_bed_no'")or die(mysql_error()."Error Eding bed");
echo $patient_bed_no;
            mysql_query("insert into patient_panel values('','$p_id','$v_id','','','$pan','','$paymentmode','$remarks','')")or die(mysql_error());
            header("location: receive_payment_addmison.php");
        }
        
    }
   


   else
    {
        //echo naveen;

        echo $p_id;
        
        //header("location: receive_payment_addmison.php");
    }

}

?>
