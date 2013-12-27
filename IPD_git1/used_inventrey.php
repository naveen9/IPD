<?php
session_start();
error_reporting(0);
require 'condb.php';


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select pharmacy from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['pharmacy'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
include("header.php");
include("menubar.php");
include("condb.php");


$chk=$_REQUEST['used'];
echo $chk;
?>