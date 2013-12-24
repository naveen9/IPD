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
$s_no=$_POST['s_no'];

$mother_name=$_POST['mother_name'];

$type_of_b=$_POST['type_of_b'];

    $date=$_POST['date'];

$time=$_POST['time'];
$status=$_POST['status'];

    if(!empty($s_no) && !empty($mother_name) && !empty($date)){
$sql=mysql_query("INSERT INTO birth VALUES(' ','$s_no','$mother_name','$type_of_b','$date','$time','$status')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: hospital_register.php');

 }
    else
    {
        $msg= "<h3>Fill Mother name and date</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: hospital_register.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: hospital_register.php');
}








?>