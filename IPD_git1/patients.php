<?php
require 'condb.php';
$pid=$_REQUEST['pid'];
$sql=  mysql_query("select * from patient_details");
while ($mysql=  mysql_fetch_array($sql))
{

?>
<P>Claim id <?php echo $mysql[0]; ?></P>
<P> Name <?php echo $mysql[1]; ?></P>
<P> TPA <?php echo $mysql[2]; ?></P>
<P>insurance Image 1 <a href="<?php echo $mysql[3]; ?>"><IMG width="200px" height="200px" src="<?php echo $mysql[3]; ?>"></a></P>
<P>insurance Image 2 <a href="<?php echo $mysql[4]; ?>"><IMG width="200px" height="200px" src="<?php echo $mysql[4]; ?>"></a></P>
<P>icard Image 1 <a href="<?php echo $mysql[5]; ?>"><IMG     width="200px" height="200px" src="<?php echo $mysql[5]; ?>"></a></P>
<P>icard Image 2 <a href="<?php echo $mysql[6]; ?>"><IMG     width="200px" height="200px"src="<?php echo $mysql[6]; ?>"></a></P>
<P>Photo<a href="<?php echo $mysql[7]; ?>"><IMG src="<?php echo $mysql[7]; ?>"></a></P>
<a href="patient_other_documents.php?pid=<?php echo $pid; ?>">Click here to view other images</a>
    <?php } ?>
