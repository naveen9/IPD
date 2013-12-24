<?php
require 'condb.php';
$cid=$_REQUEST['cid'];
$sql=mysql_query("select * from query where id='$cid' ")or die(mysql_error());
  while($d=mysql_fetch_array($sql))
  {

?>
Claim id <?php echo $d[2]; ?>
<a href="<?php echo $d[3]; ?>"><img src="<?php echo $d[3]; ?>" alt="query" height="200px" width="200px"/></a>
  <?php } ?>

<a href="give_reply.php?cid=<?php echo $cid; ?>">Reply</a>