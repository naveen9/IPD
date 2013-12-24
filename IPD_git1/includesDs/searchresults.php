<?php
require_once("../condb.php");
if(isset($_POST['queryString']))
{
$queryString=mysql_real_escape_string($_POST['queryString']);
if(strlen($queryString)>0)
{
$query=mysql_query("select * from patient_info where patient_id	 like'%".$queryString."%' union select * from patient_info where p_name like'%".$queryString."%' 
union select * from patient_info where p_mob like'%".$queryString."%' union select * from patient_info where p_email  like'%".$queryString."%' 
order by p_name asc limit 3;");


if($query)
{
while($result=mysql_fetch_object($query))
{
echo '<ul><li onClick="fillDs(\''.$result->patient_id.'\');">'.'<b>'.$result->patient_id.'</li>';
echo '<li onClick="fillDs(\''.$result->patient_id.'\');">'.'<b>'.$result->p_name.'</li>';
echo '<li onClick="fillDs(\''.$result->patient_id.'\');">'.'<b>'.$result->p_mob.'</li>';
echo '<li onClick="fillDs(\''.$result->patient_id.'\');">'.'<b>'.$result->p_email.'</li></ul>';
echo '<div class="cls"></div>';
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
























