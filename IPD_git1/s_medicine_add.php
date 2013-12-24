<?php
ob_start();
session_start();
error_reporting(0);
include('condb.php');
//$p_id=$_SESSION['p_id'];
//$v_id=$_SESSION['v_id'];
$b_id=$_SESSION['b_id'];
$proc_status=1;
//echo $b_id;
$p_name=$_SESSION['p_name'];
$s_proc_id=$_SESSION['s_proc_id'];
$p_id=$_SESSION['p_id'];
$p_name=$_SESSION['p_name'];
$bed_no=$_SESSION['bed_no'];
$dom=$_POST['dom'];
$m_name=$_REQUEST['m_name'];
$batch_no=$_REQUEST['batch_no'];
$mrp=$_REQUEST['mrp'];
$quantity=$_REQUEST['quantity'];
$exp_date=$_REQUEST['exp_date'];
$tax=$_REQUEST['tax'];
$packs=$_REQUEST['packs'];
$user=$_SESSION['uname'];


date_default_timezone_set ("Asia/Kolkata");
$billdate=date("y-m-d");
$billtime=date("H:i:s");
$final_rate=$mrp*$quantity/$packs;
$tax_amount=$final_rate*($tax/100);
$total=$final_rate+$tax_amount;
$visit_id=$_SESSION['v_id'];
//echo $visit_id;
$add=$_REQUEST['add'];
$sub_total=$_SESSION['sub_total'];
if(isset($_POST['add']))
{




    //$b_id=$_SESSION['b_id'];//storing bill id in session

    if(!empty($p_id) && !empty($m_name) && !empty($mrp))
    {




        
        $dom=$_SESSION['dom']=$dom;

        mysql_query("insert into patient_medicine values ('','$p_id','$visit_id','$b_id','$dom','$p_name','$bed_no','$m_name','$batch_no','$mrp','$packs','$quantity','$exp_date','$tax','$total','$billtime','$user')")or die(mysql_error());



        header("location:s_consumable.php");

    }
    else
    {


        header("location:s_consumable.php");
    }



}
$del=$_REQUEST['delete'];
if($_REQUEST['delete'])
{
    mysql_query("DELETE FROM `patient_medicine` WHERE  m_id='$del'")or die(mysql_error());
    unset($_SESSION['dom']);
    header('location: s_consumable.php');
}
if(isset($_POST['cancel']))
{
 
    unset($_SESSION['dom']);
    header('location: s_consumable.php');


}
if(isset($_POST['newe']))

{
    mysql_query("update opd_bill set grand_total='$sub_total',due_amount='$sub_total',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$user' where bill_id='$b_id' and visit_id='$visit_id'")or die(mysql_error());
    
    unset($_SESSION['dom']);

    header("location: s_consumable.php?error_msg=".urlencode("Save bill"));


}
if(isset($_POST['print'])){
    mysql_query("update opd_bill set grand_total='$sub_total',due_amount=0,paid_amount='$sub_total',status='paid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$visit_id'")or die(mysql_error()." line no-86");

    //echo $b_id=$_SESSION['b_id'];
    //echo '</br>';
    //echo $sub_total;
    //echo '</br>';
    // echo $visit_id;
    echo '<script type="text/javascript">window.open( "jagdanb_pdf (1).php" )</script>';
    //header('location: medicine.php');
    echo '<a href="s_consumable.php">Go Back</a>';

}


?>