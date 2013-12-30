<?php
session_start();

require 'condb.php';
$uid=$_SESSION['uid'];//Reception id
$uname=$_SESSION['uname'];//Reception name
$proc_id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$amout=$_REQUEST['amount'];
$bill_id=$_REQUEST['bill_id'];
$visit_id=$_REQUEST['visit_id'];
$pname=$_REQUEST['pname'];
$dep=$_REQUEST['dep'];
$page=$_REQUEST['page'];
//echo "id {$proc_id}<br>name {$name}<br>amount {$amout}<br>bill id {$bill_id}<br> visit id {$visit_id}<br>pname {$pname}<br>dep {$dep}";

if($dep=='opdi')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`,`recption_id`,`reception_name`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep','$uid','$uname') ")or die(mysql_error());    
mysql_query("delete from opd_items where proc_id='$proc_id'");  
if($page==6)
{
header('location:dashboard_new1.php?page=6');
}
 else {
header('location:dashboard_new1.php?page=1');    
}


 }

if($dep=='otb')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep') ")or die(mysql_error());    
mysql_query("delete from ot_billing where ot_id='$proc_id'");  

if($page==6)
{
header('location:dashboard_new1.php?page=6');
}
 else {
header('location:dashboard_new1.php?page=1');    
}



}

if($dep=='pm')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep') ")or die(mysql_error());    
mysql_query("delete from patient_medicine where m_id='$proc_id'");  
if($page==6)
{
header('location:dashboard_new1.php?page=6');
}
 else {
header('location:dashboard_new1.php?page=1');    
}


}
