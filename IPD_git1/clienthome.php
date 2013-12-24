<?php
ob_start();
error_reporting(0);
session_start();
  include("condb.php");
  
   $uid=$_SESSION['uid'];
   
if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select reception from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['reception'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
  
  
  
    include("header.php");
    include 'varfilter.php';
    include("menubar.php");
   
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
    <div class="record_feed">
        <div id="opd_bill" style="height:20px;">
    <div style="float:left; padding-left:5px">Patient Documents</div>
    <div style="float:right; margin-top:-6px;">
        <form method="post" action="search_clin.php" autocomplete="off">
          <span><input type="text" name="search1" placeholder="Bed No" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" style="width:60px;"/></span>
          <span><input type="submit" name="find1" value="Search" class="btn" style="width:100px;"/></span>
        </form>
     </div>
   </div>   
			<form method="post" action="search_clin.php" autocomplete="off">
			<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
            	<span>
					<input type="text" name="search" placeholder="pid/name/ph/email" id="inputStringAd" onKeyUp="lookupAd(this.value);"  /></span>
					<span style="float:right; margin-top:5px;">
					<input type="submit" name="find" value="Search" class="btn"/></span>
<div align="left" class="suggestionsBoxAd" id="suggestionsAd" style="display:none;" >
				<div align="left" class="suggestionListAd" id="autoSuggestionsListAd">
</div>
</div>
            </div>


        </div>
		

</form>
		
<form method="post" name="form1" action="search_clin.php">
     
               <div>
            	
            	<strong>Name</strong>
        		
				<input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:60px;" /> 
                
                

                
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />
                   
                   
                 


                   <?php //echo  $_SESSION['p_email'];?>
				 
				<!--  <input type="submit" name="create_visit_id" value="CreateVisitID" class="btn"/>-->
				</div>
				                  
            <div class="cls"></div>

          </div>
	 
</form>
<div class="cls"></div>
            <div style="background:#CCCCCC; padding:10px 0px; font-weight:700;">
                <div style="float:left; width:150px; padding:0px 10px; text-align:right;">Bed No. : <span><label for> <?php echo $_SESSION['bed_no']; ?></label></span></div>
            	<div style="float:left; width:300px; padding:0px 10px; text-align:right;">Patient ID : <span><label for> <?php echo $_SESSION['p_id']; ?></label></span></div>
            	<div style="float:right; width:200px; padding:0px 10px;">IP ID : <span><label for> <?php echo $_SESSION['v_id']; ?></label></span></div>
            	<div class="cls"></div>
            </div>
            
            	<div style="background:lightgreen; padding:10px 0px; font-weight:700;">		
            	    <div style="float:left; width:185px; padding-left:10px;">Document Name</div>
                    <div style="float:left; width:185px; padding-left:10px;">Category</div>
                    <div style="float:left; width:185px; padding-left:10px;">Date</div>
                    <div style="float:left; width:185px; padding-left:10px;">Upload</div>
                    <div class="cls"></div>
              </div>

      	<div style="padding:10px 0px;">
						<form method="post" enctype="multipart/form-data">
						<div style="float:left; width:195px;">
                <input type="text"  name="name"/>
            </div>
                    	
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
                      </div>
                      <div style="float:left; width:195px;">    
    	                    <input type="submit" name="upload" value="upload" class="btn btn-success">
	                    </div>
                    </form>
                    <div class="cls"></div>
                
                







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
	echo "You do not upload document more then 200";
}
?>
<div style="background:lightgreen; padding:10px 0px; font-weight:700;">		
            	      <div style="float:left; width:250px; padding-left:10px;">Image</div>
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

<div style="background:#ccc; padding:10px 0px; font-weight:700; margin:5px 0px">		
            	    <div style="float:left; width:250px;">
                	    <?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="100" width="100"/></a>';?>
        					</div>
                    <div style="float:left; width:200px; padding-left:10px;">
					               <?php echo $cusernmae;?>
					         </div>
                   <div style="float:left; width:200px; padding-left:10px;">
                     	<?php echo $email;?>
					         </div>
                    <div style="float:left; width:200px; padding-left:10px;">
                       <?php echo $date;?>
                    </div>
                  <div class="cls"></div>
    </div>
    
  

<?php echo '</div>'; }?>
</div>
</div>
</body>
</html>
