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


include("header.php");
    include("menubar.php");

?>
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
<style>
                    .ui-datepicker-calendar {
                        display: none;
                    }
                </style>


<div id="opd_bill">
	Other Earning
</div>
<div style="line-height:20px; padding:5px; border-bottom:1px solid lightgray;">
	
    <div style="width:25%; float:left;"><a href="earning_add.php"><strong>Earning Group</a></strong></div>
    <div style="width:25%; float:left;"><strong>Details</strong></div>
    <div style="width:25%; float:left;"><strong>Amount</strong></div>
     <div style="width:25%; float:left;"><strong>Date</strong></div>
     <div class="cls"></div>
</div>

<div style="line-height:20px; padding:5px; border-bottom:1px solid lightgray;">
    <form method="post" action="other_add.php">	
	
    <div style="width:20%; float:left;">
    	 <span>
            	<select id="select_size" name="earning_name">
				<?php $docQuery=mysql_query("select * from  earning_table");
	   
	                     while($docValues=mysql_fetch_array($docQuery))
                {
                                 ?>
                      <option value="<?php echo $docValues['ear_no']; ?>"><?php echo $docValues['ear_name']; ?></option>
                      <?php } ?>
                      
				</select>
            </span> 
    </div>
    <div style="width:22%; float:left;"><input type="text" style="width:70%" name="details"></div>
    <div style="width:22%; float:left;"><input type="text" style="width:70%" name="amount"></div>
    <div style="width:16%; float:left;"><input type="date" name="date"> </div>
    <div style="width:19%; float:left; text-align:right;"><input type="submit" value="Add" class="btn" name="ear_add"></div>
    </form>
          <div class="cls"></div>
</div>
                <form method="post">
<div id="opd_bill">
		<div class="record_feed" style="padding:10px 0px;"> 
	<div style="width:10%; float:left;"><strong>Financial Year :</strong></div>
   <div style="width:30%; float:left;"><span id="f_date"></span>&nbsp;-&nbsp;<span id="e_date"></span></div>
    <div style="width:30%; float:left;"><strong>Total : Rs</strong></div>
    <div style="width:30%; float:left; text-align:right"><strong>Month  &nbsp;&nbsp;&nbsp;<input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;<input type="submit" value="Show" class="btn" name="show12"></strong></div>
     <div class="cls"></div>
    </div> 
</div>
<div style="line-height:20px; padding:5px; border-bottom:1px solid lightgray;">
	
	 <?php
        
         $select21=("select G.s_no,G.details,G.amount,G.date,T.ear_name from earning_group G,earning_table T where G.ear_group_id=T.ear_no ORDER BY G.s_no DESC ");
          $result = mysql_query($select21) or die(mysql_error());

            while ($row = mysql_fetch_array($result))
                 {

         ?>
    
    
    
    
	
	<div style="width:10%; float:left;"><?php echo $row[0];?></div>
        <input type="hidden" name="s_no" value="<?php echo $row[0];?>">
    <div style="width:20%; float:left;"><?php echo $row[4];?></div>
    <div style="width:20%; float:left;"><?php echo $row[1];?></div>
     <div style="width:20%; float:left;"><?php echo $row[2];?></div>
      <div style="width:20%; float:left;"><?php echo $row[3];?></div>
      <div style="width:10%; text-align:right; float:left;"><input type="submit" value="Delete" class="btn" name="dell"></div>
     <div class="cls"  style="border-bottom: 1px solid lightgray"></div>
	
<?php
                 }
                 ?>
</div>
</form>
 <div class="cls"></div>
<?php

if (isset($_POST['dell']))
{
    $s_no=$_POST['s_no'];
   
    
    
     mysql_query("DELETE from expenditure_group where exp_group_id='$s_no'")or die(mysql_error());
     header("location: other-expanditure.php");

}


if (isset($_POST['show12']))
{
    $months = $_POST['monthDate'];
                                $data = explode(" ", $months);
                                $month = $data[0];
                                $year = $data[1];
                                
                                 $query = "SELECT sum(amount) FROM expenditure_group where  YEAR( date ) =  '$year' AND MONTH( date ) =  '$month'";
                                $total_pages = mysql_fetch_array(mysql_query($query));
}
   
    
    
    

?>