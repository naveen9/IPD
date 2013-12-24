<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



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
include("head.php");
include("menu.php");  
?>

<?php
error_reporting(0);
include 'condb.php';
?>
<h3>Add Procedure</h3>
<form method="post" action="addproc.php">
Procedure Name:<input type="text" name="proc_name1">
Procedure category:<input type="text" name="proc_cat1">
Procedure amount:<input type="text" name="proc_am1">
<input type="submit" name="insert" value="Insert">
</form>
<br/>
<h3>Select Procedure to edit Or Delete </h3>
<form method="post" action="addproc.php">
<select name="proc"><?php $select=("SELECT * FROM `procedure` WHERE 1 ");
$query=mysql_query($select);
while ($row=mysql_fetch_array($query)) {
$name=$row['proc_name'];
echo '<option>'.$name.'</option>';
}?></select><input type="submit" name="sub" /></form>
    
<?php
    //SELECT PROCEDURE TO EDIT
    $proc=$_POST['proc'];
    $select=("SELECT * FROM `procedure` WHERE proc_name='$proc' ");
    $query=mysql_query($select);
    while ($row=mysql_fetch_array($query)) {
    $id=$row[0];
    $name=$row['proc_name'];
    $proc_cat=$row['proc_cat'];
    $proc_am=$row['proc_amount'];
}
    echo '<form method="post" action="addproc.php">';
    echo '<input type="hidden" name="check" value="'.$id.'" />';
    echo 'Procedure Name:<input type="text" name="proc_name" value="'.$name.'">';
    echo 'Procedure category:<input type="text" name="proc_cat" value="'.$proc_cat.'">';
    echo 'Procedure amount:<input type="text" name="proc_am" value="'.$proc_am.'">';
    echo '<input type="submit" name="update" value="Update">';
    echo '<input type="submit" name="del" value="Delete">';
    echo '</form>';
    

$t=$_POST['check']; //$t HOLD CURRENT PROCEDURE ID 
//DELETE PROCEDURE
if($_POST['del']){

mysql_query("DELETE FROM  `procedure` WHERE proc_id ='$t'")or die(mysql_error());
header('Location: addproc.php');

}

//UPDATE PROCEDURE
$proc_name=$_POST['proc_name'];
$proc_cat=$_POST['proc_cat'];
$proc_am=$_POST['proc_am'];
if($_POST['update']){

mysql_query("UPDATE `procedure` SET proc_name='$proc_name',proc_cat='$proc_cat',proc_amount='$proc_am' WHERE proc_id ='$t'")or die(mysql_error());

header('Location: addproc.php');

}

    

  

//INSERT INTO PROCEDURE TABLE 
$proc_name1=$_POST['proc_name1'];
$proc_cat1=$_POST['proc_cat1'];
$proc_am1=$_POST['proc_am1'];
if($_POST['insert']){
    $select=("INSERT INTO `procedure` (`proc_name`,`proc_cat`,`proc_amount`) VALUES ('$proc_name1','$proc_cat1','$proc_am1');");
    mysql_query($select) or die(mysql_error());


    header('Location: addproc.php');

    }
?>