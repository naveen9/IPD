<?php
session_start();
error_reporting(0);
//ob_start();
require 'condb.php';
date_default_timezone_set ("Asia/Calcutta");
$billdate=date("y-m-d");
            if(isset($_POST['Add_emp']))
            {
                
                $emp_name=$_POST['name'];
                $emp_age=$_POST['age'];
                $emp_gender=$_POST['gender'];
                $emp_phone=$_POST['phone'];
                $emp_salary=$_POST['salary'];
                $emp_email=$_POST['p_email'];
                $emp_designation=$_POST['designation'];
                $emp_add=$_POST['add'];
                
                mysql_query("insert into employe values('','$emp_name','$emp_age','$emp_gender','$emp_add','$emp_email','$emp_designation','$emp_salary','$emp_phone','$billdate')")or die(mysql_error());
                
                header("location: employe.php");
                
                
            }
            ?>
        