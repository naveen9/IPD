<style type="text/css">
.right_top a{ color:#0066FF;}
</style>
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
   
$v_id=$_SESSION['visit_id'];
//echo $v_id;
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("d-m-y");
$time=date("H:i:s");

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


        <div class="cls"></div>
        <div id="opd_bill" style="height:20px;">
            <div style="float:left">
                <span class="p_adding">IP Management</span>
            </div>
            <form action="search_ip-management.php" method="post" autocomplete="off">
        <div style="float:right; margin-top:-6px;">
          <input type="text" name="search1" placeholder="Bed No......." class="sea_rch" style="width:100px">
          <input type="submit" name="find1"value="Search" class="btn"/>
    </div>
    <div class="cls"></div>
    </div>









<div class="right_top bg_head"> 
	<div style="float:left">
		<div class="l_ft" style="width:300px;">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
        	<div><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringIp" onKeyUp="lookupIp(this.value);" onBlur="fillIp();" style=" height:25px;"/></div>
            <div>
                <input type="submit" name="find"value="Search" class="btn" style="width:60px; margin-right:100px"/>
           </div>
	<!-- -->

						<div align="left" class="suggestionsBoxAd" id="suggestionsIp" >
<div align="left" class="suggestionListAd" id="autoSuggestionsListIp">
</div>
</div>
	
	
	
	
<!--   -->	
		   
		   
           
        </div>
            <div class="l_ft">Patient Name:
                <label for id=""><?php echo $p_name=$_SESSION['p_name'] ;?></label>
            </div>
            <div class="l_ft" style="margin-left: 170px;">Patient ID:
                <label for id=""><?php echo $p_id=$_SESSION['p_id'] ;?></label>
            </div>

    </div>


    <div class="cls"></div>
     </div>


    <div class="tot_amount" style="background: lightcyan; width: 100%; padding:5px 0px;">
    	<div style="padding-left:6px">Doctor Incharge:
      <label for id=""><?php echo $_SESSION['ref_dr'] ;?></label>
      </div>
       <div>Status :
      <label for id=""><?php echo $_SESSION['stats'] ;?></label>
      </div>
      	 <div style="color:#0066FF;">Bed No:
             <label for id=""><?php echo $_SESSION['bed_no1'] ;?></label>
      </div>
  </div>
<div style="width:100%; margin:0 auto; border:none;">
    <div class="tot_amount">
        <div>Total Amount:
            <label for id=""><?php echo $grand_total=$_SESSION['grand_total'] ;?></label>
        </div>
        <div>Payment Received:
            <label for id=""><?php echo $paid_amount1=$_SESSION['paid_amount1'] ;?></label>
        </div>
        <div style=" color:#0066FF;">Due Amount:
            <label for id=""><?php echo $due_amount=$_SESSION['due_amount'] ;?></label>
        </div>
    </div>
   
    </form>
    <div>
    <form method="post" action="ip-management_add.php">
   
    <div id="opd_bill" style="background:#FFF">
        <div class="l_ft" style="margin-right:50px;"><strong>Bed Transfer</strong></div>
        <div class="l_ft" style="margin-right:50px;"><span>To Bed</span><span>

            <select name="to_bed">
                <?php
                $sel=mysql_query("select no_of_bed from beds_master_table where availability=0")or die(mysql_error(). " there is an error line no 11");
                while ($op=mysql_fetch_array($sel))
                {
                    echo '<option>'.$op[0].'</option>';
                }
                ?>

            </select>

            </span></div>
        <div class="l_ft"  style="width:215px;"><span>Category</span>
            <select name="category">
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
        <div class="l_ft" style="margin-right: 30px;">Date<input type="date" name="date_time"> </div>
        <div class="l_ft" style="margin-right: 30px;">Time <input type="text" name="time" value="<?php echo $time; ?>"> </div>
        <div class="l_ft" style="margin-right: 0px;"><input type="submit" name="Transfer" value="Transfer" class="btn" style="width: 70px;"> </div>
        <div class="cls"></div>
    </div>
    </form>
    </div>
  <div class="cls"></div>
     <div id="opd_bill"><strong>Room Charge</strong></div>
        <div class="bill_clr">
          <div class="l_ft room_f_date"><strong>From Date Time</strong></div>
          <div class="l_ft room_f_date"><strong>To Date Time</strong></div>

          <div class="l_ft room_f_w"><strong>Bed No</strong></div>
            <div class="l_ft room_f_date"><strong>Category</strong></div>

          <div class="l_ft room_f_w"><strong>Charge</strong></div>
            <div class="l_ft room_f_w"><strong>No Of Days</strong></div>
          <div class="l_ft"><strong>Total</strong></div>
        </div>
        <div class="cls"></div>

    <form method="post">
    <div class="bill_height">

          <div class="l_ft room_f_date">
            <span><input type="text" name="from_date_time" id="datepicker"></span>
          </div>
          <div class="l_ft room_f_date">
            <span><input type="text" name="to_date_time" id="datepicker1"></span>
          </div>
        <div class="l_ft room_f_w"><input type="text" name="bed_no" style=" width:70px;" /></div>
        <div class="l_ft" style="width: 20px;">&nbsp</div>
        <div class="l_ft room_f_w"><input type="text" name="category" style="width:70px;" /></div>
        <div class="l_ft" style="width: 30px;">&nbsp</div>
          <div class="l_ft room_f_w"><input type="text" name="charge" style="width:70px;"/></div>
        <div class="l_ft room_f_w"><input type="text" name="no_of_day" style="width:70px;" /></div>
 <div class="l_ft">
  <input type="submit" name="Add" value="Add" class="btn" style="width:50px;" /></div>
    </form>
  
        </div>
        <div class="cls"></div>
<?php
$p_id=$_SESSION['p_id'] ;
//echo $p_id;
$q= mysql_query("select * from room_charge where patient_id=$p_id and v_id=$v_id" );
while($row3=mysql_fetch_array($q)){
?>
    <form action="ip-management_add.php" method="post">
        <div class="bill_height">
          <div class="l_ft room_f_date">
              <input type="hidden" name="check" value="<?php echo $row3['room_id']; ?>">
            <span><label for="date"><?php echo $row3['from_date_time'];?></label></span>
          </div>
          <div class="l_ft room_f_date">
            <span><label for="date"><?php echo $row3['to_date_time']. $data ;?></label></span>
          </div>


          <div class="l_ft room_f_w"><label for="bed No"><?php echo $row3['bed_no'];?></label></div>
            <div class="l_ft room_f_date">
                <label for="room type"><?php echo $row3['categery'];

                    //$_SESSION['cat']=$row3['categery'];
                    ?></label>
            </div>

          <div class="l_ft room_f_w"><label for="charge"><?php echo $row3['charge'];?></label></div>
            <div class="l_ft room_f_w"><input type="text" name="no_day"  style="width:70px;"> </div>
 <div class="l_ft">
		<label for="total"><?php echo $row3['total'];?></label>

     <input type="submit" name="total" value="Total" class="btn" style="width:60px; margin-left: 7px;">

 </div>
            </form>
            <?php

            ?>


  </div>

    <div class="cls" style="margin-top: 10px; height: 1px; clear: both"></div>
<?php }?>
<div class="cls" style="margin-top: 40px;"></div>
       
   <div class="fill_data">
      <div id="bil_id" style="float: left; width: 300px;"> <span>

        </span> <span>
              <?php
              if(isset($_POST['calculate_amount']))
              {
                  $q21=mysql_query("SELECT SUM(total) FROM `room_charge` WHERE patient_id=$p_id");
                  $op=mysql_fetch_array($q21);
                  $_SESSION['sum_amount']=$op[0];
              }
              else
              {
                  $op="";
              }


              $i = $_SESSION['sum_amount'];
              //echo $sum_amount;

              //$q54= mysql_query("select v_id from room_charge where patient_id=$sum_amount" );
              //$v_id=mysql_fetch_array($q54);
              //$v_id=$_SESSION['v_id']=$v_id[0];

              ?>
              <form method="post">
              <input type="submit" name="calculate_amount" value="Calculate Amount" class="btn" />
              <span><label for="amount"><?php echo $op[0];?></label></span>
                  </div>
              <!--<div style="float:left; width:200px;">
                  <input type="submit" name="SAVE" value="SAVE" class="btn" />
              </div>-->
              </form>
              <?php
    //echo $v_id;
              if(isset($_POST['SAVE1']))

              {

                  $test=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                   //$test1=mysql_fetch_array($test);

                  if(mysql_num_rows($test)==1)
                  {
                    $test2=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                    $date1=mysql_fetch_array($test2);
                    $charge1=$date1[2];
                    //echo $charge1;
                    mysql_query("update room_charge_pay set total_room_charge='$i'where v_id='$v_id'");
                      $test1=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                      $data=mysql_fetch_array($test1);
                      $new=$data[2];
                      $charge=$data[3];
                      $update1=$new-$charge1;
                      //echo $update1;

                        $bill1=mysql_query("select * from opd_bill where bill_id='$charge'")or die(mysql_error());
                    $date11=mysql_fetch_array($bill1);
                    $total2=$date11['grand_total'];
                    $due2=$date11['due_amount'];
                    $total3=$total2+$update1;
                    $due3=$due2+$update1;
                   
                   
                      mysql_query("update opd_bill set grand_total='$total3',due_amount='$due3' where bill_id='$charge'");
                  }
                  else{


                  $anuj=mysql_query("insert into opd_bill (bill_id,grand_total,due_amount,visit_id,proc_status) values('','$i','$i','$v_id','1')")or die(mysql_error());
                     $na=mysql_query("select max(bill_id) from opd_bill");
                     $naa= mysql_fetch_array($na);
                      $bi_id=$naa[0];
                      mysql_query("insert into room_charge_pay values ('$p_id','$v_id','$i','$bi_id')");
                 // $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                  //$fet_b_id=mysql_fetch_row($sel_b_id);
                 // $_SESSION['b_id']=$fet_b_id[0];
                 // $b_id=$_SESSION['b_id'];
                  //header("location: receive_payment_ot.php");


                  }
                  unset($_SESSION['p_id']);
                  unset($_SESSION['p_name']);
                  unset($_SESSION['p_age']);
                  unset($_SESSION['p_mob']);
                  unset($_SESSION['p_gender']);
                  unset($_SESSION['p_email']);
                  unset($_SESSION['v_id']);
                  unset($_SESSION['b_id']);
                  unset($_SESSION['ref_dr']);
                  unset($_SESSION['bed_no1']);
                  unset($_SESSION['paid_amount1']);

                  unset($_SESSION['grand_total']);
                  unset($_SESSION['due_amount']);
                  header("location: ip-management.php?error_msg=".urlencode("Data saved!"));

              }
?>

        </span>
       <div style="float:left; width:200px;">

       </div>
       <form method="post">
      <div id="save_clear" style="float:right;"> <span>
        <input type="submit" name="discharge" value="Discharge" class="btn" />
        </span>
        <span><input type="submit" name="SAVE1" value="SAVE" class="btn" /></span>
           <span>
        <!--<input type="submit" name="make_payment" value="Make Payment" class="btn" />-->
               <input type="submit" name="home" value="Home" class="btn" />
        </span>
          <?php
          if($_POST['discharge'])
          {

                  $test=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                   //$test1=mysql_fetch_array($test);

                  if(mysql_num_rows($test)==1)
                  {
                    $test2=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                    $date1=mysql_fetch_array($test2);
                    $charge1=$date1[2];
                    //echo $charge1;
                    mysql_query("update room_charge_pay set total_room_charge='$i'where v_id='$v_id'");
                      $test1=mysql_query("select * from room_charge_pay where v_id='$v_id'");
                      $data=mysql_fetch_array($test1);
                      $new=$data[2];
                      $charge=$data[3];
                      $update1=$new-$charge1;
                      //echo $update1;

                        $bill1=mysql_query("select * from opd_bill where bill_id='$charge'")or die(mysql_error());
                    $date11=mysql_fetch_array($bill1);
                    $total2=$date11['grand_total'];
                    $due2=$date11['due_amount'];
                    $total3=$total2+$update1;
                    $due3=$due2+$update1;
                   
                   
                      mysql_query("update opd_bill set grand_total='$total3',due_amount='$due3' where bill_id='$charge'");
                  }
                  else{


                  $anuj=mysql_query("insert into opd_bill (bill_id,grand_total,due_amount,visit_id,proc_status) values('','$i','$i','$v_id','1')")or die(mysql_error());
                     $na=mysql_query("select max(bill_id) from opd_bill");
                     $naa= mysql_fetch_array($na);
                      $bi_id=$naa[0];
                      mysql_query("insert into room_charge_pay values ('$p_id','$v_id','$i','$bi_id')");
                 // $sel_b_id=mysql_query("select max(bill_id) from opd_bill");
                  //$fet_b_id=mysql_fetch_row($sel_b_id);
                 // $_SESSION['b_id']=$fet_b_id[0];
                 // $b_id=$_SESSION['b_id'];
                  //header("location: receive_payment_ot.php");


                  }
              

                  header("location:recive_payment_discharge.php");

             // echo '<script type="text/javascript">window.open( "print_discharge.php" )</script>';
          }
          ?>
          <span>
              <?php
              if($_POST['home'])
              {
                  unset($_SESSION['p_id']);
                  unset($_SESSION['p_name']);
                  unset($_SESSION['p_age']);
                  unset($_SESSION['p_mob']);
                  unset($_SESSION['p_gender']);
                  unset($_SESSION['p_email']);
                  unset($_SESSION['v_id']);
                  unset($_SESSION['b_id']);
                  header("location:admission-ipd.php");
              }

              if(isset($_POST['make_payment']))

{
    mysql_query("insert into room_charge_pay values ('$sum_amount','$v_id','$i')")or die(mysql_error()."249");
    $anuj=mysql_query("insert into opd_bill (bill_id,due_amount,visit_id,proc_status) values('','$i','$v_id','1')")or die(mysql_error()."250");
     $sel_b_id=mysql_query("select max(bill_id) from opd_bill")or die(mysql_error()."251");
    $fet_b_id=mysql_fetch_row($sel_b_id);
     $_SESSION['b_id']=$fet_b_id[0];
     $b_id=$_SESSION['b_id'];

mysql_query("update opd_bill set grand_total='$i',due_amount='$i',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$v_id'")or die(mysql_error()."256");
header('location: receive_payment_room.php');
//unset($_SESSION['p_id']);
//unset($_SESSION['p_name']);
// unset($_SESSION['p_age']);
// unset($_SESSION['p_mob']);
// unset($_SESSION['p_gender']);
// unset($_SESSION['p_email']);
// //unset($_SESSION['b_id']);
// //unset($_SESSION['grand_total']);
// unset($_SESSION['s_proc_id']);
//    // unset($_SESSION['paymentmode']);
   // unset($_SESSION['panel']);
  //  unset($_SESSION['corp']);
  //  unset($_SESSION['source']);


}
?>

        </span> </div>
       </form>
<div class="cls"></div>
    </div>
  </div>
  <div class="cls"></div>
</div>
<div id="fb-root"></div>
<!--<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script> 
<script type="text/javascript">FB.init("API-KEY-HERE");</script>
<fb:fan profile_id="thinking-tree.in" connections="18" width="403" height="360"></fb:fan>-->
</body></html>
