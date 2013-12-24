<?php

include("header.php"); 
include("menubar.php");
include("condb.php");
//error_reporting(0);
//ob_start();

date_default_timezone_set ("Asia/Calcutta");
$billdate=date("y-m-d");
//echo $billtime=date("H:i:s");
$pid=$_REQUEST['pid'];
echo $pid;
?>

 