<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
  <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Select DoctorBillingCategory to change</span>
        </div>
        <div class="add-doc_change"><img src="plus.png" align="absmiddle" />
      	<a href="#" class="ch">Add Doctor Billing Category </a>
        </div>
        <div class="cls"></div>
   </div>
  <div id="main_center_container">
    <div class="conrecord_feed color_h">
    	<div class="l_ft chk"><input type="checkbox" name="check" style="width:30px;" /></div>
        <div class="l_ft d_name_w"><strong>Doctor</strong></div>
        <div class="l_ft d_name_w"><strong>Billing Category</strong></div>
        <div class="l_ft d_name_w"><strong>Roomtype</strong></div>
        <div class="l_ft d_name_w"><input type="text" placeholder="400.00" /></div>
        <div class="cls"></div>
    </div>
    <div class="cls"></div>
    <div class="conrecord_feed">
    	<div class="l_ft chk"><input type="checkbox" name="check" style="width:30px;" /></div>
        <div class="l_ft d_name_w">Doctor</div>
        <div class="l_ft d_name_w">Billing Category</div>
        <div class="l_ft d_name_w">Roomtype</div>
        <div class="l_ft d_name_w"><input type="text" placeholder="400.00" /></div>
        <div class="cls"></div>
    </div>
  </div>
  <div class="fill_data">
   			<div id="bil_id">
                    <span><strong>Bill ID :</strong></span>
                    <span><label for="">1234</label></span>
	</div>
                
                <div id="bil_id" style="width:300px;">
                    <span><strong>Date:</strong></span>
                    <span><label for="">04/19/2013</label></span>
				</div>

                <div >            
                    <span ><input type="submit" value="Save and Add New" class="btn" /></span>
                     <span><input type="submit" value="Clear All" class="btn" />
                     </span>
                      <span><a href="receive_payment.html" class="btn">Save</a></span>
              </div>
  </div>
</div>
</div>
</body>
</html>

