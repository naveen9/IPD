<?php
session_start();
error_reporting(0);
include("header.php"); 
include("menubar.php");
include("condb.php");
//echo naveen;
if($_REQUEST['error_msg'])
{
$message=$_REQUEST['error_msg'];
echo $message;
}
$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['visit_id'];
 ?>

  <!--header bar End -->
    <!-- center part start -->
<form method="post" action="search_add-patient.php">
  <div style="width:1000px; margin:0 auto;">
  <div style="background:#ECF5FF; padding:10px; margin:0px;">
      <span><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();"  /></span>
      <span><input type="submit" name="find" value="Search" class="btn"/></span>

    <span style="margin-left:150px;">Visit ID :<label for="" id="na"><?php echo $_SESSION['visit_id'];?></label> </span>
    <span style="margin-left:150px;">Patient ID : <label for="" id="na"><?php echo $_SESSION['p_id'];?></label></span>
  </div>
</form>
<?php

//echo $p_id;
//script for add patient in the database
if(isset($_POST['add-patient']))
{
    $p_name=$_POST['p_name'];
    $p_age=$_POST['p_age'];
    $sex=$_POST['sex'];
    $p_date=$_POST['doa'];
    $bed_no=$_POST['bed_no'];
    $phone=$_POST['phone'];
    $refdr=$_POST['refdr'];
    $advance=$_POST['advance'];
    if(!empty($p_name))
    {
        $query=mysql_query("insert into ipd_admit values ('NULL','$p_name','$p_age','$sex','$p_date','$phone','$refdr','$bed_no','$advance')")or die(mysql_error());
        $msg="Patient Admitted successful ";
    }
    else
    {
        $msg="Please Enter Patient name";
    }
}
?>

  		      <?php
      include("condb.php");
      ?>
      <?php echo $msg; ?>
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">
      	<form method="post">
        	<div style="float:left; width:170px; margin-right:5px;"><strong>Patient Name</strong></div>
            <div style="float:left; width:50px; "><strong>Age</strong></div>
            <div style="float:left; width:120px; text-align:center; "><strong>Sex</strong></div>
           	<div style="float:left; width:165px;"><strong>Date of Admission</strong></div>
            <div style="float:left; width:80px; text-align:left"><strong>Phone</strong></div>
            <div style="float:left; width:120px; "><strong>Doctor</strong></div>
            <div style="float:left; width:65px; text-align:left "><strong>Bed No</strong></div>
            <div style="float:left; width:100px;"><strong>Advance(&#x20B9;)</strong></div>
            <div style="float:left; width:80px;"><strong>IPD ID: <?php
                    $id=mysql_query("select max(patient_id) from ipd_admit ")or die(mysql_error());
                    $data=mysql_fetch_array($id);
                    echo $data[0];

                    ?></strong></div>


            <div class="cls" style="margin-bottom:15px;"></div>

    	<div style="float:left; width:170px; overflow:hidden">
        	<input type="text" name="p_name" value="<?php echo $_SESSION['p_name'];?>"  style="width:140px;"/>
        </div>
        <div style="float:left; width:50px;"><input type="text" name="p_age" value="<?php echo $_SESSION['p_age'];?>" style="width:30px;" /></div>
            <div style="float:left; width:120px;   padding-top:7px;  text-align:center"><input type="radio" name="sex" value="Male" checked <?php if($_SESSION['p_gender']=='Male'){echo "checked";} ?> /><strong>M</strong>&nbsp;&nbsp;<input type="radio" name="sex" value="Femele" <?php if($_SESSION['p_gender']=='Femele'){echo "checked";} ?> /><strong>F</strong></div>

           	<div style="float:left; width:160px; "><input type="date" name="doa" value="<?php echo $_SESSION['doa'];?>" class="jag_txt1" style="width:135px;" /></div>
             <div style="float:left; width:95px;  "><input name="phone" value="<?php echo $_SESSION['p_mob'];?>" type="text"  style="width:70px;"/></div>
            <div style="float:left; width:120px; margin-left:0px  "><input name="refdr" value="<?php echo $_SESSION['ref_dr'];?>" type="text" style="width:90px;"/></div>
            <div style="float:left; width:65px;"><input type="text"  style="width:40px;" name="bed_no" value="<?php echo $_SESSION['bed_no'];?>"  class="jag_txtf">
             </div>
            <div style="float:left; width:90px;"><input name="advance" value="<?php echo $_SESSION['advance_pay'];?>"  type="text"   style="width:55px;" /></div>
            <div style="float:left; width:120px; margin-left:0px;"><input type="submit" name="add-patient" value="Add Patient" class="btn"/></div>
            <div class="cls" style="margin-bottom:20px;"></div>



    	<div style="float:left; width:170px; overflow:hidden"></div>
        <div style="float:left; width:50px;"></div>
        <div style="float:left; width:120px; padding-top:7px;  text-align:center"></div>
            <div style="float:left; width:160px; "></div>
             <div style="float:left; width:95px;"></div>
            <div style="float:left; width:120px; margin-left:0px"></div>
            <div style="float:left; width:65px;"> </div>
            <div style="float:left; width:90px;"></div>
            <div style="float:left; width:120px; margin-left:0px;"></div>
            <div class="cls" style="margin-bottom:20px;"></div>
        </form>
      </div>
      <div class="cls" style="margin-top:20px;"></div>


  
      
  </div>
<form action="add-patient1.php" method="post">
<div >
<span><input type="submit" name="cancel" value="Cancel" class="btn" />
       </span>
</div></form>
    <?php
    unset($_SESSION['p_id']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['doa']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['ref_dr']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['advance_pay']);
    ?>

<?php
include("footer.php");
?>
