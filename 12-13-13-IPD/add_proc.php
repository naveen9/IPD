<?php
include("header.php");
include("menubar.php");
include("condb.php");
error_reporting(0);
include_once 'condb.php';
if(isset($_POST['Insert'])){
$p_name=$_POST['pro'];
    $cat=$_POST['cat'];
    $check=mysql_query("select pid from proc_info where p_name='$p_name' and type='$cat'");
    $num=mysql_num_rows($check);
    if($num==0){
    mysql_query("insert into proc_info values('','$p_name','$cat') ")or die(mysql_error());
    $query=mysql_query("select mode from proc_mode_rate group by mode")or die(mysql_error());
   $getid=mysql_query("select max(pid) from proc_info");
    $id=mysql_fetch_array($getid);

    while($fetch=mysql_fetch_array($query)){
       //echo '<br>';
        //echo $fetch[0];
        $insert=mysql_query("insert into proc_mode_rate values('','$id[0]','$fetch[0]','500')");
    }
}
else{

    echo "Already exist";
}
}
if(isset($_POST['addmode'])){
    $mode=$_POST['mode'];
    $rate=$_POST['rate'];
    $pid=mysql_query("select pid from proc_info")or die(mysql_error());
    while($row=mysql_fetch_array($pid)){

    mysql_query("insert into proc_mode_rate values ('','$row[0]','$mode','$rate')");

    }

}
?>
<form method="post" action="add_proc.php">
Add proc:<input type="text" name="pro">
Type:<select name="cat" style="width:160px; height:20px; margin-left:0px;"/>
<?php

$select=("SELECT * FROM proc_info group by type");
$query=mysql_query($select)or die(mysql_error());
while($op=mysql_fetch_array($query)){

    echo '<option>'.$op[2].'</option>';

}
?>
</select>
<input type="submit" value="Add" name="Insert">
</form>



<form method="post" action="add_proc.php">
    Add mode:<input type="text" name="mode">
    Default Rate:<input type="text" name="rate">
    <input type="submit" value="Add" name="addmode">
</form>