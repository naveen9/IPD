<?php 
require 'condb.php';
class uploader {
var $temp_file_name;
var $error;
var $size;
	
	function value($pid,$name,$tpa,$corp) {
		mysql_query("insert into patient_details (`pid`,`name`,`tpa`,`corporate`) 
		                    values('$pid','$name','$tpa','$corp') ")or die(mysql_error()); 
	}

function img_loader($get,$name,$tmp_name,$error,$pid) {
	$destination="images";
 

	
if ($get=='in_img1')
{

		move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
	mysql_query("update patient_details set in_img1='$saved' where pid='$pid' ");
	
}

if ($get=='in_img2')
{
		move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
		mysql_query("update patient_details set in_img2='$saved' where pid='$pid' ");
	
}

if ($get=='icard1')
{
		move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
		mysql_query("update patient_details set id_img1='$saved' where pid='$pid' ");
	
}

if ($get=='icard2')
{
		move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
		mysql_query("update patient_details set id_img2='$saved' where pid='$pid' ");
	
}

if ($get=='photo')
{
		move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
		mysql_query("update patient_details set photo='$saved' where pid='$pid' ");
	
}



}

}

?>