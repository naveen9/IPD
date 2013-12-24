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
<style type="text/css">
	table{ width:100%; background:red;}
	td{ border-right:1px solid #FFFFFF; text-align:center}
	th{text-align:center;}
	.st_name{ width:15%;}
</style>
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
			var fdate;
			var edate;
			if(month > 2)
				{
					fdate=year;
					edate=++year;
				}
        	else{
					fdate=year-1;
					edate=year;
				}
			document.getElementById('f_date').innerHTML=fdate;
			document.getElementById('e_date').innerHTML=edate;
        }
    });
	
});
 /*style="border:1px solid lightgray"*/
 $(document).ready(function(){
 	$("#line").css("border-bottom","1px solid lightgray");
 });
 
</script>
        
        <script type="text/javascript">
        function sal(){
          
	var total_workingday =document.getElementById("total_workingday").value;
        var workingday =document.getElementById("workingday").value;
        var emp_salary =document.getElementById("emp_salary").value;
        var emp_salary1=(emp_salary/total_workingday)*workingday;
        var emp_salary3=emp_salary1.toFixed();	
	
	
	document.getElementById("emp_salary2").value=emp_salary3;
        
    }
        function tds(){   
	var emp_salary2 =document.getElementById("emp_salary2").value;
      
        var tds_per =document.getElementById("tds_per").value;
        var emp_tds1=(emp_salary2/100)*tds_per;
        var emp_tds=emp_salary2-(emp_salary2/100)*tds_per;
        
        var emp_salary3=emp_tds.toFixed();
	
	document.getElementById("tdsamount").value=emp_tds1;
	document.getElementById("tds_amount").value=emp_salary3;
}


 function final_sal12(){   
      
	var tds_amount =document.getElementById("tds_amount").value;
       
        var medcl =document.getElementById("medcl").value;
        
        var ppf =document.getElementById("ppf").value;
         
         var hra =document.getElementById("hra").value;
         
         var othet_amount1 =document.getElementById("othet_amount").value;
         
         
        var a1=(tds_amount/100)*medcl;
        var a=tds_amount-(tds_amount/100)*medcl;
        
        var b1=(a/100)*ppf;
        var b=a-(a/100)*ppf;
        
         var c1=(b/100)*hra;
        var c=b+(b/100)*hra;
       
       var d1=(c/100)*othet_amount1;
        var d=c+(c/100)*othet_amount1;
       
        var final_sal1=d.toFixed();
        document.getElementById("medclamount").value=a1;
        document.getElementById("ppfamount").value=b1;
        document.getElementById("hraamount").value=c1;
        document.getElementById("otheramount").value=d1;
	document.getElementById("final_sal").value=final_sal1;
        document.getElementById("payment_sal").value=final_sal1;
}
</script>

<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>

  	</head>

<body>
<div id="container">

<?php 
include("header.php"); 
include("menubar.php");

?>
<div class="cls"></div>
<form method="post" action="">
<div id="opd_bill"><span style="margin-left:7px;">Staff Salary</span></div>
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;"><a href="employe.php">Staff Name</a></span>
            <span>
            	<select id="select_size" name="emp_name">
				<?php $docQuery=mysql_query("select * from  employe");
	   
	   ?>
                    <?php while($docValues=mysql_fetch_array($docQuery)){?>
                      <option value="<?php echo $docValues['emp_id']; ?>"><?php echo $docValues['emp_name'].'&nbsp;&nbsp;'.$docValues['emp_id']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
		</div>	
        <div class="r_ht" style=" width:720px;">
    	<div class="f_l" style=" margin-left:450px;">
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
</form>


<?php
if(isset($_POST['update'])){
		
		 $months=$_POST['monthDate'];
	  $emp_id=$_POST['emp_name'];
	 
	  if($_POST['monthDate']){
	    $months=$_POST['monthDate'];
	   $data=explode(" ",$months);
	   $month=$data[0];
	   	 $year=$data[1];
	   
           
           
              $quer_emp = "SELECT * FROM emp_details where emp_id='$emp_id' && YEAR( DATE ) =  '$year' AND MONTH( DATE ) =  '$month'";
    
              $query=mysql_query($quer_emp);
              
            if(mysql_num_rows($query)==0)
            {    
                $query1 = "SELECT * FROM employe where emp_id='$emp_id'";
            $benQuery = mysql_query($query1);
           $benValues=mysql_fetch_array($benQuery);
            }
           if (mysql_num_rows($query)==1) {
               
               echo "<script> alert ('This employe is already paid');  </script>";
              
           
        } 
    
   
    
	   // $query = "SELECT * FROM attendance where emp_id='$emp_id' && YEAR( DATE ) =  '$year'
//AND MONTH( DATE ) =  '$month'";
   // $atten = mysql_fetch_array($query);
                             
      
	
          }
}
?>
	
<div class="cls"></div>
	<div style="width:100%">
            <form method="post" action="staff_detal.php">
     <table>
    	<tr>
        	<th class="st_name">Staff Name</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PayDay&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Salary</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TDS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Mediclaim</th>
            <th>PPF</th>
            <th>HRA</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Others&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Final</th>
            <th>Payment</th>
            <th>Pay</th>
        </tr>
        <tr>
            <?php
            
           $emp_id=$benValues['emp_id'];
          
          $_SESSION['emp_id']=$emp_id;
           ?>
        	<td class="st_name"><?php echo $benValues['emp_name']; ?></td>
                <td><input type="text" style="width:28%; float:left; display:block; " name="total_workingday" id="total_workingday"/><input type="text" style="width:28%;  float:left; display:block; " name="workingday" id="workingday"  onkeyup="sal()"/></td>
                <td><input type="text" style="width:60%;" id="emp_salary2" name="emp_salary2" /></td>
                <input type="hidden" style="width:60%;" id="emp_salary" value="<?php echo $benValues['salary']; ?>"/>
                <td><input type="text" style="width:22%; float:left; display:block;" id="tds_per" name="tds_per" onkeyup="tds()"/><input type="text" style="width:34%; float:left; display:block;" id="tds_amount" name="tds_amount" /></td><input type="hidden" id="tdsamount" name="tdsamount"/>
                <td><input type="text" style="width:60%;  margin:0 auto 0 3px;" id="medcl" name="medcl" onkeyup="final_sal12()"/></td><input type="hidden" id="medclamount" name="medclamount"/>
                <td><input type="text" style="width:60%;  margin:0 auto 0 3px;" id="ppf" name="ppf" onkeyup="final_sal12()"/></td><input type="hidden" id="ppfamount" name="ppfamount"/>
                <td><input type="text" style="width:60%;  margin:0 auto 0 3px;" id="hra" name="hra" onkeyup="final_sal12()"/></td><input type="hidden" id="hraamount" name="hraamount"/>
                <td><input type="text" style="width:28%; margin:0 auto;" id="other_details" name="othet_details"/><input type="text" style="width:28%;  margin:0 auto 0 3px;"id="othet_amount" name="othet_amount" onkeyup="final_sal12()"/></td><input type="hidden" id="otheramount" name="othetamount"/>
            <td><input type="text" style="width:60%;  margin:0 auto 0 3px;"id="final_sal" name="final_sal" value="" /></td>
            <td><input type="text" style="width:60%;  margin:0 auto 0 3px;" id="payment_sal" name="payment_sal"/></td>
            <td><input type="submit" name="pay" value="Pay" class="btn" /></td>
        </tr>
    </table>
            </form>
    <div id="line"></div>
    <div class="cls"></div>
<form method="post" action="">
		<div id="opd_bill">
		<div class="record_feed" style="padding:10px 0px;"> 
		<div class="f_l">
		<span style="margin-left:5px;">Financial Year &nbsp;</span>
            <span>
            	<span id="f_date"></span>&nbsp;-&nbsp;<span id="e_date"></span>
            </span> 
		</div>	
        <div class="r_ht" style=" width:720px;">
    	<div class="f_l" style=" margin-left:450px;">
				<label for="startDate">Month:</label>
			    <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
             
        <div class="" style="margin-right:5px;">
			<input type="submit" name="update1" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
        </div>
        <div class="cls"></div>
  </div>
 </div> 
     <?php
                            if (isset($_POST['update1'])) {

                                $months = $_POST['monthDate'];
                                $docName = $_POST['docName'];
                                $startDate = $_POST['startDate'];
                                $EndDate = $_POST['endDate'];

                                if ($_POST['monthDate']) {
                                    $months = $_POST['monthDate'];
                                    $data = explode(" ", $months);
                                    $month = $data[0];
                                    $year = $data[1];

                                    $_SESSION['month1'] = $month;
                                    $_SESSION['year1'] = $year;

                                    
                                    $query = "SELECT E.emp_name,E.salary,D.date,D.payment,E.emp_id FROM emp_details D,employe E where YEAR( D.date ) =  '$year' AND MONTH( D.date ) =  '$month' and E.emp_id=D.emp_id";
                                    $benQuery1 = mysql_query($query);
                                   
                                }
                            }
                            ?>
    
    
    
  <div class="cls"></div>
      <div style=" width:100%;">
      	<table>
    	<tr>
        	<th class="st_name">Staff Name</th>
            <th>Date</th>
            <th>Paid Amount</th>
            <th>Salary</th>
            <th>Payment</th>
            <th>Due</th>
            <th>Mediclaim</th>
            <th>PPF</th>
            <th>Others</th>
            
         </tr>
             <?php
                                $i = 0;
//$j=0;
                                $fyear = 0;
                                $eyear = 0;
                                while ($benValues = mysql_fetch_array($benQuery1)) {
                                   // $doc_names = $benValues['doctor_name'];


                                    if ($month > 3) {
                                        $fyear = $year;
                                        $eyear = $fyear + 1;
                                    } else {
                                        $fyear = $year - 1;
                                        $eyear = $year;
                                    }
                                    $start_date = $fyear . $month . '00';
                                    $end_date = $eyear . $month . '00';
                                    $query2 = "SELECT sum(payment),sum(due),sum(medcl_amount),sum(ppf_amount),sum(other_amount) FROM emp_details where emp_id='$benValues[4]' &&  date between '$start_date' and '$end_date'";
                                    $benQuery12 = mysql_query($query2) or die(mysql_error());
                                    ?>
            
            
            
        <tr>
        	<td class="st_name"><?php echo $benValues[0]; ?></td>
            <td><?php echo $benValues[2]; ?></td>
            <td><?php echo $benValues[3]; ?></td>
            
            
            <td><?php echo $benValues[1]; ?></td>
            <?php
                                        while ($benValuess = mysql_fetch_array($benQuery12)) {
                           $benValues                 ?>
            <td><?php echo $benValuess[0]; ?></td>
            <td><a href="emp_due.php?pid=<?php echo $benValues[4]; ?>" onclick="javascript:void window.open('emp_due.php?pid=<?php echo $benValues[4]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $benValuess[1]; ?></a></td>
            <td><?php echo $benValuess[2]; ?></td>
            <td><?php echo $benValuess[3]; ?></td>
            <td><?php echo $benValuess[4]; ?></td>
        </tr>
            <?php
                                    }
                                }
                                ?>
    </table>	   
              
<div class="cls"></div> 
 </div>       
<div class="cls"></div>
              
     <div class="doc_datafeed">
     		<div><strong>Total</strong>: <label for="">2000</label></div>
            <div></div>
     </div>       
 <!--<?php echo $pagination;?>	-->
</div>
</div>
</body>
</html>
