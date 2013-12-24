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
$sql=  mysql_query("select hosp_admin from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['hosp_admin'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



if(isset($_POST['add']))
{
 $date=$_POST['date'];

$time=$_POST['time'];

$procedure_name=$_POST['procedure_name'];

$ot_no=$_POST['ot_no'];

$surgeon=$_POST['surgeon'];

$anaesthetic=$_POST['anaesthetic'];

$name=$_POST['name'];

$age=$_POST['age'];

$sex=$_POST['sex'];

   


    if(!empty($name) && !empty($date) && !empty($procedure_name)){
$sql=mysql_query("INSERT INTO ot_booking VALUES(' ','$date','$time','$procedure_name','$ot_no','$surgeon','$anaesthetic','$name','$age','$sex')")or die(mysql_error());
$msg="<h3>OT booking successfully</h3>";
        $_SESSION['msg']=$msg;
header('location: ot_booking.php');

 }
    else
    {
        $msg= "<h3>Fill Name and date</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: ot_booking.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: ot_booking.php');
}








?>