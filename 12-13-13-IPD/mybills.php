<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sameer 
 * Date: 7/15/13
 * Time: 1:41 AM
 * Facebook:- www.facebook.com/sam0hack
 * Email:- sam.nyx@live.com
 */
session_start();
require_once 'head.php';
require_once 'menu.php';
require_once 'condb.php';
$uname= $_SESSION['uname'];




    //Select data from 4 tables 1(opd_bill)[B] 2(visit_register)[V] 3(opd_items)[I] 4(patient_info)[P]
    //Where receptionist = selected  user
    //And opd_bill 's visit id matched with visit register's visit id
    //And visit register 's visit id matched with patient 's patient id
    //Group by bill_id for remove duplicate results
    $biquery=mysql_query("SELECT B.bill_id,B.visit_id,B.reception,B.grand_total,
                        V.visit_id, V.p_id,
                        P.patient_id, P.p_name,
                        I.proc_name, I.doc_incharge,I.proc_id,I.amount,
                        B.grand_discount, B.due_amount,
                        B.paid_amount, B.payment_mode,
                        B.grand_discount, B.billeddate ,B.billedtime
                        FROM opd_bill B, visit_register V, opd_items I, patient_info p
                        WHERE B.reception='$uname'
                        AND B.visit_id=V.visit_id
                        AND V.p_id=P.patient_id
                        AND I.bill_id=B.bill_id
                        group by I.proc_id")or die(mysql_error());
   //CASH
    $sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cash'  ")or die(mysql_error());
    $sumamount=mysql_fetch_array($sum);
    echo "<h2>Total Earning In Cash :- $sumamount[0]</h2>";
    echo '<br/>';
//CREDIT
$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='credit_card'  ")or die(mysql_error());
$sumamount=mysql_fetch_array($sum);
echo "<h2>Total Earning In Credit :- $sumamount[0]</h2>";
echo '<br/>';
//DEBIT
$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='debit_card'  ")or die(mysql_error());
$sumamount=mysql_fetch_array($sum);
echo "<h2>Total Earning In Debit :- $sumamount[0]</h2>";
echo '<br/>';
//DRAFT
$sum=mysql_query("SELECT  SUM(paid_amount) FROM opd_bill WHERE reception='$uname' AND payment_mode='cheque_draft'  ")or die(mysql_error());
$sumamount=mysql_fetch_array($sum);
echo "<h2>Total Earning In Cheque :- $sumamount[0]</h2>";
echo '<br/>';
    //$i=1;//Result No. By default 1
	
	 echo '<table width="200" border="0">';
        echo '<tr>';
        echo '<th>Bill No.</th>';
        echo '<th>Visit Id</th>';
        echo '<th>Patient name</th>';
        echo '<th>Procedure</th>';
		 echo '<th>amount</th>';
        echo '<th>Doctor</th>';
        echo '<th>Total Amount</th>';
        echo '<th>Due amount</th>';
        echo '<th>Discount</th>';
        echo '<th>Paid amount</th>';
        echo '<th>Payment mode</th>';
        echo '<th>Bill date</th>';
        echo '<th>Bill time</th>';
        echo '</tr>';
	
	
	
    while($data=mysql_fetch_array($biquery)){
        //echo $i; //Print Result No.
       
        echo '<tr>';
        echo '<td>'.$data['bill_id'].'</td>';
        echo '<td>'.$data['visit_id'].'</td>';
        echo '<td>'.$data['p_name'].'</td>';
        echo '<td>'.$data['proc_name'].'</td>';
		echo '<td>'.$data['amount'].'</td>';
        echo '<td>'.$data['doc_incharge'].'</td>';
        echo '<td>'.$data['grand_total'].'</td>';
        echo '<td>'.$data['due_amount'].'</td>';
        echo '<td>'.$data['grand_discount'].'</td>';
        echo '<td>'.$data['paid_amount'].'</td>';
        echo '<td>'.$data['payment_mode'].'</td>';
        echo '<td>'.$data['billeddate'].'</td>';
        echo '<td>'.$data['billedtime'].'</td>';
        echo '</tr>';
        
        echo '<hr>';
       // $i++; //Increment result no.
    }
echo '</table>';


?>

