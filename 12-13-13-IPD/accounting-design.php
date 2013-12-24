<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="mainstyle.css" />
<link rel="stylesheet" type="text/css" href="style1.css" />
<link rel="stylesheet" type="text/css" href="style_by.css" />
<script src="jquery-1.5.js" type="text/javascript"></script>
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
	    <li><a href="dashboard.html">Home</a></li>
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
       	    <li><a href="ipd_visit.html">In Patient List</a></li> 
             <li><a href="admission-form.html">Admission</a></li> 
            <li><a href="ip-management.html">Room Charge</a></li>
            <li><a href="operation-theater.html">Operation Theater</a></li>
            <li><a href="add-ipd-procedure.html">Visit/Procedure</a></li>
           <li><a href="#">Medicine</a></li>
           <li><a href="#">Consumamble</a></li>
           <li><a href="add-ipd-diagnostic.html">Diagnostics</a></li>
		   <li><a href="#">Receive Payment</a></li>		
           <li><a href="#">Discharge</a></li>
           <li><a href="ipd_visit_summary.html">View Summary</a></li>  
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
        <li><a href="accounting.html">Accounting</a>
                
        </li>
        
        <li><a href="">Data Management</a>
        
         
        </li>
       <li><a href="">MIS</a>
        
         
        </li>
         <li><a href="">Hospital Admin</a>
        
         	<ul>
            <li><a href="his_admin.html">Admin Dashboard</a></li>
            <li><a href="role_management.html">Role Management</a></li>
	
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
            <li><a href="clinical-parameters.html">Patient Details</a></li>
            <li><a href="staff_details.html">Staff Details</a></li>
			<li><a href="user_account.html">User Account</a></li>
            <li><a href="personal_details.html">Personal Details</a></li>	
          </ul>
       </li>
    </ul>
  <div class="cls"></div>
</div>
  
  <div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Hospital Accounting</div> 
        <div class="l_ft" style="margin-left:180px;">
        	<input type="radio" name="date" class="big"/>
        </div>
        <div class="f_l">January 2013</div> 
        <div class="todate_w f_l m_l"><input type="radio" name="date" class="big" /></div> 
        <div class="f_l"><input type="date" /></div>
        <div class="todate_w f_l" style="margin:0px 15px 0px 20px;">To</div>
        <div class="f_l"><input type="date" /></div>
   </div>
   <div class="cls"></div>
  <div style="width:100%; margin:0px; padding:0px;">
  <div id="leftcont">
    <ul>
      
      <div class="r">&nbsp;OPD Billing</div>
      <div class="b">
        <ul>
          <li><a href="#">Consultation</a></li>
       </ul>
      </div>
      <div class="r">
        <li>&nbsp;OT Billing</li>
      </div>
      <div class="b">
        <ul>
          <li><a href="#">Surgeon fees</a></li>
          <li><a href="#">Assistant Surgeon fees</a></li>
          <li><a href="#">Anaesthesia fees</a></li>
          <li><a href="#">Referral fees</a></li>
        </ul>
      </div>
      <div class="r">
        <li>&nbsp;IPD Billing</li>
      </div>
      <div class="b">
        <ul>
		  <li><a href="#">Vistt</a></li>
          <li><a href="#">IP Procedure</a></li>
        </ul>
      </div>
      <div class="r">
        <li>&nbsp;Pharmacy Billing</li>
      </div>
      <div class="b">
        <ul>
          <li><a href="#">Follicular Unit Strip Surgery</a></li>
          <li><a href="#">Follicular Unit Extraction</a></li>
          <li><a href="#">Body Hair Extraction</a></li>
          <li><a href="#">Facial Hair Transplant</a></li>
          <li><a href="#">Repair Hair Transplant</a></li>
        </ul>
      </div>
      <div class="r">&nbsp;MIS</div>
      <div class="b">
        <ul>
          <li><a href="#">Request an appointment</a></li>
          <li><a href="#">Ask a question</a></li>
        </ul>
      </div>
      <div class="r">&nbsp;Data Management</div>
      <div class="b">
        <ul>
          <li><a href="#">Articles</a></li>
          <li><a href="#">Patient Education</a></li>
        </ul>
      </div>
      <div class="r">Medical Record</div>
      <div class="b">
        <ul>
          <li><a href="#">-----</a></li>
          <li><a href="#">-----</a></li>
        </ul>
      </div>
    </ul>
  </div>
  <div class="cls"></div>
</div><!-- close main centre container-->  
  <!--<div id="rightcont" style="background:#FFF">
    <div id="fdc">Filtering Doctor Collections</div>
    <div id="inbox">
      <ul>
        <li><a href="#">Doctor 1</a></li>
        <li><a href="#">Doctor2</a></li>
        <li><a href="#">Doctor3</a></li>
        <li><a href="#">Doctor4</a></li>
      </ul>
    </div>
    <div id="fdc">Hospital Share</div>
    <div id="inbox">
      <ul>
        <li><a href="#">Cash</a></li>
        <li><a href="#">Credit</a></li>
        <li><a href="#">Clearence</a></li>
      </ul>
    </div>
  </div>-->
</div>
</div>

</div>
</body>
</html>
