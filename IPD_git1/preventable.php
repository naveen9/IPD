

<?php
session_start();


require 'condb.php';

if(isset($_POST['pre']))
{
$patiant_name=$_POST['patiant_name'];

$age=$_POST['age'];

$sex=$_POST['sex'];

    $Diseases_name=$_POST['Diseases_name'];
    $date=$_POST['date'];


$cause=$_POST['cause'];

    if(!empty($age) && !empty($patiant_name) && !empty($sex)){
$sql=mysql_query("INSERT INTO preventable VALUES(' ','$patiant_name','$age','$sex','$Diseases_name','$date')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: preventable_reg.php');

 }
    else
    {
        $msg= "<h3>Fill Patiant name and age</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: preventable_reg.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: preventable_reg.php');

}
?>