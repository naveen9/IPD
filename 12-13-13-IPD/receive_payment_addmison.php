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
$ddate=$_SESSION['patient_visit_date'];
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
if($_POST['save_receipt'])
{
if($v_id=="")
{
    echo "Please fill all details";
}
else
{
    $final_due_amount=$due_amount-$amount-$disc_amount;
    mysql_query("update opd_bill set due_amount='-$amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$ddate',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
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

echo '<script type="text/javascript">window.open( "print_addmision.php" )</script>';


        //unset($_SESSION['v_id']);

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
        mysql_query("update opd_bill set due_amount='-$amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$ddate',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
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

    echo '<script type="text/javascript">window.open( "print_addmision.php" )</script>';
    echo '<META http-equiv="refresh" content="0;URL=admission-ipd.php">';

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
        mysql_query("update opd_bill set due_amount='-$amount',paid_amount='$amount',dis_remarks='$remark',status='unpaid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,grand_discount='$disc_amount',billeddate='$ddate',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'");
        $fetch_p_id=mysql_query("select p_id from visit_register where visit_id='$v_id'");
        while($fetched_p_id=mysql_fetch_array($fetch_p_id))
        {
            //	echo "161<br>";
            $p_id=$fetched_p_id['p_id'];
        }
        $res164=mysql_query("insert into opd_recpt values('','$bill_id','$name','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res164){echo "166";}
    }

    echo '<script type="text/javascript">window.open( "newpdf.php" )</script>';
    unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);

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
            <span style="margin-left:165px;">IPID : </span>
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
                        <strong>Advance Amount</strong></span>:<span><input type="text" name="tdue"  value="<?php echo $total_due;?>"/></span>
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
                                    <input type="text" name="amount" value="<?php echo $due_amount;?>" class="i" style="width:50px;"/>&nbsp;&nbsp;&nbsp;
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
                    <div id="bil_id" style="width:1000px">
                        <div style="float:left; width: 100px;">
                            <input type="checkbox" name="refund" onclick="showMe1('dis', this)"/>&nbsp;&nbsp;&nbsp;Refund
                        </div>
                  <div id="dis" style=" margin-left:10px; float: left; width: 600px;">
<span>
<label for="" style=" color:#0000A8;">&nbsp;&nbsp;&nbsp;Discount to Patient&nbsp;:</label>
</span>
                            <span><input type="text" name="disc_amount" placeholder="Amount" style="width:50px;"/></span>

                            <span><input type="text" name="remark" style="width:300px;" /></span>
                        </div>
                    <div id="save_clear" style=float:right; width:150px;">
<span>
<!--<input type="submit" name="cancel_receipt" value="Cancel" class="btn" />-->
</span>
<span>
<!--<input type="submit" name="save_receipt" value="Save" class="btn" />-->
</span>
  <span>
<input type="submit" value="Print" name="print_receipt" class="btn" style="width:120px; float:right"/>
</form>
</div>
<div style="float: left; width:60px;">
<form method="post" action="session_dec.php">
    <!--<input type="submit" value="Home" name="Home" class="btn"/>-->
</form>
</div>
<div class="cls"></div>

 </div>
<div class="cls"></div>

    </div>

    </div>


</body>
</html>
