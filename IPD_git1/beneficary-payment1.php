<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<script src="jquery-1.5.js" type="text/javascript"></script>
	<script src="hide_show.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="style_by.css" />
     <link rel="stylesheet" type="text/css" href="tab-code.css" />
  <script src="jquer-1.9.1-1.js" type="text/javascript"></script>
   <script src="jq.js" type="text/javascript"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
  
  <link rel="stylesheet" type="text/css" href="paging/style_by.css"/>
<link rel="stylesheet" type="text/css" href="paging/tab-code.css" />
<link rel="stylesheet" href="paging/paging.css" type="text/css" />

  	</head>

<body>
<?php 
include("condb.php");
include("head.php");
include("menu1.php");
 include("paging/paging.php"); 
?>
    
  <form method="post" action="">
  	<div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Hospital Accounting</div> 
        <div class="r_ht">
        <div class="todate_w f_l">
		<select id="select_size" name="months">
				<option value="january">january</option>
				<option value="february">february</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
				</select>
       	  <input type="radio" name="date" checked="checked" style="margin:6px 15px 0px 20px;" />
        </div>
        <div class="f_l">January 2013</div> 
        <div class="todate_w f_l" style="margin-left:30px;"><input type="radio" name="date" style="margin:6px 15px 0px 0px;" /></div> 
        <div class="f_l"><input type="date"  name="startDate"/></div>
        <div class="todate_w f_l" style="margin:0px 15px 0px 20px;"><font color='black'>To</font></div>
        <div class="r_ht" style="margin-right:5px;"><input type="date" name="EndDate" /></div>
        </div>
   </div>
      <div class="right_top bg_head" style="border-bottom:1px solid #FFF">
       
       <span style="margin-left:5px;">Beneficiary Name</span>
	   <?php $docQuery=mysql_query("select * from  doc_master_table");
	   
	   ?>
            <span>
            	<select id="select_size" name="docName">
				
				
				<?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['doc_name']; ?>"><?php echo $docValues['doc_name']; ?></option>
                      <?php } ?>
				</select>
            </span>    
        <span style="margin-left:440px;"><input type="text" name="search" placeholder="ID/Name/Ph/Email" /></span>
                <span><input type="submit" name="search" value="Search"  style="background:#0000B9; color:#FFF; padding:3px;  width:50px;" />
				<input type="submit" name="search" value="Update"  style="background:#0000B9; color:#FFF; padding:3px;  width:50px;" /></span>
       </div>
	   
      <div style="width:100%; margin:0 auto;">
<div class="pateint_resume">
          <div>
            
            <img src="Photo-0269.jpg" width="80" height="80" align="top" /> </div>
          <div id="patient_field_name">Doctor Name : Ramdev swami</div>
          <div class="pt_record">
          	<div><strong>PAN No</strong>&nbsp;:&nbsp;&nbsp;<label for="">521345</label></div>
            <div><strong>Sex</strong>&nbsp;:&nbsp;&nbsp;<label for="">Male</label></div>
            <div><strong>DOB</strong>&nbsp;:&nbsp;&nbsp;<label for="">13 march,1978</label></div>
            <div>
              <label for id=""></label>
            </div>
          </div>
          <div id="patient_field_name">Contact</div>
          <div class="pt_record">
          <div><strong>Email</strong>&nbsp;:<label for="#">singhrabindra87@gmial.com</label></div>
            <div><strong>Contact No</strong>&nbsp;:&nbsp;&nbsp;<label for="">8285611929</label></div>
            
            <div><strong>Address</strong>&nbsp;:&nbsp;&nbsp;
            	<label for="">Vill:raghunandanpur, po:Turki</label>
                <label for="">Vill:raghunandanpur, ps:Kurki</label>
                <label for="">Vill:raghunandanpur, Dist:Kaimur(bhabua)</label>
                </div>
        </div>
        </div>
		<?php 
		//$benQuery=mysql_query("select * from beneficairy_payment limit 5");
		
		?>
		
		
    <div style="float:left; width:738px;">
          
      <div style="float:left; width:100%;">
      	<div style="background:#E6E6E6;  height:30px; padding-top:10px;">
          <div class="l_ft" style="padding-top:4px; width:38px;">&nbsp;</div>
		  
          		<div class="l_ft bill_width_receive1"><strong>Patient Name</strong></div>
                <div class="l_ft" style="width:50px;"><strong>Bill No</strong></div>
                <div class="l_ft bill_width_receive1"><strong>Item</strong></div>
                <div class="l_ft be_margin"><strong>Deduction</strong></div>
                <div class="l_ft be_margin"><strong>Shared% </strong></div>
                <div class="l_ft be_margin"><strong>TDS%</strong></div>
                <div class="l_ft be_margin"><strong>Remarks</strong></div>
                <div class="cls"></div>
           </div>
           		<div style=" height:30px; padding-top:10px; background:#E6E6E6;">     
					<div class="l_ft" style="padding-top:4px; width:38px;">&nbsp;</div>
                    <div class="l_ft bill_width_receive1">Visit ID</div>
                    <div class="l_ft be_margin" style="width:50px;">Date</div>
                     <div class="l_ft bill_width_receive1">Amount </div>
		              <div class="cls"></div>
                 </div>     
                          
                          
            
<?php 
		  while($benValues=mysql_fetch_array($benQuery)){
		  ?>
	 			
             <div style="background:url(ccc.png); height:30px; padding-top:10px;">
			 
			
             	<div class="l_ft" style="padding-top:4px; width:38px;"><input type="checkbox" name="chk[]" value="<?php echo $benValues['bp_id'];?>" style="width:30px;" /></div>
			
                <div class="l_ft bill_width_receive1"><?php echo $benValues['patient_name']; ?></div>
                <div class="l_ft" style="width:50px;"><?php echo $benValues['bill_id']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['procedure_name']; ?></div>
                <div class="l_ft be_margin"><input type="text" name="deduction<?php echo $benValues['bp_id'];?>" placeholder="1000"  style="width:50px;"  /></div>
                <div class="l_ft be_margin"><input type="text" name="shared<?php echo $benValues['bp_id'];?>"  placeholder="70" style="width:50px;"   /></div>
                <div class="l_ft be_margin"><input type="text" name="tds<?php echo $benValues['bp_id'];?>" placeholder="10.2" style="width:50px;"  /></div>
                <div class="l_ft be_margin" style="width:80px;"><input type="text" name="remarks<?php echo $benValues['bp_id'];?>" style="width:80px;"  /></div>
                <div class="cls"></div> 
             </div>
             <div style=" height:30px; padding-top:10px;">
             	<div class="l_ft" style="width:38px;">&nbsp;</div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['visit_id']; ?></div>
                <div class="l_ft p_w"><?php echo $benValues['date']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['amount']; ?></div>
                <div class="l_ft be_margin">0</div>
                <div class="l_ft be_margin">70</div>
                
             </div>
             <?php } ?>
             
             <div class="pagination">
             	<div class="l_ft bill_width_name"> 
             	
              </div>  
              <div class="r_ht bill_width_name">
              	<div style=" text-align:right; margin-right:5px;"><strong>Total Amount : Rs 1000</strong></div>
              </div>
             </div>
           </div>
          <div class="cls"></div>
      </div>
       <div class="cls"></div>
  <div class="cls"></div>     
          <div class="fill_data">
        <div id="bil_id" style="width:800px"> 
        <div style="float:left;">
			
          </div>
          <div id="dis" style="visibility:hidden; margin-left:170px; font-style:float:left">
           <span>
    <label for="" style="color:#0000A8">&nbsp;&nbsp;&nbsp;Discount to Patient&nbsp;:</label>
           </span> 
				<span><input type="text" placeholder="Amount" style="width:50px;"/></span>          
                
                <span><input type="text" style="width:300px;" /></span>          
              </div>  
          </div>
        <div id="save_clear"> <span>
         <a href="#"> <input type="submit" name="save" value="Save" class="btn" /></a>
          </span> <span>
          
          </span> </div>
      </div>
        </div>
  </div>
  </form>
 <div class="cls"></div>
 <?php if(isset($_POST['save']))
 {
 
    //startDate  EndDate  docName  months
	echo $startDate=$_POST['docName'];echo "<br>";
	echo $startDate=$_POST['months'];echo "<br>";
 
	echo $startDate=$_POST['startDate'];echo "<br>";
	echo $startDate=$_POST['EndDate'];echo "<br>";
	
     for($i=0;$i<count($_POST['chk']);$i++)
	 {
	     $id=$_POST['chk'][$i];
		 $ded='deduction'.$id;
		$ded=$_POST[$ded];
		
		$shrd='shared'.$id;
		$shrd=$_POST[$shrd];
		
		$tds='tds'.$id;
		$tds=$_POST[$tds];
		
		$rem='remarks'.$id;
		$rem=$_POST[$rem];
		
		//echo $ded,$shrd,$tds,$rem;
		//echo '<br>';
	$update=mysql_query("update beneficairy_payment set deduction='$ded',share='$shrd',tds='$tds',remarks='$rem'where bp_id='$id'");
	
	 }
 }
 ?>
 <?=$pagination?>
    </div>
	

</div>
</body>
</html>
