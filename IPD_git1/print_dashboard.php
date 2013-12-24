<?php
session_start();
error_reporting(0);
session_start();
include("condb.php");
include("hede.php");
 $uname= $_SESSION['uname'];
     $StartDate= $_SESSION['StartDate'];
	 $StartTime= $_SESSION['StartTime'];
	$EndDate= $_SESSION['EndDate'];
	$EndTime= $_SESSION['EndTime'];
	
	
	
	
	







$select23=("select * from  hospitals_info");
$query23=mysql_query($select23);
while ($fetch23=mysql_fetch_array($query23)) {
$hospital_name=$fetch23['hospital_name'];
$hospital_add=$fetch23['hospital_add'];
$hospital_email=$fetch23['hospital_email'];
$hospital_helpline=$fetch23['hospital_helpline'];

}


$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cash'
AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime'")or die(mysql_error());
    $sumCash=mysql_fetch_array($sum);
	$sumCash=$sumCash[0];

	
$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='credit_card' 
AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime' ")or die(mysql_error());
$sumCredit=mysql_fetch_array($sum);
$sumCredit_card=$sumCredit[0];


$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='debit_card'
AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime' ")or die(mysql_error());
$sumDebit=mysql_fetch_array($sum);
$sumDebit_card=$sumDebit[0];

$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cheque_draft'  
 AND billeddate between '$StartDate' and '$EndDate' and billedtime between '$StartTime' and '$EndTime'")or die(mysql_error());
$sumCheque=mysql_fetch_array($sum);
$sumCheque_draft=$sumCheque[0];

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
$pdf->cell(0, 0.1, "----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');




$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, -1.0, "Total Earning In Cash: $sumCash", 0, 1, 'L');
$pdf->SetFont('Arial','',10);
$pdf->cell(6.5, 1, "Total Earning In Credit: $sumCredit_card", 0, 1, 'R');


$pdf->ln(.01);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, 0, "Total Earning In Debit: $sumDebit_card", 0, 1, 'L');
$pdf->SetFont('Arial','',10);
$pdf->cell(6.5, 0, "Total Earning In Cheque: $sumCheque_draft", 0, 1, 'R');
$pdf->SetFont('Arial','',12);
$pdf->cell(0, .6, "----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');

$pdf->SetFont('Arial','B',8);
$pdf->ln(.1);
$pdf->cell(0, .1, "Bill No", 0, 1,'L');
$pdf->cell(1.5, -.1, "IP id", 0, 1,'C');

$pdf->cell(2.9, .1, "Patient name", 0, 1, 'C');
$pdf->cell(4.5, -.1, "Procedure", 0, 1, 'C');
$pdf->cell(5.8, .1, "Amount", 0, 1, 'C');
$pdf->cell(6.8, -.1, "Doctor", 0, 1, 'C');
$pdf->cell(7.8, .1, "Total", 0, 1,'C');
$pdf->cell(8.6, -.1, "Due", 0, 1,'C');

$pdf->cell(9.3, .1, "Discount", 0, 1, 'C');
$pdf->cell(10.3, -.1, "Paid", 0, 1, 'C');
$pdf->cell(11.8, .1, "Payment Mode", 0, 1, 'C');
$pdf->cell(13.4, -.1, "Bill Date", 0, 1, 'C');
$pdf->cell(14.8, .1, "Bill time", 0, 1, 'C');
$pdf->SetFont('Arial','',8);
include("condb.php");
//$connection = mysql_connect("localhost","root","");
//mysql_select_db("newdbwebhis", $connection) or die( "Could not open {'newdbwebhis'} database");
$select21=("SELECT B.bill_id,B.visit_id,B.reception,B.grand_total,
                        V.visit_id, V.p_id,
                        p.patient_id, p.p_name,
                        I.proc_name, I.doc_incharge,I.proc_id,I.amount,
                        B.grand_discount, B.due_amount,
                        B.paid_amount, B.payment_mode,
                        B.grand_discount, B.billeddate ,B.billedtime
                        FROM opd_bill B, visit_register V, opd_items I, patient_info p
                        WHERE B.reception='$uname'
                        AND B.visit_id=V.visit_id
                        AND V.p_id=p.patient_id
                        AND I.bill_id=B.bill_id AND B.billeddate between '$StartDate' and '$EndDate' and B.billedtime between '$StartTime' and '$EndTime'
                        group by I.proc_id");
$result = mysql_query($select21) or die( "Could not execute naveen sql: {$sql}");


$pdf->ln(.1);
while ($row = mysql_fetch_array($result))
{

$pdf->cell(0, .3, $row['bill_id'], 0, 1,'L');
$pdf->cell(1.5, -.3, $row['visit_id'], 0, 1,'C');

$pdf->cell(2.9, .3, $row['p_name'], 0, 1, 'C');
$pdf->cell(4.5, -.3, $row['proc_name'], 0, 1, 'C');
$pdf->cell(5.8, .3, $row['amount'], 0, 1, 'C');
$pdf->cell(6.8, -.3, $row['doc_incharge'], 0, 1, 'C');
$pdf->cell(7.8, .3, $row['grand_total'], 0, 1,'C');
$pdf->cell(8.6, -.3, $row['due_amount'], 0, 1,'C');

$pdf->cell(9.3, .3, $row['grand_discount'], 0, 1, 'C');
$pdf->cell(10.3, -.3, $row['paid_amount'], 0, 1, 'C');
$pdf->cell(11.8, .3, $row['payment_mode'], 0, 1, 'C');
$pdf->cell(13.4, -.3, $row['billeddate'], 0, 1, 'C');
$pdf->cell(14.8, .3, $row['billedtime'], 0, 1, 'C');


}
$pdf->ln(0.1);
$pdf->SetFont('Arial','',12);
//$pdf->cell(5.8, 1, "", 0, 1, 'L');
$pdf->cell(5.8, 1, "------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');




$pdf->Output();
unset($_SESSION['v_id']);
?>
