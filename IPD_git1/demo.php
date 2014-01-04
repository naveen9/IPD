<?php
session_start();





//error_reporting(0);
include('condb.php');
$p_id=$_SESSION['p_id'];
//$v_id=$_SESSION['v_id'];
$p_name=$_POST['p_name'];
$gender=$_POST['gender'];
$p_age=$_POST['p_age'];
$phone=$_POST['phone'];
$status=$_POST['status'];
$p_email=$_POST['p_email'];
$blood=$_POST['blood'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$guar_name=$_POST['guar_name'];
$relation=$_POST['relation'];
$add=$_POST['add'];
 $Allergies=$_POST['Allergies'];
 $Allergies1=$_POST['Allergies1'];
 $Allergies2=$_POST['Allergies2'];
$Allergies3=$_POST['Allergies3'];
$Allergies4=$Allergies.','.$Allergies1.','.$Allergies2.','.$Allergies3;

$Diseases=$_POST['Diseases'];
 $Diseases1=$_POST['Diseases1'];
 $Diseases2=$_POST['Diseases2'];
 $Diseases3=$_POST['Diseases3'];
$Diseases4=$Diseases.','.$Diseases1.','.$Diseases2.','.$Diseases3;
$Drugs=$_POST['Drugs'];
$Drugs1=$_POST['Drugs1'];
$Drugs2=$_POST['Drugs2'];
$Drugs3=$_POST['Drugs3'];
$Drugs4=$Drugs.','.$Drugs1.','.$Drugs2.','.$Drugs3;
        


date_default_timezone_set ("Asia/Kolkata");
$billdate=date("y-m-d");
$billtime=date("H:i:s");

if(isset($_POST['save']))
{
    

   


$opd=mysql_query("UPDATE patient_info SET p_name='$p_name', p_mob='$phone', p_email='$p_email', p_gender='$gender',  p_age='$p_age', p_address = '$add', p_guardian ='$guar_name', p_g_relation= '$relation', p_bgroup = '$blood', p_height ='$height', p_weight ='$weight', marital_status='$status' WHERE  patient_id ='$p_id'")or die(mysql_error());
$reco=mysql_query ("select * from description_medicine where p_id='$p_id'");
$found=mysql_num_rows($reco);
if($found==0)
{
    mysql_query("insert into description_medicine values ('','$p_id','$Allergies4','$Diseases4','$Drugs4') ");
}
 else {
    mysql_query("update description_medicine set Allergies='$Allergies4',Diseases='$Diseases4',Drugs='$Drugs4'"); 
}
//echo 'hddhdh';
header("location:patient-demographics.php?error_msg1=".urlencode("Update Data"));

}





if(isset($_POST['save1']))
{
	
//$opd=mysql_query("UPDATE patient_info SET p_name = $p_name,p_mob = $phone,p_email = $p_email,p_gender=$gender, p_age=$p_age, p_address = $add, p_guardian =$guar_name,p_g_relation= $relation,p_bgroup = $blood,p_height = $height,p_weight = $weight,marital_status = $status WHERE  patient_id =$p_id;")or die(mysql_error());

echo '<script type="text/javascript">window.open( "print_demo1.php" )</script>';
    //header('location:patient-demographics.php');
session_destroy();
  echo '<meta HTTP-EQUIV="REFRESH" content="0; url=patient-demographics.php">';
  }



if(isset($_POST['save2']))
{

$opd=mysql_query("UPDATE patient_info SET p_name='$p_name', p_mob='$phone', p_email='$p_email', p_gender='$gender',  p_age='$p_age', p_address = '$add', p_guardian ='$guar_name', p_g_relation= '$relation', p_bgroup = '$blood', p_height ='$height', p_weight ='$weight', marital_status='$status' WHERE  patient_id ='$p_id'")or die(mysql_error());

echo '<script type="text/javascript">window.open( "print_demo.php" )</script>';
//header('location:patient-demographics.php');
//session_destroy();
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=patient-demographics.php">';

   

}

?>