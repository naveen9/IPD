<?php
if(isset($_POST['save'])){
include('condb.php');
$c=$_POST['count'];
    $pid=$_POST['procid'];
    //echo $c;
for($i=0;$i<$c;$i++)
{
$r="rate"."$i";
$m="mode"."$i";
$rate=$_POST[$r];
$mode=$_POST[$m];

echo "<br>rate=$rate mode=$mode<br>";
$update=("UPDATE `proc_mode_rate` SET `rate`='$rate' WHERE mode='$mode' AND belongs_proc='$pid'");
 $update_query=mysql_query($update)or die(mysql_error());

    header('Location: procedure-list.php');

}


//$update=("UPDATE `proc_mode_rate` SET `rate`='$rate' WHERE belongs_proc='$id'");
// $update_query=mysql_query($update)or die(mysql_error());



}
?>