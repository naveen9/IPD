<?php
session_start();
error_reporting(0);
require 'condb.php';

$v_id=$_SESSION['v_id'];
$p_name=$_SESSION['p_name'];
$name=$_SESSION['uname'];
$ot_bill_id=$_SESSION['ot_id'];
date_default_timezone_set ("Asia/Kolkata");
$billdate=date("y-m-d");
$bill_time=date("H:i:s");
          if($_POST['save'])
          {
              //echo $v_id;
              //0
              
       $sur=$_POST['surgeon_name'];
           		$ot_bill_date=$_POST['ot_bill_date'];

          		
          		$checkbox=$_POST['checkbox'];
              	$package=$_POST['package'];
              	$Procedure_Name=$_POST['Procedure_Name'];
              	$Procedure_Fee=$_POST['Procedure_Fee'];
              	$Adnl_Surgeon_cahrge=$_POST['Adnl_Surgeon_cahrge'];
              	$OT_Charge=$_POST['OT_Charge'];
              	$Anasethetics_charge=$_POST['Anasethetics_charge'];
              	$Consumable_charge=$_POST['Consumable_charge'];
              	$Implant_Charge=$_POST['Implant_Charge'];
              	$Other_Charge=$_POST['Other_Charge'];
//1
              $checkbox1=$_POST['checkbox1'];
              $package1=$_POST['package1'];
              $Procedure_Name1=$_POST['Procedure_Name1'];
              $Procedure_Fee1=$_POST['Procedure_Fee1'];
              $Adnl_Surgeon_cahrge1=$_POST['Adnl_Surgeon_cahrge1'];
              $OT_Charge1=$_POST['OT_Charge1'];
              $Anasethetics_charge1=$_POST['Anasethetics_charge1'];
              $Consumable_charge1=$_POST['Consumable_charge1'];
              $Implant_Charge1=$_POST['Implant_Charge1'];
              $Other_Charge1=$_POST['Other_Charge1'];
//2
              $checkbox2=$_POST['checkbox2'];
              $package2=$_POST['package2'];
              $Procedure_Name2=$_POST['Procedure_Name2'];
              $Procedure_Fee2=$_POST['Procedure_Fee2'];
              $Adnl_Surgeon_cahrge2=$_POST['Adnl_Surgeon_cahrge2'];
              $OT_Charge2=$_POST['OT_Charge2'];
              $Anasethetics_charge2=$_POST['Anasethetics_charge2'];
              $Consumable_charge2=$_POST['Consumable_charge2'];
              $Implant_Charge2=$_POST['Implant_Charge2'];
              $Other_Charge2=$_POST['Other_Charge2'];
//3
              $checkbox3=$_POST['checkbox3'];
              $package3=$_POST['package3'];
              $Procedure_Name3=$_POST['Procedure_Name3'];
              $Procedure_Fee3=$_POST['Procedure_Fee3'];
              $Adnl_Surgeon_cahrge3=$_POST['Adnl_Surgeon_cahrge3'];
              $OT_Charge3=$_POST['OT_Charge3'];
              $Anasethetics_charge3=$_POST['Anasethetics_charge3'];
              $Consumable_charge3=$_POST['Consumable_charge3'];
              $Implant_Charge3=$_POST['Implant_Charge3'];
              $Other_Charge3=$_POST['Other_Charge3'];

if(!empty($Procedure_Name)){
    $bill1=mysql_query("insert into opd_bill (bill_id,visit_id,proc_status) values('','$v_id','1')");
    $bill2=mysql_query("select max(bill_id) from opd_bill");
    $search_result=mysql_fetch_array($bill2);
    $bill=$search_result[0];

        $insert=mysql_query("insert into ot_billing VALUES ('$ot_bill_id','$bill', '$Procedure_Name', '$Procedure_Fee', '$Adnl_Surgeon_cahrge', '$OT_Charge', '$Anasethetics_charge', '$Consumable_charge', '$Implant_Charge', '$Other_Charge', '$package', '$v_id', '$sur' , '$ot_bill_date','$bill_time','$name','')")or die(mysql_error()."Error in operation-theater.php in INSERT 0  ");
        $bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$bill','$Procedure_Name','$ot_bill_id','$sur','$package','$ot_bill_date','$deduction','$share','$tds','','$remark','','')");
}
            if(!empty($Procedure_Name1)) {
              
              $insert1=mysql_query("insert into ot_billing VALUES('$ot_bill_id','$bill','$Procedure_Name1','$Procedure_Fee1','$Adnl_Surgeon_cahrge1','$OT_Charge1','$Anasethetics_charge1','$Consumable_charge1','$Implant_Charge1','$Other_Charge1','$package1','$v_id', '$sur' , '$ot_bill_date','$bill_time','$name','')")or die(mysql_error()."Error in operation-theater.php in INSERT 1  ");
              
              $bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$bill','$Procedure_Name1','$ot_bill_id','$sur','$package1','$ot_bill_date','$deduction','$share','$tds','','$remark','','')");
            }

              if(!empty($Procedure_Name2)) {
                  $insert2=mysql_query("insert into ot_billing VALUES('$ot_bill_id','$bill','$Procedure_Name2','$Procedure_Fee2','$Adnl_Surgeon_cahrge2','$OT_Charge2','$Anasethetics_charge2','$Consumable_charge2','$Implant_Charge2','$Other_Charge2','$package2','$v_id', '$sur' , '$ot_bill_date','$bill_time','$name','')")or die(mysql_error()."Error in operation-theater.php in INSERT 2  ");
                  
                  echo "<br>bene54=".$bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$bill','$Procedure_Name2','$ot_bill_id','$sur','$package2','$ot_bill_date','$deduction','$share','$tds','',$remark','','')");

              }
              if(!empty($Procedure_Name3)) {
                  $insert3=mysql_query("insert into ot_billing VALUES('$ot_bill_id','$bill','$Procedure_Name3','$Procedure_Fee3','$Adnl_Surgeon_cahrge3','$OT_Charge3','$Anasethetics_charge3','$Consumable_charge3','$Implant_Charge3','$Other_Charge3','$package3','$v_id', '$sur' , '$ot_bill_date','$bill_time','$name','')")or die(mysql_error()."Error in operation-theater.php in INSERT 3  ");
              
                 echo "<br>bene54=".$bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$bill','$Procedure_Name3','$ot_bill_id','$sur','$package3','$ot_bill_date','$deduction','$share','$tds','',$remark','','')");
              }
              
          else{
              echo "Please Fill all Fields";
          }
          
          $total=mysql_query("select sum(Procedure_Fee),SUM(Adnl_Surgeon_Charge),SUM(Anasethetics_Charge),SUM(Consumamble_Charge),SUM(Implant_Charge),SUM(Other_Charge),SUM(OT_Charge)from ot_billing where visit_id='$v_id' and bill_id='$bill'")or die(mysql_error()."Line no 76 ");
              
          $addition=mysql_fetch_array($total);
         $result= $addition[0] + $addition[1] +$addition[2]+$addition[3]+$addition[4] +$addition[5] +$addition[6];
          
         $_SESSION['result']=$result;

              //echo $bill;
              mysql_query("update opd_bill set grand_total='$i',due_amount='$i',reception='$name',billeddate='$ot_bill_date',billedtime='$bill_time' where bill_id='$charge'");

              $bill=mysql_query("update opd_bill set grand_total='$result',due_amount='$result',reception='$name',billeddate='$ot_bill_date',billedtime='$bill_time' where bill_id='$bill' and visit_id='$v_id'");
            
          //header("location:receive_payment_ot.php");
              unset($_SESSION['p_id']);
               unset($_SESSION['p_name']);
               unset($_SESSION['p_age']);
               unset($_SESSION['p_mob']);
               unset($_SESSION['p_gender']);
               unset($_SESSION['p_email']);
               unset($_SESSION['v_id']);
               unset($_SESSION['b_id']);
              header("location:operation-theater.php?error_msg=".urlencode("Data Saved"));
          }

      if($_POST['home'])
           {
          
          $sur=$_POST['surgeon_name'];
           		$ot_bill_date=$_POST['ot_bill_date'];

          		
          		$checkbox=$_POST['checkbox'];
              	$package=$_POST['package'];
              	$Procedure_Name=$_POST['Procedure_Name'];
              	$Procedure_Fee=$_POST['Procedure_Fee'];
              	$Adnl_Surgeon_cahrge=$_POST['Adnl_Surgeon_cahrge'];
              	$OT_Charge=$_POST['OT_Charge'];
              	$Anasethetics_charge=$_POST['Anasethetics_charge'];
              	$Consumable_charge=$_POST['Consumable_charge'];
              	$Implant_Charge=$_POST['Implant_Charge'];
              	$Other_Charge=$_POST['Other_Charge'];
//1
              $checkbox1=$_POST['checkbox1'];
              $package1=$_POST['package1'];
              $Procedure_Name1=$_POST['Procedure_Name1'];
              $Procedure_Fee1=$_POST['Procedure_Fee1'];
              $Adnl_Surgeon_cahrge1=$_POST['Adnl_Surgeon_cahrge1'];
              $OT_Charge1=$_POST['OT_Charge1'];
              $Anasethetics_charge1=$_POST['Anasethetics_charge1'];
              $Consumable_charge1=$_POST['Consumable_charge1'];
              $Implant_Charge1=$_POST['Implant_Charge1'];
              $Other_Charge1=$_POST['Other_Charge1'];
//2
              $checkbox2=$_POST['checkbox2'];
              $package2=$_POST['package2'];
              $Procedure_Name2=$_POST['Procedure_Name2'];
              $Procedure_Fee2=$_POST['Procedure_Fee2'];
              $Adnl_Surgeon_cahrge2=$_POST['Adnl_Surgeon_cahrge2'];
              $OT_Charge2=$_POST['OT_Charge2'];
              $Anasethetics_charge2=$_POST['Anasethetics_charge2'];
              $Consumable_charge2=$_POST['Consumable_charge2'];
              $Implant_Charge2=$_POST['Implant_Charge2'];
              $Other_Charge2=$_POST['Other_Charge2'];
//3
              $checkbox3=$_POST['checkbox3'];
              $package3=$_POST['package3'];
              $Procedure_Name3=$_POST['Procedure_Name3'];
              $Procedure_Fee3=$_POST['Procedure_Fee3'];
              $Adnl_Surgeon_cahrge3=$_POST['Adnl_Surgeon_cahrge3'];
              $OT_Charge3=$_POST['OT_Charge3'];
              $Anasethetics_charge3=$_POST['Anasethetics_charge3'];
              $Consumable_charge3=$_POST['Consumable_charge3'];
              $Implant_Charge3=$_POST['Implant_Charge3'];
              $Other_Charge3=$_POST['Other_Charge3'];
          
          
          
          
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
$pdf->cell(0, .5, "Procedure Name:  $Procedure_Name", 1, 1, 'L');

$pdf->cell(5, -.5, "Surgeon Name:  $sur", 0, 0, 'R');
$pdf->cell(2.6, -.5, "date:  $visit_date_sam", 0, 0, 'R');


$pdf->SetFont('Arial','B',10);
$pdf->ln(0.3);
$pdf->cell(0, 0, "Surgeon Fee                :    $Procedure_Fee", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "Adnl Surgeon charge :    $Adnl_Surgeon_cahrge", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "OT Charge                   :    $OT_Charge", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "Anasethetics charge  :    $Anasethetics_charge", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "Consumable charge   :    $Consumable_charge", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "Implant Charge           :    $Implant_Charge", 0, 0, 'L');
$pdf->ln(0.3);
$pdf->cell(0, 0, "Other Charge              :    $Other_Charge", 0, 0, 'L');

$pdf->cell(-8, 0.9, "----------------------------------------------------------------------------------------------------------------------------------", 0, 1, 'C');
$pdf->ln(0.1);
$pdf->cell(-0.2, 0, "Total Package                      :    $package", 0, 0, 'L');


$pdf->ln(0.1);
$pdf->cell(0, 0, "User name      :    $name", 0, 0, 'R');
$pdf->SetFont('Arial','',12);

$pdf->Output();
unset($_SESSION['v_id']);
               //header("location:admission-ipd.php");
           }
$clear_all=$_POST['clear_all'];
if($_POST['clear_all'])
{
    unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['v_id']);
    unset($_SESSION['b_id']);
    header("location:operation-theater.php");
}
          ?>