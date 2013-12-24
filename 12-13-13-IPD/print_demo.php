<?php
session_start();
error_reporting(0);
include("condb.php");

$name=$_SESSION['uname'];
//$name=admin;
$v_id=$_SESSION['visit_id'];
//$v_id=2;
//$p_id=2;
date_default_timezone_set('Asia/Kolkata');
$visit_date_sam=date("d/m/y");
//echo "<br/>";
$visit_time_sam=date("H:i:s");




$selector=mysql_query(("select billeddate from  opd_bill where visit_id='$v_id'"));
$qery=mysql_fetch_array($selector);
$admit_date=$qery[0];

$select=("select * from  opd_recpt where visit_id='$v_id'");
$query=mysql_query($select);
while ($fetch=mysql_fetch_array($query)) {
$payment_mode=$fetch['payment_mode'];
}


$select1=("select * from  opd_bill where visit_id='$v_id'");
$query1=mysql_query($select1);
while ($fetch1=mysql_fetch_array($query1)) {
//$bill_id=$fetch1['p_id'];
$grand_total=$fetch1['grand_total'];
}


$select23=("select * from  hospitals_info");
$query23=mysql_query($select23);
while ($fetch23=mysql_fetch_array($query23)) {
$hospital_name=$fetch23['hospital_name'];
$hospital_add=$fetch23['hospital_add'];
$hospital_email=$fetch23['hospital_email'];
$hospital_helpline=$fetch23['hospital_helpline'];

}


$select2=("select * from  visit_register where visit_id='$v_id'");
$query2=mysql_query($select2);
while ($fetch2=mysql_fetch_array($query2)) {
$p_id=$fetch2['p_id'];
$visit_date=$fetch2['visit_date'];

}	
$q=mysql_query("select * from patient_info where patient_id='$p_id'")or die(mysql_error());
        
          while($search_result=mysql_fetch_array($q))
          {
            
                
                $p_name=$search_result['p_name'];
                $p_age=$search_result['p_age'];
                $p_gender=$search_result['p_gender'];
                $p_email=$search_result['p_email'];
                $p_mob=$search_result['p_mob'];


                $p_address=$search_result['p_address'];
                $p_guardian=$search_result['p_guardian'];
                $p_g_relation=$search_result['p_g_relation'];
                $p_bgroup=$search_result['p_bgroup'];
                $p_height=$search_result['p_height'];

                $p_weight=$search_result['p_weight'];
                $marital_status=$search_result['marital_status'];

}


$query4=mysql_query("select * from  patient_advace where visit_id='$v_id'");
$fetch4=mysql_fetch_array($query4);
$advance=$fetch4['advace'];
$bill_id=$fetch4['bill_id'];



$result51 = mysql_query("select * from opd_bill where $bill_id='$bill_id'");
$row1 = mysql_fetch_array($result51);

$payment_mode=$row1['payment_mode'];
$organization=$row1['organization'];





	include("fpdf/fpdf.php");
	$pdf = new FPDF('P', 'in', 'Letter');

$pdf->AddPage();
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',18);
$pdf->cell(0, 0, "$hospital_name, $hospital_add", 0, 1, 'L');
$pdf->SetFont('Arial','',10);
$pdf->cell(7, 0, "Helpline No:   $hospital_helpline", 0, 1, 'R');
$pdf->ln(.002);
$pdf->SetFont('Arial','',10);
$pdf->cell(7, 0.4, "E-Mail:   $hospital_email", 0, 0, 'R');
$pdf->SetFont('Arial','',12);
$pdf->cell(-6.6, 0.9, "", 0, 1, 'C');
//$pdf->cell(-6.6, 0.9, "----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(-0.3);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, .5, "Name:  $p_name", 1, 1, 'L');

$pdf->cell(3.3, -.5, "Age/sex:  $p_age/$p_gender", 0, 0, 'R');
$pdf->cell(1.5, -.5, "  ", 0, 0, 'R');
$pdf->cell(.1, -.5, "Phone: $p_mob ", 0, 0, 'R');
$pdf->cell(2.4, -.5, "E-mail:  $p_email", 0, 0, 'R');
//$pdf->cell(2.3, -.5, "E-mail:  $p_email", 0, 0, 'R');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',12);
$pdf->cell(1, 0.2, "Demographics", 0, 1, 'C');
$pdf->ln(-.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1.6, .5, "Marital Status: $marital_status", 0, 1, 'C');
$pdf->cell(2.9, -.5, "Blood Group: $p_bgroup", 0, 0, 'R');
$pdf->cell(1.7, -.5,"Weight: $p_weight   ", 0, 0, 'R');
$pdf->cell(1.7, -.5, "Height: $p_height    ", 0, 0, 'R');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',8);
$pdf->cell(.8, 0, "    ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(2.1, .5, "Guardian Name : $p_guardian", 0, 1, 'C');
$pdf->cell(3.8, -.5, "Relation: $p_g_relation", 0, 0, 'R');
$pdf->cell(3.6, -.5,"Address: $p_address", 0, 0, 'R');
$pdf->ln(0.01);
$pdf->SetFont('Arial','',10);

$pdf->cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);
$pdf->cell(.8, 0, "Admission   ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Ip Id                             : $v_id", 0, 1, 'L');
$pdf->cell(2.8, .2, "Date of admission        : $visit_date   ", 0, 1, 'L');
$pdf->cell(1.5, .56,"date of discharge         :    ", 0, 1, 'L');
$pdf->ln(0.01);
$pdf->SetFont('Arial','',10);

$pdf->cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);
$pdf->cell(.8, 0, "Payment   ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Advance             : $advance", 0, 1, 'L');
$pdf->cell(2.8, .2, "payment mode   : $payment_mode   ", 0, 1, 'L');
$pdf->cell(1.5, .56," panel                 : $organization    ", 0, 1, 'L');
$pdf->ln(0.01);
$pdf->SetFont('Arial','',10);

$pdf->cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');

$pdf->ln(0.2);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Date:", 0, 1, 'L');
$pdf->cell(7, -.5, " Signature:    ", 0, 1, 'R');


$pdf->Output();
unset($_SESSION['v_id']);
?>
