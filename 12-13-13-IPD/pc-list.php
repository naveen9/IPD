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
$sql=  mysql_query("select data_mx from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['data_mx'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



include("header.php");
include("menubar.php");

if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo $message;
}
?>
<div class="miscel_charge" style="height:20px; margin-bottom:2px; color:#FFF;"> Add New Panel / Corporate</div>    
 <form method="post" action="pc-list.php" style="margin-top:10px;">
     <div style="width:100%; margin:0 auto; height:5px;">
        <div style="width:50%; float:left"><strong>Add Panel: </strong></div>
        <div style="width:50%; float:left"><strong>Add Corporate: </strong></div>
    </div>
        <div style="width:100%; margin:0px auto; padding:8px 0px">
            <div style="width:50%; float:left">
                <div style="width:50%; float:left"><input type="text" name="panel"></div>
                <div style="width:50%; float:left"><input type="submit" name="sub" value="Add panel" class="btn"></div>
            </div>
            <div style="width:50%; float:right">
                <div style="width:50%; float:left"><input type="text" name="corp"></div>
                <div style="width:50%; float:left"><input type="submit" name="sub" value="Add corporate" class="btn"></div>
            </div>
    </div>
</form>
<div class="cls" style="padding:5px 0px;"></div>
<!--<center><h2 style="color: crimson;   ">Edit Or Delete </h2></center>-->
<div style="width:100%; margin:0 auto; height:20px; padding:5px 0px; background:lightgray">
        <div style="width:50%; float:left"><strong> Panel: </strong></div>
        <div style="width:50%; float:left"><strong> Corporate: </strong></div>
        <div class="cls"></div>
    </div>
    <div class="cls"></div>
<?php
if(isset($_POST['sub']))
{
    $panel=$_POST['panel'];
    $corp=$_POST['corp'];
    if(!empty($panel))
    {
        mysql_query("insert into panel values ('','$panel')")or die(mysql_error());
header('location:pc-list.php');
    }
    
    if(!empty($corp))
    {
        mysql_query("insert into corporate values ('','$corp')")or die(mysql_error());
header('location:pc-list.php');
        
    }
    else
    {
        echo 'First fill a field';
    }
    
    
}
$sql=  mysql_query("select * from panel");

while ($dat=  mysql_fetch_array($sql)) {
    
?>

<div style="width:100%; margin:0px auto; padding:0px 0px 0px 0px; ">
        <form method="post" action="pc-list.php" style="margin-top:20px;">
            <div style="width:50%; float:left">
                    <input type="hidden" name="chkp" value="<?php echo $dat['panel_id']; ?>">
                    <input type="text" value="<?php echo $dat['panel_name']; ?>" name="panel">
                    <input type="submit" name="upp" value="Update" class="btn">
                    <input type="submit" name="delp" value="Delete" class="btn">
            </div>
            
           
<!--<input type="hidden" name="chkp" value="<?php echo $dat['panel_id']; ?>">
<span style="margin:0px 50px 0px 23px"><strong>Panel:</strong></span>
<input type="text" value="<?php echo $dat['panel_name']; ?>" name="panel">
<input type="submit" name="upp" value="Update" class="btn">
<input type="submit" name="delp" value="Delete" class="btn">-->
</form>
<?php } ?>
        
<?php 
   $sql=  mysql_query("select * from corporate");
   while ($cda=  mysql_fetch_array($sql)) {

?>     
        <form method="post">
        <div style="width:50%; float:right">
                  <input type="hidden" name="chkc" value="<?php echo $cda['corp_id'];?>"> 
                  <input type="text" name="corp" value="<?php echo $cda['corp_name'];?>">
                  <input type="submit" name="upc" value="Update" class="btn">
                  <input type="submit" name="delc" value="Delete" class="btn">
        </div>
        <div class="cls"></div>
    </div>     
          <!--  <input type="hidden" name="chkc" value="<?php echo $cda['corp_id'];?>"> 
<span style="margin:0px 23px"><strong>Corporate:</strong></span>
<input type="text" name="corp" value="<?php echo $cda['corp_name'];?>">
<input type="submit" name="upc" value="Update" class="btn">
<input type="submit" name="delc" value="Delete" class="btn">-->
</form>
<?php
}
if(isset($_POST['upp']))
{
 $idp=$_POST['chkp'];
 $panelp=$_POST['panel'];
 if(!empty($panelp))
 {
     
 mysql_query("update panel set panel_name='$panelp' where panel_id='$idp'");
header('location:pc-list.php');
 
 }
 else
 {
     echo 'Fill panel name';
 }
}
if(isset($_POST['delp']))
{
 $idp=$_POST['chkp'];
mysql_query("delete from panel where panel_id='$idp' ");
header('location:pc-list.php');
 
}
if(isset($_POST['upc']))
{
 $idc=$_POST['chkc'];
 $corpc=$_POST['corp'];
 if(!empty($corpc))
 {
     
 mysql_query("update corporate set corp_name='$corpc' where corp_id='$idc'");
header('location:pc-list.php');
 
 }  
 else
 {
     echo 'Fill Corporate name';
 }
    
}
if(isset($_POST['delc']))
{
    $idc=$_POST['chkc'];
 mysql_query("delete from corporate where corp_id='$idc' "); 

header('location:pc-list.php');
}
?>