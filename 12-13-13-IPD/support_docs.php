<?php
require 'condb.php';
$ipid=$_REQUEST['pid'];

//Back button
echo '<a href="requition.php"> GO Back </a>';
$sql=mysql_query("select * from requisition_supporting_images where ip_id='$ipid' ");


echo 'Documants';
while($sd=mysql_fetch_array($sql))
{
?>
<form method="post">
<table border="0">
<tr>
    
    
    <th>&nbsp;</th>
    <th>&nbsp;</th>
</tr>
    <td><input type="hidden" name="sdid" value="<?php echo $sd['sdid']; ?>"> <a href="<?php if($sd['s_img']=='images/') { } else { echo $sd['s_img']; } ?>"><img width="100px" height="100px" src="<?php if($sd['s_img']=='images/') { } else { echo $sd['s_img']; } ?>"></a> </td>
<td><input type="submit" name="del" value="Delete"></td>
</table>
</form>
<?php
}
if(isset($_POST['del']))
{
    $sdid=$_POST['sdid'];
mysql_query("delete from requisition_supporting_images where sdid='$sdid' ");
}
    ?>