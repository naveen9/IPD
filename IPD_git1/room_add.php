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


$name=$_POST['name'];

$room_type=$_POST['room_type'];

    $date=$_POST['date'];

$time=$_POST['time'];


    if(!empty($name) && !empty($date) && !empty($room_type)){
$sql=mysql_query("INSERT INTO room_booking VALUES(' ','$name','$room_type','$date','$time')")or die(mysql_error());
$msg="<h3>Room booking successfully</h3>";
        $_SESSION['msg']=$msg;
header('location: room_booking.php');

 }
    else
    {
        $msg= "<h3>Fill Name and date</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: room_booking.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: room_booking.php');
}








?>