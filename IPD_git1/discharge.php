<?php
ob_start();
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
if(empty($_SESSION['uid']))
{
    header('location:index.php');
}
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}


        
        include("header.php");
	include("menubar.php");
//$event=$_REQUEST['event'];
//$_SESSION['v_id']=$event;
$v_id=$_SESSION['visit_id'];
$r_id=$_SESSION['r_id'];
$proc_status=1;
$uname=$_SESSION['uname'];
$date=date("y-m-d");
$time=date("H:i:s");
if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';}


//SUM TOTAL DUE ON SELECTED VISIT ID
$tdue=("SELECT SUM(due_amount) AS due_amount FROM opd_bill WHERE visit_id ='$v_id'");
//echo $tdue;

$res=mysql_query($tdue);
if (mysql_num_rows($res)>0) {
    while ($row=mysql_fetch_array($res)) {
        $total_due = $row["due_amount"];
    };
};


//save_receipt.............................................
$name=$_SESSION['uname'];
$amount=$_POST['amount'];
$refund=$_POST['refund'];
$mode=$_POST['mode'];
$trans_details=$_POST['trans_details'];
$disc_amount=$_POST['disc_amount'];
$remark=$_POST['remark'];

$billtime=date("H:i:s");

date_default_timezone_set('Asia/Kolkata');
$disc_date=date("d/m/20y");
//echo "<br/>";
$disc_time=date("H:i:s");






//-----print----bill----------
if($_POST['print_receipt'])
{
    if($v_id=="")
    {
        echo "Please fill all details";
    }
    else
    {
        $final_due_amount=$due_amount-$amount;
        if($total_due<= 0)
        {
            //$final_due_amount=$due_amount-$amount-$disc_amount;
            mysql_query("update opd_bill set due_amount=0 where visit_id='$v_id'");

        }
        if($total_due>0)
        {
            //$amount1=$due_amount-$avd_due_1;

            //$final_due_amount=$due_amount-$amount-$disc_amount-$avd_due_1;
            mysql_query("update opd_bill set due_amount=0 where visit_id='$v_id'");
            mysql_query("insert into opd_bill values('','$amount','$final_due_amount','$amount','$remark','paid','$mode','$trans_details','NULL','$disc_amount','$date','$time','$v_id','$proc_status','$uname')");
            $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['b_id']=$fet_b_id[0];
            mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','','$amount','$disc_amount','$mode','$date','$time')");

        }

    }


    echo '<script type="text/javascript">window.open( "print_dis.php" )</script>';

//header("location:print.php");
}
?>
<?php
if($_POST['print_dis'])
{
    date_default_timezone_get ('asia/kolkata');
    $billdate=date('Y-m-d');
    mysql_query("update beds_master_table set availability=0,p_id=0 where p_id='$p_id'");
    mysql_query("update visit_register set bed_no=0 where p_id='$p_id'");
    mysql_query("update room_charge set bed_no=0 where v_id ='$v_id'");
    mysql_query("insert into discharge_table values('','$p_id','$v_id','$disc_date','$disc_time')");

    echo '<script type="text/javascript">window.open( "print_discharge.php" )</script>';
    echo '<META http-equiv="refresh" content="0;URL=admission-ipd.php">';
    unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['bed_no']);
    //unset($_SESSION['visit_id']);
    unset($_SESSION['b_id']);
    unset($_SESSION['due_amount']);
   unset($_SESSION['paid_amount1']);
    unset($_SESSION['grand_total']);


}
?>









<div class="container">
                <div class="record_feed">

        <form method="post" action="discharge_search.php">


            <div id="search_exist">
                <div id="search_txt" class="p_adding">Search Existing Patient</div>
                <div class="p_adding">
        <span><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringDi" onKeyUp="lookupDi(this.value);"   /></span>
                    <span style="float:right; margin-top:5px;"><input type="submit" name="find" value="Search" class="btn"/></span>
                    <div align="left" class="suggestionsBoxDi" id="suggestionsDi" style="display:none;">
                        <div align="left" class="suggestionListDi" id="autoSuggestionsListDi">
                        </div>
                    </div>
                </div>
            </div>





            <div id="add_new_patient">
<div id="add_txt" style="float:left; width:300px;">Add New Patient</div>
    <div id="add_txt"  style="float:right; width:160px;">
            	<span><input type="text" name="search1" placeholder="Bed No" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" style="width:60px;"/></span>
                <span><input type="submit" name="find1" value="Search" class="btn"/></span>
            </div>
              <div class="cls"></div>

        </form>


                <form method="post">
                <div>

                    <strong>Name</strong>

                    <input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>

                    <strong>Age&nbsp;</strong>

                    <input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:60px;" />




                    <input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                    <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>

                    <strong>Phone&nbsp;</strong>

                    <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />

                    <?php $pid= $_SESSION['p_id'];?>


                    <?php //echo  $_SESSION['p_email'];?>

                    <!--  <input type="submit" name="create_visit_id" value="CreateVisitID" class="btn"/>-->
                </div>

                <div class="cls"></div>
            </div>

            <div class="cls"></div>
            <!--   ukewyg   -->


        <div style="width:100%; margin:0 auto;">
            <div class="right-content">
            <div id="opd_bill">
            <span style="margin-left:10px;"><strong>Bed No :<label id="rr"><?php echo $_SESSION['bed_no'];?></label> </strong></span>
            <span style="margin-left:165px;">Bill ID : </span>
            <span><?php echo $bill_id;?></span>
            <span style="margin-left:165px;">Visit ID : </span>
<span>
<?php
echo $v_id;
?></span>

 </div>
                <div class="right_top">
                    <div style="float:left; width:200px; padding-top:8px;">&nbsp;</div>
                    <div style="float:left; width:260px;">
                        <span style="margin-right:10px"><strong>Date :</strong></span>
                        <span><input type="text" name="tdue"  value="<?php echo $disc_date;?>" style="width:120px"/></span>
                    </div>
                    <div style="float:left; width:220px;">
                        <span style="margin-right:10px"><strong>Time :</strong></span>
                        <span><input type="text" name="tdue"  value="<?php echo $disc_time;?>" style="width:60px"/></span>
                    </div>
                    <div style="float:right; width:220px;">
                        <span style="margin-right:10px"><strong>Total Due Amount :</strong></span>
                        <span><input type="text" name="tdue"  value="<?php echo $total_due;?>" style="width:60px"/></span>
                    </div>

                    <div class="cls"></div>
                </div>
                <div style="">

                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr class="b">
                            <td><div class="lbl_txt" style="margin-left:10px;">
                                    Amount
                                </div>
                            </td>
                            <td><div>
                                    <input type="text" name="amount" value="<?php echo $total_due;?>" class="i" style="width:50px;"/>&nbsp;&nbsp;&nbsp;
                                    <!--                <label for="" style="color:#0000A8">Due Amount&nbsp;:</label>
                                    <label for="">1000 &nbsp;&nbsp;&nbsp;</label>-->
                                </div></td>
                        </tr>
                        <tr class="b">
                            <td><div style="margin-left:10px;">Payment Mode</div></td>
                            <td><div>
                                    <span><input type="radio" name="mode" value="cash" class="raodd" checked />&nbsp;&nbsp;Cash</span>
                                    <span><input type="radio" name="mode" value="credit_card" />&nbsp;&nbsp;Credit Card</span>
                                    <span><input type="radio" name="mode"  value="debit_card"/>&nbsp;&nbsp;Debit Card</span>
                                    <span><input type="radio" name="mode" value="cheque_draft" />&nbsp;&nbsp;Cheque/Draft</span>
                                </div></td>
                        </tr>
                        <tr class="b">
                            <td><div style="margin-left:10px;">Transaction Details</div></td>
                            <td><div>
                                    <textarea name="trans_details" style="width:350px; height:100px;"></textarea>
                                </div></td>
                        </tr>

                    </table>

                </div>



                <div class="fill_data">
                    <div id="bil_id" style="width:800px">
                        <div style="float:left;">
                            <input type="checkbox" name="refund" onclick="showMe1('dis', this)"/>&nbsp;&nbsp;&nbsp;Refund
                        </div>
                        <div id="dis" style=" margin-left:170px; font-style:float:left">
<span>
<label for="" style="color:#0000A8">&nbsp;&nbsp;&nbsp;Discount to Patient&nbsp;:</label>
</span>
                            <span><input type="text" name="disc_amount" placeholder="Amount" style="width:50px;"/></span>

                            <span><input type="text" name="remark" style="width:300px;" /></span>
                        </div>
                    </div>
                    <div id="save_clear">
<span>
<!--<input type="submit" name="cancel_receipt" value="Cancel" class="btn" />-->
</span>
<span>

</span> <span>
 <input type="submit" value="Print" name="print_receipt" class="btn"/>
<input type="submit" value="Bill summary" name="print_dis" class="btn"/>

<a href="admission-ipd.php" class="btn">Home</a>

</span> </div>
                </div>
            </div>
        </div>
    </div>

    </div>

</form>
</body>
</html>
