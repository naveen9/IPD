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

echo ' <center><h3>Update Doctor Info</h3></center>';


//Select all doctor's from doctors master table
$query=mysql_query("SELECT * FROM  `doctor_temp_table` WHERE varified='' ");
while($res=mysql_fetch_row($query))
{
    $name= $res[1];
    $id= $res[0];
    $mob= $res[2];
    $email= $res[3];
    $gen= $res[4];
    $age= $res[5];
    $address= $res[6];
    $veri= $res[8];
    $spc=$res[7];
    $pan=$res[9];
    $gra=$res[10];
    $opd_time=$res[11];
    echo '<form method="post" action="doctors-list.php">';
    echo '<table border="5">';
    echo '<tr>';
    echo '<td><input type="hidden" name="check" value="'.$id.'" /></td>';
    // echo '<td>Verified:</td>';
    if($veri=='yes'){

        //echo '<td bgcolor="green"><input type="text" size="5" name="veri" value="Verified" readonly /></td>';

    }
    else
    {
        //echo '<td bgcolor="red"><input type="text" size="5" name="unveri" value="Unverified" readonly /></td>';

    }
   // echo '<div class="doctors">';
    echo '<td>Name</td>';
    echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name1" value="'.$name.'"  /></td>';
    echo '<td>Phone</td>';
    echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="mob1" value="'.$mob.'"  /></td>';
    echo '<td>Pan No.</td>';
    echo '<td><input type="text"  name="pan1" value="'.$pan.'"  /></td>';

    echo '<td>Gender</td>';
    echo '<td><input type="text" size="5" name="gen1" value="'.$gen.'"  /></td>';

    echo '<td>D.O.B</td>';
    echo '<td><input type="text" size="" name="age1" value="'.$age.'"  /></td>';
    echo '<td>Email</td>';
    echo '<td><input type="text" name="email1" value="'.$email.'"  /></td>';
    echo "</tr>";
    echo '</table>';
    echo '<table>';
    echo "<tr>";
    echo '<td>Graduation:</td>';
    echo '<td><input type="text"  name="gra1" value="'.$gra.'"  /></td>';
    echo '<td>Spacialization:</td>';
    echo '<td><input type="text" name="spc1" value="'.$spc.'"  /></td>';
    echo '<td>Address</td>';
    echo '<td><input type="text" name="address1" value="'.$address.'"  /></td>';
    echo '<td><input type="text" name="opd_time1" value="'.$opd_time.'"  /></td>';
// echo '<td>Name</td>';


    echo '<td><input type="submit" name="update" value="Update"  /></td>';
    echo '<td><input type="submit" name="delete" value="Del"  /></td>';
    echo '<td><input type="submit" name="veri" value="Verify"  /></td>';
   // echo '</div>';
    echo '</tr>';

    echo '</table>';
    echo "<hr/>";
    echo '</form>';

}
//Select from temp table where verify is yes
$query=mysql_query("SELECT * FROM  `doctor_temp_table` WHERE varified='yes' ");
while($res=mysql_fetch_row($query))
{
    $name= $res[1]; //fetch data and ready to insert master table
    $id= $res[0];
    $mob= $res[2];
    $email= $res[3];
    $gen= $res[4];
    $age= $res[5];
    $address= $res[6];
    $veri= $res[8];
    $spc= $res[7];
    $gra= $res[10];
    $pan= $res[9];
    $opd_time=$res[11];
//insert into master table where verify is yes then delete from temp table
    mysql_query("INSERT INTO  `doc_master_table` (`doc_id`, `doc_name`, `doc_mob`, `doc_email`, `doc_gender`, `doc_dob`, `doc_address`, `specialization`, `varified`,`pan`,`deegre`,`opd_time`) VALUES (NULL, '$name', '$mob', '$email', '$gen', '$age', ' $address','$spc','$veri','$pan','$gra','$opd_time');");
//Delete from temp table Where verify is yes
    mysql_query("DELETE FROM `doctor_temp_table` WHERE `doctor_temp_table`.`varified` = 'yes'");

//Alert for notification
    echo '<script type="text/javascript">';
    echo 'alert("New Doctor is successfully added to master table ")';
    echo '</script>';

}





//update doctor info


//$name1=$_POST['name'];

if(isset($_POST['update'])){

    $id=(int)$_POST['check'];
    $name2=(string)$_POST['name1'];
    $email2=(string)$_POST['email1'];
    $gen2=(string)$_POST['gen1'];
    $age2=(string)$_POST['age1'];
    $mob2=(string)$_POST['mob1'];
    $pan2=(string)$_POST['pan1'];
    $gra2=(string)$_POST['gra1'];
    $spc2=(string)$_POST['spc1'];
    $address2=(string)$_POST['address1'];
//echo $name;

    $update=mysql_query("UPDATE doctor_temp_table SET doc_name='$name2',doc_email='$email2',doc_gender='$gen2',doc_dob='$age2',doc_mob='$mob2',doc_address='$address2',specialization='$spc2',deegre='$gra2',pan='$pan2' WHERE doc_id='$id'");
    header('Location: doctors-list.php');

//echo $id;



}

//Verified
if(isset($_POST['veri'])){

    $id=(int)$_POST['check'];
//$unveri=(string)$_POST['unveri'];
    $update=mysql_query("UPDATE  `doctor_temp_table` SET  `varified` =  'yes' WHERE  `doctor_temp_table`.`doc_id` ='$id'");
    header('Location: doctors-list.php');
}

//Delete a Doactor
//$check=$_POST['check'];
if(isset($_POST['delete'])){


    $t=$_POST['check'];

    mysql_query("delete from doctor_temp_table where doc_id='$t'");


    header('Location: doctors-list.php');
//echo '<script type="text/javascript">';
    //                echo 'alert("Doctor info is deleted")';
    //              echo '</script>';

}
?>

<div id="main_center_container">
    <!--<div class="record_feed data_mg silver_green" style="width:1000px;">-->
    	<div style="width:1000px; padding:5px 0px; color:#FFF;" class="miscel_charge">
      <div style="float:left; width:50px;">S.No.</div>
        <div style="float:left; width:150px;"><strong>Doctor Name</strong></div>    
        <div style="float:left; width:130px;"><strong>Qualification</strong></div>
        <div style="float:left; width:130px;"><strong>Speciality</strong></div>
        <div style="float:left; width:130px;"><strong>Phone</strong></div>
        <div style="float:left; width:170px;"><strong>Email ID</strong></div>
        <div style="float:left; width:120px;"><strong>Address</strong></div>
<!--        <div style="float:left; width:120px;"><strong>OPD Timing</strong></div>-->
         <div class="cls"></div>
    </div>
    <div class="cls"></div>

	<div class="cls"></div>
    </div>
 </body>
</html>


<?php

$query=("SELECT * FROM doc_master_table WHERE 1");
$view=mysql_query($query)or die(mysql_error());
$i=1;
while ($row=mysql_fetch_array($view)) {
             //START MAIN DIV
echo '<div style=" background:lightgray; width:1000px; padding:5px 0px; border-bottom:1px solid #FFF;">';
//DOCTOR ID
echo '<div style="float:left; width:50px;">'.$i.'</div>';
//DOCTOR NAME 
echo '<div style="float:left; width:150px;">';
//echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='edit_doc.php?did=$row[0]' onclick='javascript:void window.open('edit_doc.php?did=$row[0] ','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;'>$row[1]</a>";
?>
<a href="edit_doc.php?did=<?php echo $row[0]; ?>" onclick="javascript:void window.open('edit_doc.php?did=<?php echo $row[0]; ?>','1384252115538','width=1000,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $row[1]; ?></a>

<?php
echo "</div>";
//DOCTOR QUALIFICATION
echo '<div style="float:left; width:130px;">';
echo "&nbsp;$row[10]<br/>";
echo "</div>";
//DOCTOR SPECIALIZATION
echo '<div style="float:left; width:130px;">';
echo "$row[7]<br/>";
echo '</div>';
//DOCTOR PHONE NO.
echo '<div style="float:left; width:130px;">';
echo "$row[2]<br/>";
echo '</div>';
//DOCTOR EMAIL
echo '<div style="float:left; width:170px;">';
echo "$row[3]<br/>";
echo "</div>";
//DOCTOR ADDRESS
echo '<div style="float:left; width:120px;">';
echo "$row[6]<br/>";
echo '</div>';
//DOCTOR OPD TIME
//echo '<div style="float:left; width:120px;">'.$row[11].'</div>';
echo'<div class="cls"></div>';
//END MAIN DIV
              echo '</div>';  
 
              $i++;
              
}

?>