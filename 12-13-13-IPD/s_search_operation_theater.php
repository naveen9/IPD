<?php
error_reporting(0);
session_start();

$current_date=date("y-m-d");
$current_time=date("H:i:s");
//making database connection
include("condb.php");
//getting data from search box
$search=$_POST['search'];
$find=$_POST['find'];
$proc_status=1;
$user=$_SESSION['uname'];
//checking if empty


                $p_id=$_SESSION['p_id'];



            $v_id=$_SESSION['v_id'];//storing visit id in session
//QUERY FOR OT_BILLING_MT
$check=mysql_query("SELECT p_id,v_id FROM ot_billing_mt WHERE p_id='$p_id' OR v_id='$v_id'")or die(mysql_error()."Could not insert Error near line no. 50");
if(mysql_num_rows($check)==0){

    $insert=mysql_query("insert into ot_billing_mt VALUES('NULL','$p_id','$v_id')")or die(mysql_error()."Could not insert Error near line no. 50");
$sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");

//END QUERY

    $fet_b_id=mysql_fetch_row($sel_b_id);
    $_SESSION['ot_id']=$fet_b_id[0];
    $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

    header("location: s_operation-theater.php");
$match=mysql_query("SELECT p_id,v_id FROM ot_billing_mt WHERE p_id='$p_id' OR v_id='$v_id'")or die(mysql_error()."Could not insert Error near line no. 50");
if(mysql_num_rows($match)==1)
    {
        $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");

//END QUERY

        $fet_b_id=mysql_fetch_row($sel_b_id);
        $_SESSION['ot_id']=$fet_b_id[0];
        $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

    header("location: s_operation-theater.php?error_msg1=".urlencode("Patient Found!"));

}

}else{
            $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");
//END QUERY
            //$anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
            //$sel_b_id=mysql_query("select max(ot_id) from ot_billing");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['ot_id']=$fet_b_id[0];
            $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

    header("location: s_operation-theater.php?error_msg1=".urlencode("Patient Found!"));
}
        
    

?>