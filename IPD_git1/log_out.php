<?php

session_start();
error_reporting(0);
//include("header.php");
//include("menubar.php");
//include("condb.php");
//if($_POST['print_dis'])

unset($_SESSION['uid']);
unset($_SESSION['uname']);
header("location: index.php");
?>