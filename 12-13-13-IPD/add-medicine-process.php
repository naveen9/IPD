<?php
session_start();
/**
 * Created by JetBrains PhpStorm.
 * User: Sameer 
 * Date: 7/31/13
 * Time: 3:05 PM
 * Facebook:- www.facebook.com/sam0hack
 * Email:- sam.nyx@live.com
 */
require 'condb.php';



if(isset($_POST['add']))
{
$m_name=$_POST['m_name'];

$batch_no=$_POST['batch_no'];

$mrp=$_POST['mrp'];

    $pack=$_POST['pack'];
    $quantity=$_POST['quantity'];

$expiry_date=$_POST['expiry_date'];

$unit_mrp=$mrp/$pack;
$s= sprintf("%.2f",$unit_mrp);
    if(!empty($m_name) && !empty($mrp)){
$sql=mysql_query("INSERT INTO medicine_store VALUES('NULL','$m_name','$batch_no','$mrp','$s','$pack','$quantity','$expiry_date')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: add-medicine.php');

 }
    else
    {
        $msg= "<h3>Fill Medicine name and MRP</h3> ";
        $_SESSION['msg']=$msg;
header('location: add-medicine.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: add-medicine.php');

}
?>