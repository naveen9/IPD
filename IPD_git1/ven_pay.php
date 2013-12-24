  <?php
  //include("header.php"); 
//include("menubar.php");
include("condb.php"); 
$id=$_REQUEST['id'];
$query=mysql_query("SELECT * FROM vender_table where ven_id='$id'")or die(mysql_error());
$fetch=  mysql_fetch_array($query);


  
  
  
    if (isset($_POST['add']))
{

        
        $ven_id=$fetch['ven_id'];
        $total_amount=$fetch['amount'];
    $date=$_POST['date'];
    $payment=$_POST['payment'];
   $alredy_paid= $fetch['pad_amount'];
    $due_amount=$total_amount-($payment+$alredy_paid);
    $total_paid=$total_amount-$due_amount;
    
    
    
      $details=$_POST['details'];
   
    
     mysql_query("insert into vendor_details values('','$ven_id','$total_amount','$payment','$due_amount','$date','$details')")or die(mysql_error());
     
     
     mysql_query("update vender_table set pad_amount='$total_paid',payment_date='$date' where ven_id='$ven_id'");
     header('location:vender_payment.php ');

}
    
    
    ?>