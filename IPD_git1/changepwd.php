<?php
session_start();
require 'condb.php';
error_reporting(0);
$uid=$_SESSION['uid'];
$uname=$_SESSION['uname'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
	include("header.php");
	include("menubar.php");
?>
<div  id="container">
<br/>
        <form method="post">
            Enter Your current Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=" border-color: turquoise " type="text" name="pwd_old" required><br><br>        
            Enter Your New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style=" border-color: turquoise " type="text" name="pwd_new" required><br><br>                
           Re-Enter Your New Password&nbsp;&nbsp;&nbsp;&nbsp;<input style=" border-color: turquoise " type="text" name="pwd_re_new" required><br><br><br><br>
           <input type="submit" name="sub" value="Change Password">
        </form>
</div>
<?php
if(isset($_POST['sub']))
{
    $pwd_old=$_POST['pwd_old'];
    $pwd_new=$_POST['pwd_new'];
    $pwd_re_new=$_POST['pwd_re_new'];
    if(!empty($pwd_old) && !empty($pwd_new) && !empty($pwd_re_new))
    {
    if($pwd_new==$pwd_re_new)
    {
    $db=mysql_query("select id from user_data where username='$uname' AND password='$pwd_old'");    
    if(mysql_num_rows($db)==1)
    {
     $i=  mysql_fetch_array($db);
     $id=$i[0];
        mysql_query("update  user_data set password='$pwd_new' where id='$id' ")or die(mysql_error());
        echo '<h3>Password successfuly updated</h3>';
    }
 else 
  {
  echo '<h3>your  password does not match re-enter Your password/<h3>';   
 }
    }
    else
    {
        echo '<h3>Password not match</h3>';
    }
    }
 else 
     {
     echo 'Fill all fields';   
    }
}
?>