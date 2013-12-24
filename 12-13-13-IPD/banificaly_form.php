<?php
require 'condb.php';
if (isset($_POST['save']))
{
	$chk=$_POST['chk'];

	foreach ($chk as $k => $val) {
	
// echo $k;
// echo $val;



		$bb_id=$_POST['bb_id'];
		$deduction=$_POST['deduction'];
		$shared1=$_POST['shared1'];
		$tds1=$_POST['tds1'];

		$remarks=$_POST['remarks'];

		$final_amount=$_POST['final_amount'];

	
		
foreach ($deduction as $key => $value) {
	
if ($k==$key)
{
mysql_query("update beneficairy_payment set deduction='$value', `check`=1 where bp_id='$val'")or die(mysql_error());	
	//echo 'Success';
}	
	}
	
	foreach ($shared1 as $key => $value) {
	
if ($k==$key)
{
mysql_query("update beneficairy_payment set share='$value', `check`=1 where bp_id='$val'")or die(mysql_error());	
}	
	}
	
	foreach ($tds1 as $key => $value) {
	
if ($k==$key)
{
mysql_query("update beneficairy_payment set tds='$value', `check`=1 where bp_id='$val'")or die(mysql_error());	
}	
	}
	
	foreach ($remarks as $key => $value) {
	
if ($k==$key)
{
mysql_query("update beneficairy_payment set remarks='$value', `check`=1 where bp_id='$val'")or die(mysql_error());	
	
}	
	}
		
	foreach ($final_amount as $key => $value) {
	
if ($k==$key)
{
mysql_query("update beneficairy_payment set doc_amount='$value', `check`=1 where bp_id='$val'")or die(mysql_error());	
	
}	
	}
		
	
	
	}

 
	
}
    header('location:beneficary-payment.php');

?>