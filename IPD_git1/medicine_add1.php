<?php
ob_start();
session_start();
error_reporting(0);
include('condb.php');
//$p_id=$_SESSION['p_id'];
//$v_id=$_SESSION['v_id'];
$b_id=$_SESSION['b_id'];
$p_name=$_SESSION['p_name'];
$s_proc_id=$_SESSION['s_proc_id'];
$p_id=$_SESSION['p_id'];
$p_name=$_SESSION['p_name'];
$bed_no=$_SESSION['bed_no'];
$dom=$_POST['dom'];
$m_name=$_REQUEST['m_name'];
$batch_no=$_REQUEST['batch_no'];
$mrp=$_REQUEST['mrp'];
$quantity=$_REQUEST['quantity'];
$exp_date=$_REQUEST['exp_date'];
$tax=$_REQUEST['tax'];
$packs=$_REQUEST['packs'];


date_default_timezone_set ("Asia/Kolkata");
$billdate=date("y-m-d");
$billtime=date("H:i:s");
$final_rate=$mrp*$quantity;
$tax_amount=$final_rate*($tax/100);
$total=$final_rate+$tax_amount;
$visit_id=$_SESSION['visit_id'];
$add=$_REQUEST['add'];
$sub_total=$_SESSION['sub_total'];





if(isset($_POST['add']))
{




    //$b_id=$_SESSION['b_id'];//storing bill id in session

    if(!empty($p_id) && !empty($m_name) && !empty($mrp))
    {




       $p_id=$_SESSION['p_id'];
        $b_id=$_SESSION['b_id'];
        $dom=$_SESSION['dom']=$dom;


        mysql_query("insert into patient_medicine values ('','$p_id','$visit_id','$b_id','$dom','$p_name','$bed_no','$m_name','$batch_no','$mrp','$packs','$quantity','$exp_date','$tax','$total')")or die(mysql_error());
        
        $sql=mysql_query("select * from medicine_store where batch_no='$batch_no'")or die(mysql_error());
            $data=mysql_fetch_array($sql);
            $old_qu=$data['quantity'];
            $new_qu=$old_qu-$quantity;
          
        mysql_query("update medicine_store set quantity='$new_qu' where batch_no='$batch_no'")or die(mysql_error());

        
        $med=mysql_query("select quantity from medicine_store where batch_no='$batch_no'");
                $data12=mysql_fetch_array($med);
            
         if($data12['quantity']<1)
         {
             mysql_query("DELETE FROM `medicine_store` where batch_no='$batch_no'")or die(mysql_error());
         }
        header("location:medicine.php");

    }
    else
    {


        header("location:medicine.php");
    }



}

$del=$_REQUEST['delete'];
if($_REQUEST['delete'])
    
{
    $pat_med=mysql_query("select * from patient_medicine where  m_id='$del'");
                $med_rec=mysql_fetch_array($pat_med);
                $pat_m_name=$med_rec['m_name'];
                $pat_bach_no=$med_rec['batch_no'];
                $pat_mrp=$med_rec['mrp'];
                $pat_quantity=$med_rec['quantity'];
                $pat_exp_date=$med_rec['exp_date'];
                
    
    
     $med_store=mysql_query("select * from medicine_store where  batch_no='$pat_bach_no'");
     if(mysql_num_rows($med_store)==0)
         {
         mysql_query("INSERT INTO medicine_store VALUES('NULL','$pat_m_name','$pat_bach_no','','$pat_mrp','','$pat_quantity','$pat_exp_date')")or die(mysql_error());
     }
 else {
         $med_store1=mysql_fetch_array($med_store);
     $store_mrd=$med_store1['batch_no'];
     $store_quantity=$med_store1['quantity'];
     
     $new_qu1=$store_quantity+$pat_quantity;
     
         mysql_query("update medicine_store set quantity='$new_qu1' where batch_no='$store_mrd'")or die(mysql_error());
     }
                
    
    mysql_query("DELETE FROM `patient_medicine` WHERE  m_id='$del'")or die(mysql_error());
    unset($_SESSION['dom']);
    header('location: medicine.php');
}
if(isset($_POST['cancel']))
{
    unset($_SESSION['p_id']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['p_name']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['dom']);
    header('location: medicine.php');
}
if(isset($_POST['newe']))

{
    mysql_query("update opd_bill set grand_total='$sub_total',due_amount='$sub_total',status='unpaid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$visit_id'")or die(mysql_error());

    unset($_SESSION['p_id']);
    unset($_SESSION['bed_no']);
    unset($_SESSION['p_name']);
    unset($_SESSION['visit_id']);
    unset($_SESSION['dom']);
    header("location: medicine.php?error_msg=".urlencode("Save bill"));


}
if(isset($_POST['print'])){
    mysql_query("update opd_bill set grand_total='$sub_total',due_amount=0,paid_amount='$sub_total',status='paid',billeddate='$billdate',billedtime='$billtime',proc_status='$proc_status',reception='$uname' where bill_id='$b_id' and visit_id='$visit_id'")or die(mysql_error()." line no-86");

    //echo $b_id=$_SESSION['b_id'];
    //echo '</br>';
    //echo $sub_total;
    //echo '</br>';
   // echo $visit_id;
    echo '<script type="text/javascript">window.open( "jagdanb_pdf (1).php" )</script>';
    //header('location: medicine.php');
echo '<a href="medicine.php">Go Back</a>';

}


?>