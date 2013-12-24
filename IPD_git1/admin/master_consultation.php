<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<link rel="stylesheet" type="text/css" href="tab-code.css" />
<script src="jquer-1.9.1-1.js" type="text/javascript"></script>
<script src="jq.js" type="text/javascript"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" type="text/css" href="style_by.css"/> 
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>



</head>

<body>

<div id="container">
<?php
include("head.php");
include("menu.php");  
?>


<?php error_reporting(0); ?>
<title>Master-consultation</title>
<center><h3>Add new consultation</h3></center>
<form action="master_consultation.php" method="post">
<table>
  <tr>
    <td>Doctor</td>
    <td><select name="doc"><?php include 'condb.php'; $select=("SELECT * FROM  `doc_master_table` WHERE 1 "); 
    $query=mysql_query($select); 
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
    } 
    ?></select></td>

    <td>Billing category </td>
    <td><select name="bill_cat"><?php include 'condb.php'; $select=("SELECT * FROM  `billing_cat` "); 
    $query=mysql_query($select); 
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      //echo '<option>'. $row[2].'</option>';
    } 
    ?></select></td>

<td>Room Type:</td>
    <td><select name="room_type"><?php $select=("SELECT * FROM  `room_type` WHERE 1 "); 
    $query=mysql_query($select); 
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } 
    ?></select></td>

  <td>Amount:</td>
  <td><input type="text" name="amount"></td>
  <td><input type="submit" name="insert" value="Insert" /></td>
 </tr>
  </table>
</form>
<?php
echo '<center><h3>Edit consultation</center></h3>';
//INSERT INTO DOCTOR BILLING TABLE
$doc_name=$_POST['doc'];
$bill_cat=$_POST['bill_cat'];
$room_type=$_POST['room_type'];
$amount=$_POST['amount'];
if ($_POST['insert']) {
  $insert=("INSERT INTO doctor_billing (`dbid`,`doc_name`,`doc_bill_cat`,`room_type`,`amount`) VALUES ('','$doc_name','$bill_cat','$room_type','$amount') ");
mysql_query($insert)or die(mysql_error());
    header('Location: master_consultation.php');

}
//DISPLAY  CONSULTATIONS  
$view=("SELECT * FROM doctor_billing WHERE 1");
$vquery=mysql_query($view);
while ($row=mysql_fetch_array($vquery)) {
 $dbid=$row[0];
 $name=$row[1];
 $cat=$row[2];
 $room=$row[3];
 $amount=$row[4];
 
echo '<form method="post" action="master_consultation.php">';
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<input type="hidden" name="check" value="'.$dbid.'" />';
echo '</td>';
echo '<td>';
echo 'DOCTOR:<select name="doc_name1">'.$select=("SELECT * FROM  `doc_master_table` WHERE doc_name!='$name'"); 
    $query=mysql_query($select); 
      echo '<option>'. $name.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo 'Billing category:<select name="doc_cat1">'.$select=("SELECT * FROM  `billing_cat` WHERE type!='$cat'"); 
    $query=mysql_query($select); 
      echo '<option>'. $cat.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo 'Room Type:<select name="doc_room">'.$select=("SELECT * FROM  `room_type` WHERE room_type!='$room'"); 
    $query=mysql_query($select); 
      echo '<option>'. $room.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo 'Amount:<input type="text" name="amount1" value="'.$amount.'">';
echo '</td>';
echo '<td>';
echo '<input type="submit" name="update" value="Update">';
echo '<input type="submit" name="del" value="Del">';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</form>';
}
//UPDATE CONSULTATION
$t=$_POST['check'];
$doc_name1=$_POST['doc_name1'];
$doc_cat1=$_POST['doc_cat1'];
$doc_room=$_POST['doc_room'];
$amount1=$_POST['amount1'];
if(isset($_POST['update'])){

$update=("UPDATE doctor_billing SET doc_name='$doc_name1', doc_bill_cat='$doc_cat1', room_type='$doc_room', amount='$amount1' WHERE dbid='$t'");  
mysql_query($update)or die(mysql_error());
    header('Location: master_consultation.php');
}
//DELETE CONSULTATION
if($_POST['del']){
$del=("DELETE FROM doctor_billing WHERE dbid='$t'");
mysql_query($del)or die(mysql_error());
    header('Location: master_consultation.php');

}
?>


