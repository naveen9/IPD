<?php
session_start();
error_reporting(0);
require 'condb.php';


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select pharmacy from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['pharmacy'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
	include("header.php");
	include("menubar.php");
    include("condb.php");
$v_id=$_SESSION['visit_id'];
$nav=$_SESSION['fix'];



$ot_id=$_REQUEST['used'];

$ot_id=$_SESSION['ot_id']=$ot_id;



//echo $v_id;
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("d-m-y");
$time=date("H:i:s");

if($_REQUEST['error_msg'])
{
$message=$_REQUEST['error_msg'];
    echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';
}
if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}
?>
<?php 
$use=  mysql_query("select * from ot_store where ot_id='$ot_id'")or die(mysql_error());

                 
$use1=mysql_fetch_array($use);

$inventory_name=$use1['i_name'];
$type=$use1['type'];
$quantity=$use1['quantity'];
$ex_date=$use1['ex_date'];

$Inventory_type=$use1['type_of_store'];




//echo $sum_amount;
?>

      
        <div id="opd_bill" style="height:20px;">
           
                <span class="p_adding">Inventory Used</span>
        </div>

<div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
            <div style="float:left; width:200px; margin-left:5px;"><strong>Inventory Name</strong></div>
            <div style="float:left; width:120px;"><strong>Quantity</strong></div>
            
            <div style="float:left; width:170px; padding-left:10px;"><strong>Date</strong></div>
            <div style="float:left; width:170px; padding-left:10px;"><strong>time</strong></div>
               <div class="cls" style="margin-bottom:15px;"></div>
<form method="post">
            <div style="float:left; width:200px; ">
                <input type="text" name="m_name" value="<?php echo $use1['i_name']; ?>" />
            </div>
            <div style="float:left; width:120px; margin-right:5px;">
                <input type="text" name="quantity1" value="<?php echo $use1['quantity']; ?>" style="width:90px;" />
             </div>
            
    <div style="float:left; width:180px; "><input type="text" name="date" value="<?php echo $billdate; ?>" style="width:140px;" /></div>
    <div style="float:left; width:180px;"><input type="text" name="time" value="<?php echo $time; ?>"  style="width:140px;"  /></div>
    <div style="float:left; width:90px;"><input type="submit" name="used1" value="Used" class="btn"></div>
      </div>

</form>
      <div class="cls"></div>     
<?php



if(isset($_POST['used1']))
             {
             
        
             
         
$quantity1=$_REQUEST['quantity1'];
              $date=$_REQUEST['date'];
              $time=$_REQUEST['time'];
               $quantity2=$quantity-$quantity1;
                  

                 mysql_query("update ot_store set quantity=$quantity2 where ot_id='$ot_id'")or die(mysql_error());
                
                 $del=mysql_query("select quantity from ot_store where ot_id='ot_id'")or die(mysql_errno());
                 $del1=mysql_fetch_array($del);
                 $q=$del1[0];
                 if($q==0)
                 {
                     //echo $q;
                     mysql_query("DELETE FROM ot_store where ot_id='$ot_id' AND quantity=0 ")or die(mysql_error());
                     
                 }
                 
                  $q1=mysql_query("select ot_id,use_id,quantity from used_inventory  where ot_id='$ot_id' and type_of_store='$Inventory_type'");
        $found=mysql_num_rows($q1);
        if($found==0)
        {
          
          mysql_query("insert into  used_inventory (use_id,ot_id,in_name,type,quantity,ex_date,date,time,type_of_store) VALUES('','$ot_id','$inventory_name','$type','$quantity1','$ex_date','$date','$time','$Inventory_type')")or die(mysql_error());


                header("location: main_store.php");
             }
             else
             {

              $search_value=mysql_fetch_array($q1);
             
             $quantity5=$search_value['quantity'];
              $quantity6=$quantity5+$quantity1;


              mysql_query("update used_inventory set quantity='$quantity6' where ot_id='$ot_id' and type_of_store='$Inventory_type'")or die(mysql_error());
              header("location: main_store.php");
             }

             }
            
 
    
    
                   



 ?>
    
</body></html>




