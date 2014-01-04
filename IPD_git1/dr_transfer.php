<?php
require 'condb.php';

    if(isset($_POST['sub']))
    {
        $pid=$_REQUEST['pid'];
       $doctor=$_POST['doctor'];
          
               mysql_query("update visit_register set ref_dr='$doctor' where visit_id='$pid'");
           
               $msg="Success";
    }
           
            
        
    
    


   
    $pid=$_REQUEST['pid'];
echo "Ip Id " .  $pid;

$p=  mysql_query("select * from visit_register where visit_id='$pid'")or die(mysql_error());
$fetch=  mysql_fetch_array($p)
?>
    <p> Doctor Name : <?php echo $fetch['ref_dr'];  ?></p>

    

<form method="post">


 <div class="l_ft" style="width:190px;">Doctor Name



<select name="doctor">
<?php
$sel=mysql_query("select doc_name from doc_master_table");
while ($data=mysql_fetch_array($sel)) {
    echo '<option>'.$data[0].'</option>';
}
?>

</select>

</div>

<input type="submit" name="sub"      value="Update">
</form>
<hr>

<?php




$rc=  mysql_query("select * from visit_register where visit_id='$pid'")or die(mysql_error());
?>
<hr>Doctor Name <hr> 
<?php
 while ($rchrg=  mysql_fetch_array($rc))
{
     echo " {$rchrg['ref_dr']} <br>";
     
 }
?>