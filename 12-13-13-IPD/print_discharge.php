<?php
session_start();
error_reporting(0);
include("condb.php");

$name=$_SESSION['uname'];
//$name=admin;
$v_id=$_SESSION['visit_id'];
//$v_id=110;
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
$pdf->cell(3.9, -1, "Admit Date:    $admit_date", 0, 1, 'R');
$pdf->cell(6.8, 1.0, "Receipt No.:    $reciept_id", 0, 1, 'R');
$pdf->SetFont('Arial','',12);
$pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(.1);

$sql11="select SUM(sub_total) from  patient_medicine where v_id='$v_id'";
$result11= mysql_query($sql11,$con);
$row11=mysql_fetch_row($result11);
//echo $query12[0];





//patient_medicine
$pdf->SetFont('Arial','B',10);
$pdf->cell(2, 1.0, "Medicine/Consunable ", 0, 1, 'L');
$pdf->cell(12, -1.0, "Total: $row11[0] ", 0, 1, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial','',12);
$pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$sql1 = "SELECT SUM(total) FROM room_charge where v_id=$v_id ";
$result1= mysql_query($sql1,$con);
$row1=mysql_fetch_row($result1);
$pdf->ln(.1);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2, 1.0, "Room Charge ", 0, 1, 'L');
$pdf->cell(12, -1.0, "Total: $row1[0] ", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);

$pdf->cell(2, 1.5, "From Date Time", 0, 1,'C');
$pdf->cell(5, -1.5, "To Date Time", 0, 1, 'C');
$pdf->cell(8, 1.5, "Bed No", 0, 1, 'C');
$pdf->cell(11, -1.5, "No Of Days", 0, 1, 'C');
$pdf->cell(14, 1.5, "Total", 0, 1, 'C');
$vid=$_POST['visitid'];
$pdf->ln(-.4);
$pdf->SetFont('Arial','',10);
//$connection = mysql_connect("localhost","root","");
//mysql_select_db("avantikanew", $con) or die( "Could not open {'avantikanew'} database");
$sql = "SELECT from_date_time,to_date_time,bed_no,no_of_day,total FROM room_charge where v_id=$v_id ";
$result = mysql_query($sql, $con) or die( "Could not execute sql: {$sql}");
$w=2;
$h=0.3;
while ($row = mysql_fetch_row($result))
{

    $pdf->cell($w, $h, $row[0], 0, 1,'C');
    $pdf->cell($w+3, $h*(-1), $row[1], 0, 1,'C');
    $pdf->cell($w+6, $h, $row[2], 0, 1,'C');
    $pdf->cell($w+2+6+1, $h*(-1), $row[3], 0, 1,'C');
    $pdf->cell($w+2+6+2+2, $h, $row[4], 0, 1,'C');
}
$pdf->ln(.3);
$pdf->SetFont('Arial','',12);
$pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(.1);
$sql1 = "SELECT SUM(total) FROM opd_items where visit_id=$v_id ";
$result2= mysql_query($sql1,$con);
$row2=mysql_fetch_row($result2);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2, 1.0, "Procedure/visit ", 0, 1, 'L');
$pdf->cell(12, -1.0, "Total: $row2[0] ", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);

$pdf->cell(2, 1.5, "Procedures Name", 0, 1,'C');
$pdf->cell(5, -1.5, "Doctor Incharge", 0, 1,'C');

$pdf->cell(8, 1.5, "Amount", 0, 1, 'C');
$pdf->cell(10, -1.5, "Discount", 0, 1, 'C');
$pdf->cell(12, 1.5, "Tax", 0, 1, 'C');
$pdf->cell(14, -1.5, "Total", 0, 1, 'C');
$pdf->SetFont('Arial','',10);

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
    $pdf->ln(.3);
    $pdf->SetFont('Arial','',12);
    $pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(.1);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2, 1.0, "Operation Theater ", 0, 1, 'L');
$total=mysql_query("select sum(Procedure_Fee),SUM(Adnl_Surgeon_Charge),SUM(Anasethetics_Charge),SUM(Consumamble_Charge),SUM(Implant_Charge),SUM(Other_Charge),SUM(OT_Charge),SUM(Package)from ot_billing where visit_id='$v_id'")or die(mysql_error()."Line no 76 ");

$addition=mysql_fetch_array($total);
$result4= $addition[0] + $addition[1] +$addition[2]+$addition[3]+$addition[4] +$addition[5] +$addition[6]+$addition[7];

//$_SESSION['result']=$result;

$pdf->cell(12, -1.0, "Total: $result4 ", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',8);

$pdf->cell(.5, 1.5, "Procedure Name", 0, 1,'C');
$pdf->cell(2.5, -1.5, "Procedure Fee", 0, 1, 'C');
$pdf->cell(4.3, 1.5, "Adnl Surgeon", 0, 1, 'C');
$pdf->cell(6, -1.5, "OT Charge", 0, 1, 'C');
$pdf->cell(8, 1.5, "Anasethetics charge", 0, 1, 'C');
$pdf->cell(10, -1.5, "Con. charge", 0, 1, 'C');
$pdf->cell(11.7, 1.5, "Implant Charge", 0, 1, 'C');
$pdf->cell(13.5, -1.5, "Other Charge", 0, 1, 'C');
$pdf->cell(15, 1.5, "Package", 0, 1, 'C');
$pdf->ln(-.5);
$pdf->SetFont('Arial','',10);

$select21=("select * from ot_billing where visit_id=$v_id");
$result = mysql_query($select21) or die( "Could not execute sql: {$sql}");
$w=.5;
$h=.3;

while ($row = mysql_fetch_array($result))
{

    $pdf->cell($w, $h, $row['Procedure_name'], 0, 1,'C');
    $pdf->cell($w+2, $h*(-1), $row['Procedure_Fee'], 0, 1,'C');
    $pdf->cell($w+3.8, $h, $row['Adnl_Surgeon_Charge'], 0, 1,'C');
    $pdf->cell($w+5.5, $h*(-1), $row['OT_Charge'], 0, 1,'C');
    $pdf->cell($w+7.5, $h, $row['Anasethetics_Charge'], 0, 1,'C');
    $pdf->cell($w+2+7.5, $h*(-1), $row['Consumamble_Charge'], 0, 1,'C');
    $pdf->cell($w+2+6+3.2, $h, $row['Implant_Charge'], 0, 1,'C');
    $pdf->cell($w+2+6+2+3, $h*(-1), $row['Other_Charge'], 0, 1,'C');
    $pdf->cell($w+2+6+2+2+2.5, $h, $row['Package'], 0, 1,'C');
}
$pdf->ln(.3);
$pdf->SetFont('Arial','',12);
$pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(.1);
$pdf->SetFont('Arial','B',12);
$pdf->cell(2, 1.0, "Other Details ", 0, 1, 'L');
$pdf->cell(12, -1.0, "Total: $other ", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','B',10);

$pdf->cell(2, 1.5, "Procedures Name", 0, 1,'C');
$pdf->cell(5, -1.5, "Doctor Incharge", 0, 1,'C');

$pdf->cell(8, 1.5, "Amount", 0, 1, 'C');
$pdf->cell(10, -1.5, "Discount", 0, 1, 'C');
$pdf->cell(12, 1.5, "Tax", 0, 1, 'C');
$pdf->cell(14, -1.5, "Total", 0, 1, 'C');
$pdf->SetFont('Arial','',10);

//$select21=("select * from opd_items where visit_id=$v_id");
//$result = mysql_query($select21) or die( "Could not execute sql: {$sql}");
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
$pdf->ln(.3);
$pdf->SetFont('Arial','',12);
$pdf->cell(0, -.5, "--------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(.1);
$pdf->SetFont('Arial','B',12);
$grand_totall=$row1[0]+$row2[0]+$result4;
$pdf->cell(12, 1.0, "Grand Total :  $grand_totall ", 0, 1, 'C');
//$pdf->cell(12, -1.0, "Total: $other ", 0, 1, 'C');
//$pdf->cell(6, -.1, "-------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');

$pdf->Output();
unset($_SESSION['v_id']);
?>
