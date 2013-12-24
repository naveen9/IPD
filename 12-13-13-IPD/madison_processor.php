<?php
session_start();
error_reporting(0);
include("header.php");
include("menubar.php");
include("condb.php");
if(isset($_POST['add']))
{
    $p_id=$_SESSION['p_id'];
    $p_name=$_SESSION['p_name'];
    $bed_no=$_SESSION['bed_no'];
    $dom=$_POST['dom'];
    $m_name=$_POST['m_name'];
    $batch_no=$_POST['batch_no'];
    $mrp=$_POST['mrp'];
    $quantity=$_POST['quantity'];
    $exp_date=$_POST['exp_date'];
    $tax=$_POST['tax'];
    $packs=$_POST['packs'];

    $final_rate=$mrp*$quantity/$packs;
    $tax_amount=$final_rate*($tax/100);
    $total=$final_rate+$tax_amount;
    if(!empty($p_id) && !empty($m_name) && !empty($mrp))
    {
        mysql_query("insert into patient_medicine values ('$p_id','NULL','$dom','$p_name','$bed_no','$m_name','$batch_no','$mrp','$packs','$quantity','$exp_date','$tax','$total')")or die(mysql_error());
    }

}

    ?>