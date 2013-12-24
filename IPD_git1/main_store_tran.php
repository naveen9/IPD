<?php
ob_start();
//error_reporting(0);
session_start();
include("header.php");
include("menubar.php");
include("condb.php");





             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from inventory_store where in_id='$chk'")or die(mysql_error());


                 header("location: main_store.php");
             }


             if(isset($_POST['transfer']))
             {
                 $chk1=$_POST['chk'];
                 $res4=mysql_query("select * from inventory_store where in_id='$chk1'");
                 $row4=mysql_fetch_array($res4);
                 $_SESSION['inventory_name']=$row4[1];
                 $_SESSION['quantity']=$row4[5];
                 $_SESSION['in_id']=$row4[0];
                 $_SESSION['type']=$row4[2];
                 $_SESSION['ex_date']=$row4[6];
                 header("location: invtr_tran.php");
                 

             }

if(isset($_POST['transfer1']))
             {
                 $chk1=$_POST['chk'];
                 $res4=mysql_query("select * from ot_store where ot_id='$chk1'");
                 $row4=mysql_fetch_array($res4);
                 $_SESSION['inventory_name']=$row4[3];
                 $_SESSION['quantity']=$row4[5];
                 $_SESSION['in_id']=$row4[1];
                 $_SESSION['ot_id']=$row4[0];

                 $_SESSION['type']=$row4[4];
                 $_SESSION['ex_date']=$row4[6];
                 
                 
                 





                 header("location: invtr_to_invt.php");
             }
