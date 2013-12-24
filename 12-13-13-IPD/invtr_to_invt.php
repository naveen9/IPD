
<?php
ob_start();
session_start();
	error_reporting(0);
	include("header.php");
	include("menubar.php");
    include("condb.php");
$v_id=$_SESSION['visit_id'];
$nav=$_SESSION['fix'];
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
$inventory_name=$_SESSION['inventory_name'];
                $quantity=$_SESSION['quantity'];
                 $in_id=$_SESSION['in_id'];
                 


//echo $sum_amount;
?>

      
        <div id="opd_bill" style="height:20px;">
           
                <span class="p_adding">Inventory Transfer</span>
        </div>

<div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
            <div style="float:left; width:200px; margin-left:5px;"><strong>Inventory Name</strong></div>
            <div style="float:left; width:120px;"><strong>Quantity</strong></div>
            <div style="float:left; width:180px;"><strong>Type of Inventory store </strong></div>
            <div style="float:left; width:170px; padding-left:10px;"><strong>Date</strong></div>
            <div style="float:left; width:170px; padding-left:10px;"><strong>time</strong></div>
               <div class="cls" style="margin-bottom:15px;"></div>
<form method="post">
            <div style="float:left; width:200px; ">
                <input type="text" name="m_name" value="<?php echo $inventory_name; ?>" />
            </div>
            <div style="float:left; width:120px; margin-right:5px;">
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" style="width:90px;" />
             </div>
             <div class="l_ft"  style="width:180px;">
                        <select name="type"  style="width:165px; padding:5px 0px">
                          <option value="category" selected> select </option>
                          
                          <option>OPD Store</option>
                          <option>OT Store</option>
                          <option>Miner ot Store</option>
                          <option>General Word Store</option>
                          <option>Semi Private Word Store</option>
                          <option>Private Word Store</option>
                          <option>Lab Store</option>
                          <option>Pharmacy Store</option>
                          <option>VIP Store</option>
                          <option>ICU Store</option>
                      </select>
              </div>
    <div style="float:left; width:180px; "><input type="text" name="date" value="<?php echo $billdate; ?>" style="width:140px;" /></div>
    <div style="float:left; width:180px;"><input type="text" name="time" value="<?php echo $time; ?>"  style="width:140px;"  /></div>
    <div style="float:left; width:90px;"><input type="submit" name="submit11" value="Transfer" class="btn"></div>
      </div>

      </form>
      <div class="cls"></div>     
<?php



if(isset($_POST['submit11']))
             {
              //echo 'naveen';

              $inventory_name=$_REQUEST['m_name'];
              $quantity1=$_REQUEST['quantity'];
              $Inventory_type=$_REQUEST['type'];
              $date=$_REQUEST['date'];
              $time=$_REQUEST['time'];
              $quantity2=$quantity-$quantity1;
                 $in_id=$_SESSION['in_id'];
                 $ot_id=$_SESSION['ot_id'];
                 $type=$_SESSION['type'];
                 $ex_date=$_SESSION['ex_date'];

                 mysql_query("update ot_store set quantity=$quantity2 where ot_id='$ot_id'")or die(mysql_error());
                
                 $q=mysql_query("select ot_id,in_id,quantity from ot_store where in_id='$in_id' and type_of_store='$Inventory_type'");
        $found=mysql_num_rows($q);
        if($found==0)
        {
          
          mysql_query("insert into  ot_store (ot_id,in_id,i_name,type,quantity,ex_date,date,time,type_of_store) VALUES('','$in_id','$inventory_name','$type','$quantity1','$ex_date','$date','$time','$Inventory_type')")or die(mysql_error());


                 header("location: main_store.php");
             }
             else
             {

              $search_value=mysql_fetch_array($q);
             $ot_id=$search_value['ot_id'];
              $quantity=$search_value['quantity'];
              $quantity3=$quantity+$quantity1;


              mysql_query("update ot_store set quantity='$quantity3' where ot_id='$ot_id'")or die(mysql_error());
              header("location: main_store.php");
             }

    }



 ?>
    
</body></html>
