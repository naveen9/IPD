<?php
require 'condb.php';
$pid=$_REQUEST['pid'];
$sql=  mysql_query("select img from patient_other_img where claim_id='$pid'");
$i=0;
while ($mysql=  mysql_fetch_array($sql))

                {

    $im=$mysql['img'];
    if($im=='images/')
    {
        
    }
    else
    {
?>
<P>Other image <?php echo $i; ?><a href="<?php echo $mysql[0]; ?>"><img width="200px" height="200px"src="<?php echo $mysql[0]; ?>"></a></P>

    <?php } $i++; }  ?>
