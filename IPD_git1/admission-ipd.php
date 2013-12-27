<style type="text/css">
input[type="text"]{ height:80px; border:1px solid #CCC; border-radius:5px;}
</style>
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
     <div class="miscel_charge">
      <ul class="visit_sum">
        <li><a class="last_li" style="color:#FFFFFF; font-weight:900; font-size:90%">IPD Admission</a></li>
        <li  style="float:right "><a href="patient-demographics.php"><img src="image/man.png" width="20" height="20" align="absbottom"/>Demographics</a></li>
        <div class="cls"></div>
        
      </ul>
</div>    
           <div class="cls"></div>
    
   <div id="main_center_container">
    <div class="record_feed">
	
<form method="post" action="search_add-patient.php" autocomplete="off">

		
    	<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
            	<span>
					<input type="text" name="search" placeholder="pid/name/ph/email" id="inputStringAd" onKeyUp="lookupAd(this.value);"  /></span>
					<span style="float:right; margin-top:5px;">
					<input type="submit" name="find" value="Search" class="btn"/></span>
<div align="left" class="suggestionsBoxAd" id="suggestionsAd" style="display:none;" >
				<div align="left" class="suggestionListAd" id="autoSuggestionsListAd">
</div>
</div>
            </div>
        </div>
		

</form>
		
<form method="post" name="form1" action="addpatient.php">
        <div id="add_new_patient">
    	   	<div id="add_txt">Add New Patient</div>
               <div>
            	
            	<strong>Name</strong>
        		
				<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:60px;" /> 
                
                

                
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />
                   <strong>Email&nbsp;</strong>
                   <input type="text" name="p_email" maxlength="50" class="size_input" id="txtChar" style="width:150px;" value="<?php echo $_SESSION['p_email'];?>" />
                 <?php $pid= $_SESSION['p_id'];?>


                   <?php //echo  $_SESSION['p_email'];?>
				 
				<!--  <input type="submit" name="create_visit_id" value="CreateVisitID" class="btn"/>-->
				</div>
				                  
            <div class="cls"></div>
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
				<span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
		</div>
		<div style="width:298px; float:right;  margin-left:50px;">
            <!--<span style="margin-left:0px;"><strong>IP Id :</strong></span>
            <span>
			<?php echo $_SESSION['visit_id']; ?>
            </span>-->    
		</div>	
		<div class="cls"></div>
      </div>

	<div class="cls"></div>


<div class="consult_head" style="vertical-align:middle;">
<div class="l_ft w_idth" style="width:200px; text-align:left; padding-left:5px;"><strong>Date of Admission</strong></div>
       <div class="l_ft w_idth"  style="width:200px; text-align:left; "><strong><a href="Admin_beds.php">Bed No</a></strong></div>
    <div class="l_ft w_idth"  style="width:200px; text-align:left; "><strong><a href="cat.php">Category</a></strong></div>
       <div class="l_ft w_idth"  style="width:160px; text-align:left; padding-left:40px; "><strong>Advance</strong></div>
    <div class="l_ft w_idth"  style="width:150px; padding-left:-60px; text-align:left"><strong><a href="addoc.php">Doctor</a></strong></div>

</div>
<div class="cls"></div>
<div  class="consult_head">
<div class="l_ft" style="width:200px; padding-left:5px; ">
<input type="date"  name="visit_date"/>
</div>




<div class="l_ft"  style="width:200px; text-align:center">
    <select name="bed_no">
        <option value="category" selected> Bed no...........</option>
        <?php
        $query=mysql_query("select no_of_bed from beds_master_table where availability=0 ")or die(mysql_error());
        while($op1=mysql_fetch_array($query))
        {
            echo '<option>'.$op1[0].'</option>';
        }

        ?>
    </select>
</div>


<div class="l_ft"  style="width:200px; text-align:center">
    <select name="room_type">
        <option value="category" selected> Category..........</option>
        <?php
        $query=mysql_query("select room_type from room_type ")or die(mysql_error());
        while($op=mysql_fetch_array($query))
        {
            echo '<option>'.$op[0].'</option>';
        }

        ?>
    </select>
</div>
<div class="l_ft" style="width:200px; text-align:center"><input type="text" name="amount" id="amount" value="<?php echo $_SESSION['crnt_gvn_anmt'];?>" /></div>
<div class="l_ft"></div>
    <div class="l_ft" style="width:190px;">



<select name="doctor">
<?php
$sel=mysql_query("select doc_name from doc_master_table");
while ($data=mysql_fetch_array($sel)) {
    echo '<option>'.$data[0].'</option>';
}
?>

</select>

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
$proc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_doc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td><td>$proc_amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_taxrate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_total</td><td><a href='save_bill.php?delete=$proc_id'>DELETE</a></td>";
echo "</tr>";
}
}
//$sumquery=mysql_query("select sum(total) from opd_items where visit_id='$v_id' and bill_id='$b_id'");
//$grand=mysql_fetch_row($sumquery);
//$_SESSION['grand_total']=$grand[0];
//$grand_total=$_SESSION['grand_total'];
?>
</table>



</div>        



<div id="opd_bill" style="height:20px;">
<div style=" float:left; width:300px;" class="p_adding"><strong>Other Details</strong></div>
    <div style="float:right; margin-right:180px;">  <span><?php echo $grand_total;?></span></div>
</div>
    <!-- panel start-->
    <div class="">
        <div style="float:left; width:40%;  height:40px; padding:10px 0px 55px 10px;">
            <div>
                <input type="radio" name="paymentmode" value="cash" checked="checked"/>&nbsp;&nbsp;&nbsp;<strong>Cash</strong>
            </div>
            <div style="margin-top:15px;">
                <input type="radio" value="credit" name="paymentmode" />&nbsp;&nbsp;&nbsp;<strong>Credit</strong>
            </div>
             <div style="margin-top:15px;">
                <input type="radio" value="Free(Camp)" name="paymentmode" />&nbsp;&nbsp;&nbsp;<strong>Free(Camp)</strong>
            </div>
            
        </div>

        <div style="float:left; width:40%;  margin-left:50px;  padding:10px 0px 5px 10px;">
            <div>
                <div style="float:left; width:150px; margin-bottom:15px;">
                    <input type="radio" name="rad" id="pan" onClick="first()"/>&nbsp;&nbsp;&nbsp;
                    <strong><a href="pc-list.php">panel</a></strong>
                </div>
                <div style="float:left; display:none; width:190px;" id="panell">
                    <select  name="panel" list="browser" style="width:190px; height:25px; margin-left:4px;"/>
                    <datalist  id="browser">
                        <option value="0">Select a panel</option>
                        <?php $select=("select panel_name from panel");
                        
                        $query=mysql_query($select);
                        
                        while($res=mysql_fetch_array($query)){
                       echo '<option>'.$res[0].'</option>';
                        }
                        ?>
                    </datalist>
                    </select>
                </div>
                <div class="cls"></div>
            </div>
            <div>
                <div style="float:left; width:150px; margin-bottom:15px;">
                    <input type="radio"  name="rad" id="cor" onClick="second()" />&nbsp;&nbsp;&nbsp;
                    <strong><a href="pc-list.php">Corporate</a></strong>
                </div>
                <div style="float:left; display:none; width:190px;" id="corporatee">
                    <select  name="corp" list="corporate" style="width:190px; height:25px; margin-left:4px;"/>
                    <datalist id="corporate">
                        <option value="0">Select a corporate</option>
                        <?php $select=("select corp_name from corporate");
                        $query=mysql_query($select);
                       
                        while($res=mysql_fetch_array($query)){
                            ?>
                 <option><?php echo $res[0]; ?></option>

           <?php
                        }
                        ?>



                    </datalist>
                </select>
                </div>
                <div class="cls"></div>
                <div style="float:left; width:150px;">
                    <input type="radio" name="rad" id="non" checked="checked" onClick="third()" />&nbsp;&nbsp;&nbsp;
                    <strong>none</strong>
                </div>

                <div class="cls"></div>
            </div>
        </div>
        <div class="cls"></div>
    </div>
    <script type="text/javascript">
        function first()
        {
            if(document.getElementById('pan').checked)
            {
                document.getElementById('panell').style.display="block";
                document.getElementById('corporatee').style.display="none";
            }
        }
        function second()
        {
            if(document.getElementById('cor').checked)
            {
                document.getElementById('corporatee').style.display="block";
                document.getElementById('panell').style.display="none";
            }
        }
        function third()
        {
            if(document.getElementById('non').checked)
            {
                document.getElementById('panell').style.display="none";
                document.getElementById('corporatee').style.display="none";
            }
        }
    </script>
<div class="fill_data1">
    <span><a href="source-list.php">Ref.Doctor</a></span>
    <select name="source" style="width:190px; height:25px;"/>
    <?php $select=("select source_name from source");
    $query=mysql_query($select);
    echo '<option>  </option>';
    while($res=mysql_fetch_array($query)){

        echo '<option>'.$res[0].'</option>';
    }
    ?>
    </select>

    <span style="margin-left:30px;">Remarks</span>
    <input name="remarks" type="text" style="width:53%; height:25px;" />
</div>
<div class="cls"></div>
<!--      panel end -->

<div class="fill_data">
<div id="bil_id" style="width:900px; float:left; text-align:right;">	
<span><strong>&nbsp;</strong></span>
<span><label for=""><?php echo $current_date;?></label></span>

<input type="submit" name="Add_patient" value="Add patient" class="btn" />
</form>
</div>
 <form method="post" action="admiss_cancl_save.php">

<span><input type="submit" name="cancel_bill" value="Cancel" class="btn" />
</span>
<span>


</span>
 </form>





</body>
</html>
