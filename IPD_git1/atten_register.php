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
$emp_name=$_POST['emp_name'];

    $date=$_POST['date'];
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i:s");


    if(!empty($emp_name) && !empty($date)){
$sql=mysql_query("INSERT INTO attendace VALUES(' ','$emp_name','$date','$time')")or die(mysql_error());
$msg="<h3>Add Absent Date </h3>";
        $_SESSION['msg']=$msg;
header('location: attendance.php');

 }
    else
    {
        
        
       // echo "naveen";
header('location: attendance.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: attendance.php');
}








?>