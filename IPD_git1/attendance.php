
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
                        $('.date-picker').datepicker({
                            changeMonth: true,
                            changeYear: true,
                            showButtonPanel: true,
                            dateFormat: 'mm yy',
                            onClose: function(dateText, inst) {
                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).datepicker('setDate', new Date(year, month, 1));
                                var fdate;
                                var edate;
                                if (month > 2)
                                {
                                    fdate = year;
                                    edate = ++year;
                                }
                                else {
                                    fdate = year - 1;
                                    edate = year;
                                }
                                document.getElementById('f_date').innerHTML = fdate;
                                document.getElementById('e_date').innerHTML = edate;
                            }
                        });

                    });
                    /*style="border:1px solid lightgray"*/
                    $(document).ready(function() {
                        $("#line").css("border-bottom", "1px solid lightgray");
                    });

                </script>

                <style>
                    .ui-datepicker-calendar {
                        display: none;
                    }
                </style>
        
    <div style="width:100%; height:20px; padding:10px 0px; background:#CCC; font-weight:600">
        <span class="p_adding">Attendance</span>
       <form method="post">
        <div class="f_l" style=" margin-left:450px;">
		<span style="margin-left:5px;">Staff Name</span>
            <span>
            	<select id="select_size" name="S_name">
				<?php $docQuery=mysql_query("select * from  employe");
	   
	   ?>
                    <?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['emp_id']; ?>"><?php echo $docValues['emp_name'].'&nbsp;&nbsp;'.$docValues['emp_id']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
			    <input name="Date" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" placeholder="month-year" />
		</div> 
             
          <div style="float:left; width:80px;  margin-left:40px;"><input type="submit" value="Search" name="search" class="btn" /></div>
          
     </form>
    </div>
<div class="cls"></div>
      <form action="atten_register.php" method="post">
      <div style="width:100%; background:#91C8FF; height:25px; padding:10px 0px;">

            <div class="f_l">
		<span style="margin-left:5px;">Staff Name</span>
            <span>
            	<select id="select_size" name="emp_name">
				<?php $docQuery=mysql_query("select * from  employe");
	   
	   ?>
                    <?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['emp_id']; ?>"><?php echo $docValues['emp_name'].'&nbsp;&nbsp;'.$docValues['emp_id']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
            </div>
            <div class="f_l" style=" margin-left:40px;">
				<label for="startDate">Absent Date:</label>
			    <input type="date" name="date" value="" style="width:120px;" />
		</div> 
             
          <div style="float:left; width:80px;  margin-left:40px;"><input type="submit" value="Add" name="add" class="btn" /></div>

      </div>


</form>
          <!--<div class="f_l">
            <label for="startDate">Date :</label>
            <input name="startDate" id="startDate" name="expiry_date" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
          </div>-->
          
         <div class="cls"></div>


           <div class="field_bg"  style="width:100%; background:#91C8FF; height:20px;margin: 5px 0px 0px 0px; padding:15px 0px;">
              <div style="float:left; width:100px; margin-right:30px;"><strong>Staff Name</strong></div>
            <div style="float:left; width:100px; margin-right:30px;"><strong>Date</strong></div>
            <div style="float:left; width:150px; margin-right:30px;"><strong>Total Absent Date</strong></div>
          <div style="float:left; width:150px; margin-right:30px;"><strong>Total working Day</strong></div>
            
           </div>
         <?php
              if(isset($_POST['search']))
             {
                   $S_name = $_POST['S_name'];
                   $Date = $_POST['Date'];
                  $data = explode(" ", $Date);
                                $month = $data[0];
                             $year = $data[1];
                  $res3=mysql_query("SELECT A.att_id, A.emp_id, COUNT( A.date )AS absentDay, E.emp_name, A.date FROM attendace AS A, employe AS E WHERE A.emp_id = E.emp_id and A.emp_id='$S_name'and MONTH(A.date) ='$month' and YEAR(A.date)='$year'")or die(mysql_error());
                while($row3=mysql_fetch_array($res3)){ ?>
         <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:100px; margin-right:5px;"><?php echo $row3[3];?></div>
                          <div style="float:left; width:200px; "><strong><?php echo $row3[4];?></strong></div>
                    <div style="float:left; width:150px; "><?php echo $row3[2];?></div>
                    <div style="float:left; width:150px; "><input type="text"  name="working_day" style=
                    width:60px;" /></div>
                    
                    <!--<div style="float:left; width:150px; "><input type="submit"name="del" value="delete" class="btn"/></div>-->
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        <?php
             }
             ?>
            
                </form>
             
               <?php
             }
             else
             {
             ?>
   

                <?php $res3=mysql_query("SELECT A.att_id, A.emp_id, COUNT( A.date ) AS absentDay, E.emp_name, A.date FROM attendace AS A, employe AS E WHERE A.emp_id = E.emp_id GROUP BY A.att_id");
                while($row3=mysql_fetch_array($res3)){  ?>

                  <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                   <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:100px; margin-right:5px;"><?php echo $row3[3];?></div>
                          <div style="float:left; width:200px; "><strong><?php echo $row3[4];?></strong></div>
                    <div style="float:left; width:150px; "><?php echo $row3[2];?></div>
                    <div style="float:left; width:150px; "><input type="text"  name="working_day" style=
                    width:60px;" /></div>
                    
                    <!--<div style="float:left; width:150px; "><input type="submit"name="del" value="delete" class="btn"/></div>-->
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        
             <?php
             }}
             ?>
                </form>
                
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