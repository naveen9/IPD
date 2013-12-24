<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
  <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Visit Charges</span>
        </div>
        <div class="add-doc_change"><img src="plus.png" align="absmiddle" />
      		<a href="#" class="ch" >Add Doctor Billing Category </a>
        </div>
        <div class="cls"></div>
   </div>
  <div id="main_center_container">
    <div class="conrecord_feed silver_green">
    	<div class="l_ft chk">&nbsp;</div>
        <div class="l_ft d_name_w"><strong>Doctor</strong></div>
        <div class="l_ft d_name_w"><strong>Billing Item</strong></div>
        <div class="l_ft d_name_w"><strong>Room Category</strong></div>
        <div class="l_ft d_name_w" style="padding-top:2px;"><strong>Amount</strong></div>
    </div>
 <div class="cls"></div>
    <div class="conrecord_feed">
    	<div class="l_ft chk"><input type="checkbox" name="check" style="width:30px;" /></div>
        <div class="l_ft d_name_w">Arun chaudhary</div>
        <div class="l_ft d_name_w">Visit</div>
        <div class="l_ft d_name_w">
        	<select>
        		<option value="General ward">General ward</option>
                <option value="ICU ward">ICU ward</option>
             </select>   
        </div>
        <div class="l_ft d_name_w"><label for="">500</label></div>
        <div class="cls"></div>
    </div>
    <div class="conrecord_feed silver_green">
		<div class="l_ft chk"><input type="checkbox" name="check" style="width:30px;" /></div>
        <div class="l_ft d_name_w">Nitin Gupta</div>
        <div class="l_ft d_name_w">Visit</div>
       <div class="l_ft d_name_w">
        	<select>
        		<option value="General ward">General ward</option>
                <option value="ICU ward">ICU ward</option>
             </select>   
        </div>

        <div class="l_ft d_name_w" style="padding-top:2px;">
        	<strong><label for="">800</label></strong>
        </div>
    </div>

    <div class="cls"></div>
     <div class="conrecord_feed">
    	<div class="l_ft chk"><input type="checkbox" name="check" style="width:30px;" /></div>
        <div class="l_ft d_name_w">Arun chaudhary</div>
        <div class="l_ft d_name_w">Visit</div>
       <div class="l_ft d_name_w">
        	<select>
        		<option value="General ward">General ward</option>
                <option value="ICU ward">ICU ward</option>
             </select>   
        </div>

        <div class="l_ft d_name_w"><label for="">400</label></div>
        <div class="cls"></div>
    </div>

  </div>
  <div class="fill_data">
   			
                <div id="bil_id" style="width:300px;">
                    <span><strong>Date:</strong></span>
                    <span><label for="">04/19/2013</label></span>
				</div>

                <div style="float:right">            
                    <span ><input type="submit" value="Save and Add New" class="btn" /></span>

                     </span>
                      <span><a href="receive_payment.html" class="btn">Save</a></span>
              </div>
  </div>
</div>
</div>
</body>
</html>

