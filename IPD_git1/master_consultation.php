<?php
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select data_mx from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['data_mx'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}




?>
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
include("header.php");
include("menubar.php");
?>



<title>Master-consultation</title>
<div style="background:url(ccc.png) repeat; padding:5px 0px;">
	<div style="background:#6FB7FF; padding:5px 5px; "><strong>Add new consultation</strong></div>
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

    <td style="float:right">Panel</td>
    <td><select style="width: 100px; float: left " name="bill_cat"><?php include 'condb.php'; $select=("SELECT * FROM  panel "); 
    $query=mysql_query($select); 
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      //echo '<option>'. $row[2].'</option>';
    } 
    ?></select></td>

<td align="right">Room Type:</td>
    <td><select name="room_type"><?php $select=("SELECT * FROM  `room_type` WHERE 1 "); 
    $query=mysql_query($select); 
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } 
    ?></select></td>

  <td align="right">Amount:</td>
  <td><input type="text" name="amount"></td>
  <td><input type="submit" name="insert" value="Insert" class="btn"/></td>
 </tr>
  </table>
</form>
<?php
echo '<div style="background:#6FB7FF; padding:5px 5px;"><strong>Edit consultation</strong></div>';
//INSERT INTO DOCTOR BILLING TABLE

$doc_name=$_POST['doc'];
$bill_cat=$_POST['bill_cat'];
$room_type=$_POST['room_type'];
$amount=$_POST['amount'];
if ($_POST['insert']) 
{ 
  if(empty($amount))
  {
   header('Location: master_consultation.php');
  }
  else
  {



  $insert=("INSERT INTO doctor_billing (`dbid`,`doc_name`,`doc_bill_cat`,`room_type`,`amount`) VALUES ('','$doc_name','$bill_cat','$room_type','$amount') ");
mysql_query($insert)or die(mysql_error());
    header('Location: master_consultation.php');
  }

}
//DISPLAY  CONSULTATIONS  
echo 'doctor';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Panel';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room type';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount';
$view=("SELECT * FROM doctor_billing WHERE 1");
$vquery=mysql_query($view);
while ($row=mysql_fetch_array($vquery)) {
echo'<div style="background:#FFF; padding:1px;">';
 $dbid=$row[0];
 $name=$row[1];
 $cat=$row[2];
 $room=$row[3];
 $amount=$row[4];
 echo'<div class="cls"></div>';
 echo'</div>';

echo '<form method="post" action="master_consultation.php">';
echo '<table>';
echo '<tr>';
echo '<td>';
echo '<input type="hidden" name="check" value="'.$dbid.'" />';
echo '</td>';
echo '<td>';
echo '<select name="doc_name1">'.$select=("SELECT * FROM  `doc_master_table` WHERE doc_name!='$name'");
 
    $query=mysql_query($select); 
      echo '<option>'. $name.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo '<select name="doc_cat1">'.$select=("SELECT * FROM  `billing_cat` WHERE type!='$cat'"); 
    $query=mysql_query($select); 
      echo '<option>'. $cat.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo '<select name="doc_room">'.$select=("SELECT * FROM  `room_type` WHERE room_type!='$room'"); 
    $query=mysql_query($select); 
      echo '<option>'. $room.'</option>';
    while ($row=mysql_fetch_array($query)) {
      echo '<option>'. $row[1].'</option>';
      
    } '</select>';
echo '</td>';
echo '<td>';
echo '<input type="text" name="amount1" value="'.$amount.'">';
echo '</td>';
echo '<td>';
echo '<input type="submit" name="update" value="Update" class="btn">';
echo '<input type="submit" name="del" value="Del" class="btn">';
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


