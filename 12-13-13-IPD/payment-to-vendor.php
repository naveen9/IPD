<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style_by.css"/>
<script src="hide_show.js" type="text/javascript"></script>
	
</head>

<body>
<div id="container">
	<div id="header">
    	<div id="logo_side">
        	<img src="ehs-final-logo.png" width="100" height="75" style="padding-top:12px;" />
        </div>
        	<div class="welcome">
            	<span>Welcome,</span>
            <span><strong>Dr.R.K.Nag.</strong></span>
            <span id="sign">
            	<a href="#">Change Password </a>
                <a href="#">&frasl;</a>
                <a href="#">Log Out</a>
             </span> 
            </div>
        <div id="sign_in_up">
        	  
             <div id="power_by"><img src="logo.png" align="right"/></div>
        </div>
        <div class="cls"></div>
    </div>
    
    
<div id="menuu">
   <ul id="coolMenu1">
	    <li><a href="dashboard.php">Home</a></li>
        <li><a href="#">OPD Billing</a>
        <ul>
            <li><a href="appointment-list.html">List of Appointments</a></li>
            <li><a href="consultation.html">Consultation/Procedure</a></li>
             <li><a href="add-opd-diagnostic.html">Diagnostics</a></li>
            <li><a href="healthpackage.html">Health Package</a></li>
            <li><a href="opd-visit-summary.html">Bill Summary</a></li>
           <li><a href="opd_visit.html">Out Patient List</a></li>
           <li><a href="daycare-visit-summary.html">Day Care Visit Summary</a></li>
          </ul>
        </li>
        <li ><a href="#">IPD Billing</a>
      <ul>
       	    <li><a href="ipd_visit.php">In Patient List</a></li> 
             <li><a href="admission-form.php">Admission</a></li> 
            <li><a href="ip-management.php">Room Charge</a></li>
            <li><a href="operation-theater.php">Operation Theater</a></li>
            <li><a href="add-ipd-procedure.php">Visit/Procedure</a></li>
           <li><a href="#">Medicine</a></li>
           <li><a href="#">Consumamble</a></li>
           <li><a href="add-ipd-diagnostic.php">Diagnostics</a></li>
		   <li><a href="#">Receive Payment</a></li>		
           <li><a href="#">Discharge</a></li>
           <li><a href="ipd_visit_summary.php">View Summary</a></li>  
          </ul>
        </li>
        <li><a href="#">Pharmacy </a>
         
        </li>
        <li><a href="#">Diagnostics</a>
          
        </li>
        <li><a href="">Inventory</a>
     <ul>
            <li><a href="#">Main Store</a></li>
            <li><a href="#">OPD Store</a></li>
            <li><a href="#">OT Store</a></li>
            <li><a href="#">Miner OT Store</a></li>
            <li><a href="#">General Ward Store</a></li>
            <li><a href="#">Semi Private Ward Store</a></li>
            <li><a href="#">Private Ward Store</a></li>
            <li><a href="#">Lab Store</a></li>
            <li><a href="#">Pharmacy Store</a></li>
            <li><a href="#">VIP Ward Store</a></li>
            <li><a href="#">ICU Store</a></li>
        </ul>
         
        </li>
        <li><a href="accounting.php">Accounting</a>
          <ul>
            <li><a href="beneficary-payment.php">Doctor Payment</a></li>
		  </ul>
        </li>
        
        <li><a href="">Data Management</a>
        
         
        </li>
       <li><a href="">MIS</a>
        
         
      </li>
         <li><a href="">Hospital Admin</a>
        
       	   <ul>
            <li><a href="his_admin.php">Admin Dashboard</a></li>
            <li><a href="role_management.php">Role Management</a></li>
	
          </ul>
        </li>
        <li><a href="">Medical Records</a>
	  <ul>
            	<li><a href="#">Prescription</a></li>
                <li><a href="#">Discharge Summary</a></li>
                <li><a href="#">Medical Certificate</a></li>
                <li><a href="#">Fitness Certificate</a></li>
                <li><a href="#">Death Certificate</a></li>
                <li><a href="#">Patient File</a></li>
                <li><a href="#">Investigations</a></li>
               
          </ul>
         
        </li>
          <li><a href="#">Claims</a>
        <ul>
            <li><a href="clinical-parameters.php">Patient Details</a></li>
            <li><a href="staff_details.php">Staff Details</a></li>
			<li><a href="user_account.php">User Account</a></li>
            <li><a href="personal_details.php">Personal Details</a></li>	
          </ul>

          </li>

    </ul>

    <div class="cls"></div>
  </div>

    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Payment To Vendor</span>
        </div>
        <div style="float:right; margin-right:10px;">
        	
        </div>
   </div>
    
  <div id="main_center_container">
  <div style="width:600px; margin:50px auto; ">
    	<div>
        <form method="post" action="">
    		<label for=""><strong>Vendor Name &nbsp;&nbsp;</strong><input type="text" name="vendor" value="" /></label> 
        </div>       	
<div style="margin-top:30px;">
			<label for=""><strong>Amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            	<input type="text" name="amount" value="" />
           </label> 
   </div>       	
<div style="margin:30px 0px;">
	<div class="l_ft" style="width:298px; padding-top:30px;"><strong>Vendor Details(phone/Address)</strong></div> 
    <div class="l_ft">
    	<textarea style="width:290px; height:80px; border-radius:5px; border:1px solid lightgray; padding:5px ;"
        	 placeholder="Enter details or Address" name="add" ></textarea>
	</div>
    <div class="cls"></div>
 </div>
  </div>
  </div>
  
  <div class="cls"></div>
  
            <div class="fill_data">
      			<div style="text-align:right; margin-right:20px;">            
                	<span><input type="submit" name="save" value="Save" class="btn" /></span>
                    <span><a href="receive_payment.php" class="btn">Print</a></span>
              </div>
              <form>
                <?php
			  // save data to payment_to vendor table
			  include("condb.php");
			  if(isset($_POST['save'])){
			  $vendor=$_POST['vendor'];
			  $amount=$_POST['amount'];
			  $address=$_POST['add'];
			  mysql_query("insert into payment_to_vendor values('','$vendor','$amount','$address',now())");
			  }
			  ?>
              
  </div>
<div class="cls"></div>  
  <div style="width:600px; border:1px solid lightgray; margin:30px auto">
    <div style="border-bottom:1px solid lightgray; padding:10px 5px;">
            <div class="l_ft n_w"><strong>Name</strong></div>
            <div class="l_ft bill_width1">Amount</div>
            <div class="l_ft bill_width1">Address</div>
            <div class="l_ft bill_width1">Date / Time</div>
            <div class="cls"></div>
    </div>
  <div style="border-bottom:1px solid lightgray; padding:10px 5px;">
                <?php 
  $paymentVendor=mysql_query("select * from payment_to_vendor");
while($paymentValues=mysql_fetch_array($paymentVendor)){
	    
?>
            <div class="l_ft n_w"><strong><?php echo $paymentValues['vendor'];?></strong></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['amount'];?></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['address'];?></div>
            <div class="l_ft bill_width1"><?php echo $paymentValues['date'];?></div>
            <?php }?>
            <div class="cls"></div>
    </div>
</div>
</div>
</div>
</body>
</html>
