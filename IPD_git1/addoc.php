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
$sql=  mysql_query("select data_mx from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['data_mx'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}


include("header.php"); 
include("menubar.php");



if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo $message;
}
?>
    <center><h3>Add new Doctor</h3></center>
    <form action="addoc.php" method="post">
        <table>
            <tr>
                <td>Name *</td>
            <td><input type="text" name="name" /></td>

            <td>Phone *</td>
            <td><input type="text" name="phone" /></td></tr>

            <tr><td>PAN $ MCI Reg. No.</td>
            <td><input type="text" name="pan" /></td>

            <td>Email</td>
            <td><input  type="email" name="email" /></td></tr>

            <tr><td>Gender</td>
            <td><select name="gen"><option value="m">Male</option><option value="f">Female</option></select></td>

            <td>D.O.B</td>
            <td><input type="date" name="age" placeholder="mm-dd-yyyy"></td></tr>

            

            <tr><td>Degrees</td>
            <td><input type="text" name="gra" /></td>
            <td>Speciality</td>
            <td><input type="text" name="spc" /></td></tr>

            <tr><td>Address</td>
            <td><input type="text" name="address" /></td>

            <td>OPD Timing</td>
            <td><input type="text" name="opd_time" placeholder="Time to Time"></td></tr>
<!--<select name="opd_time"><?php
              //  for($i=1;$i<=12;$i++){
                //    echo '<option style="background:#ccc; color:white;">'.$i.' AM'.'</option>';
                  //  echo '<option style="background:grey;color:white;">'.$i.' PM'.'</option>';
                    //echo '<option>AM</option>';
               // }

                ?></select>-->

            <td><input type="submit" name="insert" value="Insert" /></td>
        </table>



    </form>   <hr/>
<?php

//get all values from form and insert into doctors temp table
$name1=$_POST['name'];
$email1=$_POST['email'];
$gen1=$_POST['gen'];
$date=$_POST['age'];
$phone1=$_POST['phone'];
$address1=$_POST['address'];
$pan1=$_POST['pan'];
$gra1=$_POST['gra'];
$spc1=$_POST['spc'];
$check=$_POST['check'];
$opd_time=$_POST['opd_time'];
if(isset($_POST['insert'])){
    if($name1=="" ||  $phone1==""  ){

        //Alert if empty value insert
        echo '<script type="text/javascript">';
        echo 'alert("Fill mandatory fields ")';
        echo '</script>';


    }else{
        $insert=("INSERT INTO  `doctor_temp_table` (`doc_id`, `doc_name`, `doc_mob`, `doc_email`, `doc_gender`, `doc_dob`, `doc_address`,`specialization`,`pan`,`deegre`,`opd_time`) VALUES (NULL, '$name1', '$phone1', '$email1', '$gen1', '$date', ' $address1','$spc1','$pan1','$gra1','$opd_time');");
        mysql_query($insert);



        header('Location: addoc.php');
        //echo '<script type="text/javascript">';
        //               echo 'alert("New Doctor is ready for job")';
        //             echo '</script>';
    }

}





?>
