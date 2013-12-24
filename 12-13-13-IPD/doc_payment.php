<?php
ob_start();
//error_reporting(0);
session_start();
include("header.php");
include("menubar.php");
include("condb.php");





             if(isset($_POST['cancel']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("update beneficairy_payment set deduction='', share='', tds='',doc_amount='',remarks='', `check`='',verified='' where bp_id='$chk'")or die(mysql_error());


                 header("location: verify.php");
             }


             if(isset($_POST['payment']))
             {$chk=$_POST['chk'];
                
                mysql_query("update beneficairy_payment set `verified`=2 where bp_id='$chk'")or die(mysql_error());



                 header("location: verify.php");

                 

             }
