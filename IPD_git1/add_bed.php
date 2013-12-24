<?php 
require 'condb.php';

if(isset($_POST['sub_no_of_bed']))
{
	if (!empty($_POST['no_of_bed'])){
$num=mysql_query("select no_of_bed from beds_master_table");
if (mysql_num_rows($num)==0){
	
$num_of_b=$_POST['no_of_bed'];
for ($i=0;$i<=$num_of_b;$i++)
{	
mysql_query("insert into beds_master_table VALUES('','$i','','') ")or die(mysql_error()."Error Can't insert bed no error 1");
}
header('location:admin_beds.php');
}
	else 
{

$Count= $numval[0];
	
  $num_of_b=$_POST['no_of_bed'];

 $sum=$Count + $num_of_b;

for ($i=$Count;$i<=$sum;$i++)
{
mysql_query("insert into beds_master_table VALUES('','$i','','') ")or die(mysql_error()."Error Can't insert bed no error 2");
}	
header('location:admin_beds.php');
}
}
	
	
}





?>