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

$type=$_POST['type'];

$mrp=$_POST['mrp'];

    $quantity=$_POST['quantity'];

$expiry_date=$_POST['expiry_date'];
$unit=$mrp/$quantity;

    if(!empty($m_name) && !empty($mrp)){
$sql=mysql_query("INSERT INTO inventory_store VALUES('NULL','$m_name','$type', '$unit','$mrp','$quantity','$expiry_date')")or die(mysql_error());
$msg="<h3>Inventory Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: invent_add-medicine.php');

 }
    else
    {
        $msg= "<h3>Fill inventory name and MRP</h3> ";
        $_SESSION['msg']=$msg;
header('location: invent_add-medicine.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: invent_add-medicine.php');

}
?>