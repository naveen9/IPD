

<?php
error_reporting(0);
session_start();
$p_id=$_SESSION['p_id'];
//$p_id=2;
$b_id=$_SESSION['b_id'];
//$b_id=13;
$visit_id=$_SESSION['visit_id'];
//$visit_id=2;
include("condb.php");
//$select21=("select * from patient_medicine where p_id='$p_id'");
//$result = mysql_query($select21) or die(mysql_error());


$sel=mysql_query("select * from patient_medicine where bill_id='$b_id'")or die(mysql_error());
$nav=mysql_fetch_array($sel);
$dom=$nav['dom'];
//echo $dom;

$row = mysql_fetch_array($result);
$select=("select dom from patient_medicine where p_id='$p_id'");
$result = mysql_query($select) or die(mysql_error());

$row1 = mysql_fetch_array($result);


$select1=("select * from patient_info where patient_id='$p_id'");
$result1 = mysql_query($select1) or die(mysql_error());
$row11 = mysql_fetch_array($result1);
$name=$row11[1];

	include("fpdf/fpdf.php");
	$pdf = new FPDF('P', 'in', 'Letter');

$pdf->AddPage();
$pdf->ln(.4);
$pdf->SetFont('Arial','B',15);
$pdf->cell(0, 0, "RETAIL INVOICE ", 0, 1, 'C');
$pdf->ln(0.3);
$pdf->SetFont('Arial','',12);
$pdf->cell(0, .5, "JAGDAMBA SUPER SPECIALITY HOSPITAL", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, .3, "M-43, EC-66,NOIDA (U.P.)", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, .1, "PHONE : 9897027316 / 8750976667", 0, 0, 'L');


$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(11, -.9, "NO. :  _____", 0, 0, 'C');
$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(13.5, -1.1, "DATE : $dom", 0, 0, 'C');

$pdf->ln(0.2);
$pdf->SetFont('Arial','',12);
$pdf->cell(6, .2, "-------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');

$pdf->ln(0.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(0, 0, "NAME :  $name", 0, 0, 'L');
//$pdf->ln(0.2);
$pdf->SetFont('Arial','',10);
$pdf->cell(-8, 0, "DR. :  AMIT NAGAR MBBS", 0, 0, 'C');
$pdf->cell(0, 0, "REG. :  _____", 0, 0, 'R');
$pdf->ln(0.2);
$pdf->SetFont('Arial','',12);
$pdf->cell(6, .2, "-------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');
$pdf->ln(.1);
$pdf->SetFont('Arial','',10);
$pdf->cell(1, .3, "QTY.", 0, 1,'C');
$pdf->cell(3.5, -.3, "PACK", 0, 1,'C');

$pdf->cell(5.5, .3, "DESCRIPTION", 0, 1, 'C');
$pdf->cell(7.5, -.3, "BATCH", 0, 1, 'C');
$pdf->cell(9.5, .3, "EXP.", 0, 1, 'C');
$pdf->cell(11.5, -.3, "M.R.P.", 0, 1, 'C');
$pdf->cell(13.5, .3, "AMONUT", 0, 1, 'C');


$select21=("select * from patient_medicine where bill_id='$b_id'");
$result = mysql_query($select21) or die(mysql_error());
$w=1;
$h=.3;
$pdf->ln(.2);
while ($row = mysql_fetch_array($result))
{

    $pdf->cell($w, $h, $row['quantity'], 0, 1,'C');
    $pdf->cell($w+2.5, $h*(-1), $row['packs'], 0, 1,'C');
    $pdf->cell($w+4.5, $h, $row[7], 0, 1,'C');
    $pdf->cell($w+6.5, $h*(-1), $row['batch_no'], 0, 1,'C');
    $pdf->cell($w+6+2.5, $h, $row['exp_date'], 0, 1,'C');
    $pdf->cell($w+2+6+2.5, $h*(-1), $row['mrp'], 0, 1,'C');
    $pdf->cell($w+2+6+2+2.5, $h, $row['sub_total'], 0, 1,'C');
}


$pdf->ln(.01);
$pdf->SetFont('Arial','B',10);
$pdf->cell(2, .3, "**Please get well soon**", 0, 1,'C');

$pdf->ln(0.01);
$pdf->SetFont('Arial','',12);
$pdf->cell(5.8, 0.1, "------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');

$st=mysql_query("select SUM(sub_total) from patient_medicine where bill_id='$b_id' ")or die(mysql_error());
$sub_total=mysql_fetch_array($st);

$pdf->ln(.01);
$pdf->SetFont('Arial','B',10);
$pdf->cell(13, .3, "Please pay: $sub_total[0]", 0, 1,'C');
$pdf->cell(7.5, .3, "R.off: ____", 0, 1,'C');
$pdf->ln(0.1);



$pdf->ln(.01);
$pdf->SetFont('Arial','',10);
$pdf->cell(13, -.2, "for JAGDAMBA SUPER SPECIALITY HOSPITAL", 0, 1,'C');
$pdf->ln(0.2);
$pdf->SetFont('Arial','',12);
$pdf->cell(6, .2, "-------------------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'L');
$pdf->ln(.1);
$pdf->SetFont('Arial','IBU',10);
$pdf->cell(13, .5, "SIGNATURE:", 0, 1,'C');


$pdf->Output();
unset($_SESSION['p_id']);
unset($_SESSION['bed_no']);
unset($_SESSION['p_name']);
?>
