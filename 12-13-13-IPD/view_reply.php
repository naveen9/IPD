<?php
require 'condb.php';
$cid=$_REQUEST['cid'];
$sql=mysql_query("select * from query_reply where q_id='$cid'");
while ($reply=mysql_fetch_array($sql))
{
?>
<a href="query/<?php echo $reply['query_reply']; ?>"><img src="query/<?php echo $reply['query_reply']; ?>" height="200px" width="200px"></a>
<?php } ?>
