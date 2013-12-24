<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style_by.css"/>
<script src="hide_show.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="includes/paging.css" />
	
</head>
<body>
 <?php include("includes/paging1.php");?>
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

    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Doctors List</span>
        </div>
        <div class="add-doc_change"><img src="plus.png" align="absmiddle" />
      	<a href="#" class="ch">Add Doctor </a>
        </div>
   </div>
   
   <div style="background:url(ccc.png) repeat; padding:5px;"> <span><img src="searchesimg.png" align="absmiddle" />
            <input type="text" class="i" />
            <a href="#"> <img src="searchbuton.png" alt="search" align="absmiddle" /></a>
            <!--<input type="button" value="search" class="btn" />-->
            </span> </div>
    
  <div id="main_center_container">
    <div class="record_feed data_mg color_h">
    	<div class="l_ft" style="padding-top:5px;"><input type="checkbox" value="" style="width:30px; padding:10px;" /></div>
        <div class="l_ft n_w">Doctor Name</div>    
        <div class="l_ft n_w">User</div>
        <div class="l_ft n_w">Address</div>
        <div class="l_ft" style="width:123px">Phone</div>
        <div class="l_ft ip_name">Appointment Link</div>
         <div class="cls"></div>
    </div>
   
   <div class="record_feed data_mg">
    	<div class="l_ft" style="padding-top:5px;"><input type="checkbox" value="" style="width:30px; padding:10px;" /></div>
        <div class="l_ft n_w">Doctor Name</div>    
        <div class="l_ft n_w">User</div>
        <div class="l_ft n_w">Address</div>
        <div class="l_ft" style="width:123px">Phone</div>
        <div class="l_ft ip_name">Appointment Link</div>
         <div class="cls"></div>
    </div>
   
   
   
  </div>
  <div class="fill_data">
   			                
                <div id="bil_id" style="width:300px;">
                    <span><strong>Date:</strong></span>
                    <span><label for="">04/19/2013</label></span>
				</div>

                <div >            
                   
                   
                   
                   
              </div>
  </div>
  <div>
  		 <?php echo  $pagination;?>
  </div>
</div>

</body>
</html>


