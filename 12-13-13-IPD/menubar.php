<?php
ob_start();
session_start();
?>
<div class="cls"></div>
<div id="menuu">
   <ul id="coolMenu1">
	    <li><a href="dashboard.php">Dashboard</a></li>
            
            
            <li><a href="#">Reception</a>
            <ul>
                <li><a href="session_out.php?page=in">In Patient List</a></li> 
                <li><a href="room_booking.php">Room booking</a></li>
                <li><a href="ot_booking.php">OT booking</a></li>
                <li><a href="session_out.php?page=ad">Admission</a></li>
                <li><a href="patient-demographics.php">Demographics</a></li>
                <li><a href="session_out.php?page=pa">Patient Documents</a></li>
                <li><a href="session_out.php?page=bi">Payment summary</a></li>
                

           </ul>
        </li>
        <li ><a href="#">IPD Billing</a>
        <ul>
            
             
            <li><a href="session_out.php?page=vi">Visit</a></li>
            <li><a href="session_out.php?page=pr">Procedure</a></li>
            <li><a href="session_out.php?page=di">Diagnostics</a></li>
       	    
             <li><a href="session_out.php?page=mc">Miscellaneous Charges</a></li>
             <li><a href="session_out.php?page=me">Medicine</a></li>
             <li><a href="session_out.php?page=co">Consumamble</a></li>

            <li><a href="session_out.php?page=op">Operation Theater</a></li>
            
            
            
           
            <li><a href="session_out.php?page=ro">Room Management</a></li>

           <li><a href="session_out.php?page=re">Receive Payment</a></li>
          
           <li><a href="session_out.php?page=vii">Search Patient</a></li>  
        
             
            
            
            
           <!--<li><a href="session_out.php?page=ou">Out Patient List</a></li>-->
		   
          </ul>
        </li>

        <li><a href="#">Pharmacy </a>
          <ul>
       	    <li><a href="medicine_list.php">Medicine List</a></li>
             <li><a href="add-medicine.php">Add medicine</a></li> 
             <li><a href="session_out.php?page=medicine">Dispense Medicine</a></li> 
             
          </ul>
        </li>

         <li><a href="Lab-system/create_lab_report.php">Diagnostics</a></li>
        <li><a href="#">Inventory</a>
       <ul>
            <li><a href="main_store.php">Main Store</a></li>
            <li><a href="opd_inventrey.php">OPD Store</a></li>
            <li><a href="ot_store.php">OT Store</a></li>
            <li><a href="miner_ot_store.php">Miner OT Store</a></li>
            <li><a href="general_ward_store.php">General Ward Store</a></li>
            <li><a href="semi_private_wardstore.php">Semi Private Ward Store</a></li>
            <li><a href="private_wardstore.php">Private Ward Store</a></li>
            <li><a href="lab_store.php">Lab Store</a></li>
            <li><a href="pharmacy_store.php">Pharmacy Store</a></li>
            <li><a href="vip_ward_store.php">VIP Ward Store</a></li>
            <li><a href="icu_store.php">ICU Store</a></li>
        </ul>
         
        </li>
        <li><a href="#">Accounting</a>
        <?php
       // $uname=$_SESSION['uname'];
        
        //if($uname=="user")
       // {
            
        //}
       // else
       // {
        ?>
        
        
          
             <ul>
		<li><a href="settle-visit.php">Settle Ip Visit</a>	
                 <li><a href="beneficary-payment.php">Doctor Accounting</a></li>
                 <li><a href="doctor_payment_calculater.php">Doctor Payment Calculator</a>
                 <li><a href="beneficary-payment-new.php">Doctor Payment</a>
                 <li><a href="staff-payment.php">Staff Salary </a>  
                  <li><a href="vender_bill.php">Vendor Payment </a>  
                  <li><a href="other-expanditure.php">General Expenditure</a>
                  <!--<li><a href="#">Other Expenditure</a>--> 
                  <li><a href="other-earning.php">Earning</a>
                     <li><a href="monthly_accounts.php">Monthly Accounts</a>

             		
             </li>
                 
            
   			</ul>
        </li>
        <?php //} ?>
        
       <li><a href="#">Data Mx</a>
        <ul>
            <li><a href="doctors-list.php">Doctors</a></li>
            <li><a href="procedure-list.php">Procedures</a></li>
            <li><a href="master_consultation.php">Consultation</a></li>
            <li><a href="pc-list.php">Panel and Corporate</a></li>
            <li><a href="source-list.php">Source</a></li>
            <li><a href="Admin_beds.php">BEDS</a></li>

       	 </ul>
      </li>
       <li><a href="#">MIS</a>
       <ul>
       <li><a href="op-list.php">IPD-LIST</a> </li>
       <li><a href="beneficary-payment_demo.php">Doctor Collection</a></li>
             
                 
            
        </ul>
        
         
        </li>
         <li><a href="">Admin</a>
        
         	<ul>
            <li><a href="User_veri.php">Admin Dashboard</a></li>
            <li><a href="User_man.php">Role Management</a></li>
            <li><a href="hospital_register.php">Hospital Register</a></li>
            <li><a href="#">Attendance</a></li>
            <li><a href="employe.php">Salary</a></li>
	
          </ul>
        </li>
        <li><a href="">Records</a>
			<ul>
              <li><a href="medical_clienthome.php">medical records</a></li>       
            	<!-- <li><a href="doctor-login.html">Prescription</a></li>
                <li><a href="#">Discharge Summary</a></li>
                <li><a href="#">Medical Certificate</a></li>
                <li><a href="#">Fitness Certificate</a></li>
                <li><a href="#">Death Certificate</a></li>
                <li><a href="#">Patient File</a></li>
                <li><a href="#">Investigations</a></li> -->
               
            </ul>
         
        </li>
          <li><a href="#">Claims</a>
         <ul>
            <li><a href="patient-details.php">Patient Details</a></li>
            <li><a href="requition.php">Requisition forms</a></li>
            <li><a href="query-form.php">Query</a></li>
           <!-- <li><a href="#">Query Repley</a></li>-->
            <li><a href="preapproval.php">preapproval letter</a></li>
            <!-- <li><a href="#">acceptance Latter </a></li>
            <li><a href="#">Discharge summary </a></li>
            <li><a href="#">Final Bill </a></li>
            <li><a href="#">Search Patient </a></li> -->
            <!--<li><a href="staff_details.html">Staff Details</a></li>-->
			<!--<li><a href="user_account.html">User Account</a></li>-->
            <!--<li><a href="personal_details.html">Personal Details</a></li>-->	
          </ul>

          </li>

    </ul>

    <div class="cls"></div>
  </div>
  
  
  