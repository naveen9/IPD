
<?php
ob_start();
error_reporting(0);
session_start();
  include("condb.php");
  
   $uid=$_SESSION['uid'];
   
if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select reception from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['reception'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
include("header.php");
    include 'varfilter.php';
    include("menubar.php");
include("condb.php");

if(empty($uid))
{
    header('location:index.php');
    exit();
}
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

date_default_timezone_set ("Asia/Calcutta");
$billdate=date("d-m-y");
$time=date("H:i:s");
?>
<?php echo "<br/>"; echo $_SESSION['msg'];  ?>
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
        <div class="cls"></div>
        <div class="miscel_charge as">
                <a href="hospital_register.php">Birth Register</a>
                <a href="death_reg.php">Death Register</a>
                <a href="abortion_reg.php">Abortion Register</a>
                <a href="mlc_reg.php">MLC</a>
                <a href="ligatain_reg.php">Ligatain</a>
                <a href="preventable_reg.php">Preventable Diseases</a>
       </div>
    <div style="width:100%; height:20px; padding:10px 0px; background:#CCC; font-weight:600">
        <span class="p_adding">Birth Register</span>
    </div>
      <form action="hosp_register.php" method="post">
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

            <div style="float:left; width:100px; margin-right:5px;"><strong>S.No.</strong></div>
            <div style="float:left; width:200px; margin-right:5px;"><strong>Mother Name</strong></div>
            <div style="float:left; width:150px; margin-right:5px;"><strong>Type of Birth</strong></div>
          <div style="float:left; width:150px; margin-right:5px;"><strong>Date</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Time</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Status</strong></div>
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:100px; "><input type="text" name="s_no" value="" style=
                    width:60px;" />
            </div>
            <div style="float:left; width:200px; "><input type="text" name="mother_name" value="" style=
                    width:150px;"/></div>

                    <div class="l_ft"  style="width:150px;">
                        <select name="type_of_b"  style="width:135px; padding:5px 0px">
                          <option value="category" selected> type of birth</option>
                          
                          <option>Cesarean</option>
                          <option>Delivery</option>
                       </select>
                    </div>
           
          <div style="float:left; width:150px; margin-right:5px;"><input type="date" name="date" value="" style="width:120px;" /></div>
          <div style="float:left; width:180px; margin-right:5px;"><input type="text" name="time" value="<?php echo $time; ?>" style="width:120px;"  /></div>
          <div class="l_ft"  style="width:100px;">
          <select name="status" style="width:95px; padding:5px 0px">
           <option value="category" selected> status</option>
        
        <option>Dead</option>
        <option>Living</option>
        
      
    </select>
</div>
          <div style="float:left; width:80px;  margin-left:2px;"><input type="submit" value="Add" name="add" class="btn" /></div>




</form>
          <!--<div class="f_l">
            <label for="startDate">Date :</label>
            <input name="startDate" id="startDate" name="expiry_date" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
          </div>-->
            

         <div class="cls"></div>


           <div class="field_bg"  style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
              <div style="float:left; width:100px; margin-right:5px;"><strong>S.No.</strong></div>
            <div style="float:left; width:200px; margin-right:5px;"><strong>Mother Name</strong></div>
            <div style="float:left; width:150px; margin-right:5px;"><strong>Type of Birth</strong></div>
          <div style="float:left; width:150px; margin-right:5px;"><strong>Date</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Time</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Status</strong></div>


                <?php $res3=mysql_query("select * from birth ORDER by b_id DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:100px; margin-right:5px;"><?php echo $row3[1];?></div>
                          <div style="float:left; width:200px; "><strong><?php echo $row3[2];?></strong></div>
                    <div style="float:left; width:150px; "><?php echo $row3[3];?></div>
                      <div style="float:left; width:150px; "><?php echo $row3[4];?></div>
                    <div style="float:left; width:180px;"><?php echo $row3[5];?></div>
                    <div style="float:left; width:100px;"><?php echo $row3[6];?></div>
                    <div style="float:left; width:100px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             ?>
             <?php
             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from birth where b_id='$chk'")or die(mysql_error());
             }
             ?>
  
 <?php
    //include("footer.php");
    unset($_SESSION['msg']);
  ?>