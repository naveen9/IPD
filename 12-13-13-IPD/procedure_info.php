<?php

session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select data_mx from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['data_mx'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



include("header.php"); 
include("menubar.php");

?>

<body bgcolor="lightgreen">
<div class="miscel_charge" style="height:20px; margin-bottom:2px; color:#FFF;"> Add New Procedure</div>    
<form method="post">
    <div style="width:100%; margin:0 auto;">
    <div style="width:25%; float:left"><strong>Procedure Name </strong></div>
    <div style="width:25%; float:left"><strong>Procedure Type </strong></div>
    <div style="width:25%; float:left"><strong>Panel </strong></div>
    <div style="width:25%; float:left">&nbsp;&nbsp;</div>

    <div class="cls"></div>
    
    <div style="width:25%; float:left">
        <input type="text" name="proc_name">
     </div>
    <div style="width:25%; float:left">
        <input type="text" name="proc_type">
     </div>    
    <div style="width:25%; float:left">
      <select name="ptable" style="width:100%">
        <option value="cash">Cash</option>
        
        <?php
        $mysql=  mysql_query("SELECT * FROM `panel` ")or die(mysql_error());
        while ($sql=  mysql_fetch_array($mysql)) {
            echo '<option value="'.$sql[1].'">'.$sql[1].'</option>';
        }
        
        ?>
    
         <?php
        $mysql=  mysql_query("SELECT * FROM `corporate` ")or die(mysql_error());
        while ($sql=  mysql_fetch_array($mysql)) {
            echo '<option value="'.$sql[1].'">'.$sql[1].'</option>';
        }
        
        ?>
    
    </select>
  </div>
  <div style="width:25%; float:left; text-align:center">  
     <input type="submit" class="btn" name="sub" value="Insert">
   </div>  
<div class="cls" style="height:20px;"></div>
</div>
<div style="padding:5px 0px; height:20px; background:lightgray;">
    <div style="width:25%; float:left"><strong>Procedure Name </strong></div>
    <div style="width:25%; float:left"><strong>Procedure Type </strong></div>
    <div style="width:25%; float:left"><strong>Panel </strong></div>
    <div style="width:25%; float:left">&nbsp;&nbsp;</div>
    <div class="cls"></div>
  </div>  
</form>
    <?php

$sql=mysql_query("select * from proc_info");
while ($pro=  mysql_fetch_array($sql)) {

?>

<form method="post">
    <div style="background:#FFF; width:100%; padding:5px 0px;">
        <div style="width:25%; float:left">
            <input type="hidden" name="chk" value="<?php echo $pro['pid'] ?>">
            <input type="text" value="<?php echo $pro['p_name'] ?>" name="proc_name">
        </div>    
    <div style="width:25%; float:left">
             <input type="text" value="<?php echo $pro['type'] ?>" name="proc_type">
    </div>
    <div style="width:10%; float:left">     
   
       <label for="pn" style="color: tomato; "><?php echo $pro['pn_cash_corp'] ?></label>

    </div>  
    
    <!--<input type="submit" name="upd" value="Update">
    <input type="submit" name="del" value="Delete"><a href="proc_proccess.php?pid=<?php echo $pro['pid']; ?>" onclick="javascript:void window.open('proc_proccess.php?pid=<?php echo $pro['pid']; ?>','1384252115538','width=700,height=600,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=700,top=0');return false;">Add Procedure Rate</a></p>
    <hr>
-->
<div style="width:39%; float:left;" class="proce">
    <a href="#">Update</a><a href="#">Delete</a>
    <a href="proc_proccess.php?pid=<?php echo $pro['pid']; ?>" onclick="javascript:void window.open('proc_proccess.php?pid=<?php echo $pro['pid']; ?>','1384252115538','toolbar=0,menubar=0,location=0,status=1,scrollbars=1,');return false;">Add Procedure Rate</a>
</div>
<div class="cls"></div>
</div>
</form>

<?php
}
if(isset($_POST['sub']))
{
    $pname=$_POST['proc_name'];
    $ptype=$_POST['proc_type'];
$ptable=$_POST['ptable'];    
    if(!empty($pname) && !empty($ptype))
    {
    mysql_query("insert into proc_info values('NULL','$pname','$ptype','$ptable')");
    header('location:procedure_info.php');      
    }
    else
        
    {
        echo '<h2 style="color: crimson;">Fill all fields</h2>';
    }
  
}
if(isset($_POST['upd']))
{
    $id=$_POST['chk'];
    $pname=$_POST['proc_name'];
    $ptype=$_POST['proc_type'];
    if(!empty($pname))
    {
        mysql_query("update proc_info set pname='$pname' where pid='$id' ");
    }
    if(!empty($ptype))
    {
        mysql_query("update proc_info set type='$ptype' where pid='$id' ");
    }
    else
    {
        echo '<h2 style="color: crimson;">can\'t insert null values</h2>';
    }
    
}
if(isset($_POST['del']))
{
    $id=$_POST['chk'];
    mysql_query("delete from proc_info where pid='$id'");
    mysql_query("delete from procedure_room_rate where pid='$id'");
}
?>

</body>