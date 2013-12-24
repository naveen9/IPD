
<?php
    session_start();
    error_reporting(0);
    include("header.php"); 
    include("menubar.php");
    include("condb.php");
 
?>
<style type="text/css">
			.t{width:30px;}
			.i{width:175px;}
			.t_d{width:200px;}
			 .list_name{ width:150px; font-weight:600; font-size:11px}

	</style>

<body>

   			
		<div id="opd_bill">
   			<span>Non Package Details</span>
   		</div>
         <div class="record_feed">
	
<form method="post" action="search.php">
		
    	<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
            	<span>
<input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringCo" onKeyUp="lookupCo(this.value);" onBlur="fillCo();"  /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
						<div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
<div align="left" class="suggestionListAd" id="autoSuggestionsListCo">
</div>
</div>
            </div>
        </div>
		

</form>
		
<form method="post" name="form1" action="create_vid.php">
        <div id="add_new_patient">
    	   	<div id="add_txt" style="float:left; width:300px;">&nbsp;</div>
            <div id="add_txt"  style="float:right; width:160px;">
            	<span><input type="text" name="search" placeholder="Bed No"  style="width:60px;"/></span>
                <span><input type="submit" name="find1" value="Search" class="btn"/></span>
            </div>
            <div class="cls"></div>
               <div>
            	
            	<strong>Name</strong>
        		
				<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" /> 
                
                

                
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:90px;" value="<?php echo $_SESSION['p_mob'];?>" />
                 <?php $pid= $_SESSION['p_id'];?>


                   <?php //echo  $_SESSION['p_email'];?>
				 

				</div>
				                  
            <div class="cls"></div>
          </div>
          

		
        <div class="cls"></div>
			<div class="category">
                <span id="cate">Category</span>
                <span><input type="radio" name="category" />General</span>
                <span><input type="radio" name="category" />Emergency</span>
                <span id="patient_id">Patient ID :</span>
                <span><albel for>0000</label></span>
                <span style="margin-left:205px;">Visit Id</span>
                <span>
                    <select id="select_size">
                          <option value="volvo">......................</option>
                    </select>
                </span>    
      </div>
    </div>  
      
      <form action="#" method="post">
      	<table border="0" cellpadding="5" cellspacing="5" width="100%">
        		<tbody>
                	<tr>
                    	<th>Procedure Name</th>
                        <th><input type="text" /></th>
                        <th>Fees</th>
                        <th><input  type="text" placeholder="10,000" /></th>
                        <th>Grand Total</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                    	<td><strong>Surgeon Name</strong></td>
                        <td><input type="text" /></td>
                        <td>shareby %</td>
                        <td><input type="text" placeholder="100" /></td>
                        <td>25000</td>
                        <td><a href="#">delete</a></td>
                    </tr>
                                        <tr>
                    	<td><strong>Assistant Name</strong></td>
                        <td><input type="text" /></td>
                        <td>shareby %</td>
                        <td><input type="text" placeholder="100" /></td>
                        <td>10000</td>
                        <td><a href="#">delete</a></td>
                    </tr>

                    <tr>
                    	<td><strong>OT Number</strong></td>
                        <td><input type="text" /></td>
                        <td>shareby %</td>
                        <td><input type="text" placeholder="100" /></td>
                        <td>2500</td>
                        <td><a href="#">delete</a></td>
                    </tr>

                    <tr>
                    	<td><strong>Ancesthetic</strong></td>
                        <td><input type="text" /></td>
                        <td>shareby %</td>
                        <td><input type="text" placeholder="100" /></td>
                        <td>7500</td>
                        <td><a href="#">delete</a></td>
                    </tr>
				</tbody>
            </table>
      </form>
     
     <div class="category">
     	<strong>Consumamble</strong>
     </div> 
  	<div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
		    <div class="pro_o_t1 f_s"> 	Name</div>
        	<div class="pro_o_t1 f_s"> 	Price</div>
            <div class="pro_o_t1 f_s"> 	Qty</div>
            <div class="pro_o_t1 f_s"> 	Total</div>
            <div class="pro_o_t1 f_s"> 	Discount</div>
            <div class="pro_o_t1 f_s"> 	Final</div>
            <div class="pro_o_t1 f_s"> 	Delete</div>
           <div class="cls"></div> 
	</div>	
    <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
    		<div class="pro_o_t1"><input type="text"></div>
        	<div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1 "><input type="text"></div>
            <div class="pro_o_t1 "><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><a href="#">Delete</a></div>
           <div class="cls"></div> 
	</div>	
    
    <div class="category">
     	<strong>Implant</strong>
     </div> 
  	<div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
        	<div class="pro_o_t1 f_s"> 	Name</div>
            <div class="pro_o_t1 f_s"> 	Price</div>
            <div class="pro_o_t1 f_s"> 	Qty</div>
            <div class="pro_o_t1 f_s"> 	Total</div>
            <div class="pro_o_t1 f_s"> 	Discount</div>
            <div class="pro_o_t1 f_s"> 	Final</div>
            <div class="pro_o_t1 f_s"> 	Remarks</div>
           <div class="cls"></div> 
	</div>	
    <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
    		<div class="pro_o_t1"><input type="text"></div>
        	<div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><input type="text"></div>
            <div class="pro_o_t1"><textarea placeholder="remarks...."></textarea></div>
           <div class="cls"></div>
	</div>	
    
    
    
</div> 
</body>
</html>
