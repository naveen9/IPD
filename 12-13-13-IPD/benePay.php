 <?php include("condb.php");?>
 
 <?php if(isset($_POST['save']))
 {
 
   
	 
     for($i=0;$i<count($_POST['chk']);$i++)
	 {
	     $id=$_POST['chk'][$i];
		 $ded='deduction'.$id;
		$ded=$_POST[$ded];
		
		$shrd='shared'.$id;
		 $shrd=$_POST[$shrd];
		
		$tds='tds'.$id;
		 $tds=$_POST[$tds];
		
		$rem='remarks'.$id;
		 $rem=$_POST[$rem];
		
		
	 $update=mysql_query("update beneficairy_payment set deduction='$ded',share='$shrd',tds='$tds',remarks='$rem',status='0' where bp_id='$id'");
	
	 }
	 $id=$_POST['chk']; 
	 ?>
	 <table>
	 <tr>
	 <th>Visit ID</th>
	 <th>Bill ID</th>
	 <th>Procedure Name</th>
	 <th>Amount</th>
	 <th>Patient Name</th>
	 <th>Discount%</th>
	 <th>Total Amount</th>
	 <th>Deduction</th>
	 <th>Share%</th>
	 <th>Grand amount</th>
	 </tr>
	<?php  
	 foreach($id as $idd){
	 echo $idd;
	 //$res=mysql_query("select * from beneficairy_payment where bp_id='$idd' and status='0'");
	 $res=mysql_query("select * from beneficairy_payment,opd_items,opd_recpt where bp_id='$idd' and status='0' and 
	 opd_items.visit_id=beneficairy_payment.visit_id and opd_items.bill_id=beneficairy_payment.bill_id,opd_recpt.visit_id=beneficairy_payment.visit_id group by beneficairy_payment.bp_id");
	 while($row=mysql_fetch_array($res)){?>
  <tr>
  <td><?php echo $row['visit_id'];?></td>
  <td><?php echo $row['bill_id'];?></td>
  <td><?php echo $row['procedure_name'];?></td>
  <td><?php echo $row['amount'];?></td>
  <td><?php echo $row['patient_name'];?></td>
  <td><?php echo $row['discount'];?></td>
  <td><?php echo $row['total'];?></td>
  <td><?php echo $row['deduction'];?></td>
  <td><?php echo $row['share'];?></td>
  <td><?php echo $row['crnt_discount'];?></td>
  
	 </tr>
	 <?php }
	 
	 } ?>
	 </table>
	 
 <?php }
 ?>
 
 
 