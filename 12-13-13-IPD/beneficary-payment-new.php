<?php 
 session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select accounting from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['accounting'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <script src="jquery-1.5.js" type="text/javascript"></script>
        <script src="hide_show.js" type="text/javascript"></script>
        <script src="jquer-1.9.1-1.js" type="text/javascript"></script>
        <script src="jq.js" type="text/javascript"></script>
            <!--<script type="text/javascript" src="includeBeneficary/jquery-1.2.1.pack.js"></script>-->
        <script type="text/javascript" src="includeBeneficary/jquerySearch.js"></script>	
        <link rel="stylesheet" type="text/css" href="style_by.css"/>
        <!--<link rel="stylesheet" type="text/css" href="tab-code.css" />-->
        <link rel="stylesheet" href="/resources/demos/style.css" />
        <link rel="stylesheet" type="text/css" href="paging/style_by.css"/>
        <link rel="stylesheet" type="text/css" href="paging/tab-code.css" />
        <link rel="stylesheet" href="paging/paging.css" type="text/css" />
        <link rel="stylesheet" href="includeBeneficary/searchStyle.css" type="text/css">
            <script src="ajax-ui.js"></script>
            <script type="text/javascript" src="jquery-ui-min.js"></script>
            <link rel="stylesheet" type="text/css" media="screen" href="jquey-ui.css">

                <script type="text/javascript">
                    $(function() {
                        $('.date-picker').datepicker({
                            changeMonth: true,
                            changeYear: true,
                            showButtonPanel: true,
                            dateFormat: 'mm yy',
                            onClose: function(dateText, inst) {
                                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                $(this).datepicker('setDate', new Date(year, month, 1));
                                var fdate;
                                var edate;
                                if (month > 2)
                                {
                                    fdate = year;
                                    edate = ++year;
                                }
                                else {
                                    fdate = year - 1;
                                    edate = year;
                                }
                                document.getElementById('f_date').innerHTML = fdate;
                                document.getElementById('e_date').innerHTML = edate;
                            }
                        });

                    });
                    /*style="border:1px solid lightgray"*/
                    $(document).ready(function() {
                        $("#line").css("border-bottom", "1px solid lightgray");
                    });

                </script>

                <style>
                    .ui-datepicker-calendar {
                        display: none;
                    }
                </style>
                <script type="text/javascript">

                </script>
                </head>

                <body>
                    <div id="container">

                        <?php

                        
                        
                        include("header.php");
                        include("menubar.php");

                        ?>
                        <div class="cls"></div>
                        <form method="post" action="">
                            <div id="opd_bill"><span style="margin-left:7px;">Doctor Payment</span></div>
                            <div class="record_feed" style="padding:10px 0px;"> 
                                <div class="f_l">
                                    <span style="margin-left:5px;">Doctor Payment</span>
                                    <span>
                                        <select id="select_size" name="docName">
                                            <?php $docQuery = mysql_query("select * from  doc_master_table");
                                            ?>
                                            <?php while ($docValues = mysql_fetch_array($docQuery)) { ?>
                                                <option value="<?php echo $docValues['doc_name']; ?>"><?php echo $docValues['doc_name']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </span> 
                                </div>	
                                <div class="r_ht" style=" width:720px;">
                                    <div class="f_l" style=" margin-left:450px;">
                                        <label for="startDate">Month:</label>
                                        <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
                                    </div> 

                                    <div class="" style="margin-right:5px;">
                                        <input type="submit" name="update" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
                                </div>
                                <div class="cls"></div>
                            </div>
                        </form>

                        <?php
                        date_default_timezone_set("Asia/Calcutta");
                        $billdate = date("y-m-d");
//echo $billtime=date("H:i:s");

                        if (isset($_POST['update'])) {

                            $months = $_POST['monthDate'];
                            $docName = $_POST['docName'];
                            $startDate = $_POST['startDate'];
                            $EndDate = $_POST['endDate'];

                            if ($_POST['monthDate']) {
                                $months = $_POST['monthDate'];
                                $data = explode(" ", $months);
                                $month = $data[0];
                                $year = $data[1];

                                $_SESSION['month1'] = $month;
                                $_SESSION['year1'] = $year;

                                $query = "SELECT doctor_name,sum(total_payment),tds,sum(due_payment),sum(current_payment) FROM doc_payment where doctor_name='$docName' && YEAR( months_payment ) =  '$year' AND MONTH( months_payment ) =  '$month'";
                                $total_pages = mysql_fetch_array(mysql_query($query));
                                $total_pages = $total_pages['num'];

                                /* Setup vars for query. */
                                $page = $_GET['page'];
                                $limit = 4;
                                if ($page)
                                    $start = ($page - 1) * $limit;
                                else
                                    $start = 0;

                                /* Get data. */
                                $query = "SELECT doctor_name,sum(total_payment),tds,sum(due_payment),sum(current_payment) FROM doc_payment where doctor_name='$docName' && YEAR( months_payment ) =  '$year' AND MONTH( months_payment ) =  '$month'";
                                $benQuery = mysql_query($query);
                                include("paging/paging_new.php");
                            }
                            else {

                                //$query = "SELECT COUNT(*) as num FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`=''";
                                //$total_pages = mysql_fetch_array(mysql_query($query));
                                //$total_pages = $total_pages['num'];

                                /* Setup vars for query. */
                                $page = $_GET['page'];
                                $limit = 4;                                 //how many items to show per page
                                if ($page)
                                    $start = ($page - 1) * $limit;          //first item to display on this page
                                else
                                    $start = 0;                             //if no page var is given, set start to 0

                                    /* Get data. */
                                //$query = "SELECT * FROM beneficairy_payment where doctor_incharge='$docName' && date between '$startDate' and '$EndDate' && `check`='' ";
                                //$benQuery = mysql_query($query);
                                include("paging/paging_new.php");
                            }
                        }
                        ?>
                        <div class="cls"></div>
                        <div style="width:100%">
                            <div class="doc_datafeed">
                                <div><strong>Doctor</strong></div>
                                <div><strong>Earning</strong></div>
                                <div><strong>TDS</strong></div>
                                <div><strong>Paid</strong></div>
                                <div><strong>Payment</strong></div>
                                <div><strong>Details</strong></div>
                                <div><strong>P/T</strong></div>
                            </div>
                            <div class="cls"></div>
                            <form method="post" action="banificaly_form_pay.php"> 
                                <?php
                                $i = 0;
//$j=0;
                                while ($benValues = mysql_fetch_array($benQuery)) {
                                    ?>

                                    <div class="doc_datafeed">
                                        <div><?php echo $benValues[0]; ?></div>
                                        <input type="hidden" name="doc_name" value="<?php echo $benValues[0]; ?>"/>
                                        <div><label for=""><?php echo $benValues[1]; ?></label></div>
                                                        <div style="display:inline; float:left"><input type="text" style="width:28%; margin:0 auto;" name="tds" value="<?php echo $benValues['tds']; ?>"/><!--<input type="text" style="width:28%;  margin:0 auto 0 3px;" name="tds1" value="<?php echo $benValues['total_payment']; ?>"/>--></div>
                                        <div style="display:inline; float:left"><input type="text" style="width:28%; margin:0 auto;" name="pad_payment" value="<?php echo $benValues[4]; ?>"/><input type="text" style="width:28%;  margin:0 auto 0 3px;"name="payment" value="<?php echo $benValues[3]; ?>"/></div>
                                        <div><input type="text" name="current_payment" value="<?php echo $benValues[3]; ?>"/></div>
                                        <div><input type="text" name="details" /></div>

                                        <?php
                                    }
                                    ?>
                                    <div><input type="submit" name="pay" value="pay" class="btn" /></div>
                                </div>
                            </form>
                            <div class="cls"></div>
                        </div>	          
                        <div id="line"></div>
                        <div class="cls"></div>
                        <form method="post" action="">
                        <!--<div id="opd_bill"><span style="margin-left:7px;">Doctor Payment</span></div>-->
                            <div id="opd_bill">
                                <div class="record_feed" style="padding:10px 0px;"> 
                                    <div class="f_l">
                                        <span style="margin-left:5px;">Financial Year &nbsp;</span>
                                        <span>
                                            <span id="f_date"></span>&nbsp;-&nbsp;<span id="e_date"></span>
                                        </span> 
                                    </div>	


                                    <form method="post" action="">
                                        <div class="r_ht" style=" width:720px;">
                                            <div class="f_l" style=" margin-left:450px;">
                                                <label for="startDate">Month:</label>
                                                <input name="monthDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
                                            </div> 

                                            <div class="" style="margin-right:5px;">
                                                <input type="submit" name="update1" value="Show"  class="btn" style="float:left; margin-left:10px" /></div>
                                        </div>
                                    </form>
                                    <div class="cls"></div>
                                </div>
                            </div> 

                            <?php
                            if (isset($_POST['update1'])) {

                                $months = $_POST['monthDate'];
                                $docName = $_POST['docName'];
                                $startDate = $_POST['startDate'];
                                $EndDate = $_POST['endDate'];

                                if ($_POST['monthDate']) {
                                    $months = $_POST['monthDate'];
                                    $data = explode(" ", $months);
                                    $month = $data[0];
                                    $year = $data[1];

                                    $_SESSION['month1'] = $month;
                                    $_SESSION['year1'] = $year;

                                    $query = "SELECT  COUNT(*) as num  FROM doc_payment where current_payment!=0 && YEAR( months_payment ) =  '$year' AND MONTH( months_payment ) =  '$month'";
                                    $total_pages = mysql_fetch_array(mysql_query($query));
                                    $total_pages = $total_pages['num'];

                                    /* Setup vars for query. */
//                                    $page = $_GET['page'];
//                                    $limit = 4;
//                                    if ($page)
//                                        $start = ($page - 1) * $limit;
//                                    else
//                                        $start = 0;

                                    /* Get data. */
                                    $query = "SELECT * FROM doc_payment where current_payment!=0 && YEAR( months_payment ) =  '$year' AND MONTH( months_payment ) =  '$month'";
                                    $benQuery1 = mysql_query($query);
                                    include("paging/paging_new.php");
                                }
                            }
                            ?>



                            <div class="cls"></div>
                            <div style=" width:100%;">
                                <div class="doc_payment">
                                    <div><strong>Doctor Name</strong></div>
                                    <div><strong>Paid Amount</strong></div>
                                    <div><strong>Details</strong></div>
                                    <div><strong>Date</strong></div>
                                    <div><strong>Due</strong></div>
                                    <div><strong>Total Payment</strong></div>
                                    <div><strong>Total TDS</strong></div>
                                </div>
                                <div class="cls"></div> 

                                <?php
                                $i = 0;
//$j=0;
                                $fyear = 0;
                                $eyear = 0;
                                while ($benValues = mysql_fetch_array($benQuery1)) {
                                    $doc_names = $benValues['doctor_name'];


                                    if ($month > 3) {
                                        $fyear = $year;
                                        $eyear = $fyear + 1;
                                    } else {
                                        $fyear = $year - 1;
                                        $eyear = $year;
                                    }
                                    $start_date = $fyear . $month . '00';
                                    $end_date = $eyear . $month . '00';
                                    $query2 = "SELECT sum(current_payment),sum(total_tds) FROM doc_payment where doctor_name='$doc_names' &&  months_payment between '$start_date' and '$end_date'";
                                    $benQuery12 = mysql_query($query2) or die(mysql_error());
                                    ?>
                                    <div class="doc_payment">
                                        <div><?php echo $benValues['doctor_name']; ?></div>
                                        <div><?php echo $benValues['current_payment']; ?></div>
                                        <div><?php echo $benValues['details']; ?></div>
                                        <div><?php echo $benValues['date']; ?></div>
                                        <div><?php echo $benValues['due_payment']; ?></div>
                                        <?php
                                        while ($benValuess = mysql_fetch_array($benQuery12)) {
                                            ?>
                                            <div><?php echo $benValuess[0]; ?></div>
                                            <div><?php echo $benValuess[1]; ?></div>
                                        </div>   
                                        <?php
                                    }
                                }
                                ?>
                                <div class="cls"></div> 


                                <div class="doc_datafeed">
                                    <div><strong>Total</strong>: <label for="">2000</label></div>
                                    <div></div>
                                </div>       
                                <!--<?php echo $pagination; ?>	-->
                            </div>
                    </div>
                </body>
                </html>
