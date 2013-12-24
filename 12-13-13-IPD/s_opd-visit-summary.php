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
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
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

<form method="post" action="search_opd_visit.php">
	  	
      
      
        <div id="main_center_container">
    <div class="record_feed">
    

        
        
        


        

        <div id="opd_bill" style="height:23px;"> 
        <span class="f_l m_r">Bill Settlement</span> 

        
        
   
                    <div style="float:left;">
                        <strong>Name &nbsp;: </strong>&nbsp;&nbsp;&nbsp;
                        <span><label for> <?php echo $p_id= $_SESSION['p_name']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!--<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>-->
                        <strong>Age  &nbsp;:</strong>
                        <span><label for> <?php echo $p_id= $_SESSION['p_age']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 
                        <input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                        <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                          <strong>Phone &nbsp;</strong>
                          
                          <span><label for> <?php echo $p_id= $_SESSION['p_mob']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <?php $pid= $_SESSION['p_id'];?>

                        <?php //echo  $_SESSION['p_email'];?>
                </div>  
                </div>       
        </div>
            
          

        
        <div class="cls"></div>

    
  <div class="category">
        <div style="width:300px; float:left; ">     
            <span id="cate"><strong>Category</strong></span>
            <span style="margin-left:15px;"><input type="radio" name="category" checked="checked" />
                <strong>General</strong></span>
            <span><input type="radio" name="category" /><strong>Emergency</strong></span>
        </div>
        <div style="width:150px; float:left;margin-left:50px;">
                <span><strong>Patient ID :</strong></span>
                <span><label for> <?php echo $p_id= $_SESSION['p_id']; ?></label></span>
        </div>
        <div style="width:198px; float:left;  margin-left:50px;">
            <span style="margin-left:0px;"><strong>Bed No :</strong></span>
            <span>
            <?php echo $_SESSION['bed_no']; ?>
            </span>    
        </div>  
        <div style="width:198px; float:right;  margin-left:0px;">
            <span style="margin-left:0px;"><strong>IP Id :</strong></span>
            <span>
            <?php echo $_SESSION['v_id']; ?>
            </span>    
        </div>  
        <div class="cls"></div>
      </div>
    </form>
    <div>
        <div class="miscel_charge">
      <ul class="visit_sum">
                            <li><a href="s_search1.php">Visit</a></li>
            <li><a href="s_search11.php">Procedure</a></li>
            <li><a href="s_search2.php">Diagnosis</a></li>
            <li><a href="s_search.php">Miscellaneous Charges</a></li>
            <li><a href="s_madison_search1.php">Medicine</a></li>
                   <li><a href="s_madison_search.php">Consumamble</a></li>
                   <li><a href="s_search_operation_theater.php">Operation theator</a></li>
                   <li><a href="s_search_ip-management.php">Room Management</a></li>
                   <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
<!--                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>-->
                   
                   <li><a href="s_clienthome.php">Patient document</a></li>
                </ul>
    <div class="cls" style="height:2px;"></div> 
     </div>
    </div>
        <div class="cls"></div>
      

</form>
     <div style="width:100%; margin:0 auto;">
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
                <div class="op_vi_s"><strong>Bill ID</strong></div>
                <div class="op_vi_s"><strong>Date </strong></div>
                <div class="op_vi_s"><strong>Amount </strong></div>
                <div class="op_vi_s"><strong>print</strong></div>
            <div class="cls"></div>
         </div>
         <?php
         $v_id=$_SESSION['v_id'];
         $select21=("select * from opd_bill where visit_id=$v_id and paid_amount !='nall' and paid_amount !=0");
          $result = mysql_query($select21) or die( "Could not execute sql: {$sql}");

            while ($row = mysql_fetch_array($result))
                 {

         ?>
           <form>
            <div style=" height:25px; padding:5px 5px 5px 5px; background:#FFF;">
            <input type="hidden" name="chk" value="<?php echo $row['bill_id'];?>"/>        
            <div class="op_vi_s">&nbsp;<?php echo $row['bill_id'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['billedtime'];?></div>
            <div class="op_vi_s">&nbsp;<?php echo $row['paid_amount'];?></div>
            <div class="op_vi_s"><input type="submit" name="print1" value="print" class="btn"/></div>
            	<div class="cls"></div>
			</div>
      </form>

            <?php } ?>
        
        <?php
         $v_id=$_SESSION['v_id'];
         //echo $v_id;
         
          $result1 = mysql_query("select SUM(grand_total),SUM(due_amount),SUM(paid_amount) from opd_bill where visit_id=$v_id") or die( "Could not execute sql: {$sql}");

            $row1 = mysql_fetch_row($result1) or die( "Could not execute sql: {$sql}");
            
            
          
                 

         ?>
        <div class="fill_data">
		  <div class="op_vi_s">Total Amount &nbsp; : &nbsp;<?php echo $row1[0];  ?></div>
          <div class="op_vi_s">Receive Amount &nbsp; : &nbsp;<?php echo $row1[2];  ?></div>
          <div class="op_vi_s">Due Amount &nbsp; : &nbsp;<?php echo $row1[1];  ?></div>
          <div class="op_vi_s" style="float:right">
           <a href="bill-summary.php" class="btn">Total Bill Summary</a>
          </div>
    </div>

</div>

<?php

    if(isset($_POST['print1']))
             {
                 $chk=$_POST['chk'];
                 //mysql_query("delete from medicine_store where m_id='$chk'")or die(mysql_error());
                 $_session['chk'];
                 echo '<script type="text/javascript">window.open( "print_duble.php" )</script>';
             }


             ?>
    

</body>
</html>

