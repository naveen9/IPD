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
$sql=  mysql_query("select claim from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['claim'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}


?>

<style type="text/css">
	input[type="text"]{border:1px solid #CCC; border-radius:5px; height:25px !important;}
</style>
<?php
include("header.php"); 
include("menubar.php");




?>
        
        <div class="cls"></div>
 		<div id="opd_bill" style="height:20px;">
   			<div style="float:left">
   				<span class="p_adding">Requistion</span>
   			</div>
        <div style="float:right; margin-right:10px;">

  		 </div>
    <div class="cls"></div>
    </div>
   <div id="main_center_container">
    <div class="record_feed">
	
        <form method="post" action="search_requition.php" autocomplete="off">

		
    	<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Patient</div>
            <div class="p_adding">
            	<span>
<input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringCo" onKeyUp="lookupCo(this.value);" onBlur="fillCo();"  /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
						<div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
<div align="left" class="suggestionListAd" id="autoSuggestionsListCo">
</div>
</div>
            </div>
        </div>
		

</form>
		
 <div id="add_new_patient">
    	   	<div id="add_txt" style="float:left; width:300px;">&nbsp;</div>
            <div id="add_txt"  style="float:right; width:160px;">
            	
            </div>
            <div class="cls"></div>
               <div>
            	
            	<strong>Name</strong>
        		
				<input type="text" name="name" style="width:150px;" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" style="width:70px;" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" /> 
                
                

                
				<input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />
                                  
                                  <strong>PID&nbsp;</strong>
                  
				  <input style=" background: #CCC;  " type="text" name="pid" readonly="" style="width:100px;" value="<?php echo $pid= $_SESSION['p_id'];?>">
                 


                   <?php //echo  $_SESSION['p_email'];?>
				 

				</div>
				                  
            <div class="cls"></div>
          </div>
          

		
        <div class="cls"></div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     <div class="cls"></div>
  
  <div class="category">
		<div style="width:150px; float:left;">
				<span><strong>Patient ID :</strong></span>
				<span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
		</div>
		<div style=" float:right;  ">
            
		</div>	
		<div class="cls"></div>
      </div>

	<div class="cls"></div>




    


 <div class="cls"></div>



</div>    
   <form method="post" enctype="multipart/form-data"> 
<div class="insurance_block">
	<div class="insurance_type">
    	<span>Requistion&nbsp;form</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="rform1" id="rform1">
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="rform2" id="rform2">
    </div>
    <div class="insurance_type">
    	<span>Supporting&nbsp;documents</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn"  name="uploaded_file[]" multiple="true" id="uploaded_file" >
    </div>
    <div class="insurance_type">
        &nbsp;
    </div>
    <div class="insurance_type">
        <input type="submit" name="sub" value="Upload" class="btn">
    </div>
	
    <div class="cls"></div>
</div>
       
 </form>
<div class="insurance_block">
	<table style="width:100%">
    	<tr style="width:100%">
        	<th>PID</th>
            <th>Name</th>
            <th>Requition form&nbsp;&nbsp;</th>
            <th>&nbsp;&nbsp;Supporting Documents</th>
            <th>&nbsp;&nbsp;</th>
        </tr>
        <?php
$sql=mysql_query("select * from requisition ");
while ($data=mysql_fetch_array($sql))
{
?>
        <tr style="width:100%">
        	<td><?php echo $data['ip_id'];  ?></td>
            <td><?php echo $data['name'];  ?></td>
            <td><a href="<?php if($data['rf_img1']!='images/') { echo $data['rf_img1']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a>&nbsp;&nbsp;<a href="<?php if($data['rf_img2']!='images/') { echo $data['rf_img2']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="support_docs.php?pid=<?php echo $data[1]; ?>"><img src="plus.png"></a>
            	
           </td>
<!--           <td>&nbsp;&nbsp;<a href="#">Edit</a></td>-->
       </tr>
<?php } ?>
    </table>
     
</div>
 

</body>
</html>
<?php




if (isset($_POST['sub']))
{
	
    
       $fname=$_FILES['uploaded_file']['name'];
	foreach ($_FILES['uploaded_file']['name'] as $value=>$key) {

$type=$_FILES['uploaded_file']['type'];
$fname=$_FILES['uploaded_file']['name'];
if(!empty($fname))
{

    $a_no= $value;
	$name=$_FILES['uploaded_file']['name'][$a_no];
    $type=$_FILES['uploaded_file']['type'][$a_no];
    $tmp_name=$_FILES['uploaded_file']['tmp_name'][$a_no];
    
    $destination="images";
    $csv= "images/".$name;
	
	mysql_query("insert into requisition_supporting_images  values('NULL','$ipid','$csv') ")or die(mysql_error());	

    move_uploaded_file($tmp_name,"$destination/".$name);
}  


}
	
	  $p_name=$_SESSION['p_name'];
	  $ip_id=$_SESSION['p_id'];
		$rf_img1_name=$_FILES['rform1']['name'];
		$rf_img1_name_tmp_name=$_FILES['rform1']['tmp_name'];
		$rf_img2_name=$_FILES['rform2']['name'];
		$rf_img2_name_tmp_name=$_FILES['rform2']['tmp_name'];
		
	if (!empty($p_name))
	{

		    $destination="images";
$img2="$destination/".$rf_img2_name;
$img1="$destination/".$rf_img1_name;

		    move_uploaded_file($rf_img1_name_tmp_name,"$destination/".$rf_img1_name);
		    move_uploaded_file($rf_img2_name_tmp_name,"$destination/".$rf_img2_name);
		    
		if(!empty($_FILES['rform1']) OR !empty($_FILES['rform2']))
           {
        
        
        mysql_query("insert into requisition (`id`,`ip_id`,`name`,`rf_img1`,`rf_img2`)
                           values('NULL','$ip_id','$p_name','$img1','$img2')
		
		");
		
        }
           else
           
           {
           
    
        mysql_query("insert into requisition (`id`,`ip_id`,`name`,`rf_img1`,`rf_img2`)
                           values('NULL','$ip_id','$p_name','','')
		
		");       
           }
           
	foreach ($_FILES['uploaded_file']['name'] as $value=>$key) {

$type=$_FILES['uploaded_file']['type'];
$fname=$_FILES['uploaded_file']['name'];
if(!empty($fname))
{

$a_no= $value;
	$name=$_FILES['uploaded_file']['name'][$a_no];
    $type=$_FILES['uploaded_file']['type'][$a_no];
    $tmp_name=$_FILES['uploaded_file']['tmp_name'][$a_no];
    
    $destination="images";
    $csv= "images/".$name;
	
	mysql_query("insert into requisition_supporting_images  values('NULL','$ip_id','$csv') ")or die(mysql_error());	

    move_uploaded_file($tmp_name,"$destination/".$name);
}  


}

	}
else 
{
	echo "Please fill patient name";
}	
}


?>