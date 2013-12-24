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


//Beds
include("header.php");
	include("menubar.php");

?>
<div style="height:20px; margin-bottom:2px; color:#FFF;" class="miscel_charge">Bed Management</div>
<form method="post" action="add_bed.php">
	<div style="padding:5px 0px;">
	<div style="float:left; width:50%; font-weight:900">
Current number of Beds in hospital   : <?php $num=mysql_query("select COUNT(no_of_bed) from beds_master_table "); $numval=mysql_fetch_array($num); echo  " $numval[0] ";  ?>
</div>
<div style="float:right; width:50%; text-align:right">
<input type="text" name="no_of_bed" placeholder="enter number of beds"/>
<input type="submit" name="sub_no_of_bed" class="btn" value="Add New Beds">
</div>
<div class="cls"></div>
</div>
</form>
<div class="cls"></div>
<hr>

	<div class="l_ft w_idth"><strong>bed no</strong></div>
<div class="l_ft w_idth"><strong>bed name</strong></div>
<div class="l_ft w_idth"><strong>availability</strong></div>
<div class="l_ft w_idth"><strong>current issue patient id</strong></div>
<div class="l_ft w_idth"><strong>Update</strong></div>

<table class="l_ft w_idth" align="left">
<div class="cls"></div>





<?php
$sumquery=mysql_query("select * from beds_master_table ");
while($grand=mysql_fetch_array($sumquery))
{
	//echo $grand['bed_id'];


?>
<form  method="post">
<div  class="consult_head">
<div class="l_ft" style="width:160px;"><input type="text" name="bed_id" value="<?php echo $grand['bed_id']; ?>" /></div>




<div class="l_ft" style="width:160px;"><input type="text" name="no_of_bed" value="<?php echo $grand['no_of_bed']; ?>"/></div>
<div class="l_ft" style="width:160px;"><input type="text" name="availability" value="<?php echo $grand['availability']; ?>" /></div>
<div class="l_ft" style="width:160px;"><input type="text" name="p_id" value="<?php echo $grand['p_id']; ?>" /></div>

<div class="l_ft" style="width:160px; text-align:center"><input type="submit" value="Update" name="naveen" class="btn" /></div>
<div class="l_ft"></div>
</div>
</form>
<?php
} 

if(isset($_POST['naveen']))
{

$bed_id=$_POST['bed_id'];

$no_of_bed=$_POST['no_of_bed'];

$availability=$_POST['availability'];

$p_id=$_POST['p_id'];


mysql_query("update beds_master_table set no_of_bed='$no_of_bed',availability='$availability',p_id='$p_id' where bed_id='$bed_id'")or die(mysql_error());
header('location:admin_beds.php');
}

?>



<!--Available beds<select>
<?php
// $sel=mysql_query("select no_of_bed from beds_master_table where availability=0 AND no_of_bed !=0 ")or die(mysql_error(). " there is an error line no 11");
// while ($op=mysql_fetch_array($sel))
// {
// echo '<option>'.$op[0].'</option>';
// }
?>

</select>
-->
<?php

//if (count(($num)>1)){
//	
//$num_of_b=$_POST['no_of_bed'];
//$Count= $numval[0];
//$sum=$Count + $num_of_b;
//
//echo "My insert ".$num_of_b."</br>";
//echo "Available bed no ".$Count."</br>";
//echo "Total ".$sum."</br>";
//
//for ($j=0;$j>=$sum;$j++)
//{
//	echo $j;	
////mysql_query("insert into beds_master_table VALUES('','$i','') ")or die(mysql_error()."Error Can't insert bed no");
//}
//
//}
//}
//else 
//{
//	
//}

?>
