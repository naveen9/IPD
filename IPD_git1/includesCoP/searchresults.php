<?php
session_start();
require_once('../condb.php');

$panel=$_SESSION['panel'];
$mode=$_SESSION['mode'];
$room_type=$_SESSION['room_type'];
if(isset($_POST['queryString']))
{
$queryString=mysql_real_escape_string($_POST['queryString']);
if(strlen($queryString)>0)
{
//$query=mysql_query("select * from patient_info where patient_id	 like'%".$queryString."%' union select * from patient_info where p_name //like'%".$queryString."%' 
//union select * from patient_info where p_mob like'%".$queryString."%' union select * from patient_info where p_email  like'%".$queryString."%' 
//order by p_name asc limit 3;");
$query=mysql_query("select * from  `doctor_billing` where `doc_name` like'%".$queryString."%' and room_type='$room_type' order by doc_name asc limit 3");//echo $query;
if($query)
{
while($result=mysql_fetch_object($query))
{

//echo '<li onClick="fill(\''.$result->p_name.'\');">
//<img src="images/hello1.png" width="25" height="24"/><b>'.$result->p_name.'</b></li>';

//echo '<li onClick="fill(\''.$result->p_name.'\');">'.'<b>'.$result->p_name.'</b></li>';

echo '<ul><li onClick="fillCoP(\''.$result->doc_name.'\',\''.$result->amount.'\',\''.$result->room_type.'\');"  >'.'<b>'.$result->doc_name. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs $result->amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$result->room_type}".'</b></li>';

	
	
}
}
else
{
echo "there was a problem";	
}
}
else
{
	
}
}
else
{
"no";	
}

?>














