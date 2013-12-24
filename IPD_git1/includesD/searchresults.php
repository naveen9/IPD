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
$query=mysql_query("select * from  `proc_info` where `p_name` like'%".$queryString."%' and (pn_cash_corp='$mode' or pn_cash_corp='$panel') order by p_name asc limit 3");//echo $query;
if($query)
{
while($result=mysql_fetch_object($query))
{

//echo '<li onClick="fill(\''.$result->p_name.'\');">
//<img src="images/hello1.png" width="25" height="24"/><b>'.$result->p_name.'</b></li>';
$pid=$result->pid;
$qr=mysql_query("select R.charges,I.pn_cash_corp from procedure_room_rate R,proc_info I where R.pid='$pid' and R.room_type='$room_type' and I.pid='$pid'");
while($amount=mysql_fetch_array($qr))
{
  $amount1=$amount[0];
  $mode=$amount[1];


//echo '<li onClick="fill(\''.$result->p_name.'\');">'.'<b>'.$result->p_name.'</b></li>';

echo '<ul><li onClick="fillD(\''.$result->p_name.'\',\''.$amount1.'\',\''.$mode.'\');"  >'.'<b>'.$result->p_name. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs $amount1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$mode}".'</b></li>';
echo '<ul><li onClick="fillD1(\''.$result->p_name.'\',\''.$amount1.'\',\''.$mode.'\');"  >'.'<b>'.$result->p_name. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs $amount11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$mode}".'</b></li>';

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
























