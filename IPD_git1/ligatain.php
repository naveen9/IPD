

<?php
session_start();


require 'condb.php';

if(isset($_POST['lig']))
{
$patiant_name=$_POST['patiant_name'];

$age=$_POST['age'];

$sex=$_POST['sex'];

    $add=$_POST['add'];
    $date=$_POST['date'];


$cause=$_POST['cause'];

    if(!empty($age) && !empty($patiant_name) && !empty($sex)){
$sql=mysql_query("INSERT INTO ligatain VALUES(' ','$patiant_name','$age','$sex','$add','$date')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: ligatain_reg.php');

 }
    else
    {
        $msg= "<h3>Fill Patiant name and age</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: ligatain_reg.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: ligatain_reg.php');

}
?>