<!--<title>Consultation</title>
<body>
<div id="container">-->
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
$sql=  mysql_query("select ipd_billing from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['ipd_billing'];
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
<div id="opd_bill" style="height:20px;">
    <div style="float:left">
        <span class="p_adding">Diagnostics</span>
    </div>
<form method="post" name="form1" action="create_vid2.php">
    <div style="float:right; margin-top:-6px;">
          <span><input type="text" name="search1" placeholder="Bed No" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" style="width:60px;"/></span>
          <span><input type="submit" name="find1" value="Search" class="btn" style="width:100px;"/></span>
     </div>
</form>
 </div>

<div id="main_center_container">
<div class="record_feed">

<form method="post" action="search2.php" autocomplete="off">

    <div id="search_exist">
        <div id="search_txt" class="p_adding">Search Existing Patient</div>
        <div class="p_adding">
            <span><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringDs" onKeyUp="lookupDs(this.value);"  /></span>
            <span><input type="submit" name="find" value="Search" class="btn"/></span>
            <div align="left" class="suggestionsBoxAd" id="suggestionsDs" style="display:none;">
                <div align="left" class="suggestionListAd" id="autoSuggestionsListDs">
                </div>
            </div>
        </div>
    </div>


</form>

<form method="post" name="form1" action="create_vid2.php">
    <div id="add_new_patient">
		<div style="width:100%">
        	<div style="width:35%; float:left">
                <strong>Name</strong>
                <input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
			</div>            
            <div style="width:20%; float:left">
                <strong>Age&nbsp;</strong>
                <input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>"  style="width:60px; "/>
            </div>    
            <div style="width:20%; float:left; margin-top:8px;">
            	<strong>Sex</strong>
                <input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
            </div>
            <div style="width:25%; float:left">    
                <strong>Phone&nbsp;</strong>
                <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:90px;" value="<?php echo $_SESSION['p_mob'];?>" />
                <?php $pid= $_SESSION['p_id'];?>
                <?php //echo  $_SESSION['p_email'];?>
          </div>  
	  </div>
	<div class="cls"></div>
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

<form method="post" action="save_bill2.php" autocomplete="off">


<div style="overflow-y:scroll; overflow-x:hidden; height:250px; padding-left:5px;">
    <div class="consult_head">
        <div class="l_ft w_idth" style="width:200px; text-align:left"><strong>Procedure</strong></div>
        <div class="l_ft w_idth" style="width:150px; text-align:left"><strong>Doctor Incharge</strong></div>
        <div class="l_ft w_idth" style="width:150px; text-align:left"><strong>Amount</strong></div>
        <div class="l_ft w_idth" style="width:150px; text-align:left"><strong>Discount</strong></div>
        <div class="l_ft w_idth" style="width:150px; text-align:left"><strong>Taxrate</strong></div>
        <div class="l_ft w_idth" style="width:150px; text-align:left"><strong>Total Amount</strong></div>
        <table class="l_ft w_idth" align="left">
            <div class="cls"></div>
            <div  class="consult_head">
                <div style="width:200px;  text-align:left; float:left;">
                    <input type="text" size="30" style="font-size:16px;" name="procedure" id="inputStringVpP" onKeyUp="lookupVpP(this.value);"
                           placeholder="procedure" />
               </div>
			   <div  style="width:150px;  text-align:left; float:left;">
					<select name="doc_incharge" style="height:28px;">
						<?php
                        $sel=mysql_query("select doc_name from doc_master_table");
                        while ($data=mysql_fetch_array($sel)) {
                            echo '<option>'.$data[0].'</option>';
                        }
                        ?>
				</select>
			</div>
                <div  style="width:150px;  float:left; text-align:left"><input type="text" name="amount" id="amount" style="width:100px;"/></div>
                <div style="width:150px; float:left;  text-align:left"><input type="text" name="discount" value="0" style="width:100px;"/></div>
                <div style="width:150px; float:left;  text-align:left"><input type="text" name="taxrate" value="0" style="width:100px;"/></div>
                <div style="width:150px; float:left;  text-align:left"><input type="submit" value="Add" name="add" class="btn" style="width:100px;" /></div>
            </div>
		<div class="l_ft"></div>
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
$proc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_doc_name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</td><td>$proc_amount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_taxrate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>$proc_total</td><td><a href='save_bill2.php?delete=$proc_id'>DELETE</a></td>";
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
    <div style=" float:left; width:300px;" class="p_adding"><strong>Other Details</strong></div>
    <div style="float:right; margin-right:180px;">Grand Total :<span><?php echo $grand_total;?></span></div>
</div>
<!-- panel start-->

<div class="fill_data1">
    <span>Source</span>
    <select name="source" style="width:190px; height:20px;"/>
    <?php $select=("select source_name from source");
    $query=mysql_query($select);
    echo '<option>  </option>';
    while($res=mysql_fetch_array($query)){

        echo '<option>'.$res[0].'</option>';
    }
    ?>
    </select>

    <span style="margin-left:30px;">Remarks</span>
    <input name="remarks" type="text" style="width:60%; height:20px;" />
</div>
<!--       panel end -->

<div class="fill_data">
    <div id="bil_id">
        <span><strong>Bill ID :</strong></span>
        <span><label for=""><?php echo $b_id;?></label></span>
    </div>

    <div id="bil_id" style="width:325px;">
        <span><strong>Date:</strong></span>
        <span><label for=""><?php echo $current_date;?></label></span>
    </div>

    <div >
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
