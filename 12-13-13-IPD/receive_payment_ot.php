<?php
session_start();
error_reporting(0);
include("header.php");
include("menubar.php");
include("condb.php");
//$event=$_REQUEST['event'];
//$_SESSION['v_id']=$event;

if($_GET['visit_id']){

 $_SESSION['v_id']=$_GET['visit_id'];
}

$v_id=$_SESSION['v_id'];echo "<br>";
$r_id=$_SESSION['r_id'];
$proc_status=1;
$uname=$_SESSION['uname'];
  $date=date("y-m-d");
 $time=date("H:i:s");

$query=mysql_query("select * from opd_bill where visit_id='$v_id'");
while($res=mysql_fetch_array($query))
{
$bill_id=$res['bill_id'];
    $billdate=$res['billeddate'];
    $_SESSION['billeddate']=$billdate;
    $_SESSION['bill_id_opd']=$bill_id;
$due_amount=$res['due_amount'];
}
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
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("d-m-y");
$billtime=date("H:i:s");





//SELECT BILL ID FROM PATIENT ADVANCE
$selbill_id=mysql_query("select bill_id from patient_advace where visit_id='$v_id' ")or die(mysql_error()."Select BILL ID ERROR");
$advance_bill_id=mysql_fetch_array($selbill_id);
$abi= $advance_bill_id[0];//BILL ID FROM PATIENT_ADVANCE
$selopd_pay=mysql_query("select due_amount,paid_amount from opd_bill where bill_id='$abi'")or die(mysql_error()."Select DUE ERROR");
$avd_due=mysql_fetch_array($selopd_pay);
$avd_due_2=$avd_due[0];
$avd_due_1=$avd_due_2*(-1);//DUE AMOUNT FROM  OPD BILL
$avd_pad_1=$avd_due[1];

//$sub_total=$avd_due_1 + $amount;
//$pad_total=$avd_pad_1 - $amount;


//mysql_query("update opd_bill set due_amount='$sub_total',paid_amount='$pad_total' where bill_id='$abi'");







if($_POST['save_receipt'])
{
if($v_id=="")
{
echo "Please fill all details";
}
else
{

    		if($refund==true)
			{
			$amount=$amount*-1;

			}

			else{$amount=$amount;}

$final_due_amount=$due_amount-$amount-$disc_amount;
$res=mysql_query("update opd_bill set due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
//if($res){echo "66<br>";}
$fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");
while($fetched_p_id=mysql_fetch_array($fetch_p_id))
{
//echo "70<br>";
 $p_id=$fetched_p_id['p_id'];echo "<br>";
}
$res1=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//if($res1){echo "74<br>";}
$receiptquery=mysql_query("select * from opd_recpt where visit_id='$v_id'");
//if($receiptquery){echo "76<br>";}
while($receipt_result=mysql_fetch_array($receiptquery))
{
//echo "79<br>";
$recp_id=$receipt_result['recpt_id'];
$recption_name=$receipt_result['recption_id'];
$visit_id=$receipt_result['visit_id'];
$p_id=$receipt_result['p_id'];
$new_due_amnt=$receipt_result['new_due_amnt'];
$crnt_gvn_anmt=$receipt_result['crnt_gvn_anmt'];
$crnt_discount=$receipt_result['crnt_discount'];
$payment_mode=$receipt_result['payment_mode'];
}
$received_amount=$crnt_gvn_anmt+$crnt_discount;
//FINAL DUE AMOUNT
$final_due=$total_due-$received_amount;
//THIS SESSION HOLD FINAL DUE AND USE IT PRINT PAGE
$_SESSION['final_due']=$final_due;

echo
"
<center>
Receipt ID :$recp_id<br>
Receptionist :$recption_name<br>
Visit ID :$visit_id<br>
Patient ID:$p_id<br>

Final Due Amount :$final_due<br>
Received Amount :$received_amount<br>
Discount :$crnt_discount<br>
Payment Mode :$payment_mode
</center>
";
unset($_SESSION['v_id']);
}
}
//-----cancel--bill-------------
if($_POST['cancel_receipt'])
{
unset($_SESSION['v_id']);
}
//-----print----bill----------
if($_POST['print_receipt'])
{
if($v_id=="")
{
echo "Please fill all details";
}
else
{
    $final_due_amount=$due_amount-$amount-$disc_amount;
    if($due_amount<=$avd_due_1)
    {
        //$final_due_amount=$due_amount-$amount-$disc_amount;
        mysql_query("update opd_bill set due_amount=0,paid_amount=0,dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
        $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");

        $sub_total=$avd_due_1-$due_amount;
        $sub_total1=$sub_total*(-1);
        mysql_query("update opd_bill set due_amount='$sub_total1' where bill_id='$abi'");
//if($fetch_p_id){echo "129";}
        while($fetched_p_id=mysql_fetch_array($fetch_p_id))
        {
//echo "132<br>";
            $p_id=$fetched_p_id['p_id'];
        }
        $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
    }
    if($due_amount>$avd_due_1)
    {
        //$amount1=$due_amount-$avd_due_1;

        $final_due_amount=$due_amount-$amount-$disc_amount-$avd_due_1;
        mysql_query("update opd_bill set due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
        $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");

        $sub_total=$due_amount-$avd_due_1;
        mysql_query("update opd_bill set due_amount=0 where bill_id='$abi'");
//if($fetch_p_id){echo "129";}
        while($fetched_p_id=mysql_fetch_array($fetch_p_id))
        {
//echo "132<br>";
            $p_id=$fetched_p_id['p_id'];
        }
        $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
    }
    if($avd_due_1==0)
    {
$final_due_amount=$due_amount-$amount-$disc_amount;
mysql_query("update opd_bill set due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
$fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");
//if($fetch_p_id){echo "129";}
while($fetched_p_id=mysql_fetch_array($fetch_p_id))
{
//echo "132<br>";
$p_id=$fetched_p_id['p_id'];
}
$res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
    }
}
echo '<script type="text/javascript">window.open( "print_ot.php" )</script>';

//header("location:print.php");
}
?>
<?php
//PRINT OPD FLIP

if($_POST['opd_flip'])
{
    if($v_id=="")
    {
        echo "Please fill all details";
    }
    else
    {
        $final_due_amount=$due_amount-$amount-$disc_amount;
        if($due_amount<=$avd_due_1)
        {
            //$final_due_amount=$due_amount-$amount-$disc_amount;
            mysql_query("update opd_bill set due_amount=0,paid_amount=0,dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
            $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");

            $sub_total=$avd_due_1-$due_amount;
            $sub_total1=$sub_total*(-1);
            mysql_query("update opd_bill set due_amount='$sub_total1' where bill_id='$abi'");
//if($fetch_p_id){echo "129";}
            while($fetched_p_id=mysql_fetch_array($fetch_p_id))
            {
//echo "132<br>";
                $p_id=$fetched_p_id['p_id'];
            }
            $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
        }
        if($due_amount>$avd_due_1)
        {
            //$amount1=$due_amount-$avd_due_1;
 $result=$_SESSION['result'];
            $final_due_amount=$due_amount-$amount-$disc_amount-$avd_due_1;
            mysql_query("update opd_bill set due_amount='$final_due_amount',grand_total='$result',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
            $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");

            $sub_total=$due_amount-$avd_due_1;
            mysql_query("update opd_bill set due_amount=0 where bill_id='$abi'");
//if($fetch_p_id){echo "129";}
            while($fetched_p_id=mysql_fetch_array($fetch_p_id))
            {
//echo "132<br>";
                $p_id=$fetched_p_id['p_id'];
            }
            $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
        }
        if($avd_due_1==0)
        {
            $final_due_amount=$due_amount-$amount-$disc_amount;
            mysql_query("update opd_bill set due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'")or die(mysql_error()."Line 275");
            $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");
//if($fetch_p_id){echo "129";}
            while($fetched_p_id=mysql_fetch_array($fetch_p_id))
            {
//echo "132<br>";
                $p_id=$fetched_p_id['p_id'];
            }
            $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
        }
    }

        echo '<script type="text/javascript">window.open( "newpdf.php" )</script>';

//header("location:print.php");

}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Receive Payment</title>
<link rel="stylesheet" type="text/css" href="style_by.css" />
<script src="hide_show.js" type="text/javascript"></script>

</head>

<body>
<form method="post">
<div id="container">

<div id="opd_bill">
<span style="margin-left:10px;">Receive Payment</span>
<span style="margin-left:165px;">Bill ID : </span>
<span><?php echo $bill_id;?></span>    
<span style="margin-left:165px;">Visit ID : </span>
<span>
<?php
echo $v_id;
?></span>    

</div>

<div style="width:100%; margin:0 auto;">
<div class="right-content">
<div class="right_top"> 
<div style="float:left; width:250px;"><strong>Make Payment </strong></div>
<div style="float:right; width:270px;">
<strong>Total due Amount</strong></span>:<span><input type="text" name="tdue"  value="<?php echo $total_due;?>"/></span>
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
<input type="text" name="amount" value="<?php ?>" class="i" style="width:50px;"/>&nbsp;&nbsp;&nbsp;
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
<input type="submit" name="cancel_receipt" value="Cancel" class="btn" />
</span>
<span>
<input type="submit" name="save_receipt" value="Save" class="btn" />
</span> <span>
<input type="submit" value="Print" name="print_receipt" class="btn"/>
        <input type="submit" value="OPD Slip" name="opd_flip" class="btn"/>
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
