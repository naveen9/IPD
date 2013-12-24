<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<h2>Hospital Profile</h2>
<?php
session_start();

require 'condb.php';
$get=mysql_query("select * from hospitals_info")or die(mysql_error());
while ($data=mysql_fetch_array($get))
{
echo '<br/>';
echo '<form method="post">';
echo 'Hospital Name <input type="text" name="hnme" value="'.$data[0].'"> '; 
echo 'Hospital Address <input type="text" name="hadd" value="'.$data[1].'"> '; 
echo 'Hospital Email <input type="text" name="hemail" value="'.$data[2].'"> '; 
echo 'Hospital Helpline <input type="text" name="hline" value="'.$data[3].'"> '; 
echo 'Hospital Fax <input type="text" name="hfax" value="'.$data[4].'"> '; 
echo 'Recption no. <input type="text" name="recp" value="'.$data[5].'"> '; 
echo 'Ambulance no <input type="text" name="amb" value="'.$data[6].'"> '; 
echo 'Emegency no. <input type="text" name="emr" value="'.$data[7].'"> '; 
//echo 'Logo <input type="text" name="hnme" value="'.$data[0].'"> '; 
//echo 'Image <input type="text" name="hnme" value="'.$data[0].'"> '; 
echo '<input type="submit" name="sub" value="Update"> '; 
echo '</form>';	
if (isset($_POST['sub']))
{
	$hname=$_POST['hnme'];
	$hadd=$_POST['hadd'];
	$hemail=$_POST['hemail'];
	$hline=$_POST['hline'];
	$hfax=$_POST['hfax'];
	$recp=$_POST['recp'];
	$amb=$_POST['amb'];
	$emr=$_POST['emr'];
mysql_query("update hospitals_info set hospital_name='$hname', hospital_add='$hadd', hospital_email='$hemail', hospital_helpline='$hline', hospital_fax='$hfax', reception_no='$recp', ambulance_no='$amb', emergency_no='$emr' ")or die(mysql_error());	
header('location: adminfrontpage.php');	
}	
}
echo '<hr>';
echo "<h3>Update Logo/Image</h3>";
echo '<form method="post" enctype="multipart/form-data">';
echo '<input type="checkbox" name="logochk">';
echo 'Logo<input type="file" id="logo" name="logo">';
echo '<input type="checkbox" name="imgchk">';
echo 'Image<input type="file" id-"img" name="img">';
echo '<input type="submit" name="up" value="Update" >'; 
echo '</form>';
if (isset($_POST['up']))
{
	

	if (!empty($_POST['logochk']))
{
	
	//Properties of the uploaded file
	$name=$_FILES['logo']['name'];
	$type=$_FILES['logo']['type'];
	$size=$_FILES['logo']['size'];
	$tmp_name=$_FILES['logo']['tmp_name'];
	$error=$_FILES['logo']['error'];
	$destination="img";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
mysql_query("update hospitals_info set logo_path='$saved'");
	
}
if (!empty($_POST['imgchk']))
{
	
	//Properties of the uploaded file
	$name=$_FILES['img']['name'];
	$type=$_FILES['img']['type'];
	$size=$_FILES['img']['size'];
	$tmp_name=$_FILES['img']['tmp_name'];
	$error=$_FILES['img']['error'];
	$destination="img";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
mysql_query("update hospitals_info set img_path='$saved'");
	
}

}
?>
