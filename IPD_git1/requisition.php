<?php
ob_start();
include("header.php"); 
include("menubar.php");
?>
<form method="post" enctype="multipart/form-data">
Id<br>
Name<input type="text" name="name"><br>
ip ID<input type="text" name="ip_id"><br>

Requisition form
Form 1
<input type="file" name="rform1" id="rform1">||
Form2
<input type="file" name="rform2" id="rform2">
<br>
Supporting documents
<input type="file" name="uploaded_file[]" multiple="true" id="uploaded_file" style="color:black" /><br/>
<input type="submit" name="sub">
</form>
<?php

require 'condb.php';
if (isset($_POST['sub']))
{
	
	
	  $p_name=$_POST['name'];
	  $ip_id=$_POST['ip_id'];
		$rf_img1_name=$_FILES['rform1']['name'];
		$rf_img1_name_tmp_name=$_FILES['rform1']['tmp_name'];
		$rf_img2_name=$_FILES['rform2']['name'];
		$rf_img2_name_tmp_name=$_FILES['rform2']['tmp_name'];
		
	if (!empty($p_name))
	{

		    $destination="images";
$img2="$destination/".$rf_img2_name;
$img1="$destination/".$rf_img1_name;

		    move_uploaded_file($rf_img1_name_tmp_name,"$destination/".$rf_img1_name);
		    move_uploaded_file($rf_img2_name_tmp_name,"$destination/".$rf_img2_name);
		    
		if(!empty($_FILES['rform1']) OR !empty($_FILES['rform2']))
           {
        
        
        mysql_query("insert into requisition (`id`,`ip_id`,`name`,`rf_img1`,`rf_img2`)
                           values('NULL','$ip_id','$p_name','$img1','$img2')
		
		");
		
        }
           else
           
           {
           
    
        mysql_query("insert into requisition (`id`,`ip_id`,`name`,`rf_img1`,`rf_img2`)
                           values('NULL','$ip_id','$p_name','','')
		
		");       
           }
           
	foreach ($_FILES['uploaded_file']['name'] as $value=>$key) {

$type=$_FILES['uploaded_file']['type'];
$fname=$_FILES['uploaded_file']['name'];
if(!empty($fname))
{

$a_no= $value;
	$name=$_FILES['uploaded_file']['name'][$a_no];
    $type=$_FILES['uploaded_file']['type'][$a_no];
    $tmp_name=$_FILES['uploaded_file']['tmp_name'][$a_no];
    
    $destination="images";
    $csv= "images/".$name;
	
	mysql_query("insert into requisition_supporting_images  values('NULL','$ip_id','$csv') ")or die(mysql_error());	

    move_uploaded_file($tmp_name,"$destination/".$name);
}  


}

	}
else 
{
	echo "Please fill patient name";
}	
}


?>
<p>Update existing patient info click on a IP ID </p>
<?php
$sql=mysql_query("select ip_id from requisition ");
while ($data=mysql_fetch_array($sql))
{
?>

<a href="ip_img_edit.php?ip_id=<?php echo $data[0]; ?>" onclick="javascript:void window.open('ip_img_edit.php?ip_id=<?php echo $data[0]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $data[0]; ?></a>
<br/>
	
<?php 
}
	?>

