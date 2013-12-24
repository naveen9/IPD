

<?php
session_start();


require 'condb.php';

if(isset($_POST['abortion']))
{
$patiant_name=$_POST['patiant_name'];

$age=$_POST['age'];



    $add=$_POST['add'];
    $date=$_POST['date'];

$type_of_a=$_POST['type_of_a'];


    if(!empty($age) && !empty($patiant_name) && !empty($date)){
$sql=mysql_query("INSERT INTO abortion VALUES(' ','$patiant_name','$age','$add','$type_of_a','$date')")or die(mysql_error());
$msg="<h3>Medicine Stored</h3>";
        $_SESSION['msg']=$msg;
header('location: abortion_reg.php');

 }
    else
    {
        $msg= "<h3>Fill Patiant name and age</h3> ";
        $_SESSION['msg']=$msg;
       // echo "naveen";
header('location: abortion_reg.php');

    }
}
else
{
$msg= "<h3>Something Wrong</h3>";
    $_SESSION['msg']=$msg;
header('location: abortion_reg.php');

}
?>