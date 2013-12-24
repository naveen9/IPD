<?php
//error_reporting(0);
session_start();
include ('condb.php');
if($_REQUEST['login'])
{
//date_default_timezone_get('asia/kolkata');
//$date=date('Y-m-d');
//$dateB = '2013-12-12';
//if(strtotime($date) > strtotime($dateB))
//{
//header('location: index.php');
}

$uname=$_REQUEST['uname'];
$pwd=$_REQUEST['pwd'];
if($uname=="" or $pwd=="")

{
header("location: index.php?error_msg=".urlencode("Please fill Username and Password to Login!"));
}
else
{
$log=  mysql_query("select id,verify,usertype from user_data where username='$uname' AND password='$pwd' ");
if(mysql_num_rows($log)==1)
{
    
    $login=  mysql_fetch_array($log);
    $ver=$login['verify'];
    $id=$login['id'];
 if($ver==1)
 {
  $ut=$login['usertype'];
  if($ut=='admin')
  {
 $session_id=$_SESSION['session_id']=$id;
 header('location: User_veri.php');     
  }
  else
  {
  $priv=  mysql_query("select default_link from user_data where id='$id'");
  if(mysql_num_rows($priv)==1)
  {
  $uname= $_REQUEST['uname'];
  $pwd=$_REQUEST['pwd'];
  $_SESSION['uname']=$uname;
  $_SESSION['uid']=$id;
$lst=  mysql_fetch_array($priv);
 $loc=$lst['default_link'];
 $session_id=$_SESSION['session_id']=$id;
 
 if(!empty($loc))
 {
 header('location:'.$loc);
 }
 //echo  $loc;
  }
 else {
      header("location: index.php?error_msg=".urlencode("You have no privileges to access  any page"));
  }
  }
 }
 else
 {
header("location: index.php?error_msg=".urlencode("Your Account is not verified yet try again later"));     
 }
    
}

else
{
header("location: index.php?error_msg=".urlencode("Wrong Username & Password"));
}
}
//}
?>