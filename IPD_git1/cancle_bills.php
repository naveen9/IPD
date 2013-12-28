<?php
require 'condb.php';
$proc_id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$amout=$_REQUEST['amount'];
$bill_id=$_REQUEST['bill_id'];
$visit_id=$_REQUEST['visit_id'];
$pname=$_REQUEST['pname'];
$dep=$_REQUEST['dep'];
$dept=$_REQUEST['dept'];
//echo "id {$proc_id}<br>name {$name}<br>amount {$amout}<br>bill id {$bill_id}<br> visit id {$visit_id}<br>pname {$pname}<br>dep {$dep}";

if($dep=='opdi')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep') ")or die(mysql_error());    
mysql_query("delete from opd_items where proc_id='$proc_id'");  
//header('location:dashboard_new1.php?page=1');
echo $dep;
echo $dept;

}

if($dep=='otb')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep') ")or die(mysql_error());    
mysql_query("delete from ot_billing where ot_id='$proc_id'");  
header('location:dashboard_new1.php?page=1');

}

if($dep=='pm')
{
mysql_query("insert into cancle_bills (`id`,`procedure_id`,`procedure_name`,`amount`,`bill_id`,`ipid`,`patient_name`,`dep`) "
                       . "values('NULL','$proc_id','$name','$amout','$bill_id','$visit_id','$pname','$dep') ")or die(mysql_error());    
mysql_query("delete from patient_medicine where m_id='$proc_id'");  
//header('location:dashboard_new1.php?page=1');
echo $dep;
echo $dept;
}
