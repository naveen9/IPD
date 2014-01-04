<?php
ob_start();
error_reporting(0);
session_start();
    
    include("header.php");
    include 'varfilter.php';
    include("menubar.php");
    include("condb.php");
   $p_id=$_SESSION['p_id'];
    $v_id=$_SESSION['v_id'];
    
    
    
    if($_REQUEST['error_msg'])
{
$message=$_REQUEST['error_msg'];
echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';

}
if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}

?>
<div id="main_center_container">
    
	
				<!--<form method="post" action="s_search.php"></form>-->
						
			<form method="post" name="form1" action="s_create_vid.php">
            
 <div class="miscel_charge">        
        <ul class="visit_sum" style="color:#FFFFFF; font-weight:600;">Patient Documents </ul>
        <div class="cls"></div>
    </div>
			<div id="opd_bill" style="height:20px;">
            
   					<div style="float:left;">
		            	<strong>Name &nbsp;: </strong>&nbsp;&nbsp;&nbsp;
		                <span><label for> <?php echo $p_id= $_SESSION['p_name']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		        		<!--<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>-->
						<strong>Age  &nbsp;:</strong>
		                <span><label for> <?php echo $p_id= $_SESSION['p_age']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		              <strong>Gender  &nbsp;:</strong>           
						<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
						<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                
						  <strong>Phone: &nbsp;</strong>
		                  
						  <span><label for> <?php echo $p_id= $_SESSION['p_mob']; ?></label></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		                 <?php $pid= $_SESSION['p_id'];?>

		                <?php //echo  $_SESSION['p_email'];?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>E-mail: &nbsp;</strong>
				</div>         
		</div>
			
          

		
        <div class="cls"></div>

    
  
		<div style="height:20px; width:150px; float:left;margin-left:10px;">
				<span style="margin-left:0px;"><strong>Category:</strong></span>
                <span><strong>Patient ID :</strong></span>
				<span><label for> <?php echo $p_id= $_SESSION['p_id']; ?></label></span>
		</div>
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;"><strong>Bed No:</strong></span>
            <span>
			<?php echo $_SESSION['bed_no']; ?>
            </span>    
		</div>	
		<div style="width:198px; float:left;  margin-left:180px;">
            <span style="margin-left:0px;"><strong>IP Id:</strong></span>
            <span>
			<?php echo $_SESSION['v_id']; ?>
            </span>    
            <span style="margin-left:0px;"><strong>Mode:</strong></span>
            <span style="margin-left:0px;"><strong>Panel:</strong></span>
		</div>	
		<div class="cls"></div>
      </div>
    </form>
    <div>
<div class="miscel_charge">
      <ul class="visit_sum">
                            <li><a href="s_search1.php">Visit</a></li>
            <li><a href="s_search11.php">Procedure</a></li>
            <li><a href="s_search2.php">Diagnosis</a></li>
            <li><a href="s_search.php">Miscellaneous Charges</a></li>
            <li><a href="s_madison_search1.php">Medicine</a></li>
                   <li><a href="s_madison_search.php">Consumamble</a></li>
                   <li><a href="s_search_operation_theater.php">Operation theator</a></li>
                   <li><a href="s_search_ip-management.php">Room Management</a></li>
                   <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>
                   <li><a href="s_opd-visit-summary.php">Payment summary</a></li>
                   
                </ul>
    <div class="cls" style="height:2px;"></div> 
</div>
</div>   

     <div class="cls"></div>
     <div class="cls"></div>         
            	<div style=" background:#AEB4C2; color:#000;  padding:10px 0px; font-weight:700;">		
            	    <div style="float:left; width:185px; padding-left:10px;">Document Name</div>
                    <div style="float:left; width:185px; padding-left:10px;">Category</div>
                    <div style="float:left; width:185px; padding-left:10px;">Date</div>
                    <div style="float:left; width:185px; padding-left:10px;">Upload</div>
                    <div class="cls"></div>
                  </div>
              		<div style="padding:10px 0px;">
						<form method="post" enctype="multipart/form-data">
						<div style="float:left; width:195px;"><input type="text"  name="name"/></div>
                    	
                    	<div class="l_ft"  style="width:195px;">
                        <select name="email"  style="width:135px; padding:5px 0px">
                          <option value="category" selected> category</option>
                          
                          <option>Discharge Summary</option>
                          <option>Photography</option>
                          <option>ID proof</option>
                          <option>Insurance Card</option>
                          <option>TPA card</option>
                          <option>Medical Certificate</option>
                          <option>fitness Certificate</option>
                          <option>Birth Certificate</option>
                          <option>Death Certificate</option>
                          <option>Insurance Form</option>
                          <option>Admission Form</option>
                          <option>Final Bill</option>
                          <option>Other</option>
                          

                       </select>
                    </div>
           
	                    
	                    <div style="float:left; width:195px;"><input type="date" name="date"/></div>
	                    <div style="float:left; width:195px;">
	                    <input type="file"  id="myfile" name="myfile" style="width:135px;"/>
	                    <input type="submit" name="upload" value="upload" class="btn btn-success">
	                    </div>
                    </form>
                 </div>
		<div style="clear:both; margin:10px 0px"></div>







<?php
//////////////////////////////UPLOADER/////////////////////////////////


if (isset($_POST['upload']))
{
$myfile=$_POST['myfile'];
$imgname=unhack($_POST['name']);
	$email=unhack($_POST['email']);
	$imgdate=unhack($_POST['date']);
	$phone=unhack($_POST['phone']);
	//echo $phone;
	//echo $email;

	//$get_prev_id=mysql_query("select MAX(my_id) from mydocs")or die (mysql_error(). " Prev id not fetched");
	
	//Properties of the uploaded file
	$name=$_FILES['myfile']['name'];
		$nam=isimg($name);

	$type=$_FILES['myfile']['type'];
	$siz=$_FILES['myfile']['size'];
		$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'];
	$error=$_FILES['myfile']['error'];
	//Validate must upload file and not empty receipt no and patient name
	if($error > 0 )
	{
		echo "<font color='red'><h3>Please Choose file first</h3></font>";
	}

if ($size==FALSE)
	{
		echo "Your Image is Grater then 5 mb Please upload image less then 5 mb ";
	}
if ($nam==FALSE)
	{
		echo "You can only upload images";
	}

	//Check there is reciept exists OR not
elseif (file_exists("mydocs/clients/"))
{
	////////////////////SuperScriptStart//////////////////////////////////////
	//$increement=$d_id+1;
	//$new_name = "img.$increement";
	//$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/");
$destination="mydocs/clients/";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


mysql_query("insert into mydocs VALUES('','$p_id','$v_id','$saved','$name','$email','$imgdate','$imgname','')")or die(mysql_error());
//mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae' ")or die(mysql_error()." Line 124");


}

else
	{
	////////////////////SuperScriptStart//////////////////////////////////////
	//$increement=$d_id+1;
	//$new_name = "img.$increement";
	//$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/");
mkdir("mydocs/clients/");
$destination="mydocs/clients/$cusernmae/$increement";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


mysql_query("insert into mydocs VALUES('','$p_id','$v_id','$saved','$name','$email','$imgdate','$imgname','')")or die(mysql_error());

//mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae' ");


///////////////////////EndSuperScript///////////////////////////////////
}

}

/////////////////////////////////END UPLOADER/////////////////////////
?>
<?php
if ($count>$max)
{
	echo "You can not upload document more than 200 documents";
}
?>
<div style=" background:#CCC; color:#000; padding:10px 0px; font-weight:700;">		
            	    <div style="float:left; width:150px; padding-left:10px;">Image</div>
                    <div style="float:left; width:200px; padding-left:10px;">File Name</div>
                    <div style="float:left; width:200px; padding-left:10px;">Category</div>
                    <div style="float:left; width:200px; padding-left:10px;">Date</div>
                    
                   
                    <div class="cls"></div>
    </div>

<?php

$qwerty=mysql_query("select * from mydocs where p_id='$p_id' order by my_id DESC ")or die(mysql_error());
while($cdata=mysql_fetch_array($qwerty))
{
echo'<div class="row" >';
	$docs_id=$cdata['my_id'];
	$img=$cdata['saved'];
	$file_name=$cdata['img_name'];
	$email=$cdata['email'];
	$cusernmae=$cdata['cusernmae'];
	$date=$cdata['imgdate'];
	$client_phone=$cdata['phone'];
	//$link="http://localhost/$img";
?>

<div style="background:#FFF; padding:10px 0px; font-weight:700;">		
            	    <div style="float:left; width:160px; padding-left:10px;">
            	    <?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="50px"/></a>';?>
					</div>
                    <div style="float:left; width:160px; padding-left:10px;">
					<?php echo $cusernmae;?>
					</div>
                    <div style="float:left; width:160px; padding-left:10px;">
                    	<?php echo $email;?>
					</div>
                    <div style="float:left; width:160px; padding-left:10px;"><?php echo $date;?></div>
                    
                    <div style="float:left; width:160px; ">
                    </div>
            <div class="cls"></div>
    </div>
<?php }?>
</div>
</body>
</html>
