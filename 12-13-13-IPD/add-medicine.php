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

 ?>

  <script type="text/javascript">
    $(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
     <!-- center part start -->
  <div style="width:990px; margin:0 auto;">
      <?php echo "<br/>"; echo $_SESSION['msg'];  ?>
  		<div style="width:100%; height:20px; padding:10px 0px; background:#CCC; border-radius:6px;">

        	<form action="add-medicine-process.php" method="post">


      </div>
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

        	<div style="float:left; width:200px; margin-right:5px;"><strong>Medicine Name</strong></div>
            <div style="float:left; width:150px; margin-right:5px;"><strong>Batch No</strong></div>
           	<div style="float:left; width:130px; margin-right:5px;"><strong>Pack Price</strong></div>
          <div style="float:left; width:130px; margin-right:5px;"><strong>Pack Of</strong></div>
          <div style="float:left; width:130px; margin-right:5px;"><strong>Quantity</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Expiry Date</strong></div>
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:200px; "><input type="text" name="m_name" value="" /></div>
            <div style="float:left; width:150px; "><input type="text" name="batch_no" value="" style=
                    width:120px;"/></div>
            <div style="float:left; width:130px; margin-right:5px;"><input type="text" name="mrp" value="" style="width:90px;" /></div>
          <div style="float:left; width:130px; margin-right:5px;"><input type="text" name="pack" value="" style="width:90px;" /></div>
          <div style="float:left; width:130px; margin-right:5px;"><input type="text" name="quantity" value="" style="width:90px;" /></div>
          <div style="float:left; width:110px; margin-right:5px;"><input type="text" name="expiry_date" placeholder="mm-yyyy" style= width:120px; /></div>
          <!--<div class="f_l">
            <label for="startDate">Date :</label>
            <input name="startDate" id="startDate" name="expiry_date" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
          </div>-->
           	<div style="float:left; width:80px;  margin-left:40px;"><input type="submit" value="Add" name="add" class="btn" /></div>

          </form>
  </div>

  </div>
 <?php
 	include("footer.php");
    unset($_SESSION['msg']);
  ?>