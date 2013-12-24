<?php
session_start();
error_reporting(0);
include('condb.php');
$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['v_id'];
$b_id=$_SESSION['b_id'];
$p_name=$_SESSION['p_name'];
$s_proc_id=$_SESSION['s_proc_id'];
$procedure=$_POST['procedure'];
$doc_incharge=$_POST['doc_incharge'];
$amount=$_POST['amount'];
$discount=$_POST['discount'];
$taxrate=$_POST['taxrate'];
$uname=$_SESSION['uname'];


date_default_timezone_set ("Asia/Kolkata");
$billdate=date("y-m-d");
$billtime=date("H:i:s");

//date_default_timezone_set ("Asia/Calcutta");
//echo $billdate=date("d-m-y");
//echo $billtime=date("H:i:s");
$discount_amount=$amount*($discount/100);
$new_amount=$amount-$discount_amount;
$tax_amount=$new_amount*($taxrate/100);
$total=$new_amount+$tax_amount;
//panel
$paymentmode=$_POST['paymentmode'];
$pan=$_POST['panel'];
$corp=$_POST['corp'];
$source=$_POST['source'];
$remarks=$_POST['remarks'];
//events kept in variables
$add=$_POST['add'];
$proc_status=1;
$deduction=0;
$share=0;
$tds=0;
$remark="";
$proc_id=$_SESSION['proc_id']+1; // +1 becuase of autoincrement contstraint ...


if(isset($_POST['add']))
{
    if($v_id=="" or $b_id=="" or $procedure=="" or $doc_incharge=="" or $amount=="" or $taxrate=="")
    {
        header('location: diagnostics.php');
    }
    else
    {
        echo "<br>opd53=".$opd=mysql_query("insert into opd_items values('','$v_id','$b_id','$procedure','$doc_incharge','$amount','$discount','$taxrate','$total','$billdate','$billtime','$proc_status','$uname')")or die(mysql_error());
        echo "<br>bene54=".$bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$b_id','$procedure','$proc_id','$doc_incharge','$total','$billdate','$deduction'
,'$share','$tds','','$remark','','')");



        $proci=mysql_query("select MAX(proc_id) from opd_items");
        $fetching_proc=mysql_fetch_array($proci);
        $fp=$fetching_proc[0];
        echo "<br>patient_panel=".$pat=mysql_query("insert into patient_panel values('$fp','$p_id','$v_id','$b_id','$source','$pan','$corp','$paymentmode','$remarks','')")or die(mysql_error());
        header("location:diagnostics.php");
    }
}
$grand_total=$_SESSION['grand_total'];
$delete=$_REQUEST['delete'];
if($_REQUEST['delete'])
{
    mysql_query("delete from opd_items where proc_id='$delete'")or die(mysql_error());
    mysql_query("delete from beneficairy_payment where proc_id='$delete'") or die(mysql_error());
    

    header('location:diagnostics.php');
}
if($_POST['save_bill'])
{
    if(!empty($s_proc_id) or !empty($v_id) or !empty($p_id))
    {
        mysql_query("update opd_bill set grand_total='$grand_total',due_amount='$grand_total',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$v_id'");
        
        unset($_SESSION['b_id']);
        unset($_SESSION['grand_total']);
        unset($_SESSION['s_proc_id']);
        header('location:diagnostics.php');
    }
    else
    {
        // echo naveen;


        header('location:diagnostics.php');
    }
}
if($_POST['cancel_bill'])
{
    mysql_query("delete from opd_items where visit_id='$v_id' and bill_id='$b_id'");
    mysql_query("delete from opd_bill where visit_id='$v_id' and bill_id='$b_id'");
    
    unset($_SESSION['b_id']);
    unset($_SESSION['grand_total']);
    unset($_SESSION['s_proc_id']);
    //unset($_SESSION['paymentmode']);
    /// unset($_SESSION['panel']);
    /// unset($_SESSION['corp']);
    // unset($_SESSION['source']);
    header('location:diagnostics.php');
}
if($_POST['make_payment'])
{

    mysql_query("update opd_bill set grand_total='$grand_total',due_amount='$grand_total',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$v_id'");












    //mysql_query("update opd_bill set due_amount='$grand_total',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$v_id'");
    //END








    
    unset($_SESSION['b_id']);
    unset($_SESSION['grand_total']);
    unset($_SESSION['s_proc_id']);
    // unset($_SESSION['paymentmode']);
    // unset($_SESSION['panel']);
    //  unset($_SESSION['corp']);
    //  unset($_SESSION['source']);
    header("location:receive_payment.php");

}
?>