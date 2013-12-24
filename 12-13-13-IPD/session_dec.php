<?php
session_start();
error_reporting(0);
if($_POST['Home'])
{



unset($_SESSION['v_id']);
unset($_SESSION['p_id']);
unset($_SESSION['p_name']);
unset($_SESSION['p_age']);
unset($_SESSION['p_mob']);
unset($_SESSION['p_gender']);
unset($_SESSION['p_email']);
unset($_SESSION['v_id']);
unset($_SESSION['b_id']);
unset($_SESSION['grand_total']);
unset($_SESSION['s_proc_id']);
unset($_SESSION['paymentmode']);
unset($_SESSION['panel']);
unset($_SESSION['corp']);
unset($_SESSION['source']);
header("location:admission-ipd.php");
}
if($_POST['Home'])
{
    unset($_SESSION['v_id']);
    unset($_SESSION['p_id']);
    unset($_SESSION['p_name']);
    unset($_SESSION['p_age']);
    unset($_SESSION['p_mob']);
    unset($_SESSION['p_gender']);
    unset($_SESSION['p_email']);
    unset($_SESSION['v_id']);
    unset($_SESSION['b_id']);
    unset($_SESSION['grand_total']);
    unset($_SESSION['s_proc_id']);
    unset($_SESSION['paymentmode']);
    unset($_SESSION['panel']);
    unset($_SESSION['corp']);
    unset($_SESSION['source']);
    header("location:admission-ipd.php");

}