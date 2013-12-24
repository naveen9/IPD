<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sameer
 * Date: 8/1/13
 * Time: 3:26 PM
 * Facebook:- www.facebook.com/sam0hack
 * Email:- sam.nyx@live.com
 */
require 'condb.php';
session_start();
$del=$_REQUEST['delete'];
mysql_query("DELETE FROM `patient_medicine` WHERE  m_id='$del'")or die(mysql_error());
header('location: consumable.php');
?>