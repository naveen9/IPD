
<?php
session_start();
error_reporting(0);
include("header.php");
include("menubar.php");
include("condb.php");


if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';
}
if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}
?>


<div id="main_center_container">
    <!--<form method="post" action="s_search.php"></form>-->
    	<form method="post" name="form1" action="s_create_vid.php">
            <div id="opd_bill" style="height:20px;">
           
                    <div style="float:left; width:98%; padding:0% 1%;">
                    	<div style="float:left; width:30%;">
                     	   <strong>Name</strong> &nbsp;: &nbsp;&nbsp;&nbsp;
                        <span><label for> <?php echo $p_id= $_SESSION['p_name']; ?></label></span>
                        </div>
                        <!--<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>-->
                       <div style="float:left; width:10%;">
                        <strong>Age </strong> &nbsp;:
                        	<span><label for> <?php echo $p_id= $_SESSION['p_age']; ?></label></span>
                        </div>
                        <div style="float:left; width:20%; margin-top:6px">
                           <strong> Sex  &nbsp;:</strong>     
                        <input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/>M
                        <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                        </div>
                        <div style="float:left; width:20%;">
                          <strong>Phone &nbsp;</strong>
                          <span><label for> <?php echo $p_id= $_SESSION['p_mob']; ?></label></span>
                         <?php $pid= $_SESSION['p_id'];?>
						 <?php //echo  $_SESSION['p_email'];?>
                        </div>
                       
                </div> 
                        
        </div>
            
          

        
        <div class="cls"></div>

    
  <div class="category">
        <div style="width:200px; float:left; ">
            <span id="cate">Category</span>
            <span style="margin-left:15px;"><input type="radio" name="category" checked="checked" />
                General</span>
            <span><input type="radio" name="category" />Emergency</span>
        </div>
        <div style="width:100px; float:left;margin-left:50px;">
            <span>Patient ID :</span>
            <span><label for> <?php echo $p_id= $_SESSION['p_id']; ?></label></span>
        </div>
        
        <div style="width:100px; float:left;  margin-left:50px;">
            <span style="margin-left:0px;">IP Id :</span>
            <span>
			<?php echo $_SESSION['v_id']; ?>
            </span>
        </div>
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Bed No :</span>
            <span>
			<?php echo $_SESSION['bed_no']; ?>
            </span>
        </div>
        
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Mode :</span>
            <span>
			<?php echo $_SESSION['mode']; ?>
            </span>
        </div>
        <div style="width:100px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Panel :</span>
            <span>
			<?php echo $_SESSION['panel']; ?>
            </span>
        </div>
        <div class="cls"></div>
    </div>
    </form>
   
  <div class="miscel_charge">
      <ul class="visit_sum">
        <li><a href="s_search1.php">Visit</a></li>
            <li><a href="s_search11.php">Procedure</a></li>
            
            <li><a href="s_search.php">Miscellaneous Charges</a></li>
            <li><a href="s_madison_search1.php">Medicine</a></li>
                   <li><a href="s_madison_search.php">Consumamble</a></li>
                   <li><a href="s_search_operation_theater.php">Operation theator</a></li>
                   <li><a href="s_search_ip-management.php">Room Management</a></li>
                   <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
<!--                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>-->
                   <li><a href="s_opd-visit-summary.php">Payment summary</a></li>
                   <li><a href="s_clienthome.php">Patient document</a></li>
      </ul>
      <div class="cls" style="height:2px;"></div> 
    </div>
            <div class="cls"></div>
  

<form method="post" action="s_save_bill2.php">
<div id="opd_bill" style="margin-top:2px;">
    <div class="p_adding" style="float:left; width:200px; font-weight:600">Diagnostics</div>
    
        <div class="cls"></div>
</div>

<div class="section_body">
    <div class="consult_head">
        <div class="l_ft w_idth" style="width:200px; float:left; text-align:left">Diagnostics</div>
        <div class="l_ft w_idth"  style="width:150px; float:left; text-align:left">Doctor Incharge</div>
        <div class="l_ft w_idth" style="width:150px; float:left; text-align:left">Amount</div>
        <div class="l_ft w_idth" style="width:150px; float:left; text-align:left">Discount</div>
        <div class="l_ft w_idth" style="width:150px; float:left; text-align:left">Taxrate</div>
        <div class="l_ft w_idth" style="width:150px; float:left; text-align:left">Total Amount</div>
            <div class="cls"></div>
            <div  class="consult_head">
                <div style="width:200px; float:left; text-align:left">
                    <input type="text" size="30" style="font-size:16px;" name="procedure" id="inputStringVpP" onKeyUp="lookupVpP(this.value);"
                           placeholder="procedure" style="" />
               </div>
				<div class="l_ft" style="width:150px; text-align:center">



<select name="doc_incharge"  style="height:28px;">
<?php
$sel=mysql_query("select doc_name from doc_master_table");
while ($data=mysql_fetch_array($sel)) {
    echo '<option>'.$data[0].'</option>';
}
?>

</select>

</div>
                <div style="width:150px; float:left; text-align:left"><input type="text" name="amount" id="amount" style="width:100px;"/></div>
                <div style="width:150px; float:left; text-align:left"><input type="text" name="discount" value="0" style="width:100px;"/></div>
                <div style="width:150px; float:left; text-align:left"><input type="text" name="taxrate" value="0" style="width:100px;"/></div>
                <div style="width:150px; float:left; text-align:left"><input type="submit" value="Add" name="add" class="btn" style="width:100px;" /></div>
                
            </div>

            <div align="left" class="suggestionsBoxVpP" id="suggestionsVpP" style="display:none;">
                <div align="left" class="suggestionListVpP" id="autoSuggestionsListVpP">
                </div>
            </div>
            <div class="cls"></div>
            <?php
            session_start();
            $v_id=$_SESSION['v_id'];
            $b_id=$_SESSION['b_id'];
            $s_proc_id=$_SESSION['s_proc_id'];

            $q3=mysql_query("select * from opd_items where visit_id='$v_id' and bill_id='$b_id'");
            while($p=mysql_fetch_array($q3))
            {
                $proc_id=$p['proc_id'];
                $_SESSION['proc_id']=$proc_id;  // sending proc_id to  beneficairy_payment
                //$_SESSION['s_proc_id']=$proc_id;


                $proc_name=$p['proc_name'];
                $proc_doc_name=$p['doc_incharge'];
                $proc_amount=$p['amount'];
                $proc_discount=$p['discount'];
                $proc_taxrate=$p['taxrate'];
                $proc_total=$p['total'];
                $proc_date=$p['date'];
                $proc_time=$p['time'];
                $q4=mysql_query("select source,panel,corporate,paymode from patient_panel where  panel_id='$proc_id'")or die(mysql_error());

                while($p2=mysql_fetch_array($q4))
                {
                    $source =$p2['source'];

                    $pan =$p2['panel'];

                    $corp= $p2['corporate'];
                    $paymode =$p2['paymode'];




                    echo  "<tr>";
                    echo "<td>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$source<br/>&nbsp;&nbsp;&nbsp;$pan&nbsp;&nbsp;&nbsp;$corp&nbsp;&nbsp;&nbsp;
$proc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_doc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td><td>$proc_amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_taxrate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_total</td><td><a href='s_save_bill2.php?delete=$proc_id'>DELETE</a></td>";
                    echo "</tr>";
                }
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
<!-- panel start-->

<div class="fill_data1">
    
    <span style="margin-left:5px;">Remarks</span>
    <input name="remarks" type="text" style="width:90%; height:20px;" />
</div>
<!--       panel end -->

<div class="fill_data">
    <div id="bil_id">
        <span><strong>Bill ID :</strong></span>
        <span><label for=""><?php echo $b_id;?></label></span>
    </div>

    <div id="bil_id" style="width:200px;">
        <span><strong>Date:</strong></span>
        <span><label for=""><?php echo $current_date;?></label></span>
    </div>

    <div style="margin-left:0px; float:right">
        <!--<span ><input type="submit" name="save_bill" value="Home" class="btn" /></span>-->
        <span ><input type="submit" name="save_bill" value="Save and Add New" class="btn" /></span>
		<span><input type="submit" name="cancel_bill" value="Cancel Bill" class="btn" />
</span>
</div>

</div>
</form>
</div>
</div>
</div>


</body>
</html>
