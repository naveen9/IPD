<!--<title>Consultation</title>
<body>
<div id="container">-->
<?php
session_start();
error_reporting(0);
include("header.php"); 
include("menubar.php");
include("condb.php");


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
        <div id="opd_bill" style="height:40px;">
            <div class="b_register">
                <div class="l_ft w_idth"  style="width:100px;"><a href="hospital_register.php">Birth Register</a></div>
                <div class="l_ft w_idth"  style="width:140px;"><a href="death_reg.php">Death Register</a></div>
                <div class="l_ft w_idth"  style="width:140px;"><a href="abortion_reg.php">Abortion Register</a></div>
                <div class="l_ft w_idth"  style="width:90px;"><a href="mlc_reg.php">MLC</a></div>
                <div class="l_ft w_idth"  style="width:80px;"><a href="ligatain_reg.php">Ligatain</a></div>
                <div class="l_ft w_idth"  style="width:200px;"><a href="preventable_reg.php">Preventable Diseases</a></div>
            </div>
        <div style="float:right; margin-right:10px;">

         </div>
    <div class="cls"></div>
    </div>
    <div style="width:100%; height:20px; padding:10px 0px; background:#CCC; font-weight:600">
        <span class="p_adding">Abortion Register</span>
    </div>
      <form action="abortion.php" method="post">
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

            <div style="float:left; width:200px; margin-right:5px;"><strong>Patiant_name</strong></div>
            <div style="float:left; width:70px; margin-right:5px;"><strong>Age</strong></div>
            
          <div style="float:left; width:200px; margin-right:5px;"><strong>Add</strong></div>
          <div style="float:left; width:150px; margin-right:5px;"><strong>Type of Abortion</strong></div>
            <div style="float:left; width:150px; margin-right:5px;"><strong>Date</strong></div>
            
           
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:180px; "><input type="text" name="patiant_name" value="" style=
                    width:150px;" />
            </div>
            <div style="float:left; width:80px; "><input type="text" name="age" value="" style=
                    width:40px;"/></div>

                    <div style="float:left; width:200px; "><input type="text" name="add" value="" style=
                    width:170px;"/></div>

                    <div class="l_ft"  style="width:150px;">
                        <select name="type_of_a"  style="width:130px; padding:5px 0px">
                          <option value="category" selected> type of abortion</option>
                          
                          <option>MTP</option>
                          <option>D&C</option>
                       </select>
                    </div>
           
          
          <div style="float:left; width:150px; margin-right:4px;"><input type="date" name="date" value="" style="width:100px;"  /></div>
          
          <div style="float:left; width:80px;  margin-left:2px;"><input type="submit" value="Add" name="abortion" class="btn" /></div>




</form>
          <!--<div class="f_l">
            <label for="startDate">Date :</label>
            <input name="startDate" id="startDate" name="expiry_date" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
          </div>-->
            

         <div class="cls"></div>


           <div class="field_bg"  style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
           <div style="float:left; width:70px; margin-right:5px;"><strong>S.no.</strong></div>
              <div style="float:left; width:200px; margin-right:5px;"><strong>Patiant_name</strong></div>
            <div style="float:left; width:70px; margin-right:5px;"><strong>Age</strong></div>
            
          <div style="float:left; width:200px; margin-right:5px;"><strong>Add</strong></div>
          <div style="float:left; width:150px; margin-right:5px;"><strong>Type of Abortion</strong></div>
            <div style="float:left; width:150px; margin-right:5px;"><strong>Date</strong></div>


                <?php $res3=mysql_query("select * from abortion ORDER by a_id DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                   <div style="float:left; width:70px; margin-right:5px;"><?php echo $row3[0];?></div>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[1];?></div>
                          <div style="float:left; width:70px; "><strong><?php echo $row3[2];?></strong></div>
                    <div style="float:left; width:200px; "><?php echo $row3[3];?></div>
                      <div style="float:left; width:150px; "><?php echo $row3[4];?></div>
                    <div style="float:left; width:150px;"><?php echo $row3[5];?></div>
                    
                    <div style="float:left; width:70px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             ?>
             <?php
             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from abortion where a_id='$chk'")or die(mysql_error());
             }
             ?>
  
 <?php
    //include("footer.php");
    unset($_SESSION['msg']);
  ?>