<!--<title>Addmission</title>
<script src="includes/jquery.min.js" type="text/javascript"></script>

<body>
<div id="container">-->
<?php
error_reporting(0);
require_once 'head.php';
require_once 'menu.php';
?>
<div id="opd_bill"> <span>IPD Admission form </span> </div>



<div id="main_center_container" style="background:#F00">
    <div class="record_feed">
        <?php
        if($_REQUEST['error_msg'])
        {
            $message=$_REQUEST['error_msg'];
            echo $message;
        }
        ?>

        <form method="post" action="ippatient_search.php">

            <div id="search_exist">
                <div id="search_txt" class="p_adding">Search Existing Patient</div>
                <div class="p_adding">
                    <span><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();"  /></span>
                    <span><input type="submit" name="find" value="Search" class="btn"/></span>
                    <div align="left" class="suggestionsBox1" id="suggestions1" style="display:none;">
                        <div align="left" class="suggestionList1" id="autoSuggestionsList1"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        
        <div id="add_new_patient"  style="float:left; width:1060px;">
        	<div id="add_txt" style="margin-left:20px;">Add New Patient</div>
            <form action="ipd_admission_preprocessor.php" method="post">
            	<table cellpadding="0" cellspacing="" border="0" width="1040" style="margin-left:20px;">
           	  <tr>
                    	<td width="52" class="t">Name</td>
                      <td class="t"><input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/></td>
                      <td width="108" class="t">&nbsp;&nbsp;Age</td>
                      <td width="134"><input type="text" maxlength="3" class="size_box" value="<?php echo $_SESSION['p_age'];?>" id="txtChar" onKeyPress="return validateNumbersOnly(event)"  />Years&nbsp;&nbsp;&nbsp;</td>
                      <td width="68" class="t">Gender</td>
                      <td width="134"><input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                          <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong></td>
                      <td width="57" class="t">Phone</td>
                      <td width="134"><input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:90px;" value="<?php echo $_SESSION['p_mob'];?>" />
                          <?php $pid= $_SESSION['p_id'];?></td>
                      <td width="57" class="t">Email</td>
                      <td width="134"><input type="email" value="<?php echo  $_SESSION['p_email'];?>" class="i"/></td>
                      <td width="152"><input type="submit" name="cipid" value="Create IP Id" class="btn"/></td>
                      <td width="152"><input type="submit" name="cls" value="Clear" class="btn"/></td>
                  </tr>
                </table>
          </form>
        </div>
        <div class="cls"></div>
    </div>
      
      
      
      
      <div class="right_top"><strong>Patient Profile</strong></div>
      <div style="width:100%; margin:0 auto;">
    <div class="pateint_resume">
          <div>
            <div><strong>Patient ID :<?php echo  $_SESSION['p_id'];?></strong></div>
            <img src="Photo-0269.jpg" width="80" height="80" align="top" /> </div>
          <div id="patient_field_name">Patient Name : <?php echo  $_SESSION['p_name'];?></div>
          <div class="pt_record">
          	<div><strong>Age</strong>&nbsp;:&nbsp;&nbsp;<label for=""><?php echo  $_SESSION['p_age'];?></label></div>
            <div><strong>Sex</strong>&nbsp;:&nbsp;&nbsp;<label for=""><?php echo  $_SESSION['p_gender'];?></label></div>
            <!--<div><strong>DOB</strong>&nbsp;:&nbsp;&nbsp;<label for="">13 march,1978</label></div>-->
            <div>
              <label for id=""></label>
            </div>
          </div>
          <div id="patient_field_name">Contact</div>
          <div class="pt_record">
          <div><strong>Email</strong>&nbsp;:<label for="#"><?php echo  $_SESSION['p_email'];?></label></div>
            <div><strong>Contact No</strong>&nbsp;:&nbsp;&nbsp;<label for=""><?php echo  $_SESSION['p_mob'];?></label></div>
            
           
        </div>
        </div>
    <div class="right-content">
          <div class="right_top"> <span><strong>IPD Admission form </strong></span> </div>
          <div style="border:1px solid lightgray;">
        
       <div style="float:left; width:500px; padding:15px">
        <form action="#" method="get">
              <div class="add_mision_lft"><strong>Doctor Name:</strong></div>
                 <div class="add_mision_lft"><input type="text" class="i"/></div>
                

                  <div class="add_mision_lft">Date of Admission</div>
                  <div class="add_mision_lft">
                      <input type="date" class="i" />
                    </div>
                
            
                  <div class="add_mision_lft">Expected Discharge Date</div>
                  <div  class="add_mision_lft"><input type="date" class="i" /></div>
                
     <div  class="add_mision_lft"><input type="radio" name="panel" id="co_1" />&nbsp;&nbsp;Cash</div>
        <div class="add_mision_lft">
                <input type="radio" name="panel" id="co_open"/>&nbsp;&nbsp;Cashless
       </div>
       		<div  id="cor_panel" style="display:none">
            	<div  class="add_mision_lft">&nbsp;</div>
                
        		<div  class="add_mision_lft">
             <strong>Credit Limit</strong>&nbsp;&nbsp;&nbsp;<input type="text" style="width:50px;" />
              </div>
           </div>   
                  
              <div class="add_mision_lft">
                  <input type="radio" name="panel-name" />&nbsp;&nbsp;Panel
                  	<select> 
                  <option value="volvo">.....................</option>
                  </select>
            </div>
			<div class="add_mision_lft"><input type="radio" name="panel-name" />Insurance		                    <select >
                    
                      <option value="volvo">......................</option>
                     </select>
             </div>

			<div  class="add_mision_lft">Remarks:</div>
                  <div  class="add_mision_lft">
                      <textarea style="width:250px; height:90px;">
                      </textarea>
                    </div>
                


            </form>
            </div>
            
            <div style="float:right; width:350px;">
            	
            </div>
            <div class="cls"></div>
            
            <div style="background:url(ccc.png) repeat; padding:10px 20px;"><strong>Room Details</strong></div>
            <div style="width:100%">
            <div class="room_details_head">Room Type</div>
           <div class="room_details_head max-re_width">Bed No.</div>
            <div class="room_details_head max-re_width">Amount</div>
            </div>

            <div style="width:100%">



            <div class="room_details_head re-width">
            	<select>
                	<option value="">bed 1</option>
                    <option value="">bed 2</option>
                    <option value="">......</option>
                </select>
            </div>


                <div class="room_details_head re-width">
                    <select>
                        <option value="">Room type 1</option>
                        <option value="">Room type 2</option>
                        <option value="">......</option>
                    </select>
                </div>


                <!--</div>-->



      <div class="cls"></div>
          <div class="fill_data">
        <div id="bil_id"> <span>
          
          </span> <span>
          <input type="submit" value="Print blank form" class="btn" />
          </span> </div>
        <div id="save_clear"> <span>
          <input type="submit" value="Save" class="btn" />
          </span> <span>
          <input type="submit" value="Print"  class="btn"/>
          </span> </div>
      </div>
      <!-- Room Details  -->
      		
      			
                
                
      <!-- closed room  Details  -->
      
        </div>
  </div>
    </div>
</div>
</body>
</html>
