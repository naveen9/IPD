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
        
 <div class="miscel_charge">
      <ul class="visit_sum">
        <li><a class="last_li" style="color:#FFFFFF; font-weight:600; ">OT booking</a></li>        
        <div class="cls"></div>
        
      </ul>
</div>

    
      <form action="ot_booking_add.php" method="post">
      <div style="width:100%; background:#CCC; height:20px; padding:5px 0px;">

            <div style="float:left; width:100px; margin-right:5px;"><strong>Date</strong></div>
            <div style="float:left; width:100px; margin-right:5px;"><strong>Time</strong></div>
            <div style="float:left; width:130px; margin-right:5px;"><strong>Procedure Name</strong></div>
            <div style="float:left; width:100px; margin-right:5px;"><strong>OT no.</strong></div>
            <div style="float:left; width:130px; margin-right:5px;"><strong>Surgeon</strong></div>
            <div style="float:left; width:100px; margin-right:5px;"><strong>Anaesthetic</strong></div>
            <div style="float:left; width:130px; margin-right:5px;"><strong>Name</strong></div>
            <div style="float:left; width:80px; margin-right:5px;"><strong>age</strong></div>
            <div style="float:left; width:80px; margin-right:5px;"><strong>sex</strong></div>
            
          
            
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:90px; margin-right:5px;"><input type="date" name="date" value="" style="width:70px;" /></div>
             <div style="float:left; width:90px; margin-right:5px;"><input type="text" name="time" value="<?php echo $time; ?>" style="width:70px;"  /></div>
            
            <div style="float:left; width:155px; "><input type="text" name="procedure_name" value="" style= width:130px;"/></div>
            <div style="float:left; width:75px; "><input type="text" name="ot_no" value="" style= width:50px;"/></div>

                    <div class="l_ft"  style="width:110px;">
                        
                           <select style="width:100px; padding:5px 0px" name="surgeon">
        <option value="category" selected> Surgeon......</option>
        <?php
        $query=mysql_query("select doc_name from doc_master_table ")or die(mysql_error());
        while($op=mysql_fetch_array($query))
        {
            echo '<option>'.$op[0].'</option>';
        }

        ?>
    </select>
                    </div>
           <div style="float:left; width:145px; "><input type="text" name="anaesthetic" value="" style= width:120px;"/></div>

           <div style="float:left; width:115px; "><input type="text" name="name" value="" style= width:90px;"/></div>
           <div style="float:left; width:75px; "><input type="text" name="age" value="" style= width:50px;"/></div>
           <div style="float:left; width:75px; "><input type="text" name="sex" value="" style= width:50px;"/></div>
          
         
         
          <div style="float:left; width:10px;  margin-left:1px;"><input type="submit" value="Add" name="add" class="btn" /></div>




</form>
          <!--<div class="f_l">
            <label for="startDate">Date :</label>
            <input name="startDate" id="startDate" name="expiry_date" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
          </div>-->
            <div class="cls"></div>

            <div class="field_bg"  style="width:100%; background:#FFFF; height:20px; padding:5px 0px;">
            </div>  

           <div class="bill_clr" style="font-weight:600;  background:#AEB4C2; color:#000; font-size:11px;">
                      
                      <div class="l_ft" style="text-align:left; width:150px;">View OT List(Filter)</div>
                      



           <form method="post" >
<input type="submit" name="all" value="ALL"  class="btn" style="height:20px; margin:0px 269px 0px 0px">
  <?php echo '<select placeholder="doctor" name="doctor" style="width:200px; height:20px; margin-left:0px;">';
//********************LIST BY DOCTOR***********************************//
$sel=mysql_query("select doc_name from doc_master_table ");
    while($doc=mysql_fetch_array($sel)){

        echo '<option>'.$doc[0].'</option>';
    }



                       echo '</select>';
?>
<input type="submit" name="doc" value="Doctor" class="btn" style="height:20px; margin-left:5px  " > 

 <?php echo '<select name="date" style="width:200px; height:20px;  margin-left:20px;">';
    $sel_proc=mysql_query("SELECT date  FROM ot_booking ORDER by date DESC")or die(mysql_error());
    while($proc=mysql_fetch_array($sel_proc)){

        echo '<option>'.$proc['date'].'</option>';
    }



    echo '</select>';
    ?>
    <input type="submit" name="proc" value="DATE" class="btn" style="height:20px; margin-left:5px >
  </form>
    </div>
               
         <div class="cls"></div>



           <div class="field_bg"  style="width:100%; background:#CCC; height:20px; padding:5px 0px;">
            <div style="float:left; width:40px; margin-right:5px;"><strong>S.No.</strong></div>
            <div style="float:left; width:130px; margin-right:5px;"><strong>Name</strong></div>
             <div style="float:left; width:40px; margin-right:5px;"><strong>age</strong></div>
            <div style="float:left; width:80px; margin-right:5px;"><strong>sex</strong></div>
            <div style="float:left; width:130px; margin-right:5px;"><strong>Procedure Name</strong></div>
            <div style="float:left; width:80px; margin-right:5px;"><strong>OT no.</strong></div>
            <div style="float:left; width:110px; margin-right:5px;"><strong>Surgeon</strong></div>
            <div style="float:left; width:101px; margin-right:5px;"><strong>Anaesthetic</strong></div>
              <div style="float:left; width:70px; margin-right:5px;"><strong>Date</strong></div>
            <div style="float:left; width:80px; margin-right:5px;"><strong>Time</strong></div>
            
            
            
           
            
               <?php
if(isset($_POST['doc']))
            {
                $doctor=$_POST['doctor'];

                $res3=mysql_query("select * from ot_booking where surgeon='$doctor' ORDER by ot_id DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:40px; margin-right:5px;"><?php echo $row3[0];?></div>
                          <div style="float:left; width:130px; "><strong><?php echo $row3[7];?></strong></div>
                    <div style="float:left; width:40px; "><?php echo $row3[8];?></div>
                      <div style="float:left; width:80px; "><?php echo $row3[9];?></div>
                    <div style="float:left; width:130px;"><?php echo $row3[3];?></div>

                    <div style="float:left; width:80px; "><strong><?php echo $row3[4];?></strong></div>
                    <div style="float:left; width:110px; "><?php echo $row3[5];?></div>
                      <div style="float:left; width:101px; "><?php echo $row3[6];?></div>
                    <div style="float:left; width:70px;"><?php echo $row3[1];?></div>
                     <div style="float:left; width:80px;"><?php echo $row3[2];?></div>
                    
                    <div style="float:left; width:100px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             
             }
             if(isset($_POST['all']))
{
    $doctor=$_POST['alll'];
             $res3=mysql_query("select * from ot_booking  ORDER by ot_id DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:40px; margin-right:5px;"><?php echo $row3[0];?></div>
                          <div style="float:left; width:130px; "><strong><?php echo $row3[7];?></strong></div>
                    <div style="float:left; width:40px; "><?php echo $row3[8];?></div>
                      <div style="float:left; width:80px; "><?php echo $row3[9];?></div>
                    <div style="float:left; width:130px;"><?php echo $row3[3];?></div>

                    <div style="float:left; width:80px; "><strong><?php echo $row3[4];?></strong></div>
                    <div style="float:left; width:110px; "><?php echo $row3[5];?></div>
                      <div style="float:left; width:101px; "><?php echo $row3[6];?></div>
                    <div style="float:left; width:70px;"><?php echo $row3[1];?></div>
                     <div style="float:left; width:80px;"><?php echo $row3[2];?></div>
                    
                    <div style="float:left; width:100px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             }
                if(isset($_POST['proc']))
{
    $date=$_POST['date'];
    $res3=mysql_query("select * from ot_booking where date='$date' ORDER by ot_id DESC");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:40px; margin-right:5px;"><?php echo $row3[0];?></div>
                          <div style="float:left; width:130px; "><strong><?php echo $row3[7];?></strong></div>
                    <div style="float:left; width:40px; "><?php echo $row3[8];?></div>
                      <div style="float:left; width:80px; "><?php echo $row3[9];?></div>
                    <div style="float:left; width:130px;"><?php echo $row3[3];?></div>

                    <div style="float:left; width:80px; "><strong><?php echo $row3[4];?></strong></div>
                    <div style="float:left; width:110px; "><?php echo $row3[5];?></div>
                      <div style="float:left; width:101px; "><?php echo $row3[6];?></div>
                    <div style="float:left; width:70px;"><?php echo $row3[1];?></div>
                     <div style="float:left; width:80px;"><?php echo $row3[2];?></div>
                    
                    <div style="float:left; width:100px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             }
             ?>
 <?php



            
             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from ot_booking where ot_id='$chk'")or die(mysql_error());
                 header('location :ot_booking.php');
             }
    //include("footer.php");
    unset($_SESSION['msg']);
  ?>