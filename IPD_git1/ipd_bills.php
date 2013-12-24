
<link rel="stylesheet" type="text/css" href="tab-code.css" />
  <script src="jquer-1.9.1-1.js" type="text/javascript"></script>
   <script src="jq.js" type="text/javascript"></script>
   <script src="jquery.timepicker.min.js"></script>
   
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <link rel="stylesheet" type="text/css" href="style_by.css"/> 
  <link rel="stylesheet" href="includes/paging.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />
    <style type="text/css">
	 .transaction{width:990px; margin:0 auto;}
	 .transaction #field_name{background:#DAE8F6; color:#000000;  height:30px; padding:5px 0px; line-height:15px;}
	 .transaction #field_name #head_lft{float:left;  display:block; width:61px; text-align:left; font-weight:600; font-size:12px; 	}	 
	 .transaction #field_name #head_lftw{float:left;  display:block; width:100px; text-align:left; font-weight:600; font-size:12px; 	}	 
	 .transaction #odd{background:#F7F7F7;  color:#000000;  height:30px; padding:5px 0px; line-height:15px;}
	 .transaction #odd #head_lft{float:left;  display:block; width:61px; text-align:left;}	 
	 .transaction #odd #head_lftw{float:left;  display:block; width:100px; text-align:left;}	 
	 .transaction #even{  color:#000000;  height:30px; padding:5px 0px; line-height:15px;}
	 .transaction #even #head_lft{float:left;  display:block; width:61px; text-align:left; line-height:30px;}	 	 	 
	 .transaction #even #head_lftw{float:left;  display:block; width:100px; text-align:left;  line-height:30px;}	 	 	 
		.tot_earning{ width:100%; display:block; background-color:#DDD; }
		.tot_earning #earning{ width:400px; float:left;padding:10px 0px; height:20px;}
		
</style>
<table border="1">
<tr>
<th>Proc Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Doctor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Patient Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Visit Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Bill Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Proc Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>
<?php 
include("condb.php");
mysql_query("delete from dummy");
$res=mysql_query("select * from opd_items,patient_info,visit_register where visit_register.visit_id=patient_info.patient_id and opd_items.visit_id=visit_register.visit_id");
//$res=mysql_query("select * from opd_items,consumable,ot_billing,patient_medicine,room_charge where patient_info.patient_id=visit_register.visit_id
//room_charge.patient_id=patient_info.patient_id and room_charge.patient_id=visit_register.v_id
//");
//$res=mysql_query("select * from dummy");
while($row=mysql_fetch_array($res)){ 
$Proc_id=$row['proc_id'];
$doc=$row['doc_incharge'];
$patient=$row['p_name'];
$visit_id=$row['visit_id'];
$bill_id=$row['bill_id'];
$Proc_name=$row['proc_name'];
$Proc_amount=$row['amount'];

mysql_query("INSERT INTO  `avantikanew`.`dummy` (
`d_id` ,
`Proc_id` ,
`Doctor` ,
`Patient_name` ,
`Visit_id` ,
`Bill_id` ,
`Proc_name` ,
`amount`,
`table_type`
)
VALUES (
NULL , '$Proc_id',  '$doc',  '$patient',  '$visit_id',  '$bill_id',  '$Proc_name',  '$Proc_amount','opd_items'
);")

?>

<?php } ?>


<?php 
$res=mysql_query("select * from room_charge,patient_info,visit_register where visit_register.visit_id=patient_info.patient_id and room_charge.v_id=visit_register.visit_id");

while($row=mysql_fetch_array($res)){ 
$Proc_id=$row['room_id'];
$doc="room charge";
$patient=$row['p_name'];
$visit_id=$row['v_id'];
//$proc_name=$row['proc_name'];
$bill_id=$row['from_date_time'];
$Proc_name=$row['to_date_time'];
$Proc_amount=$row['total'];

mysql_query("INSERT INTO  `avantikanew`.`dummy` (
`d_id` ,
`Proc_id` ,
`Doctor` ,
`Patient_name` ,
`Visit_id` ,
`Bill_id` ,
`Proc_name` ,
`amount`,
`table_type`
)
VALUES (
NULL , '$Proc_id',  '$doc',  '$patient',  '$visit_id',  '$bill_id',  '$Proc_name',  '$Proc_amount','room_charge'
);")

?>

<?php } ?>



<?php 
$res=mysql_query("select * from patient_medicine,patient_info,visit_register where visit_register.visit_id=patient_info.patient_id and patient_medicine.v_id=visit_register.visit_id");

while($row=mysql_fetch_array($res)){ 
$Proc_id=$row['m_id'];
$doc="Medicine/consumable";
$patient=$row['p_name'];
$visit_id=$row['v_id'];
//$proc_name=$row['proc_name'];
$bill_id=$row['bill_id'];
$Proc_name=$row['m_name'];
$Proc_amount=$row['sub_total'];

mysql_query("INSERT INTO  `avantikanew`.`dummy` (
`d_id` ,
`Proc_id` ,
`Doctor` ,
`Patient_name` ,
`Visit_id` ,
`Bill_id` ,
`Proc_name` ,
`amount`,
`table_type`
)
VALUES (
NULL , '$Proc_id',  '$doc',  '$patient',  '$visit_id',  '$bill_id',  '$Proc_name',  '$Proc_amount','patient_medicine'
);")

?>

<?php } ?>







<?php 
$res=mysql_query("select * from ot_billing,patient_info,visit_register where visit_register.visit_id=patient_info.patient_id and ot_billing.visit_id=visit_register.visit_id");

while($row=mysql_fetch_array($res)){ 
$Proc_id=$row['ot_id'];
$doc="Medicine/consumable";
$patient=$row['p_name'];
$visit_id=$row['visit_id'];
//$proc_name=$row['proc_name'];
$bill_id=$row['bill_id'];
$Proc_name=$row['Procedure_name'];
$Proc_amount=$row['Package'];

mysql_query("INSERT INTO  `avantikanew`.`dummy` (
`d_id` ,
`Proc_id` ,
`Doctor` ,
`Patient_name` ,
`Visit_id` ,
`Bill_id` ,
`Proc_name` ,
`amount`,
`table_type`
)
VALUES (
NULL , '$Proc_id',  '$doc',  '$patient',  '$visit_id',  '$bill_id',  '$Proc_name',  '$Proc_amount','ot_billing'
);")

?>

<?php } ?>

































<table>

<?php
$res=mysql_query("select * from dummy");
 while($row=mysql_fetch_array($res)){ ?>
<tr>
<td><?php echo $row['Proc_id'];?></td>
<td><?php echo $row['Doctor'];?></td>
<td><?php echo $row['Patient_name'];?></td>
<td><?php echo $row['Visit_id'];?></td>
<td><?php echo $row['Bill_id'];?></td>
<td><?php echo $row['Proc_name'];?></td>
<td><?php echo $row['amount'];?></td>
<td><?php echo $row['table_type'];?></td>

</tr>
<?php }?>










