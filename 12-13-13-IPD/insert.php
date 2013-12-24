<?php

include('condb.php');

$getids=mysql_query("select pid from proc_info");

while($row=mysql_fetch_row($getids))
{

    $insert=mysql_query("insert into proc_mode_rate(belongs_proc,mode,rate)values('$row[0]','xyz','500')");
echo"yes<br>";

}


?>