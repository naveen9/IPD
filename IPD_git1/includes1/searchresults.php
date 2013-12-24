<?php
require_once('../condb.php');
if(isset($_POST['queryString']))
{
$queryString=mysql_real_escape_string($_POST['queryString']);
if(strlen($queryString)>0)
{
//$query=mysql_query("select * from patient_info where patient_id	 like'%".$queryString."%' union select * from patient_info where p_name //like'%".$queryString."%' 
//union select * from patient_info where p_mob like'%".$queryString."%' union select * from patient_info where p_email  like'%".$queryString."%' 
//order by p_name asc limit 3;");
$query=mysql_query("select * from  `proc_info` where `p_name` like'%".$queryString."%' order by p_name asc limit 3");//echo $query;
if($query)
{
while($result=mysql_fetch_object($query))
{

//echo '<li onClick="fill(\''.$result->p_name.'\');">
//<img src="images/hello1.png" width="25" height="24"/><b>'.$result->p_name.'</b></li>';
$pid=$result->pid;
$qr=mysql_query("select * from proc_mode_rate where belongs_proc='$pid'");
while($amount=mysql_fetch_object($qr))
{
  $amount=$amount->rate;


//echo '<li onClick="fill(\''.$result->p_name.'\');">'.'<b>'.$result->p_name.'</b></li>';

echo '<ul><li onClick="fill1(\''.$result->p_name.'\',\''.$amount.'\');"  >'.'<b>'.$result->p_name. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs $amount".'</b></li>';

//echo '<li onClick="fill(\''.$result->p_name.'\');">'.'<b>'.$result->patient_id	.'.'.$result->p_name.'.'.$result->p_mob.'.'.$result->p_email.'</b> </li>';
	
}	
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
























