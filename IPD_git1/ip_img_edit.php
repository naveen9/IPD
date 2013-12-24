<?php
require 'condb.php';

$ipid=$_REQUEST['ip_id'];
if(empty($ipid))
{
    echo  '<h2>Please Close this window</h2>';
    exit();
    
}
$sql=mysql_query("select * from requisition where ip_id='$ipid' ");
while ($data=mysql_fetch_array($sql))
{
?>
<form method="post" enctype="multipart/form-data">
Id<input type="hidden" name="main_id" value="<?php echo $data['id']; ?>"> <br>
Name<input type="text" name="name" value="<?php echo $data['name']; ?>" ><br>
ip ID<input type="text" name="ip_id" value="<?php echo $data['ip_id']; ?>"><br>

Requisition form
Form 1
<input type="file" name="rform1" id="rform1">||
Form2
<input type="file" name="rform2" id="rform2">
<br>

<input type="submit" name="sub">
</form>
<?php }?>
<?php
if (isset($_POST['sub']))
{
	
	$main_id=$_POST['main_id'];
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

		if (!empty($rf_img1_name)) 
		{
		    move_uploaded_file($rf_img1_name_tmp_name,"$destination/".$rf_img1_name);
		    
		mysql_query("update requisition set  
		ip_id='$ip_id', 
		name='$p_name',
		rf_img1='$img1' where id='$main_id' ");
		}
    if (!empty($rf_img2_name)) 
		{
		    move_uploaded_file($rf_img2_name_tmp_name,"$destination/".$rf_img2_name);
		    
		mysql_query("update requisition set  
		ip_id='$ip_id', 
		name='$p_name',
		rf_img2='$img2' where id='$main_id' ");
		}
        
		else
		{
		mysql_query("update requisition set  
		ip_id='$ip_id', 
		name='$p_name',
		where id='$main_id' ");
		}
		
	
	}
}


?>
<h3>Details</h3>


<?php 
$sql=mysql_query("select * from requisition where id='$ipid'" );
while($dt=mysql_fetch_array($sql))
{
?>
<form method="post">
<table border="1">
<tr>
    <th>Claim ID</th>
    <th>Name</th>
    <th>Form image 1</th>
     <th>Form image 2</th>
    <th>View/Insert new supporting Documents</th>
    <th>Delete</th>
</tr>
    <td><?php echo $dt['id']; ?> </td>
<td><?php echo $dt['name']; ?></td>
<td><?php if($dt['rf_img1']=='images/') { } else { echo '<a href="'.$dt['rf_img1'].'"><img width="100px" height="100px" src="'.$dt['rf_img1'].'"></a>'; } ?></td>
<td><?php if($dt['rf_img2']=='images/') { } else { echo '<a href="'.$dt['rf_img2'].'"><img width="100px" height="100px" src="'.$dt['rf_img2'].'"></a>'; } ?></td>
<td><a href="support_docs.php?ip_id=<?php echo $ipid; ?>">Supporting Documents</a></td>
    <td><input type="submit" name="del" value="Delete"></td>
    
</table>
</form>
<?php
}
if(isset($_POST['del']))
{
 mysql_query("delete from requisition where ip_id='$ipid' ");
 mysql_query("delete from requisition_supporting_images where ip_id='$ipid' ");  
     echo "<script>window.close();</script>";

    
}
    ?>