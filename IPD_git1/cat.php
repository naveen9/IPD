<form method="post">
Room type:<input type="text" name="room_type"><br>
Room Charge:<input type="text" name="room_charge"><br>
<input type="submit" name="sub" value="Insert">
</form>
<?php
ob_start();
error_reporting(0);
// include("header.php"); 
// include("menubar.php");
include("condb.php");

if (isset($_POST['sub'])) {
	$room_type=$_POST['room_type'];
	$room_charge=$_POST['room_charge'];

	if (!empty($room_type) && !empty($room_charge)) {
		
	mysql_query("insert into room_type value('','$room_type','$room_charge')")or die(mysql_error());
header('location: admission-ipd.php');
	}
	else
	{
		echo "Fill all fields";
	}
}

$sel=mysql_query("select * from room_type");
while ($data=mysql_fetch_array($sel)) {
	echo '<form method="post">';
	echo '<input type="hidden" name="chk" value="'.$data[0].'">';
	echo 'Room Type: <label for="room_type">'.$data[1].'</label>   &nbsp;&nbsp;&nbsp;&nbsp;  ';
	echo 'Room Charge: <label for="room_charge">'.$data[2].'</label>';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="del" value="Del"><hr>';
echo '</form>';
}
if (isset($_POST['del'])) {
	$chk=$_POST['chk'];
	mysql_query("delete from room_type where room_id='$chk'")or die(mysql_error());
	echo 'Deleted';
}
?>
