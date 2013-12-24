<?php
include("condb.php");
?>


<?php
$proc_id=$_GET['proc_id'];
$visit=$_GET['visit'];
$patient_id=$_GET['patient_id'];
$bill_id=$_GET['bill_id'];
?>

<h5 align="center">Visit ID<?php echo $visit; ?></h5>
<h5 align="center">Bill ID<?php echo $bill_id; ?></h5>
<?php 
$res=mysql_query("select * from opd_items where bill_id='$bill_id' && proc_status=1");
$count=mysql_num_rows($res);
echo "count=".$count;
?>
<form method="post" action="">
<table border="1" align="center" cellpadding="3" cellspacing="3">
<tr>
<th>checkBox</th>
<th>ProcId</th>
<th>ProcName</th>
</tr>

<tr>
<?php while($row=mysql_fetch_array($res))
{ ?>
<td><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $row['proc_id']; ?>"> </td>
<td><?php echo $row['proc_id'];?></td>
<td><?php echo $row['proc_name'];?></td>
</tr>
<?php }?>
<tr>
<td align="center" colspan="3"><input type="submit" name="delete" id="delete" value="Delete"></td>
</tr>
</table>
</form>



<?php
// on delete button
if(isset($_POST['delete']))
{
	foreach($_POST['checkbox'] as $check)
	{
	 $del_id = $check;
     echo "Delete Id ".$del_id;
	 $sql="update opd_items set proc_status=0 where proc_id='$del_id'";
     $check=mysql_query($sql);		
	}
	if($check)
	{
		
		echo "<meta http-equiv='refresh' content='0' url='editBill.php'>";
	}
			  
$data ="SELECT * FROM opd_items WHERE bill_id ='$bill_id' && proc_status =1";
$data = mysql_query($data);
$data = mysql_num_rows($data);
// if 	
if($data<1)
{
$update1 = mysql_query("update opd_bill set proc_status=0 where bill_id='$bill_id'");	
}
// check all bill iDS which are inactive for this visit id 
// checking bill id exists or not from opd_bill		  
$data1="SELECT * FROM opd_bill WHERE bill_id ='$bill_id' && proc_status =1";
$data1 = mysql_query($data1);
$data1 = mysql_num_rows($data1);		  
		  
		  
//if bill_id does'nt exists in opd_bill table than delete visit id		  
if($data1<1)
{
$update2 = mysql_query("update visit_register set proc_status=0 where visit_id='$visit'");
}
}
?>



