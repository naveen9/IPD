<?php
session_start();
error_reporting(0);
include('condb.php');
$v_id=$_SESSION['visit_id'];
$p_id=$_SESSION['p_id'];
$p_name=$_SESSION['p_name'];
$from_date_time=$_POST['from_date_time'];
$to_date_time=$_POST['to_date_time'];
$no_of_day=$_POST['no_of_day'];
$categery=$_POST['categery'];
$bed_no=$_POST['bed_no'];
$charge=$_POST['charge'];
$to_bed=$_POST['to_bed'];
$date_time=$_POST['date_time'];
$no_day=$_POST['no_day'];
$category=$_POST['category'];
$time=$_POST['time'];


$query=mysql_query("select room_charge from room_type where room_type='$category'")or die(mysql_error());
$res=mysql_fetch_array($query);
$res1=$res[0];

//echo $date_time;
//echo $to_bed;

//echo $v_id;
//echo $p_id;
//echo $p_name;
//echo $from_date_time;
//echo $to_date_time;
//echo $no_of_day;
//echo $categery;
//echo $bed_no;
//echo $charge;

if(isset($_POST['Transfer']))
{
    if($to_bed=="" or $date_time=="" )
    {
        header('location: ip-management.php?error_msg=Fill the field!');

    }
    else
    {
        $q4=mysql_query("select max(room_id) from room_charge where patient_id=$p_id");
        $search_result=mysql_fetch_array($q4);
        $room_id=$search_result[0];
        //echo $room_id;


       mysql_query("UPDATE  `room_charge` SET  `to_date_time` =  '$date_time $time'  WHERE  `room_charge`.`room_id` =$room_id;")or die(mysql_error()."51");

       mysql_query("insert into room_charge values('','$p_id','$v_id','$date_time $time','-','','$category','$to_bed','$res1','')")or die(mysql_error()."53");

        mysql_query("UPDATE  `visit_register` SET  `bed_no` = '$to_bed' WHERE  `visit_id`='$v_id'" )or die(mysql_error()."55");

        $q123= mysql_query("select categery from room_charge where" );
        $search_result=mysql_fetch_array($q123);
        $categery=$search_result[0];
         //echo $categery;
     $q= mysql_query("select * from room_type where room_type=$categery");
        $search_result=mysql_fetch_array($q);
        $room_charge=$search_result[0];
        //echo $room_charge;
        mysql_query("update beds_master_table set  availability=0,p_id=0 where p_id='$p_id'")or die(mysql_error()."There is an error transferring bed");

        mysql_query("update beds_master_table set  availability=1,p_id='$p_id' where no_of_bed='$to_bed'")or die(mysql_error()."There is an error transferring bed");




        // $total=$no_of_day*$charge;
        //mysql_query("UPDATE room_charge SET total=$total WHERE patient_id=$p_id");

       // $_SESSION['total']=$total;
    }
    header('location: ip-management.php');


}
/*
        $cat=$_SESSION['cat'];
        $qwerty=mysql_query("select room_charge from room_type where room_type='$cat' ")or die(mysql_error());
        $cat_chrg=mysql_fetch_array($qwerty);
        echo $cat_chrg[0];
*/

        //echo "<br>bene54=".$bene=mysql_query("insert into beneficairy_payment values('','$v_id','$p_name','$b_id','$procedure','$proc_id','$doc_incharge','$amount','$billdate','$deduction'
//,'$share','$tds','$remark')");

if(isset($_POST['total']))
{
    if($no_day=="" )
    {
        header('location: ip-management.php?error_msg=Fill the field!');

    }
    else
    {   $chk=$_POST['check'];
       $q1234= mysql_query("select charge from room_charge where room_id=$chk");
        $search_result=mysql_fetch_array($q1234);
        $charge1=$search_result[0];



        $amount=$no_day*$charge1;

        mysql_query("UPDATE  `room_charge` SET  `total` =  '$amount' WHERE  `room_id` =$chk")or die(mysql_error());
        mysql_query("UPDATE  `room_charge` SET  `no_of_day` =  '$no_day' WHERE  `room_id` =$chk")or die(mysql_error());


        header('location: ip-management.php');
        }
}
?>