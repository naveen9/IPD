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
$sql=  mysql_query("select mis from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['mis'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



?>

<style type="text/css">
	input[type="date"]{ height:20px;}
</style>
<?php
	include("header.php");
    include("menubar.php");


?>
<div id="container">

<div id="opd_bill" style="line-height:20px;  border-bottom:1px solid lightgray;">
<div style="width:12%; float:left">IPD-LIST</div>
    <div style="width:40%; float:left; text-align:right"><input type="radio" name="date" /> &nbsp;&nbsp;<input type="date" /></div>
    <div style="width:24%; float:left; text-align:right">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"  name="date" /> &nbsp;&nbsp;<input type="date" /></div>
    <div style="width:20%; float:left">&nbsp;-&nbsp; <input type="date"  /></div>
    <div style="width:4%;  float:right; text-align:right"><input type="submit" value="Show" class="btn" /></div>
 <div class="cls"></div>
 </div>   
 <div class="cls"></div>
 
<form method="post" action="op-list.php">

	<?php echo '<select placeholder="doctor" name="doctor" style="width:200px; height:30px; margin-right:20px;">';
//********************LIST BY DOCTOR***********************************//
$sel=mysql_query("select doc_incharge from opd_items group by doc_incharge ");
    while($doc=mysql_fetch_array($sel)){

        echo '<option>'.$doc[0].'</option>';
    }



                       echo '</select>';
?>
<input type="submit" name="doc" value="Doctor" class="btn" style="margin:0px 180px 0px -15px" > 
<input type="submit" name="all" value="ALL"  class="btn" style="margin:0px 220px 0px 0px">
 <?php echo '<select name="procedure" style="width:200px; height:30px;">';
    $sel_proc=mysql_query("SELECT proc_name  FROM opd_items group by proc_name")or die(mysql_error());
    while($proc=mysql_fetch_array($sel_proc)){

        echo '<option>'.$proc['proc_name'].'</option>';
    }



    echo '</select>';
    ?>
    <input type="submit" name="proc" value="PROCEDURE" class="btn"  >


</div>
<!--------------------------LIST BY ALL---------------------------------------->
    
<!--------------------------LIST BY PROCEDURE------------------->

    <div style="float:left; width:120px; padding-left:10px;"></strong></div>
    
    <!--  //********************LIST BY DATE***********************************//-->
    <div style="float:left; width:200px; margin-right:20px;">
   
    </div>
    <div style="float:left;"></div>
<div class="cls"></div>






<!-------------------LIST BY DATE--------------------------------------------------->
	<div class="record_feed" style="line-height:40px; padding:10px 0px ;">
    <!--<div style="float:left; width:120px; padding-left:10px;"><strong>Date</strong></div>-->
    <div style="float:left; width:200px; margin-right:20px;">
    	<?php echo //'<select name="sel_date" style="width:200px; height:30px;">';
    //********************LIST BY DATE***********************************//
    $sel_date=mysql_query("SELECT date  FROM opd_items group by date")or die(mysql_error());
    while($date=mysql_fetch_array($sel_date)){

        echo '<option>'.$date['date'].'</option>';
    }



    echo '</select>';
    ?>
    </div>
    <!--<div style="float:left;"><input type="submit" name="date" value="DATE"  class="btn" ></div>-->
<div class="cls"></div>
    
<!-------------------------------------------------------------------------------->
<div class="record_feed" style="line-height:40px; padding:10px 0px ;">
    <!--<input type="date"  placeholder="yyyy-m-d" name="date1" style="margin-left:10px;">
    <span style="margin:0px 40px;"><strong>TO</strong></span>
    <strong></strong> <input type="date" placeholder="yyyy-m-d" name="date2" style="margin-left:0px;">
    <input type="submit" name="seldate"  value="Get Results"  class="btn" >
    </div>
<div class="cls"></div>-->
<div style="background: #070707; color:#FFF; padding:0px; font-weight:700;">
		<div style="float:left; width:160px; margin-left:10px;">Visit ID</div>
		<div style="float:left; width:160px;">Bill ID</div>
		<div style="float:left; width:160px;">Patient Name</div>
		<div style="float:left; width:160px;">Procedure Name</div>
		<div style="float:left; width:160px;">Doctor Name</div>
		<div style="float:left; width:160px;">Charge</div>
		<div class="cls"></div>
	</div>
</form>
<?php
if(isset($_POST['doc']))
            {
                $doctor=$_POST['doctor'];
                //Fetch data from 3 tables (visit_register) (opd_items) (patient_info).
                //And match 3 conditions table one visit id match with table 2 visit id.
                //And table one patient id match with table 3 patient id.
                //And match selected doctor found in table 3.
$qwerty=mysql_query("SELECT V.visit_id, V.p_id, O.visit_id,O.bill_id, O.proc_name, O.doc_incharge, O.total, P.patient_id, P.p_name
FROM visit_register V, opd_items O, patient_info P WHERE V.visit_id=O.visit_id AND V.p_id=P.patient_id AND O.doc_incharge='$doctor' ")or die(mysql_error());

                while($array=mysql_fetch_array($qwerty)){
                $visit_id=$array[0];
                $bill_id=$array[3];
                $proc_name=$array[4];
                $patient_name=$array[8];
                $doc_incharge=$array[5];
                $total=$array[6];

                //
               echo' <div style="background:lightgray; padding:10px; font-weight:700;">';
	
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$visit_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="bill_id" value="'.$bill_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$patient_name.'" size="10" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$proc_name.'" size="15" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$doc_incharge.'" size="10" readonly></div>';
echo'<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$total.'" size="10" readonly></div>';



echo'<div class ="cls"></div>';
echo'</div>';
            }

            }

//*********************************LIST BY ALL***********************************//
if(isset($_POST['all']))
{
    $doctor=$_POST['alll'];
    //Fetch data from 3 tables (visit_register) (opd_items) (patient_info).
    //And match 3 conditions table one visit id match with table 2 visit id.
    //And table one patient id match with table 3 patient id.
    //And match selected doctor found in table 3.
    $qwerty=mysql_query("SELECT V.visit_id, V.p_id, O.visit_id,O.bill_id, O.proc_name, O.doc_incharge, O.total, P.patient_id, P.p_name
FROM visit_register V, opd_items O, patient_info P WHERE V.visit_id=O.visit_id AND V.p_id=P.patient_id")or die(mysql_error());

    while($array=mysql_fetch_array($qwerty)){
        $visit_id=$array[0];
        $bill_id=$array[3];
        $proc_name=$array[4];
        $patient_name=$array[8];
        $doc_incharge=$array[5];
        $total=$array[6];

        //
        echo' <div style="background:lightgray; padding:10px; font-weight:700;">';
	
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$visit_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="bill_id" value="'.$bill_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$patient_name.'" size="10" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$proc_name.'" size="15" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$doc_incharge.'" size="10" readonly></div>';
echo'<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$total.'" size="10" readonly></div>';



echo'<div class ="cls"></div>';
echo'</div>';


    }

}
//***********************LIST BY DATE************************************//
	
		
if(isset($_POST['date']))
{
    $date=$_POST['sel_date'];
    //Fetch data from 3 tables (visit_register) (opd_items) (patient_info).
    //And match 3 conditions table one visit id match with table 2 visit id.
    //And table one patient id match with table 3 patient id.
    //And match selected doctor found in table 3.
    $qwerty=mysql_query("SELECT V.visit_id, V.p_id, O.visit_id,O.bill_id,O.date, O.proc_name, O.doc_incharge, O.total, P.patient_id, P.p_name
FROM visit_register V, opd_items O, patient_info P WHERE V.visit_id=O.visit_id AND V.p_id=P.patient_id AND O.date='$date' ")or die(mysql_error());

    while($array=mysql_fetch_array($qwerty)){
        $visit_id=$array[0];
        $bill_id=$array[3];
        $proc_name=$array[5];
        $patient_name=$array[9];
        $doc_incharge=$array[6];
        $total=$array[7];

        //
        
        echo' <div style="background:lightgray; padding:10px; font-weight:700;">';
	
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$visit_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="bill_id" value="'.$bill_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$patient_name.'" size="10" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$proc_name.'" size="15" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$doc_incharge.'" size="10" readonly></div>';
echo'<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$total.'" size="10" readonly></div>';



echo'<div class ="cls"></div>';
echo'</div>';


    }


}



//***********************LIST BY PROCEDURE************************************//

if(isset($_POST['proc']))
{
    $proc=$_POST['procedure'];
    //Fetch data from 3 tables (visit_register) (opd_items) (patient_info).
    //And match 3 conditions table one visit id match with table 2 visit id.
    //And table one patient id match with table 3 patient id.
    //And match selected doctor found in table 3.
    $qwerty=mysql_query("SELECT V.visit_id, V.p_id, O.visit_id,O.bill_id,O.date, O.proc_name, O.doc_incharge, O.total, P.patient_id, P.p_name
FROM visit_register V, opd_items O, patient_info P WHERE V.visit_id=O.visit_id AND V.p_id=P.patient_id AND O.proc_name='$proc' ")or die(mysql_error());

    while($array=mysql_fetch_array($qwerty)){
        $visit_id=$array[0];
        $bill_id=$array[3];
        $proc_name=$array[5];
        $patient_name=$array[9];
        $doc_incharge=$array[6];
        $total=$array[7];

        //
        echo' <div style="background:lightgray; padding:10px; font-weight:700;">';
	
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$visit_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="bill_id" value="'.$bill_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$patient_name.'" size="10" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$proc_name.'" size="15" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$doc_incharge.'" size="10" readonly></div>';
echo'<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$total.'" size="10" readonly></div>';



echo'<div class ="cls"></div>';
echo'</div>';


    }

}


?>

<?php
if(isset($_POST['seldate']))
{
$date1=$_POST['date1'];
$date2=$_POST['date2'];



    $qwerty=mysql_query("SELECT V.visit_id, V.p_id, O.visit_id,O.bill_id,O.date, O.proc_name, O.doc_incharge, O.total, P.patient_id, P.p_name
FROM visit_register V, opd_items O, patient_info P WHERE V.visit_id=O.visit_id AND V.p_id=P.patient_id AND O.date BETWEEN '$date1' AND '$date2''' ")or die(mysql_error());

    if(mysql_num_rows($qwerty) == 0)
    {
        echo "No Result found";
    }

    else
    {
while($array=mysql_fetch_array($qwerty)){
$visit_id=$array[0];
$bill_id=$array[3];
$proc_name=$array[5];
$patient_name=$array[9];
$doc_incharge=$array[6];
$total=$array[7];


echo' <div style="background:#AEB4C2; padding:10px; font-weight:700;">';
	
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$visit_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="bill_id" value="'.$bill_id.'" size="2" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$patient_name.'" size="10" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$proc_name.'" size="15" readonly></div>';
echo '<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$doc_incharge.'" size="10" readonly></div>';
echo'<div style="float:left; width:160px;">
<input style="width:100px;" type="text" name="visit_id" value="'.$total.'" size="10" readonly></div>';



echo'<div class ="cls"></div>';
echo'</div>';
}
}

}

?>

</div>