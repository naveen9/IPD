<?php
require 'condb.php';

    if(isset($_POST['sub']))
    {
        $pid=$_REQUEST['pid'];
       $sal=$_POST['sal'];
          
               mysql_query("update employe set salary='$sal' where emp_id='$pid'");
           
               $msg="Success";
    }
           
            
        
    
    


   
    $pid=$_REQUEST['pid'];
echo "Employe Id " .  $pid;

$p=  mysql_query("select * from employe where emp_id='$pid'")or die(mysql_error());
$fetch=  mysql_fetch_array($p)
?>
    <p> Employe Name : <?php echo $fetch['emp_name'];  ?></p>

    

<form method="post">


Salary <input type="text" name="sal" value="<?php echo $fetch['salary'] ?>">

<input type="submit" name="sub"      value="Update">
</form>
<hr>

<?php



echo $msg;
$rc=  mysql_query("select * from employe where emp_id='$pid'")or die(mysql_error());
?>
<hr>Employe salary<hr> 
<?php
 while ($rchrg=  mysql_fetch_array($rc))
{
     echo "{$rchrg['emp_name']} {$rchrg['salary']} <br>";
     
 }
?>