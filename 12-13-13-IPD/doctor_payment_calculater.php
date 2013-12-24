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


total_amount=0
function caldeduc(i,val){
	var amout=document.getElementById("hid_amt_"+i).value;
  alert
	var total_amount=total_amount+amout;
	
	document.getElementById("fin_ded_s_"+i).innerHTML=final_ded;
	document.getElementById("final_ded_hid_"+i).value=final_ded;
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
<div id="opd_bill"><span style="margin-left:7px;">DOCTOR PAYMENT CALCULATER</span></div>
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
                 $_SESSION['month']=$month;
                 $_SESSION['year']=$year;
	   	
	   
	    $query = "SELECT COUNT(*) as num FROM beneficairy_payment B INNER JOIN discharge_table D ON B.visit_id = D.v_id where B.doctor_incharge='$docName' && YEAR( D.disc_date ) =  '$year' AND MONTH( D.disc_date ) =  '$month' && B.`check`=1";

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
    $query = "SELECT * FROM beneficairy_payment B INNER JOIN discharge_table D ON B.visit_id = D.v_id where B.doctor_incharge='$docName' && YEAR( D.disc_date ) =  '$year' AND MONTH( D.disc_date ) =  '$month' && B.`check`=1";

    $benQuery = mysql_query($query);
	//include("paging/paging.php");
	   
	   
	  }
	 else{
	 
	 // $query = "SELECT COUNT(*) as num FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`=1";
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
    //$query = "SELECT * FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`=1 ";
    //$benQuery = mysql_query($query);
	//include("paging/paging.php");
	 }
	 }
//else if($_POST['search'])
//	 {
//	 $name=$_POST['name'];
//	 $query = "SELECT * FROM beneficairy_payment where patient_name='$name' && `check`=1"; 
//	 $benQuery = mysql_query($query);
//	 }
//	 else{
//	 
//	  $query = "SELECT COUNT(*) as num FROM beneficairy_payment where `check`=1";
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
//    $query = "SELECT * FROM beneficairy_payment where `check`=1 LIMIT $start,$limit";
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
                 <div class="l_ft"><strong>Doc Amount</strong></div>
                
                
                <div class="l_ft be_margin"><strong>Date</strong></div>
               
                <div class="cls"></div>
           </div>
           		    
             </div>             
           <form method="post" action="verify.php">               
            
<?php $i=0;
		  while($benValues=mysql_fetch_array($benQuery)){
		  ?>
	 			
      <div style="background:url(ccc.png); height:30px; padding-top:10px;">
		<div class="l_ft" style="padding-top:4px; width:38px;"><input type="checkbox" id="chk"  name="chk[]" value="<?php echo $i;?>" onkeyup="caldeduc(<?php echo $i; ?>,this.value)" style="width:30px;" /></div>
                <input type="hidden" name="bp_id[]" value="<?php echo $benValues['bp_id']; ?>"	/>    
                <div class="l_ft bill_width_receive1"><?php echo $benValues['patient_name']; ?></div>
          <div class="l_ft be_margin"><?php echo $benValues['visit_id']; ?></div>

                <div class="l_ft" style="width:50px;"><?php echo $benValues['bill_id']; ?></div>
                <div class="l_ft bill_width_receive1"><?php echo $benValues['procedure_name']; ?></div>
                <div class="l_ft" style="text-align:center; width:50px;" name="amount_value" id="amount_value"  /><?php echo $benValues['doc_amount']; ?>
              
                <input type="hidden" id="hid_amt_<?php echo $i; ?>" name="amount_value[]" value="<?php echo $benValues['doc_amount']; ?>" />
                </div>
                
                
                <div class="l_ft be_margin"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><?php echo  $benValues['date']; ?></div>
                <div style="float:left; width:75px; "><input type="submit"name="cancel" value="cancel" class="btn"/></div>
             </div>    
                <div class="cls"></div> 
              <div style=" height:30px; padding-top:10px;">
              	<div class="l_ft" style="width:38px;">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft be_margin">&nbsp;</div>
                <div class="l_ft  be_margin">&nbsp;</div>
                <div class="l_ft be_margin" id="dedu_sow"></div>
                




               </div> 
             <div class="cls"></div>
              
            
             
             <?php $i++;} ?>
             
		             
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

           <div class="l_ft be_margin" id="fin_ded_s_<?php echo $i; ?>">0</div>
                <input type="hidden" id="final_ded_hid_<?php echo $i; ?>" /> 

          	<input type="submit" name="save" value="Verify" class="btn" />  
          </a>
          </span> <span>
          
          </span> </div>
      </div>
  </form>
 <div class="cls"></div>
 <?php //if(isset($_POST['save']))
 {
 

  //header('location:verify.php');
   
?>
  <!--<a href="verify.php?ip_id=<?php echo $data[0]; ?>" onclick="javascript:void window.open('verify.php?ip_id=<?php echo $data[0]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">Lindddddddddddddddddddddddddddddddddddddk</a>-->

   
	
  <?php
	 }
    
    
  //$update=mysql_query("update beneficairy_payment set deduction='$ded',share='$shrd',tds='$tds',remarks='$rem'where bp_id='$id'");
 ?>

    </div>
 <?php echo $pagination;?>	
</div>
</div>
</body>
</html>
