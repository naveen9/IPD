<?php
session_start();
error_reporting(0);
include("header.php");
include("menubar.php");
include("condb.php");

//$event=$_REQUEST['event'];
//$_SESSION['v_id']=$event;
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
if($_GET['v_id']){

    $_SESSION['v_id']=$_GET['v_id'];
}

$v_id=$_SESSION['v_id'];
$r_id=$_SESSION['r_id'];
$proc_status=1;
$uname=$_SESSION['uname'];
$date=date("y-m-d");
$time=date("H:i:s");



   $bill_id=$_SESSION['bill_idd'];




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


if($_POST['print_receipt'])
{
    if($v_id=="")
    {
        echo "Please fill all details";
    }
    else
    {
        $final_due_amount=$total_due-$amount;


            //$final_due_amount=$due_amount-$amount-$disc_amount;
            mysql_query("update opd_bill set due_amount=0,dis_remarks='$remark',status='paid',payment_mode='$mode',trans_details='$trans_details',organization=NULL,billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id'");

            mysql_query("update opd_bill set  due_amount='$final_due_amount',paid_amount='$amount',dis_remarks='$remark',status='paid',payment_mode='$mode',trans_details='$trans_details',organization='NULL',billeddate='$date',billedtime='$time',proc_status='$proc_status',reception='$uname' where visit_id='$v_id' and bill_id='$bill_id'") or die(mysql_error());


            $res135=mysql_query("insert into opd_recpt values('','$r_id','$v_id','$p_id','$final_due_amount','$amount','$disc_amount','$mode','$date','$time')");
//echo "Receipt saved!--------<a href='print.php' target='_blank'>Print PDF</a>-------!!!!!!!!!!!";
//if($res135){echo "137<br>";}
        }



    echo '<script type="text/javascript">window.open( "print_receive.php" )</script>';
     echo '<META http-equiv="refresh" content="0;URL=session_out.php?page=ad">';

//header("location:print.php");
}
?>
<?php
//PRINT OPD FLIP




?>



<div id="main_center_container">
    
    
                <!--<form method="post" action="s_search.php"></form>-->
                        
            
            <div id="opd_bill" style="height:20px;">
            <div style="float:left; width:300px;">
                <span class="p_adding">Receive Payment </span>
            </div>
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
            
          

        
        <div class="cls"></div>

    
  <div class="category">
        <div style="width:150px; float:left; ">     
            <span><strong>Bill ID : </strong></span>
            <span><?php echo $_SESSION['bill_idd'];?></span>
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
                  
<!--                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>-->
                   <li><a href="s_opd-visit-summary.php">Payment summary</a></li>
                   <li><a href="s_clienthome.php">Patient document</a></li>
                </ul>
            
    <div class="cls" style="height:2px;"></div> 
        </div>
     </div>

            <div class="cls"></div>

            <div class="cls"></div>
        </div>
        
<form method="post">
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
                                    <input type="text" name="amount" value="<?php echo $total_due; ?>" class="i" style="width:50px;"/>&nbsp;&nbsp;&nbsp;
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
                      <p>&nbsp;</p>
                      <p><span>
                     
                                                </span> <span>
            <input type="submit" value="Print" name="print_receipt" class="btn"/>
            <a href="admission-ipd.php" class="btn">Home</a>
                                                  
                                                                    </span> </p>
                  </div>
              </div>
            </div>
        </div>
    </div>

    </div>

</form>
</body>
</html>
