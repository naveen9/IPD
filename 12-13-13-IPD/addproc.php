<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Procedure</title>



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
    include("condb.php");
    error_reporting(0);

    if($_REQUEST['error_msg'])
    {
        $message=$_REQUEST['error_msg'];
        echo $message;
    }
    ?>
<?php
error_reporting(0);
include 'condb.php';
?>
<h3>Add Procedure</h3>
<form method="post" action="proc_proccess.php">
Procedure Name:<input type="text" name="proc_name1">
Procedure Type:<input type="text" name="proc_cat1">
<input type="submit" name="insert" value="Insert">
</form>
<br/>
<h3>Select Procedure to edit Or Delete </h3>
