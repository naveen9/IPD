<?php
require_once('../condb.php');
if(isset($_POST['queryString']))
{
$queryString=mysql_real_escape_string($_POST['queryString']);
if(strlen($queryString)>0)
{

$query=mysql_query("select * from  `medicine_store` where `m_name` like'%".$queryString."%' order by m_name asc limit 4");//echo $query;
if($query)
{
while($result=mysql_fetch_object($query))
{
echo '<ul><li onClick="fillM(\''.$result->m_name.'\',\''.$result->batch_no.'\',\''.$result->unit_mrp.'\',\''.$result->expiry_date.'\',\''.$result->quantity.'\');"  >'.'<b>'.$result->m_name.'</b></li>';
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
























