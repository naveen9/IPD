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
if($_POST['find'])
{
    if($user!=='billingadmin')
    {
        if($search=="")
        {
            unset($_SESSION['p_id']);
            unset($_SESSION['p_name']);
            unset($_SESSION['p_age']);
            unset($_SESSION['p_gender']);
            unset($_SESSION['p_email']);
            unset($_SESSION['p_mob']);
            unset($_SESSION['v_id']);
            unset($_SESSION['visit_date']);
            unset($_SESSION['ref_dr']);
            unset($_SESSION['bed_no']);
            header("location: operation-theater.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
           $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,PA.paymode,PA.panel,V.room_type from patient_info P,visit_register V,patient_panel PA where P.p_name='$search' or P.patient_id='$search' and V.bed_no!='Discharge patient' and V.p_id=P.patient_id and V.visit_id=PA.v_id group by P.patient_id")or die(mysql_error());
            $found=mysql_num_rows($q);
            if($found==0)
            {
                unset($_SESSION['p_id']);
                unset($_SESSION['p_name']);
                unset($_SESSION['p_age']);
                unset($_SESSION['p_gender']);
                unset($_SESSION['p_email']);
                unset($_SESSION['p_mob']);
                unset($_SESSION['v_id']);
                unset($_SESSION['visit_date']);
                unset($_SESSION['ref_dr']);
                unset($_SESSION['bed_no']);
                header("location: operation-theater.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
            }
            else
            {
                while($search_result=mysql_fetch_array($q))
                {

                    $_SESSION['p_id']=$search_result[0];
                    $_SESSION['p_name']=$search_result[1];
                    $_SESSION['p_age']=$search_result[2];
                    $_SESSION['p_gender']=$search_result[3];
                    $_SESSION['p_mob']=$search_result[4];
                    $_SESSION['v_id']=$search_result[5];
                    $_SESSION['bed_no']=$search_result[6];
                     $_SESSION['mode']=$search_result[7];
                    $_SESSION['panel']=$search_result[8];
                    $_SESSION['room_type']=$search_result[9];



//$_SESSION['p_email']=$search_result['p_email'];
                }

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

    header("location: operation-theater.php");
$match=mysql_query("SELECT p_id,v_id FROM ot_billing_mt WHERE p_id='$p_id' OR v_id='$v_id'")or die(mysql_error()."Could not insert Error near line no. 50");
if(mysql_num_rows($match)==1)
    {
        $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");

//END QUERY

        $fet_b_id=mysql_fetch_row($sel_b_id);
        $_SESSION['ot_id']=$fet_b_id[0];
        $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

    header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));

}

}else{
            $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");
//END QUERY
            //$anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
            //$sel_b_id=mysql_query("select max(ot_id) from ot_billing");
            $fet_b_id=mysql_fetch_row($sel_b_id);
            $_SESSION['ot_id']=$fet_b_id[0];
            $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

    header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));
}
        }
    }
    }
    else
    {
        if($user=='billingadmin')
        {
            if($search=="")
            {
                header("location: operation-theater.php?error_msg=".urlencode("Please Enter a Searchword!"));
            }
            else
            {
               $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no,PA.paymode,PA.panel,V.room_type from patient_info P,visit_register V,patient_panel PA where P.p_name='$search' or P.patient_id='$search' and V.p_id=P.patient_id and V.visit_id=PA.v_id group by P.patient_id")or die(mysql_error());
                $found=mysql_num_rows($q);
                if($found==0)
                {
                    header("location: operation-theater.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
                }
                else
                {
                    while($search_result=mysql_fetch_array($q))
                    {

                        $_SESSION['p_id']=$search_result[0];
                        $_SESSION['p_name']=$search_result[1];
                        $_SESSION['p_age']=$search_result[2];
                        $_SESSION['p_gender']=$search_result[3];
                        $_SESSION['p_mob']=$search_result[4];
                        $_SESSION['v_id']=$search_result[5];
                        $_SESSION['bed_no']=$search_result[6];
                         $_SESSION['mode']=$search_result[7];
                    $_SESSION['panel']=$search_result[8];
                    $_SESSION['room_type']=$search_result[9];



//$_SESSION['p_email']=$search_result['p_email'];
                    }

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

                        header("location: operation-theater.php");
                        $match=mysql_query("SELECT p_id,v_id FROM ot_billing_mt WHERE p_id='$p_id' OR v_id='$v_id'")or die(mysql_error()."Could not insert Error near line no. 50");
                        if(mysql_num_rows($match)==1)
                        {
                            $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");

//END QUERY

                            $fet_b_id=mysql_fetch_row($sel_b_id);
                            $_SESSION['ot_id']=$fet_b_id[0];
                            $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

                            header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));
                        }

                    }else{
                        $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");
//END QUERY
                        //$anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
                        //$sel_b_id=mysql_query("select max(ot_id) from ot_billing");
                        $fet_b_id=mysql_fetch_row($sel_b_id);
                        $_SESSION['ot_id']=$fet_b_id[0];
                        $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

                        header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));
                    }
                }
            }
        }
    }
}
if($_POST['find1'])
{
    $search1=$_POST['search1'];
        if($search1=="")
        {
            unset($_SESSION['p_id']);
            unset($_SESSION['p_name']);
            unset($_SESSION['p_age']);
            unset($_SESSION['p_gender']);
            unset($_SESSION['p_email']);
            unset($_SESSION['p_mob']);
            unset($_SESSION['v_id']);
            unset($_SESSION['visit_date']);
            unset($_SESSION['ref_dr']);
            unset($_SESSION['bed_no']);
            header("location: operation-theater.php?error_msg=".urlencode("Please Enter a Searchword!"));
        }
        else
        {
            $q=mysql_query("select P.patient_id,P.p_name,P.p_age,P.p_gender,P.p_mob,V.visit_id,V.bed_no from patient_info P,visit_register V where V.bed_no='$search1' and V.bed_no!='Discharge patient' and P.patient_id=V.p_id order by P.patient_id");
            $found=mysql_num_rows($q);
            if($found==0)
            {
                unset($_SESSION['p_id']);
                unset($_SESSION['p_name']);
                unset($_SESSION['p_age']);
                unset($_SESSION['p_gender']);
                unset($_SESSION['p_email']);
                unset($_SESSION['p_mob']);
                unset($_SESSION['v_id']);
                unset($_SESSION['visit_date']);
                unset($_SESSION['ref_dr']);
                unset($_SESSION['bed_no']);
                header("location: operation-theater.php?error_msg=".urlencode("Patient Not Found! Please Add the Patient!"));
            }
            else
            {
                while($search_result=mysql_fetch_array($q))
                {

                    $_SESSION['p_id']=$search_result[0];
                    $_SESSION['p_name']=$search_result[1];
                    $_SESSION['p_age']=$search_result[2];
                    $_SESSION['p_gender']=$search_result[3];
                    $_SESSION['p_mob']=$search_result[4];
                    $_SESSION['v_id']=$search_result[5];
                    $_SESSION['bed_no']=$search_result[6];
                     $_SESSION['mode']=$search_result[7];
                    $_SESSION['panel']=$search_result[8];
                    $_SESSION['room_type']=$search_result[9];



//$_SESSION['p_email']=$search_result['p_email'];
                }

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

                    header("location: operation-theater.php");
                    $match=mysql_query("SELECT p_id,v_id FROM ot_billing_mt WHERE p_id='$p_id' OR v_id='$v_id'")or die(mysql_error()."Could not insert Error near line no. 50");
                    if(mysql_num_rows($match)==1)
                    {
                        $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");

//END QUERY

                        $fet_b_id=mysql_fetch_row($sel_b_id);
                        $_SESSION['ot_id']=$fet_b_id[0];
                        $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

                        header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));
                    }

                }else{
                    $sel_b_id=mysql_query("select ot_bill_id from ot_billing_mt where v_id=$v_id")or die(mysql_error()."Could not insert Error near line no. 50");
//END QUERY
                    //$anuj= mysql_query("insert into ot_billing (ot_id,visit_id) values('','$v_id')");
                    //$sel_b_id=mysql_query("select max(ot_id) from ot_billing");
                    $fet_b_id=mysql_fetch_row($sel_b_id);
                    $_SESSION['ot_id']=$fet_b_id[0];
                    $ot_id=$_SESSION['ot_id'];//storing bill id in session*/

                    header("location: operation-theater.php?error_msg1=".urlencode("Patient Found!"));
                }
            }
        }

}

?>