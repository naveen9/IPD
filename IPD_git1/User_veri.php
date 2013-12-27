<?php
ob_start();
session_start();
require 'condb.php';
$session_id=$_SESSION['session_id'];
if(empty($session_id))
{
    header("location:index.php");
}
 else {
$query=mysql_query("select `usertype` from `user_data` where `id`='$session_id' AND `usertype`='admin'")or die( mysql_error());
     if(mysql_num_rows($query)==0)
     {
echo $session_id; 

   header("location: index.php?error_msg=".urlencode("Something went wrong"));       
     }
 else {



$sql=  mysql_query("select * from user_data where verify=0")or die(mysql_error());
$js=$_REQUEST['js'];
if($js=='js')
{
    echo '<script>alert("User has been successfully verified ")</script>';
}
if($js=='jsd')
{
    echo '<script>alert("User Deleted")</script>';
}
?>

<h1 style="float: right;  "><a href="User_man.php">Set User Privileges </a></h1>

<table border="1" bordercolor="teal" style="background-color:#293e6a; color: whitesmoke " width="100%"  cellpadding="3" cellspacing="3">
    
    <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Verify</th>
            <th>Delete</th>
    </tr>


<?php

while ($v=  mysql_fetch_array($sql))
{
  ?>  

        <tr>
        <form method="post">    
<td><center><input type="hidden" name="sam" value="<?php echo $v['id']; ?>"> <?php echo $v['name']; ?></center></td>
        
<td><center><?php echo $v['username']; ?></center></td>
        
<td><center><?php echo $v['phone']; ?></center></td>
        
<td><center><?php echo $v['gender']; ?></center></td>
        
<td><center><input type="submit" name="verify" value="Verify"></center></td>
<td><center><input type="submit" name="del" value="Delete"></center></td>
  </form>
</tr>

<?php
}

?>
</table>
   
<?php
if(isset($_POST['verify']))
{
    $uid=$_POST['sam'];
    mysql_query("update user_data set `verify`=1 where `id`=' $uid'")or die(mysql_error());
    mysql_query("insert into user_priv (`user_id`) values('$uid')")or die(mysql_error());
    header('location:User_veri.php?js=js');   
}
if(isset($_POST['del']))
{
    $uid=$_POST['sam'];
    mysql_query("delete from user_data where id=$uid ");
    header('location:User_veri.php?js=jsd');   
    
}    
}
 }
?>
