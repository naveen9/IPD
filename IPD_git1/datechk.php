<?php
/**
 * Created by JetBrains PhpStorm.
 * User: I B M
 * Date: 9/2/13
 * Time: 1:41 PM
 * To change this template use File | Settings | File Templates.
 */
date_default_timezone_get('asia/kolkata');
$date=date('Y-m-d');
//echo $date;
//$m="10";
//echo '<br/>';
//$expDate="2013-$m-02";
//echo $expDate;

//$dateA = '2013-11-02';
// your second date coming from a mysql database (date fields)
$dateB = '2013-12-12';
if(strtotime($date) > strtotime($dateB)){
    echo "run";
}