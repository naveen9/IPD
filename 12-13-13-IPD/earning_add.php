<?php
session_start();
error_reporting(0);
include("header.php"); 
include("menubar.php");
include("condb.php");



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

<form method="post" action="other_add.php">
<div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

            <div style="float:left; width:200px; margin-right:5px;"><strong>Earning Group</strong></div>
            <div style="float:left; width:200px; margin-right:5px;"><strong>details</strong></div>
            <div style="float:left; width:120px; margin-right:5px;"><strong>Date</strong></div>
       
            
            
            
           
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:200px; "><input type="text" name="Expenditure_Group" value="" style=
                    width:150px;" />
            </div>
            <div style="float:left; width:200px; "><input type="text" name="details" value="" style=
                    width:150px;"/></div>

               
          <div style="float:left; width:120px; margin-right:20px;"><input type="date" name="date" value="" style="width:150px;"  /></div>
          
          <div style="float:left; width:100px;  margin-left:120px;"><input type="submit" value="Add" name="lig123" class="btn" /></div>
</div>
</form>
<div class="cls"></div>




          <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
             <div style="float:left; width:130px; margin-right:5px;"><strong>S.no</strong></div>
            <div style="float:left; width:200px; margin-right:5px;"><strong>Earning Group</strong></div>
            <div style="float:left; width:200px; margin-right:5px;"><strong>details</strong></div>
            <div style="float:left; width:120px; margin-right:5px;"><strong>Date</strong></div>


                <?php $res3=mysql_query("select * from earning_table ORDER by ear_no DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                   <div style="float:left; width:130px; margin-right:5px;"><?php echo $row3[0];?></div>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[1];?></div>
                          <div style="float:left; width:200px; "><strong><?php echo $row3[2];?></strong></div>
                    <div style="float:left; width:120px; "><?php echo $row3[3];?></div>
                     
                    
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
                 mysql_query("delete from expenditure_table where exp_id='$chk'")or die(mysql_error());
             }
             ?>
  
 <?php
    //include("footer.php");
    unset($_SESSION['msg']);
  ?>