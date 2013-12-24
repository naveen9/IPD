 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Patient ID</span>
        <span></span>
        
        <span class="p_adding" style="margin-left:250px;">IP ID</span>
        <span>
        	<select>
            	<option value="">................</option>
            </select>
        </span>
        
        <span class="p_adding" style="margin-left:250px;">Bill ID</span>
        <span>
        	<select>
            	<option value="">................</option>
            </select>
        </span>
        </div>
        <div style="float:right; margin-right:10px;">
        	<a href="#"></a>
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
                    
                    <input type="button" value="print" name="print" class="btn" />
                    
                    
              </div>
      </div>
</div>
</body>
</html>