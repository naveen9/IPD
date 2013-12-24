<?php
session_start();
error_reporting(0);
include("condb.php");

$name=$_SESSION['uname'];
//$name=admin;

//$v_id=1;
date_default_timezone_set('Asia/Kolkata');
$visit_date_sam=date("d/m/y");
//echo "<br/>";
$visit_time_sam=date("H:i:s");










$select23=("select * from  hospitals_info");
$query23=mysql_query($select23);
while ($fetch23=mysql_fetch_array($query23)) {
$hospital_name=$fetch23['hospital_name'];
$hospital_add=$fetch23['hospital_add'];
$hospital_email=$fetch23['hospital_email'];
$hospital_helpline=$fetch23['hospital_helpline'];

}






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

$pdf->cell(3.3, -.5, "Age/sex:  $p_age", 0, 0, 'R');
$pdf->cell(.9, -.5, "  $p_age", 0, 0, 'R');
$pdf->cell(.3, -.5, "Phone:  $p_gender", 0, 0, 'R');
$pdf->cell(1.5, -.5, "E-mail:  $p_email", 0, 0, 'R');
//$pdf->cell(2.3, -.5, "E-mail:  $p_email", 0, 0, 'R');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',12);
$pdf->cell(1, 0.2, "Demographics", 0, 1, 'C');
$pdf->ln(-.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(.8, .5, "Marital Status", 0, 1, 'C');
$pdf->cell(2.9, -.5, "Blood Group:    ", 0, 0, 'R');
$pdf->cell(1.7, -.5,"Weight:    ", 0, 0, 'R');
$pdf->cell(1.7, -.5, "Height:    ", 0, 0, 'R');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',8);
$pdf->cell(.8, 0, "    ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Guardian Name :", 0, 1, 'C');
$pdf->cell(2.8, -.5, "Relation:    ", 0, 0, 'R');
$pdf->cell(1.5, -.5,"Address:    ", 0, 0, 'R');
$pdf->ln(0.01);
$pdf->SetFont('Arial','',10);

$pdf->cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);
$pdf->cell(.8, 0, "Admission   ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Ip Id                             :", 0, 1, 'L');
$pdf->cell(2.8, .2, "Date of admission        :    ", 0, 1, 'L');
$pdf->cell(1.5, .56,"date of discharge         :    ", 0, 1, 'L');
$pdf->ln(0.01);
$pdf->SetFont('Arial','',10);

$pdf->cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);
$pdf->cell(.8, 0, "Payment   ", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .5, "Advance             :", 0, 1, 'L');
$pdf->cell(2.8, .2, "payment mode   :    ", 0, 1, 'L');
$pdf->cell(1.5, .56," panel                 :    ", 0, 1, 'L');
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
