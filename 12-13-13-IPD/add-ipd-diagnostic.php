 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

  
  
    <div id="opd_bill"> <span>IPD Billing-Diagnostics</span> <span style="margin-left:60%;">Patient ID&nbsp;&nbsp;:</span>&nbsp;&nbsp;&nbsp;<span>00000</span> </div>
  
  <div id="main_center_container">
    <div class="record_feed">
      <div id="search_exist">
        <div id="search_txt">Search Existing Patient</div>
        <div> 
        <div style="padding-left:5px;">
          <input type="text" name="search" placeholder="PID/Name/Ph/Email"/>
          </div>
         <div style="padding:5px 0px 0px 30px;">
          <!--<a href="#"><img src="searchbuton.png"/></a>-->
          <input type="submit" value="Submit" class="btn" />
          </div> 
     </div>
      </div>
      <div id="add_new_patient"  style="float:left; width:770px;">
        <div id="add_txt" style="margin-left:20px;">Add New Patient</div>
        <form action="#" method="post">
        	<div style="height:30px;">
            	<div class="l_ft add_ipd"><strong>Name</strong></div>
                <div class="l_ft"><input type="text" /></div>
                <div class="l_ft add_ipd"><strong>Age</strong></div>
                <div class="l_ft"><input type="text" maxlength="3" style="width:45px;"/> </div>
                <div class="l_ft add_ipd"><strong>Gender</strong></div>
                <div class="l_ft"><input type="radio" name="gender" checked="checked" /></div>
                <div class="l_ft"><strong>M</strong></div>
                <div class="l_ft"><input type="radio" name="gender" /></div>
                <div class="l_ft"><strong>F</strong></div>
		  		<div class="l_ft add_ipd"><strong>Phone</strong></div>
                <div class="l_ft"><input type="tel" maxlength="10" class="size_input"/></div>
            </div>
            <div class="cls"></div>
         	<div style="height:30px; padding-left:300px">
            	<div class="l_ft add_ipd"><strong>Email</strong></div>
                <div class="l_ft"><input type="email"  class="i"/></div>
              <div class="l_ft add_ipd"><input type="submit" value="Create Visit Id" class="btn"/></div>
          </div>
		<div class="cls"></div>             
    </form>
      </div>
      <div class="cls"></div>
    </div>
    <div class="category">
    <span id="patient_id"  style="margin-left:0px;"><strong>IP ID :</strong></span> <span>
      <label for id="">
      <select id="select_size" class="box">
        <option value="volvo">.12.....................</option>
      </select>
      </label>
      </span> <span style="margin-left:60%"><strong>Bed No</strong></span> <span>
      <select id="select_size" class="box">
        <option value="volvo">......................</option>
      </select>
      </span> </div>
    <div id="opd_bill"> <span>Lab Procedure</span> </div>
    <div style="overflow-y:scroll; overflow-x:hidden; height:150px;">
      <form>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-left:5px;">
          <tbody>
            <tr class="tr_back">
              <th>Procedure</th>
              <th>Doctor Incharge</th>
              <th>Amount</th>
              <th>Discount</th>
              <th>Taxrate</th>
              <th>Total Amount</th>
              <th>Delete</th>
            </tr>
            <tr>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" id="txtChar" onkeypress="return validateNumbersOnly(event)" /></td>
              <td><input type="text" id="txtChar" onkeypress="return validateNumbersOnly(event)"/></td>
              <td><input type="text" id="txtChar" onkeypress="return validateNumbersOnly(event)"/></td>
              <td><input type="text" id="txtChar" onkeypress="return validateNumbersOnly(event)"/></td>
              <td><a href="#">Delete</a></td>
            </tr>
            <tr class="even">
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><a href="#">Delete</a></td>
            </tr>
            <tr>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><a href="#">Delete</a></td>
            </tr>
            <tr class="even">
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><a href="#">Delete</a></td>
            </tr>
            <tr>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><a href="#">Delete</a></td>
            </tr>
            <tr class="even">
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><input type="text" /></td>
              <td><a href="#">Delete</a></td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
    <div id="opd_bill" style="height:20px;">
      <div style=" float:left; width:300px;"></div>
      <div style="float:right; margin-right:85px;">Grand Total :&nbsp;&nbsp;
        <input type="text" placeholder="Rs 1450.00" />
      </div>
    </div>
    
    <div class="fill_data1"> <span>Remarks</span>
      <input type="text" style="width:92%; height:20px;" />
    </div>
    <div class="fill_data">
      <div id="bil_id"> <span><strong>Bill ID :</strong></span> <span>
        <label for="">1234</label>
        </span> </div>
      <div id="save_clear"> <span >
        <input type="submit" value="Save and Add New" class="btn" />
        </span> <span>
        <input type="submit" value="Clear All" class="btn" />
        </span> <span>
        <input type="submit" value="Save"  class="btn"/>
        </span> </div>
    </div>
  </div>
</div>
</body>
</html>
