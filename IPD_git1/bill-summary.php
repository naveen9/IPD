<?php
    session_start();
    error_reporting(0);
    include("header.php"); 
    include("menubar.php");
    include("condb.php");
 
?>





<?php
$name=$_SESSION['uname'];
//$name=admin;
$v_id=$_SESSION['v_id'];
//$v_id=110;
date_default_timezone_set('Asia/Kolkata');
$visit_date_sam=date("d/m/y");
//echo "<br/>";
$visit_time_sam=date("H:i:s");




$selector=mysql_query(("select billeddate from  opd_bill where visit_id='$v_id'"));
$qery=mysql_fetch_array($selector);
$admit_date=$qery[0];




$select1=("select * from  opd_bill where visit_id='$v_id'");
$query1=mysql_query($select1);
while ($fetch1=mysql_fetch_array($query1)) {
//$bill_id=$fetch1['p_id'];
$grand_total=$fetch1['grand_total'];
}





$select2=("select * from  visit_register where visit_id='$v_id'");
$query2=mysql_query($select2);
while ($fetch2=mysql_fetch_array($query2)) {
$p_id=$fetch2['p_id'];
$visit_date=$fetch2['visit_date'];

}   
$select3=("select * from  patient_info where patient_id='$p_id'");
$query3=mysql_query($select3);
while ($fetch3=mysql_fetch_array($query3)) {
//$bill_id=$fetch1['p_id'];
    $patient_id=$fetch3['patient_id'];
$p_name=$fetch3['p_name'];
$p_age=$fetch3['p_age'];
$p_gender=$fetch3['p_gender'];
$p_email=$fetch3['p_email'];

}




?>
 	<div id="opd_bill" style="height:23px;"> 
    	<div class="f_l m_r">Bill Summary</div> 
     </div>
      
     
        <div id="main_center_container">
            <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="op_vi_s" style="padding-left:10px;">Patient ID &nbsp; : &nbsp;<?php echo $patient_id; ?></div>
                <div class="op_vi_s">Name &nbsp; : &nbsp; <?php echo $p_name; ?></div>
                <div class="op_vi_s">Age &nbsp; : &nbsp; <?php echo $p_age; ?></div>
                <div class="op_vi_s">Sex &nbsp; : &nbsp; <?php echo $p_gender; ?></div>
                 <div class="cls"></div>
             </div>
             
 			<div style="padding:8px 0px; border-bottom:1px solid #CCC;">
            	<div class="op_vi_s" style="padding-left:10px;">IP ID &nbsp; : &nbsp;<?php echo $v_id; ?></div>
                <div class="op_vi_s">Admit Date &nbsp; : &nbsp;<?php echo $visit_date; ?></div>
                <div class="op_vi_s">&nbsp;</div>
                <div class="op_vi_s">Email ID &nbsp; : &nbsp; <?php echo $p_email; ?></div>
                 <div class="cls"></div>
             </div>
			<div class="cls"></div>
        <?php
        $sql11="select SUM(sub_total) from  patient_medicine where v_id='$v_id'";
$result11= mysql_query($sql11,$con);
$row11=mysql_fetch_row($result11);
//echo $query12[0];
        ?>

         <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="op_vi_s" style="padding-left:10px;">Medicine/Consunable &nbsp; : &nbsp;</div>
                <div class="op_vi_s">&nbsp;</div>
                <div class="op_vi_s">&nbsp;</div>
                <div class="op_vi_s">Total:  &nbsp; : &nbsp;<?php echo $row11[0]; ?></div>
                 <div class="cls"></div>
             </div>
			<div class="cls"></div>

        
      
      <?php
      $sql1 = "SELECT SUM(total) FROM room_charge where v_id=$v_id ";
$result1= mysql_query($sql1,$con);
$row1=mysql_fetch_row($result1);
      ?>

     
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
               <div class="op_vi_s"><strong>Room Charge</strong></div> 
               <div class="op_vi_s" style="float:left; margin-left:435px;">Total: <?php echo $row1[0]; ?></div> 
		</div>
        
        <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="op_vi_s f_s">From Date Time</div>
                <div class="op_vi_s f_s">To Date Time</div>
                <div class="op_vi_s f_s">Bed No</div>
                <div class="op_vi_s f_s">No Of Days</div>
                 <div class="op_vi_s f_s" style=" width:100px;">Total</div>
                 <div class="cls"></div>
             </div>

             <?php
             $sql = "SELECT from_date_time,to_date_time,bed_no,no_of_day,total FROM room_charge where v_id=$v_id ";
$result = mysql_query($sql, $con) or die( "Could not execute sql: {$sql}");

while ($row = mysql_fetch_row($result))
{
             ?>
			   
              <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="op_vi_s"><?php echo $row[0]; ?></div>
                <div class="op_vi_s"><?php echo $row[1]; ?></div>
                <div class="op_vi_s"><?php echo $row[2]; ?></div>
                <div class="op_vi_s"><?php echo $row[3]; ?></div>
                 <div class="op_vi_s"  style=" width:100px;"><?php echo $row[4]; ?></div>
                 <div class="cls"></div>
             </div>
             <?php } ?>

        <?php

        $sql1 = "SELECT SUM(total) FROM opd_items where visit_id=$v_id ";
$result2= mysql_query($sql1,$con);
$row2=mysql_fetch_row($result2);
        ?>
        
         <div style="width:100%; margin:0 auto;">
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
               <div class="op_vi_s"><strong>Procedure/visit </strong></div> 
               <div class="op_vi_s" style="float:left; margin-left:435px;">Total:  <?php echo $row2[0]; ?></div> 
		</div>
        
        <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="pro_n_s f_s">Procedures Name</div>
                <div class="pro_n_s f_s">Doctor Incharge</div>
                <div class="pro_n_s f_s">Amount </div>
                <div class="pro_n_s f_s">Discount</div>
                <div class="pro_n_s f_s">Tax</div>
                <div class="pro_n_s f_s">Total</div>
                 <div class="cls"></div>
             </div>


             <?php
             $select21=("select * from opd_items where visit_id=$v_id");
$result = mysql_query($select21) or die( "Could not execute sql: {$sql}");

while ($row = mysql_fetch_array($result))
{
             ?>



            <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="pro_n_s"><?php echo $row['proc_name']; ?></div>
                <div class="pro_n_s "><?php echo $row['doc_incharge']; ?></div>
                <div class="pro_n_s"><?php echo $row['amount']; ?></div>
                <div class="pro_n_s "><?php echo $row['discount']; ?></div>
                <div class="pro_n_s"><?php echo $row['taxrate']; ?></div>
                <div class="pro_n_s"><?php echo $row['total']; ?></div>
                 <div class="cls"></div>
             </div>

<?php } ?>
<?php

$total=mysql_query("select sum(Procedure_Fee),SUM(Adnl_Surgeon_Charge),SUM(Anasethetics_Charge),SUM(Consumamble_Charge),SUM(Implant_Charge),SUM(Other_Charge),SUM(OT_Charge),SUM(Package)from ot_billing where visit_id='$v_id'")or die(mysql_error()."Line no 76 ");

$addition=mysql_fetch_array($total);
$result4= $addition[0] + $addition[1] +$addition[2]+$addition[3]+$addition[4] +$addition[5] +$addition[6];
?>
             
        
        <div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
               <div class="op_vi_s"><strong>Operation Theater</strong></div> 
               <div class="op_vi_s" style="float:left; margin-left:435px;">Total: <?php echo $result4; ?> </div> 
		</div>
        <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
        	<div class="pro_n_s f_s">Procedure Name</div>	
            <div class="pro_o_t f_s">Procedure Fee</div>
            <div class="pro_o_t f_s">Adnl Surgeon</div>
            <div class="pro_o_t f_s">OT Charge</div>
            <div class="pro_o_t f_s">Anasethetics charge</div>
            <div class="pro_o_t f_s">Con. charge</div>
            <div class="pro_o_t f_s">Implant Charge </div>
            <div class="pro_o_t f_s">Other Charge</div>
            <div class="pro_o_t f_s">Package</div>
            <div class="cls"></div>
        </div>
        <?php
        $select21=("select * from ot_billing where visit_id=$v_id");
$result = mysql_query($select21) or die( "Could not execute sql: {$sql}");


while ($row = mysql_fetch_array($result))
{
        ?>
        <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
        	<div class="pro_n_s"><?php echo $row['Procedure_name'];  ?></div>	
            <div class="pro_o_t"><?php echo $row['Procedure_Fee'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Adnl_Surgeon_Charge'];  ?> </div>
            <div class="pro_o_t"><?php echo $row['OT_Charge'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Anasethetics_Charge'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Consumamble_Charge'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Implant_Charge'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Other_Charge'];  ?></div>
            <div class="pro_o_t"><?php echo $row['Package'];  ?></div>
            <div class="cls"></div>
        </div>
       
    <?php } ?>
        
        
         <div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 5px 5px;">
               <div class="op_vi_s"><strong>Other Details</strong></div> 
               <div class="op_vi_s" style="float:left; margin-left:435px;">Total: 0 </div> 
		</div>
         <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="pro_n_s f_s">Procedures Name</div>
                <div class="pro_n_s f_s">Doctor Incharge</div>
                <div class="pro_n_s f_s">Amount </div>
                <div class="pro_n_s f_s">Discount</div>
                <div class="pro_n_s f_s">Tax</div>
                <div class="pro_n_s f_s">Total</div>
                 <div class="cls"></div>
             </div>
         <div style="padding:8px 0px;  border-bottom:1px solid #CCC;">
            	<div class="pro_n_s"></div>
                <div class="pro_n_s"></div>
                <div class="pro_n_s"></div>
                <div class="pro_n_s"></div>
                <div class="pro_n_s"></div>
                <div class="pro_n_s"></div>
                 <div class="cls"></div>
             </div>
             
              <?php 
              $grand_totall=$row11[0]+$row1[0]+$row2[0]+$result4;
               
              ?>
             </div>
        <div class="fill_data">
          <div class="op_vi_s">&nbsp;</div>
          <div class="op_vi_s">&nbsp;</div>
          <div class="op_vi_s"> &nbsp;</div>
        <div class="op_vi_s f_s" style="float:right">Grand Total : <?php echo $grand_totall ;?> </div>
    </div>
    
</div>
</body>
</html>

