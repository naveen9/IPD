 	<?php 
		error_reporting(0);
		include("header.php");
		include("menubar.php");
	 ?>
<div id="opd_bill">
    <span style="margin-left:10px;">Receive Payment</span>
    <span style="margin-left:165px;">&nbsp;</span>
          <span>&nbsp;&nbsp;</span>    
    <span style="margin-left:450px;">Visit ID</span>
       <span>
       		<select style="width:140px; height:25px; border-radius:5px; border:1px solid lightgray;">
            	<option value="">.....................</option>
                <option value="">........110.......</option>
                <option value="">.......150.........</option>
            </select>
       </span>        
        
       </div>
     
      <div style="width:100%; margin:0 auto;">
      <div class="record_feed">
    	<div id="search_exist">
        	<!--<div id="search_txt" class="p_adding">Search Existing Patient</div>-->
            <div class="p_adding">
            	<span><input type="text" name="search" placeholder="PID/Name/Ph/Email" /></span>
                <span><input type="button" name="search" value="Search" class="btn"/></span>
            </div>
        </div>
        
        <div id="add_new_patient">
    	   	<!--<div id="add_txt">Add New Patient</div>-->
            <div>
            	
            <form action="#" method="post">	
				<div class="l_ft ri_m bol_d">&nbsp;&nbsp;Name</div>	
        		<div class="l_ft ri_m"><label for="">Rabindra kumar singh</label></div>
                <div class="l_ft ri_m bol_d">
                	<strong>Age/Sex</strong></div>
                <div class="l_ft ri_m"><label for="#">02&nbsp;years</label></div>	
                <div class="l_ft ri_m">
                	<label for="#">Female</label>
                </div>	
				  <div class="l_ft ri_m">
                  	<strong>Phone</strong>
                 </div class="l_ft ri_m">	
                 <div class="l_ft ri_m"><label for="#">8285611929</label></div>	
                  <div class="l_ft ri_m"><strong>Email</strong></div>	                  
                 	 <div class="l_ft ri_m">
                  		<label for="#">singhrabindra87@gmail.com</label>
                  </div>
            </form>
            <div class="cls"></div>
          </div>
          
        </div>
        <div class="cls"></div>
    </div>
    <div class="cls"></div>
    
        <div class="right-content" style="width:100%;">
          <div class="right_top"> 
          <div style="float:left; width:250px;"><strong>Visit ID&nbsp;&nbsp;:&nbsp;&nbsp;1234 </strong></div>
          <div style="float:right; width:250px;">
          	<span><strong>Due Amount</strong></span>&nbsp;&nbsp;:&nbsp;&nbsp;<span><label for="">123</label></span>
          </div>
          <div class="cls"></div>
           </div>
          <div style="">
        <form action="#" method="get">
              <table width="100%" cellpadding="0" cellspacing="0">
            <tr class="b" style="height:50px;">
                  <td><div class="lbl_txt" style="margin-left:10px; height:30px;">
                  	Amount
                    </div>
               </td>
                  <td><div>
                      <input type="text" placeholder="0" class="i" style="width:50px;"/>&nbsp;&nbsp;&nbsp;
      <!--                <label for="" style="color:#0000A8">Due Amount&nbsp;:</label>
                       <label for="">1000 &nbsp;&nbsp;&nbsp;</label>-->
                    </div></td>
                </tr>
            <tr class="b" style="height:70px;">
                  <td><div style="margin-left:10px;">Payment Mode</div></td>
                  <td><div>
            <span><input type="radio" name="repayment" class="raodd" />&nbsp;&nbsp;Cash</span>
            <span><input type="radio" name="repayment" />&nbsp;&nbsp;Credit Card</span>
            <span><input type="radio" name="repayment" />&nbsp;&nbsp;Debit Card</span>
            <span><input type="radio" name="repayment" />&nbsp;&nbsp;Cheque/Draft</span>
                    </div></td>
                </tr>
            <tr class="b">
                  <td><div style="margin-left:10px;">Transaction Details</div></td>
                  <td><div>
                     <textarea style="width:350px; height:100px;"></textarea>
                    </div></td>
                </tr>
            
          </table>
            </form>
      </div>
      
      
 <script type="text/javascript"> 
<!-- 
function showMe (it, box) { 
var vis = (box.checked) ? "visible" : "hidden"; 
document.getElementById(it).style.visibility = vis;
//document.getElementById(it).style.display = vis;
} 
//--> 
</script>
          <div class="fill_data">
        <div id="bil_id" style="width:800px"> 
        <div style="float:left;">
			<input type="checkbox" name="chk" onclick="showMe1('dis', this)"/>&nbsp;&nbsp;&nbsp;Refund
          </div>
          <div id="dis" style=" margin-left:170px; font-style:float:left">
           <span>
    <label for="" style="color:#0000A8">&nbsp;&nbsp;&nbsp;Discount to Patient&nbsp;:</label>
           </span> 
				<span><input type="text" placeholder="Amount" style="width:50px;"/></span>          
                
                <span><input type="text" style="width:300px;" /></span>          
              </div>  
          </div>
        <div id="save_clear">
        	<span>
         <a href="receive_payment.html"> <input type="submit" value="Clear All" class="btn" /></a>
          </span> 
         <span>
         <a href="receive_payment.html"> <input type="submit" value="Save" class="btn" /></a>
          </span>
           <span>
          	<input type="submit" value="Print"  class="btn"/>
          </span>
         </div>
    </div>
 </div>
  </div>
    </div>
</div>
</body>
</html>
