<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultation</title>
<link rel="stylesheet" type="text/css" href="style_by.css"/>
<script src="hide_show.js" type="text/javascript"></script>
<script src="selectValid.js" type="text/javascript"></script>
	
</head>

<body>
<div id="container">
<?php
include("head.php"); 
include("menu.php");
include("condb.php");
if($_REQUEST['error_msg'])
{
$message=$_REQUEST['error_msg'];
echo $message;
}
?>

    


    <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Consultation/procedure</span>
        </div>
        <div style="float:right; margin-right:10px;">
        	<a href="patient-demographics.html"><img src="man.png"  width="20" height="20" align="absbottom"/>Demographics</a>
        </div>
   </div>
    
   <div id="main_center_container">
    <div class="record_feed">
	
<form method="post" action="search.php">
		
    	<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
            	<span><input type="text" name="search" placeholder="PID/Name/Ph/Email" /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
            </div>
        </div>
</form>
		
<form method="post" name="form1" action="create_vid.php">
        <div id="add_new_patient">
    	   	<div id="add_txt">Add New Patient</div>
               <div>
            	
            	Name
        		
				<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                Age&nbsp;
                
				<input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" /> 
                
                

                
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  Phone&nbsp;
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:90px;" value="<?php echo $_SESSION['s_mob'];?>" />
                  
                  Email&nbsp;
				  <input type="email" name="email" style="width:150px;"value="<?php echo $_SESSION['p_email'];?>"/>
				 
				  <input type="submit" name="create_visit_id" value="CreateVisitID" class="btn"/>
				</div>
				                  
            <div class="cls"></div>
          </div>
          
        </div>
		
        <div class="cls"></div>
    </div>
    
  <div class="category">
		<div style="width:300px; float:left; ">		
    		<span id="cate">Category</span>
            <span style="margin-left:15px;"><input type="radio" name="category" checked="checked" />General</span>
            <span><input type="radio" name="category" />Emergency</span>
		</div>
		<div style="width:150px; float:left;margin-left:50px;">
				<span>Patient ID :</span>
				<span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
		</div>
		<div style="width:298px; float:right;  margin-left:50px;">
            <span style="margin-left:0px;">Visit Id :</span>
            <span>
			<?php echo $_SESSION['v_id']; ?>
            </span>    
		</div>	
		<div class="cls"></div>
      </div>
    </form>
	
<form method="post" action="save_bill.php">
<div id="opd_bill">
<span class="p_adding">Procedure</span>
</div>

<div style="overflow-y:scroll; overflow-x:hidden; height:250px; padding-left:5px;">  
<div class="consult_head">
<div class="l_ft w_idth">Procedure</div>
<div class="l_ft w_idth">Doctor Incharge</div>
<div class="l_ft w_idth">Amount</div>
<div class="l_ft w_idth">Discount%</div>
<div class="l_ft w_idth">Taxrate%</div>
<div class="l_ft w_idth">Total Amount</div>
<table class="l_ft w_idth" align="left">
<div class="cls"></div>
<div class="consult_head">
<div class="l_ft" style="width:150px;"><input type="text" name="procedure" /></div>
<div class="l_ft" style="width:160px;"><input type="text" name="doc_incharge"/></div>
<div class="l_ft" style="width:160px;"><input type="text" name="amount"/></div>
<div class="l_ft" style="width:160px;"><input type="text" name="discount" value="0"/></div>
<div class="l_ft" style="width:180px;"><input type="text" name="taxrate" value="0"/></div>
<div class="l_ft" style="width:100px; text-align:center"><input type="submit" value="Add" name="add" class="btn" /></div>
<div class="l_ft"></div>
</div>
<div class="cls"></div> 
<?php
session_start();
$v_id=$_SESSION['v_id'];
$b_id=$_SESSION['b_id'];
$q3=mysql_query("select * from opd_items where visit_id='$v_id' and bill_id='$b_id'");
while($p=mysql_fetch_array($q3))
{
$proc_id=$p['proc_id'];
$_SESSION['s_proc_id']=$proc_id;
$proc_name=$p['proc_name'];
$proc_doc_name=$p['doc_incharge'];
$proc_amount=$p['amount'];
$proc_discount=$p['discount'];
$proc_taxrate=$p['taxrate'];
$proc_total=$p['total'];
$proc_date=$p['date'];
$proc_time=$p['time'];
echo "<tr>";
echo "<td>$proc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_doc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td><td>$proc_amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_taxrate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_total</td><td><a href='save_bill.php?delete=$proc_id'>DELETE</a></td>";
echo "</tr>";
}
$sumquery=mysql_query("select sum(total) from opd_items where visit_id='$v_id' and bill_id='$b_id'");
$grand=mysql_fetch_row($sumquery);
$_SESSION['grand_total']=$grand[0];
$grand_total=$_SESSION['grand_total'];
?>
</table>

</div>

</div>        



<div id="opd_bill" style="height:20px;">
<div style=" float:left; width:300px;" class="p_adding">Other Details</div>
<div style="float:right; margin-right:180px;">Grand Total :<span><?php echo $grand_total;?></span></div>
</div>

<div class="fill_data">
<div id="bil_id">
<span><strong>Bill ID :</strong></span>
<span><label for=""><?php echo $b_id;?></label></span>
</div>

<div id="bil_id" style="width:200px;">
<span><strong>Date:</strong></span>
<span><label for=""><?php echo $current_date;?></label></span>
</div>
   <!-- panel start-->
   <div class="fill_data">
      <div style="float:left; width:100%;">        
            <span>
              <input type="radio" name="paymentmode" checked="checked"/>&nbsp;&nbsp;&nbsp;Cash
           </span>
           <span style="margin-left:10px;">
                <input type="radio" name="paymentmode" />&nbsp;&nbsp;&nbsp;Credit
            </span>
        </div>  
    
       <div style="float:left; width:100%; padding-top:15px; margin-left:10px;">
      <span>
          <input type="radio" name="panel"  />&nbsp;&nbsp;&nbsp;
                <strong>panel</strong>
            <select style="width:190px; height:20px;"/>
          <?php
          $sele=("SELECT panel FROM pc");
          $qwerty=mysql_query($sele);
        while($pc=mysql_fetch_array($qwerty)){

echo '<option>'.$pc['panel'].'</option>';

        }
          ?>
                     </select>
        </span>
        <span style="margin-left:40px;">
          <input type="radio" name="corporate" />&nbsp;&nbsp;&nbsp;
              <strong>Corporate</strong>
            <select style="width:190px; height:20px;"/>
           <!--Start--corporate-->
            <?php
            $sele=("SELECT corporate FROM pc");
            $qwerty=mysql_query($sele);
            while($pc=mysql_fetch_array($qwerty)){

                echo '<option>'.$pc['corporate'].'</option>';

            }
            ?>
                     </select>
            <!---Entered-corporate---->
        </span>
        <span>
         Discount</span>
            <span><input type="text" style="width:50px;" id="txtChar" onkeypress="return validateNumbersOnly(event)" /></span>
       </div>
       <div class="cls"></div>
      </div>
      
     <!-- <div class="fill_data1">
        <span>Source</span>
        <span>
          <select style="width:190px; height:20px;"/>
                     <option value="volvo">......................</option>
                     </select>
        </span>
          <span style="margin-left:30px;">Remarks</span>
            <input type="text" style="width:60%; height:20px;" />
      </div>
<!--       panel end -->      

<div >            
<span ><input type="submit" name="save_bill" value="Save and Add New" class="btn" /></span>
<span><input type="submit" name="cancel_bill" value="Cancel Bill" class="btn" />
</span>
<span>
<input type="submit" name="make_payment" value="Make Payment" class="btn">

</span>
</div>



</div>
</div>
</div>
</form>
</body>
</html>
