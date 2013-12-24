<title>Source</title>
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
<!---------HTML CODE FOR INSERT FORM START HERE------------>
<div style="height:25px; margin-bottom:2px; color:#FFF;" class="miscel_charge">
    <div style="float:left; width:30%">Add New Referral source</div>
    <div style="float:right; width:60%; text-align:right">
        <form method="post" action="source-list.php">
    
    <strong>SourceName:</strong>
        <input type="text" name="source"/>
        <input type="submit" value="Insert" name="insert" class="btn" style="height:25px;">

</form>
    </div>
    <div class="cls"></div>
    </div>

<!--------HTML CODE END HERE------------->
<?php
/////////////////INSERT QUERY/////////////////////////////////
if($_POST['insert']){
    $source=$_POST['source'];
    if($source==""){
    echo "<h1>Please enter Source name</h1>";
    }else{
$insert=("insert into source VALUES('','$source')");
    mysql_query($insert)or die(mysql_error());
echo "<h3><i>source: $source is successfuly inserted to Database. </i></h3>";
    }
    }

?>
<!---------------PHP CODE FOR VIEW EDIT AND DELETE SOURCE IN DATABASE-------------------->

<?php
$select=("select * from source");
$query=mysql_query($select)or die(mysql_error());
while($fetch=mysql_fetch_array($query))
        {
    $sid=$fetch[0];
    $src=$fetch[1];
            echo '<form method="post" action="source-list.php" style="background:lightgray;">';
            
    echo '<input type="hidden" name="check" value="'.$sid.'" ><br>';
    echo '<input type="text" name="source1" value="'.$src.'"style="width:250px; height:30px; margin-right:10px; padding:5px">';
    echo '<input type="submit" name="update" value="Update" class="btn" style="margin-right:10px;">';
    echo '<input type="submit" name="del" value="Delete" class="btn">';
            
            echo '</form>';
        }
/////////////////////UPDATE QUERY///////////////////////////////
if($_POST['update']){
$s_id=$_POST['check'];
    $source1=$_POST['source1'];

    mysql_query("UPDATE source SET source_name='$source1' WHERE s_id='$s_id'")or die(mysql_error());
header('Location: source-list.php');
}
/////////////////DELETE QUERY////////////////////////////////////////
if($_POST['del']){
    $s_id=$_POST['check'];
    mysql_query("DELETE FROM source WHERE s_id='$s_id'");
header('Location: source-list.php');
}
?>