<?php
error_reporting(0);
$r_name=$_POST['r_name'];
$username=$_POST['username'];
$r_mob=$_POST['r_mob'];
$password=$_POST['password'];
$sex=$_POST['sex'];
if($_REQUEST['signup'])
{
//****************CHECK FOR EMPTY VALUES***************
if($r_name=="" || $username=="" || $r_mob=="" || $password=="" || $sex=="")
{
header("location: index.php?error_msg=".urlencode("Please fill all details to Signup!"));
}
else
{
include ('condb.php');
//echo $r_name;
//************insert NEW to  table*******
$insert="insert into user_data (id,name,phone,gender,username,password,usertype,verify) "
        . "values('NULL','$r_name','$r_mob','$sex','$username','$password','NULL','NULL')";
$result = mysql_query($insert);

header("location: index.php?error_msg=".urlencode("Welcome $username you have Registered successfully! You can Login when your account is verified  !"));
}
}
?>