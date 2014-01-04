<?php 


session_start();	
error_reporting(0);
 include ("condb.php");

 
 
$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select ipd_billing from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['ipd_billing'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



	include("header.php");
	include("menubar.php");

  $_SESSION['v_id'];
	 ?>

 <div class="miscel_charge">        
        <ul class="visit_sum" style="color:#FFFFFF; font-weight:600;">Ipd visit summary </ul>
        <div class="cls"></div>
    </div>


<div id="opd_bill" style="height:20px;">
  <div style="float:left; padding-left:1px; font-weight:600">Search Existing Patient</div>
<form method="post" action="search_ipd_visit.php" autocomplete="off">
  <div style="float:right; margin-top:-6px;"> <span>
    <input type="text" name="search1" placeholder="Bed No" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" style="width:60px; padding:1px 5px;"/>
    </span> <span>
    <input type="submit" name="find1" value="Search" class="btn" style="width:100px;"/>
    </span> </div>
</form>
</div>
<?php
if($_REQUEST['error_msg'])
{
$message=$_REQUEST['error_msg'];
    echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';
}
$v_id=$_SESSION['v_id'];
if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}
?>
<div id="main_center_container">
<div class="record_feed">
<form method="post" action="search_ipd_visit.php" autocomplete="off">
<div id="search_exist">
  <div id="search_txt" class="p_adding"></div>
  <div class="p_adding"> <span>
    <input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringCo" onKeyUp="lookupCo(this.value);" onBlur="fillCo();"  />
    </span> <span>
    <input type="submit" name="find" value="Search" class="btn"/>
    </span>
    <div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
      <div align="left" class="suggestionListAd" id="autoSuggestionsListCo"> </div>
    </div>
  </div>
</div>
<div id="add_new_patient">
  <div style="float:left; margin-left:3%; display:block; width:100%; color:#000071"> 
  	<div style="width:35%; float:left;"><strong>Name : <?php echo $_SESSION['p_name']; ?></strong></div>
    <div style="width:30%; float:left;"><strong>Patient ID&nbsp;: <?php echo $_SESSION['p_id']; ?></strong></div>
    <div style="width:30%; float:left;"><strong>IP ID &nbsp;: <?php echo $_SESSION['v_id']; ?></strong></div>
 </div>
    
  <div class="cls"></div>
  <div class="category">
       
        
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Bed No :</span>
            <span>
			<?php echo $_SESSION['bed_no']; ?>
            </span>
        </div>
        
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Mode :</span>
            <span>
			<?php echo $_SESSION['mode']; ?>
            </span>
        </div>
        <div style="width:100px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Panel :</span>
            <span>
			<?php echo $_SESSION['panel']; ?>
            </span>
        </div>
        <div class="cls"></div>
    </div>
</div>

<div class="cls" style="height:2px; background:"></div>

  <div class="miscel_charge">
      <ul class="visit_sum">
          <li><a href="ipd_visit_summary.php">Home</a></li>
          <li><a href="#">Visit</a></li>
          <li><a href="#">Procedure</a></li>
          
        <li><a href="s_search2.php">Diagnostics</a></li>  
        <li><a href="s_search.php">Misc. Charge</a></li>
        <li><a href="s_madison_search1.php">Medicine</a></li>
        <li><a href="s_madison_search.php">Consumamble</a></li>
        <li><a href="s_search_operation_theater.php">Operation</a></li>
        <li><a href="s_search_ip-management.php">Room Management</a></li>
        <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
        
        <li><a href="s_clienthome.php" >Patient document</a></li>
        <li><a href="#"  class="last_li">Discharge</a></li>
      </ul>
      <div class="cls" style="height:2px;"></div> 
    </div>
 
<div style="width:1000px; margin:0px;">
  <div class="pateint_resume">
    <div>
      <div style="padding-left:10px;"><strong>&nbsp;</strong></div>
      <img src="image/patient.jpg" width="150" height="150" align="top" /> </div>
    <div id="patient_field_name">Patient Name : <?php echo $_SESSION['p_name']; ?></div>
    <div class="pt_record">
      <div><strong>Age</strong>&nbsp;:&nbsp;&nbsp;
        <label for=""><?php echo $_SESSION['p_age']; ?></label>
      </div>
      <div><strong>Sex</strong>&nbsp;:&nbsp;&nbsp;
        <label for=""><?php echo $_SESSION['p_gender']; ?></label>
      </div>
      <div>
        <label for id=""></label>
      </div>
    </div>
    <div id="patient_field_name">Contact</div>
    <div class="pt_record">
      <div><strong>Email</strong>&nbsp;:
        <label for="#"><?php echo $_SESSION['p_email']; ?></label>
      </div>
      <div><strong>Contact No</strong>&nbsp;:&nbsp;&nbsp;
        <label for=""><?php echo $_SESSION['p_mob']; ?></label>
      </div>
      <div><strong>Address</strong>&nbsp;:&nbsp;&nbsp;
        <label for=""><?php echo $_SESSION['p_address']; ?></label>
      </div>
    </div>
  </div>
  <div class="main_right_content">
     
    
    <div style="border-bottom:1px solid lightgray; padding:10px 1px; background:#FFFFFF;"> <span><strong>Total Amount &nbsp;:</strong>
      <label for id=""><?php echo $grand_total=$_SESSION['grand_total'] ;?></label>
      <span style=" margin-left:110px; color:#000 "> <strong>Due Amount &nbsp;:&nbsp;</strong> <span style="color:#0066FF;">
      <label for id=""><?php echo $due_amount=$_SESSION['due_amount'] ;?></label>
      </span>
        </span> <span style="margin-left:100px;"><strong>Payment Received &nbsp;:</strong>
      <label for id=""><?php echo $paid_amount1=$_SESSION['paid_amount1'] ;?></label>
      </span>
       </span> </div>
    <div style="border-bottom:1px solid lightgray; padding:10px 1px;  background:#FFFFFF;"> <span><strong>Doctor Incharge :</strong>
      <label for id=""><?php echo $_SESSION['ref_dr'] ;?></label>
      </span> <span style="margin-left:95px;"><strong>Status :</strong>
      <label for id=""><?php echo $_SESSION['stats'] ;?></label>
      </span>
      <span style="margin-left:149px"><a href="s_opd-visit-summary.php">Payment summary</a></span>
       </div>
    <div>
         <div style="width:100%; margin:0 auto;">
      	<div style="background: #AEB4C2;  height:25px; padding:5px 0px 5px 0px;">
                <div class="op_vi_s"><strong>Bill Id</strong></div>
                <div class="op_vi_s"><strong>procedure</strong></div>
                <div class="op_vi_s"><strong>Date </strong></div>
                <div class="op_vi_s" style="margin-right:-20px;"><strong>Amount </strong></div>
                
            <div class="cls"></div>
         </div>
         <?php
         $v_id=$_SESSION['v_id'];
         $select21=("select * from beneficairy_payment where visit_id=$v_id ");
          $result = mysql_query($select21) or die(mysql_error());

            while ($row = mysql_fetch_array($result))
                 {

         ?>
           <form>
            <div style=" height:25px; padding:5px 5px 5px 5px; background:#FFF;">
            <input type="hidden" name="chk" value="<?php echo $row['bill_id'];?>"/>        
            <div class="op_vi_s">&nbsp;<?php echo $row['bill_id'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['procedure_name'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['date'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['amount'];?></div>
            
            	<div class="cls"></div>
			</div>
      </form>

            <?php } ?>
        
       
        
        
        
        
    </div>
    
    
    
    
    <div id="rht_cont" style="background:#FFF;">
      <div id="pro">
        <div id="pur">
          <p>No purchases made against this account</p>
        </div>
        <div id="pay">
          <p>No payments received till now</p>
        </div>
      </div>
    </div>
    <div class="cls"></div>
  </div>
  <div class="cls"></div>
</div>
</body>
</html>
