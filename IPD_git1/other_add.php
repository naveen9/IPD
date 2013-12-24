<?php
include("condb.php");
if (isset($_POST['sub_add']))
{
    $expenditure_name=$_POST['expenditure_name'];
    $details=$_POST['details'];
    $amount=$_POST['amount'];
    $date=$_POST['date'];
    
    
     mysql_query("insert into expenditure_group values('','$expenditure_name','$amount','$details','$date')")or die(mysql_error());
header("location: other-expanditure.php");
}
if (isset($_POST['ear_add']))
{
    $earning_name=$_POST['earning_name'];
    $details=$_POST['details'];
    $amount=$_POST['amount'];
    $date=$_POST['date'];
    
    
     mysql_query("insert into earning_group values('','$earning_name','$amount','$details','$date')")or die(mysql_error());
header("location: other-earning.php");
}

if (isset($_POST['lig']))
{
    $Expenditure_Group=$_POST['Expenditure_Group'];
    $details=$_POST['details'];
    
    $date=$_POST['date'];
    
    
     mysql_query("insert into expenditure_table values('','$Expenditure_Group','$details','$date')")or die(mysql_error());
header("location: expenditure_add.php");
}

if (isset($_POST['lig123']))
{
    $Expenditure_Group=$_POST['Expenditure_Group'];
    $details=$_POST['details'];
    
    $date=$_POST['date'];
    
    
     mysql_query("insert into earning_table values('','$Expenditure_Group','$details','$date')")or die(mysql_error());
header("location: earning_add.php");
}



?>