<?php
session_start();
error_reporting(0);
include("condb.php");
include("hede.php");
//$name=$_SESSION['uname'];
$name=rani;
//$v_id=$_SESSION['v_id'];
$r_id=$_GET['r_id'];
$v_id=9;
//$final_due=$_SESSION['final_due'];
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
$pdf->SetFont('Arial','B',10);
$pdf->cell(0, .5, "Procedure Name:  $p_id", 1, 1, 'L');

$pdf->cell(4, -.5, "Surgeon Name:  $p_name", 0, 0, 'R');
$pdf->cell(1.6, -.5, "date:  $p_age", 0, 0, 'R');

$pdf->SetFont('Arial','',12);
//$pdf->cell(-6, 0.2, "-----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->cell(-6, 0.2, "", 0, 1, 'C');
$pdf->ln(-.3);
$pdf->SetFont('Arial','B',10);
$pdf->cell(0, 1.0, "IP Id:    $v_id", 0, 1, 'L');
$pdf->cell(3.9, -1, "Admit Date:    $visit_date", 0, 1, 'R');
$pdf->cell(6.8, 1.0, "Receipt No.:    $reciept_id", 0, 1, 'R');
$pdf->SetFont('Arial','',12);
//$pdf->cell(7, 0.2, "----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(-.3);
$pdf->SetFont('Arial','B',10);
$pdf->cell(0, 1.0, "Received Amount(Rs): $paid_amount", 1, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->cell(4.5, -1.0, "Payment Mode:    $payment_mode", 0, 1, 'R');
$pdf->cell(7, 1.0, "Date/Time:    $visit_date_sam - $visit_time_sam", 0, 1, 'R');
$pdf->ln(.6);
$pdf->SetFont('Arial','',12);
$pdf->cell(6.8, -.7, "Receptionist:  $name", 0, 0, 'R');



$pdf->ln(1.1);



$pdf->SetFont('Arial','B',14);
$pdf->cell(0, -1.0, "Bill Summary", 1, 1, 'L');
$pdf->SetFont('Arial','B',14);
$pdf->cell(3.5, 1.0, "Total Due(Rs): $due_amount", 0, 1, 'R');
$pdf->SetFont('Arial','B',14);
$pdf->cell(6.5, -1.0, "Grand Totall(Rs): $grand_total", 0, 1, 'R');
//$pdf->ln(-0.6);
$pdf->SetFont('Arial','B',12);
$pdf->ln(.8);
$pdf->cell(2, 1.5, "Procedures Name", 0, 1,'C');
$pdf->cell(5, -1.5, "Doctor Name", 0, 1,'C');

$pdf->cell(8, 1.5, "Amount(Rs)", 0, 1, 'C');
$pdf->cell(10, -1.5, "Discount(%)", 0, 1, 'C');
$pdf->cell(12, 1.5, "Tax(%)", 0, 1, 'C');
$pdf->cell(14, -1.5, "Total(Rs)", 0, 1, 'C');
$pdf->SetFont('Arial','',12);
include("condb.php");
//$connection = mysql_connect("localhost","root","");
//mysql_select_db("newdbwebhis", $connection) or die( "Could not open {'newdbwebhis'} database");
$select21=("select * from opd_items where visit_id=$v_id");
$result = mysql_query($select21) or die( "Could not execute sql: {$sql}");
$w=2;
$h=.3;
$pdf->ln(1);
while ($row = mysql_fetch_array($result))
{

$pdf->cell($w, $h, $row['proc_name'], 0, 1,'C');
$pdf->cell($w+3, $h*(-1), $row['doc_incharge'], 0, 1,'C');
$pdf->cell($w+6, $h, $row['amount'], 0, 1,'C');
$pdf->cell($w+2+6, $h*(-1), $row['discount'], 0, 1,'C');
$pdf->cell($w+2+6+2, $h, $row['taxrate'], 0, 1,'C');
$pdf->cell($w+2+6+2+2, $h*(-1), $row['total'], 0, 1,'C');
$pdf->cell($w+2+6+2+2+2, $h, $row[''], 0, 1,'C');
}
$pdf->ln(0.1);
$pdf->SetFont('Arial','',12);
$pdf->cell(5.8, 1, "", 0, 1, 'L');
//$pdf->cell(5.8, 1, "------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');
$pdf->ln(.1);
$pdf->SetFont('Arial','B',14);
$pdf->cell(0, .6, "Payments Recieved", 0, 1, 'L');
$pdf->SetFont('Arial','B',14);
$pdf->cell(4, -.6, "Discount(Rs): $crnt_discount ", 0, 1, 'R');
$pdf->SetFont('Arial','B',14);
$pdf->cell(7.5, .6, "Total Received(Rs): $total ", 1, 1, 'R');
$pdf->ln(0.3);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2, 1, "Reciept No:", 0, 1,'C');
$pdf->cell(8, -1, "Payment By", 0, 1, 'C');
$pdf->cell(14, 1, "Amount (Rs)", 0, 1, 'C');

$pdf->SetFont('Arial','',12);
include("condb.php");

$select31=("select * from opd_recpt where visit_id=$v_id");
$result = mysql_query($select31) or die( "Could not execute sql: {$sql}");
$w=2;
$h=0.3;
while ($row = mysql_fetch_array($result))
{

$pdf->cell($w, $h, $row['recpt_id'], 0, 1,'C');
$pdf->cell($w+6, $h*(-1), $row['payment_mode'], 0, 1,'C');
$pdf->cell($w+2+10, $h, $row['crnt_gvn_anmt'], 0, 1,'C');
}

$pdf->ln(0.2);
$pdf->SetFont('Arial','',12);
//$pdf->cell(6, -.1, "-------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');

$pdf->Output();
unset($_SESSION['v_id']);
?>
