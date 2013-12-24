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

	<script src="jquery-1.5.js" type="text/javascript"></script>
	<script src="hide_show.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="style_by.css" />
    
  <script src="jquer-1.9.1-1.js" type="text/javascript"></script>
   <script src="jq.js" type="text/javascript"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  
  
  <script type="text/javascript" src="includeSettle/jquery-1.2.1.pack.js"></script>
<script type="text/javascript" src="includeSettle/jquerySearch.js"></script>
<link rel="stylesheet" href="includeSettle/searchStyle.css" type="text/css">

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

  



<?php 

include("includeSettle/searchSettleResults.php");
?>

<?php
error_reporting(0);
	include("header.php");
	include("menubar.php");
?>
<div class="container">
   <form method="post" action="">
  	<div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Bill Settlement</div> 
        <div class="todate_w f_l m_l">
       	  
        </div>
                <div class="f_l" style="margin-left:100px;">
				<label for="startDate">Month :</label>
			    
                                <input name="monthDate" id="startDate" class="date-picker" style="border-radius:6px; height:20px; border:1px solid lightgray;" />
				<span><input type="submit" name="update" value="View" class="btn"  style="width:80px; margin-right: 150px;" /></span>

                                
                                <input type="text" name="patient" placeholder="ID/Name/Ph/Email" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();"	/></span>

		
		
<span><input type="submit" name="search" value="Search" class="btn" style="width:80px"/></span>		
</div>        
	
               
      
        
   </div>
      <div class="right_top" style="padding:30px 0px;">
       
           
        <span style="margin-left:340px;">
		

		  <div align="left" class="suggestionsBox" id="suggestions" style="display:none;">
<div align="left" class="suggestionList" id="autoSuggestionsList">
</div>
</div>

				</div>
  

	  </form>
      <div style="width:100%; margin:0 auto;">
      	<div style="background:#E6E6E6;  height:25px; padding:5px 5px 0px 5px;">
            <div class="l_ft settle"><strong>IP ID</strong></div>
            <div class="l_ft settle"><strong>Name</strong></div>
            <div class="l_ft settle"><strong>Total Bill</strong></div>
            <div class="l_ft settle"><strong>Total Payment</strong></div>
            <!--<div class="l_ft settle"><strong>Discount</strong></div>-->
            <div class="l_ft settle"><strong>Due Amount</strong></div>
			<div class="l_ft settle"><strong>Pay</strong></div>
            <div class="l_ft settle">&nbsp;</div>
          </div>
           <div class="cls"></div>
		   <?php 
		   if($_POST['update'] && $_POST['datecheck']){
		   
		   ?>
            <div style=" height:25px; padding:5px 5px 0px 10px;">
<?php 

$doc=$_POST['doc'];
 $start=$_POST['startDate'];
 $end=$_POST['endDate'];
 // if select months than this code will run
 if($_POST['monthDate']){
   $monthDate=$_POST['monthDate'];
 $data=explode(" ",$monthDate);
  $month=$data[0];
  $year=$data[1];
  //echo "months";
//$billQr=mysql_query("select  opd_bill.visit_id,opd_bill.due_amount,opd_bill.paid_amount,opd_bill.grand_total,opd_items.discount 
//from opd_items inner join opd_bill where doc_incharge='$doc' && opd_bill.visit_id=opd_items.visit_id 
//&& billeddate between '$start' and '$end' group by opd_bill.visit_id");
$billQr=mysql_query("select  opd_bill.visit_id,opd_bill.due_amount,opd_bill.paid_amount,opd_bill.grand_total,opd_items.discount 
from opd_items inner join opd_bill where doc_incharge='$doc' && opd_bill.visit_id=opd_items.visit_id && opd_bill.due_amount!=0
&& YEAR( DATE ) =  '$year'
AND MONTH( DATE ) =  '$month' group by opd_bill.visit_id
");

while($billValues=mysql_fetch_array($billQr)){

 ?>			
                <div class="l_ft settle"><?php echo $visit_id=$billValues['visit_id']; ?></div>
                <div class="l_ft settle"><?php echo $visit_id=$billValues['visit_id']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['grand_total']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['paid_amount']; ?></div>
                <!--<div class="l_ft settle"><?php echo $billValues['discount']; ?></div>-->
                <div class="l_ft settle" style="color:#00F"><?php echo $billValues['due_amount']; ?></div>
                <div class="l_ft settle"><a href="receive_payment.php?visit_id=<?php echo $visit_id;?>">Receive Payment</a></div>
                <div class="cls"></div>
				<?php }}
				 // else this code will run  where we select two date between dates
				else{
		//		echo "Indate";
				$billQr=mysql_query("select  opd_bill.visit_id,opd_bill.due_amount,opd_bill.paid_amount,opd_bill.grand_total,opd_items.discount 
from opd_items inner join opd_bill where doc_incharge='$doc' && opd_bill.visit_id=opd_items.visit_id && opd_bill.due_amount!=0
&& billeddate between '$start' and '$end' group by opd_bill.visit_id");
while($billValues=mysql_fetch_array($billQr)){

 ?>			
                <div class="l_ft settle"><?php echo $visit_id=$billValues['visit_id']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['grand_total']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['paid_amount']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['discount']; ?></div>
                <div class="l_ft settle" style="color:#00F"><?php echo $billValues['due_amount']; ?></div>
                <div class="l_ft settle"><a href="receive_payment.php?visit_id=<?php echo $visit_id;?>">Receive Payment</a></div>
                <div class="cls"></div>
<?php }}}
				
				
				
				
				
				
				
		      else if($_POST['search'])
		  { 
		  $patient=$_POST['patient'];
		 $billQr=mysql_query("select beneficairy_payment.visit_id,beneficairy_payment.bill_id,beneficairy_payment.patient_name,opd_bill.due_amount,
		 opd_bill.paid_amount,opd_bill.grand_total from beneficairy_payment inner join opd_bill 
		 where beneficairy_payment.visit_id=opd_bill.visit_id && patient_name='$patient'");
		 while($billValues=mysql_fetch_array($billQr)){

 ?>			
                <div class="l_ft settle"><?php echo $visit_id=$billValues['visit_id']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['grand_total']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['paid_amount']; ?></div>
                <!--<div class="l_ft settle">0</div>-->
                <div class="l_ft settle" style="color:#00F"><?php echo $billValues['due_amount']; ?></div>
                <div class="l_ft settle"><a href="receive_payment.php?visit_id=<?php echo $visit_id;?>">Receive Payment</a></div>
                <div class="cls"></div>
		 
		 	<?php 	}}
			else{
			
			$billQr=mysql_query("select opd_bill.visit_id,opd_bill.due_amount,opd_bill.paid_amount,opd_bill.grand_total,opd_items.discount 
from opd_items inner join opd_bill where  opd_bill.visit_id=opd_items.visit_id  && opd_bill.due_amount!=0 
 group by opd_bill.visit_id
");

while($billValues=mysql_fetch_array($billQr)){

 ?>			
                <div class="l_ft settle"><?php echo $visit_id=$billValues['visit_id']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['grand_total']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['paid_amount']; ?></div>
                <div class="l_ft settle"><?php echo $billValues['discount']; ?></div>
                <div class="l_ft settle" style="color:#00F"><?php echo $billValues['due_amount']; ?></div>
                <div class="l_ft settle"><a href="receive_payment.php?visit_id=<?php echo $visit_id;?>">Receive Payment</a></div>
                <div class="cls"></div>
				<?php }
			
			
			
			
			}
						?>
						<?php
						
						
		//				else{}
						?>
		
				
			</div>
			

            			        
        </div>
    </div>
</div>
</body>
</html>
<?php
//}
//else
//{
 //   echo 'Login using admin';
//}
?>

