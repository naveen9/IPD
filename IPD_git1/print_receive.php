<?php
session_start();
error_reporting(0);
include("condb.php");
include("hede.php");
$name=$_SESSION['uname'];
$bill_id=$_SESSION['bill_idd'];
//$name=admin;

$v_id=$_SESSION['visit_id'];
$r_id=$_GET['r_id'];

//$final_due=$_SESSION['final_due'];
date_default_timezone_set('Asia/Kolkata');
$visit_date_sam=date("d/m/y");
//echo "<br/>";
$visit_time_sam=date("H:i:s");



$select=("select * from  opd_recpt where visit_id='$v_id'");
$query=mysql_query($select);
while ($fetch=mysql_fetch_array($query)) {
    $payment_mode=$fetch['payment_mode'];
}


$select1=("select * from  opd_bill where visit_id='$v_id' and bill_id='$bill_id'");
$query1=mysql_query($select1);
while ($fetch1=mysql_fetch_array($query1)) {
//$bill_id=$fetch1['p_id'];
    $paid_amount=$fetch1['paid_amount'];
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
$select3=("select * from  patient_info where patient_id='$p_id'");
$query3=mysql_query($select3);
while ($fetch3=mysql_fetch_array($query3)) {
//$bill_id=$fetch1['p_id'];
    $p_name=$fetch3['p_name'];
    $p_age=$fetch3['p_age'];
    $p_gender=$fetch3['p_gender'];

}
$select4=("select * from  opd_recpt where visit_id='$v_id'");
$query4=mysql_query($select4);
while ($fetch4=mysql_fetch_array($query4)) {
    $reciept_id=$fetch4['recpt_id'];
    $crnt_discount=$fetch4['crnt_discount'];
}

$select51=("select * from opd_recpt where visit_id=$v_id");
$result51 = mysql_query($select51) or die( "Could not execute sql: {$sql}");
$total=0;
while ($row1 = mysql_fetch_array($result51))
{
    $total=$total+$row1['crnt_gvn_anmt'];
}

$select111=("select * from opd_bill where visit_id=$v_id");
$result111 = mysql_query($select111) or die( "Could not execute sql: {$sql}");
$due_amount=0;
while ($row111 = mysql_fetch_array($result111))
{
    $due_amount=$due_amount+$row111['due_amount'];
}

$select112=("select * from opd_bill where visit_id=$v_id");
$result112 = mysql_query($select112) or die( "Could not execute sql: {$sql}");
$grand_total=0;
while ($row112 = mysql_fetch_array($result112))
{
    $grand_total=$grand_total+$row112['grand_total'];
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
$pdf->cell(0, .5, "Patient Id:  $p_id", 1, 1, 'L');

$pdf->cell(3, -.5, "Name:  $p_name", 0, 0, 'R');
$pdf->cell(1.6, -.5, "Age:  $p_age", 0, 0, 'R');
$pdf->cell(2.1, -.5, "Sex:  $p_gender", 0, 0, 'R');
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
$pdf->cell(0, 1.0, "Total Amount(Rs): $paid_amount", 1, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->cell(4.5, -1.0, "Payment Mode:    $payment_mode", 0, 1, 'R');
$pdf->cell(7, 1.0, "Date/Time:    $visit_date_sam - $visit_time_sam", 0, 1, 'R');
$pdf->ln(.6);
$pdf->SetFont('Arial','',12);
$pdf->cell(6.8, -.7, "Receptionist:  $name", 0, 0, 'R');



/*$pdf->ln(1.1);



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
*/
$pdf->Output();
unset($_SESSION['visit_id']);
?>
