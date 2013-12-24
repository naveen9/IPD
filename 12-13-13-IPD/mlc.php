

<?php
session_start();


require 'condb.php';

if(isset($_POST['mlc']))
{
$patiant_name=$_POST['patiant_name'];

$age=$_POST['age'];

$sex=$_POST['sex'];

    $add=$_POST['add'];
    $date=$_POST['date'];


$cause=$_POST['cause'];

    if(!empty($age) && !empty($patiant_name) && !empty($sex)){
$sql=mysql_query("INSERT INTO mlc VALUES(' ','$patiant_name','$age','$sex','$add','$cause','$date')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: mlc_reg.php');

 }
    else
    {
        $msg= "<h3>Fill Patiant name and age</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: mlc_reg.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: mlc_reg.php');

}
?>