<body bgcolor="lightgreen">
<?php
require 'condb.php';

    if(isset($_POST['sub']))
    {
        //$rid=$_POST['rid'];
        $proid=$_POST['proid'];
        $room=$_POST['room'];
        $chrg=$_POST['chrg'];
        if(!empty($room) && !empty($chrg))
        {
           $chkpost=  mysql_query("select * from procedure_room_rate where room_type='$room' AND pid='$proid'");
          $rom=  mysql_fetch_array($chkpost);
          $room1=$rom['room_type'];
           
           if(mysql_num_rows($chkpost)==1)
           {
               mysql_query("update procedure_room_rate set charges='$chrg' where pid='$proid' AND room_type='$room1' ");
           
               $msg="Success";
           }
           if(mysql_num_rows($chkpost)==0)
           {
           mysql_query("insert into procedure_room_rate values('NULL','$proid','$room','$chrg')");
            $msg="Success";
           }
            
        }
    }
    


//if(isset($_POST['insert']))
//{
//    $proc_name=$_POST['proc_name1'];
//    $cat=$_POST['proc_cat1'];
//    if(!empty($proc_name) && !empty($cat))
//    {
//mysql_query("insert into proc_info values('NULL','$proc_name','$cat')");    
//    }
//}
//
//$sel=mysql_query("SELECT MAX(pid) FROM `proc_info` ")or die(mysql_error());
//    
//$my=mysql_fetch_array($sel);   
    $pid=$_REQUEST['pid'];
echo "Procedure Id " .  $pid;

$p=  mysql_query("select * from proc_info where pid='$pid'")or die(mysql_error());
$fetch=  mysql_fetch_array($p)
?>
    <p><h4 style=" color: whitesmoke; border: black solid;  text-align-last: left;   "> Procedure Name : <?php echo $fetch['p_name']; echo "<br>Procedure Type  {$fetch['type']}"; ?></h4></p>

    
<?php
$room=  mysql_query("select * from room_type ORDER BY room_type ASC")or die(mysql_error());

while ($rm= mysql_fetch_array($room)) {
?>
<form method="post">
<input type="hidden" name="proid" value="<?php echo $pid; ?>">
<input type="hidden" name="rid[]" value="<?php  echo $rm['room_id']; ?>">
Room Type <input type="text" name="room" value="<?php echo $rm['room_type'] ?>">
Procedure Charge <input type="text" name="chrg"  placeholder="Procedure Charge">
<input type="submit" name="sub"      value="Insert || Update">
</form>
<hr>

<?php

}

echo $msg;
$rc=  mysql_query("select room_type,charges from procedure_room_rate where pid='$pid' ORDER BY room_type ASC")or die(mysql_error());
?>
<hr>Previous Procedure Rate's<hr> 
<?php
 while ($rchrg=  mysql_fetch_array($rc))
{
     echo "{$rchrg['room_type']} {$rchrg['charges']} <br>";
     
 }
?>