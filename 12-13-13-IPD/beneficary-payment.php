<?php 
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select accounting from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['accounting'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	
	<script src="jquery-1.5.js" type="text/javascript"></script>
	<script src="hide_show.js" type="text/javascript"></script>
	
	<script src="jquer-1.9.1-1.js" type="text/javascript"></script>
    <script src="jq.js" type="text/javascript"></script>
	<!--<script type="text/javascript" src="includeBeneficary/jquery-1.2.1.pack.js"></script>-->
    <script type="text/javascript" src="includeBeneficary/jquerySearch.js"></script>	
	<link rel="stylesheet" type="text/css" href="style_by.css"/>
    <!--<link rel="stylesheet" type="text/css" href="tab-code.css" />-->
	<link rel="stylesheet" href="/resources/demos/style.css" />
	<link rel="stylesheet" type="text/css" href="paging/style_by.css"/>
	<link rel="stylesheet" type="text/css" href="paging/tab-code.css" />
	<link rel="stylesheet" href="paging/paging.css" type="text/css" />
	<link rel="stylesheet" href="includeBeneficary/searchStyle.css" type="text/css">
	
	<script src="ajax-ui.js"></script>
    <script type="text/javascript" src="jquery-ui-min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquey-ui.css">

<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'mm yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>

<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
<script type="text/javascript">



function caldeduc(i,val){
	var amout=document.getElementById("hid_amt_"+i).value;
	var total_ded1=(amout*val)/100;
	var final_ded1=amout-total_ded1;	
	var final_ded=final_ded1.toFixed(2);	
	
	document.getElementById("fin_ded_s_"+i).innerHTML=final_ded;
	document.getElementById("final_ded_hid_"+i).value=final_ded;
}

function shared(i,shar){
	var final_ded=document.getElementById("final_ded_hid_"+i).value;
	
	
	var total_shar1=(final_ded*shar)/100;
	var final_shar1=final_ded-total_shar1;
	var final_shar=final_shar1.toFixed(2);
	document.getElementById("fin_shar_"+i).innerHTML=final_shar;
	document.getElementById("fin_shar_hid_"+i).value=final_shar;
	
}


function tds(i,tds1){
	var final_ded1=document.getElementById("fin_shar_hid_"+i).value;
	
	
	var total_tds11=(final_ded1*tds1)/100;
	var total_tds1=total_tds11.toFixed(2);
	var final_tds=final_ded1-total_tds1;
	
	document.getElementById("fin_tds_"+i).innerHTML=final_tds;
	document.getElementById("fin_tds_hid_"+i).value=final_tds;
}

</script>

  	</head>

<body>
<div id="container">

<?php 


include("header.php"); 
include("menubar.php");
 
?>
<div class="cls"></div>
<form method="post" action="">
<div id="opd_bill"><span style="margin-left:7px;">Doctor Accounting</span></div>
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;">Doctor Name</span>
            <span>
            	<select id="select_size" name="docName">
				<?php $docQuery=mysql_query("select * from  doc_master_table");
	   
	   ?>
                    <?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['doc_name']; ?>"><?php echo $docValues['doc_name']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
		</div>	
        <div class="r_ht" style=" width:720px;">
        <div class="todate_w f_l">
       	  <input type="radio" name="datecheck" checked="checked" style="margin:6px 5px 0px 0px;" />
        </div>
        <div class="f_l">
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
         
        
       
        <div class="" style="margin-right:5px;">
		
		<input type="submit" name="update" value="Show"  class="btn" style="float:right; margin-top:10px;" /></div>
        </div>
        <div class="cls"></div>
        <div class="right_top bg_head" style="border-bottom:1px solid #FFF">
       
          
      
		<div align="left" class="suggestionsBox" id="suggestions" style="display:none;">

<div align="left" class="suggestionList" id="autoSuggestionsList">
</div>
</div>
               
				</form>
       </div>

   </div>
      		<div class="cls"></div>
		
		<!--my code -->
      		<?php
			// on update click 
			
		if(isset($_POST['update'])){
		
		 $months=$_POST['monthDate'];
	  $docName=$_POST['docName'];
	  $startDate=$_POST['startDate'];
	  $EndDate=$_POST['endDate'];
	  if($_POST['monthDate']&& $_POST['datecheck']){
	    $months=$_POST['monthDate'];
	   $data=explode(" ",$months);
	   $month=$data[0];
	   	 $year=$data[1];
	   
	    $query = "SELECT COUNT(*) as num FROM beneficairy_payment B INNER JOIN discharge_table D ON B.visit_id = D.v_id where B.doctor_incharge='$docName' && YEAR( D.disc_date ) =  '$year' AND MONTH( D.disc_date ) =  '$month' && B.`check`=''";
    $total_pages = mysql_fetch_array(mysql_query($query));
    $total_pages = $total_pages['num'];
   
    /* Setup vars for query. */
	$page=$_GET['page'];
    $limit = 4;                                 
    if($page)
        $start = ($page - 1) * $limit;          
    else
        $start = 0;                             
   
    /* Get data. */
    $query = "SELECT * FROM beneficairy_payment B INNER JOIN discharge_table D ON B.visit_id = D.v_id where B.doctor_incharge='$docName' && YEAR( D.disc_date ) =  '$year' AND MONTH( D.disc_date ) =  '$month' && B.`check`=''";
    $benQuery = mysql_query($query);
	//include("paging/paging.php");
	   
	   
	  }
	 else{
	 
	  //$query = "SELECT COUNT(*) as num FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`=''";
    //$total_pages = mysql_fetch_array(mysql_query($query));
    //$total_pages = $total_pages['num'];
   
    /* Setup vars for query. */
	$page=$_GET['page'];
    $limit = 4;                                 //how many items to show per page
    if($page)
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
   
    /* Get data. */
    //$query = "SELECT * FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`='' ";
    //$benQuery = mysql_query($query);
	//include("paging/paging.php");
	 }
	 }
//else if($_POST['search'])
//	 {
//	 $name=$_POST['name'];
//	 $query = "SELECT * FROM beneficairy_payment where patient_name='$name' && `check`=''"; 
//	 $benQuery = mysql_query($query);
//	 }
//	 else{
//	 
//	  $query = "SELECT COUNT(*) as num FROM beneficairy_payment where `check`=''";
//    $total_pages = mysql_fetch_array(mysql_query($query));
//    $total_pages = $total_pages['num'];
//   
//    /* Setup vars for query. */
//	$page=$_GET['page'];
//    $limit = 4;                                 //how many items to show per page
//    if($page)
//        $start = ($page - 1) * $limit;          //first item to display on this page
//    else
//        $start = 0;                             //if no page var is given, set start to 0
//   
//    /* Get data. */
//    $query = "SELECT * FROM beneficairy_payment B INNER JOIN discharge_table D ON B.visit_id = D.v_id where B.`check`='' LIMIT $start,$limit";
//    $benQuery = mysql_query($query);
//	 include("paging/paging.php");
//	 }
		 
		?>
		
		

          
      <div style=" width:100%;">
      	<div style="background:#E6E6E6;  height:30px; padding-top:10px;">
          <div class="l_ft" style="padding-top:4px; width:38px;">&nbsp;</div>
		  
          		<div class="l_ft bill_width_receive1"><strong>Patient Name</strong></div>
              <div class="l_ft be_margin"><strong>IP ID</strong></div>
                <div class="l_ft" style="width:50px;"><strong>Bill No</strong></div>
                <div class="l_ft bill_width_receive1"><strong>Item</strong></div>
                 <div class="l_ft"><strong>Amount</strong></div>
                <div class="l_ft be_margin"><strong>Discount%</strong></div>
                <div class="l_ft be_margin"><strong>Shared% </strong></div>
                <div class="l_ft be_margin"><strong>Marketing%</strong></div>
                <div class="l_ft bill_width_receive1"><strong>Remarks</strong></div>
                
                <div class="l_ft be_margin"><strong>Date</strong></div>
               
                <div class="cls"></div>
           </div>
           		    
             </div>             
           <form method="post" action="banificaly_form.php">               
            
<?php $i=0;
  //$j=0;
		  while($benValues=mysql_fetch_array($benQuery)){
		  ?>
	 			
      <div style="background:url(ccc.png); height:30px; padding-top:10px;">
      <input type="hidden" name="bb_id" value="">
		<div class="l_ft" style="padding-top:4px; width:38px;"><input type="checkbox" name="chk[]" value="<?php echo $benValues[0]; ?>" style="width:30px;" /></div>
			    <div class="l_ft bill_width_receive1"><?php echo $benValues['patient_name']; ?></div>
                <div class="l_ft be_margin"><?php echo $benValues['visit_id']; ?></div>
                <div class="l_ft" style="width:50px;"><?php echo $benValues['bill_id']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['procedure_name']; ?></div>
                <div class="l_ft" style="text-align:center; width:50px;" name="amount_value" id="amount_value"  /><?php echo $benValues['amount']; ?>
                <input type="hidden" id="hid_amt_<?php echo $i; ?>" value="<?php echo $benValues['amount']; ?>" />
                </div>
                <div class="l_ft be_margin"><input type="text" name="deduction[]" id="deduction_<?php echo $i; ?>"  onkeyup="caldeduc(<?php echo $i; ?>,this.value)" placeholder="1000"   style="width:50px;"  /></div>
                <div class="l_ft be_margin"><input type="text" name="shared1[]" id="shared1_<?php echo $i; ?>" onkeyup="shared(<?php echo $i; ?>,this.value)" placeholder="70" style="width:50px;" /></div>
                <div class="l_ft be_margin"><input type="text" name="tds1[]" id="tds1_<?php echo $i; ?>" onkeyup="tds(<?php echo $i; ?>,this.value)" placeholder="10.2" style="width:50px;"  /></div>
                <div class="l_ft bill_width_receive1"><textarea name="remarks[]" style="width:130px; height:20px;"  /></textarea></div>
                <div class="l_ft be_margin"><?php echo $benValues['date']; ?></div>
             </div>    
                <div class="cls"></div> 
              <div style=" height:30px; padding-top:10px;">
              	<div class="l_ft" style="width:38px;">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft  be_margin">&nbsp;</div>
                <div class="l_ft be_margin" id="dedu_sow"></div>
                




                <div class="l_ft be_margin" id="fin_ded_s_<?php echo $i; ?>">0</div>
                <input type="hidden" id="final_ded_hid_<?php echo $i; ?>" /> 
             
             <div class="l_ft be_margin" id="fin_shar_<?php echo $i; ?>">0</div>
                <input type="hidden" id="fin_shar_hid_<?php echo $i; ?>" />
                
                
                <div class="l_ft be_margin" id="fin_tds_<?php echo $i; ?>">0</div>
                <input type="hidden" name="final_amount[]" id="fin_tds_hid_<?php echo $i; ?>" /> 
             </div>
             <div class="cls"></div>
              
            
             
             <?php $i++;//$j++;
		  
		  } ?>
             
		             
            <!-- <div class="pagination">
             	<div class="l_ft bill_width_name"> 
             	
              </div>  
              <div class="r_ht bill_width_name">
              	<div style=" text-align:right; margin-right:5px;"><strong>Total Amount : Rs 1000</strong></div>
              </div>
             </div>-->
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
         <a href="#"> 
         	<!--<input type="submit" name="save" value="Calculate" class="btn" />-->
          	<input type="submit" name="save" value="Save" class="btn" />  
          </a>
          </span> <span>
          
          </span> </div>
      </div>
  </form>
 <div class="cls"></div>
 <?php 
//if(isset($_POST['save']))
// {
// 
// 	
//$chk=$_POST['chk'];
//
//	 $ded=$_POST['deduction'];
//	echo $ded;
//
//foreach ($chk as $key => $value) {
//	
//	echo $shrd=$_post['shared1'];
//	echo $tds=$_post['tds1'];
//	echo $rem=$_post['remarks'];
//	echo $value;
//
//	
//		
////$update=mysql_query("update beneficairy_payment set deduction='$ded',share='$shrd',tds='$tds',remarks='$rem', check=1 where bp_id='$value'");	
// }
// }
 ?>

    </div>
 <?php echo $pagination;?>	
</div>
</div>
</body>
</html>
