<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



<link rel="stylesheet" type="text/css" href="tab-code.css" />
<script src="jquer-1.9.1-1.js" type="text/javascript"></script>
<script src="jq.js" type="text/javascript"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<link rel="stylesheet" type="text/css" href="style_by.css"/> 
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>



</head>

<body>

<div id="container">
<?php
include("head.php");
include("menu.php");  
?>


<!DOCTYPE html>

<html>

<head>
  <title>Hello!</title>
</head>

<body>       
<center><h3>Add new Doctor</h3></center>
<form action="addoc.php" method="post">
<table>
  <tr>
    <td>Name *</td></tr>
    <td><input type="text" name="name" /></td>

    <td>Phone *</td>
    <td><input type="text" name="phone" /></td>

<tr><td>Pan number:</td></tr>
    <td><input type="text" name="pan" /></td>

  <td>Gender</td>
    <td><select name="gen"><option value="m">Male</option><option value="f">Female</option></select></td>

    <tr><td>D.O.B</td></tr>
    <td><input type="text" name="age" value="yyyy-mm-dd"></td>

    <td>Email</td>
    <td><input type="text" name="email" /></td>
    
    <tr><td>Graduation</td></tr>
    <td><input type="text" name="gra" /></td>
<td>Spacialization</td>
    <td><input type="text" name="spc" /></td>

 <tr><td>Address</td></tr>
    <td><input type="text" name="address" /></td>
 
  <td><input type="submit" name="insert" value="Insert" /></td>
  </table>



</form>   <hr/>
<center><h3>Update Doctor Info</h3></center>
<?php
error_reporting(0);
include_once 'condb.php';
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
echo '<form method="post" action="addoc.php">';
echo '<table border="0">';
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
// echo '<td>Name</td>';
   
   
    echo '<td><input type="submit" name="update" value="Update"  /></td>';
    echo '<td><input type="submit" name="delete" value="Del"  /></td>';
    echo '<td><input type="submit" name="veri" value="Verify"  /></td>';
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
//insert into master table where verify is yes then delete from temp table
mysql_query("INSERT INTO  `doc_master_table` (`doc_id`, `doc_name`, `doc_mob`, `doc_email`, `doc_gender`, `doc_dob`, `doc_address`, `specialization`, `varified`,`pan`,`deegre`) VALUES (NULL, '$name', '$mob', '$email', '$gen', '$age', ' $address','$spc','$veri','$pan','$gra');");
//Delete from temp table Where verify is yes
mysql_query("DELETE FROM `doctor_temp_table` WHERE `doctor_temp_table`.`varified` = 'yes'");

//Alert for notification
echo '<script type="text/javascript">';
                  echo 'alert("New Doctor is successfully added to master table ")';
                  echo '</script>';

}


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
                  if(isset($_POST['insert'])){
                  if($name1=="" ||  $phone1==""  ){

                  //Alert if empty value insert
                  echo '<script type="text/javascript">';
                  echo 'alert("Fill mandatory fields ")';
                  echo '</script>';


                  }else{
                  $insert=("INSERT INTO  `doctor_temp_table` (`doc_id`, `doc_name`, `doc_mob`, `doc_email`, `doc_gender`, `doc_dob`, `doc_address`,`specialization`,`pan`,`deegre`) VALUES (NULL, '$name1', '$phone1', '$email1', '$gen1', '$date', ' $address1','$spc1','$pan1','$gra1');");
                   mysql_query($insert);



header('Location: addoc.php');
 //echo '<script type="text/javascript">';
   //               echo 'alert("New Doctor is ready for job")';
     //             echo '</script>';
                  }

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
header('Location: addoc.php');

//echo $id;



}

//Verified 
if(isset($_POST['veri'])){
                  
$id=(int)$_POST['check'];
//$unveri=(string)$_POST['unveri'];
$update=mysql_query("UPDATE  `doctor_temp_table` SET  `varified` =  'yes' WHERE  `doctor_temp_table`.`doc_id` ='$id'");
header('Location: http://localhost/office_work/DTA/avantika/admin/addoc.php');
}

//Delete a Doactor
//$check=$_POST['check'];
if(isset($_POST['delete'])){


$t=$_POST['check'];

 mysql_query("delete from doctor_temp_table where doc_id='$t'");


header('Location: addoc.php');
//echo '<script type="text/javascript">';
  //                echo 'alert("Doctor info is deleted")';
    //              echo '</script>';

}



?>




</body>

</html>