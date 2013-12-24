 	<?php
session_start();
error_reporting(0);
include("condb.php");

  $uid=$_SESSION['uid'];
  
if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select reception from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['reception'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
  
include("header.php"); 
include("menubar.php");



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


	  	<div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Payment summary</div> 
 <form method="post" action="search_opd_visit.php" autocomplete="off">               
        <div style="float:right; margin-top:-6px;">
          <span><input type="text" name="search1" placeholder="Bed No"  style="width:60px;"/></span>
                <span><input type="submit" name="find1" value="Search" class="btn" style="width:100px;"/></span>
        </div>
 </form>
   </div>
      
      
        <div id="main_center_container">
    <div class="record_feed">
    
<form method="post" action="search_opd_visit.php" autocomplete="off">
        
        <div id="search_exist">
            <div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
                <span>
            <input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringCo" onKeyUp=				                     "lookupCo(this.value);" onBlur="fillCo();"  /></span>
                            <span><input type="submit" name="find" value="Search" class="btn"/></span>
                        <div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
						<div align="left" class="suggestionListAd" id="autoSuggestionsListCo"></div>
</div>
            </div>
        </div>
        


        

        <div id="add_new_patient">
            <div id="add_txt" style="float:left; width:300px;">&nbsp;</div>
            <div id="add_txt"  style="float:right; width:160px;">
              
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
                 <?php //$pid= $_SESSION['p_id'];?>


                   <?php //echo  $_SESSION['p_email'];?>
                 

                </div>
                                  
            <div class="cls"></div>
          </div>
          

        
        <div class="cls"></div>
      

</form>
     <div style="width:100%; margin:0 auto;">
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
                <div class="op_vi_s"><strong>Receipt Id</strong></div>
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

