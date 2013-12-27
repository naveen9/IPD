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

//error_reporting(0);
include("header.php"); 
include("menubar.php");

?>
   
        <div class="cls"></div>
 		<div id="opd_bill" style="height:20px;">
   			<div style="float:left">
   				<span class="p_adding">Claim Registration</span>
   			</div>
        <div style="float:right; margin-right:10px;">

  		 </div>
                    <form method="post">
              <input style=" float: right; font-size: large " type="submit" name="sels" value="Show Claims"> <select name="cl" style=" float: right; font-size: large ;  ">
       <option value="0">Select </option>
   <?php 
   $w1l=  mysql_query("select name from patient_details group by name");
   while ($w=  mysql_fetch_array($w1l)) {
       echo '<option value="'.$w['name'].'">'.$w['name'].'</options>';
   }
   
   
   ?>
   </select>
    </form>
    <div class="cls"></div>
    </div>
<div id="main_center_container">
    <div class="record_feed">
	
<form method="post" action="search_clam.php" autocomplete="off">
		
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
        
        <?php
$pid=$_SESSION['p_id'];
$pname=$_SESSION['p_name'];
$age=$_SESSION['p_age'];
$gen=$_SESSION['p_gender'];
$phone=$_SESSION['p_mob'];

    ?>
<form method="post" enctype="multipart/form-data">
		

        <div id="add_new_patient">
    	   	<div id="add_txt" style="float:left; width:300px;">&nbsp;</div>
            <div id="add_txt"  style="float:right; width:160px;">
            	
            </div>
            <div class="cls"></div>
               <div>
            	
            	<strong>Name</strong>
        		
				<input type="text" style="width:150px;"  name="pname" readonly="" value="<?php echo $pname; ?>">
				
                <strong>Age&nbsp;</strong>
                
				<input type="text" name="age" maxlength="3" style="width:50px;"  class="size_box" id="txtChar" value="<?php echo $age; ?>" /> 
                
                

                
				<input type="radio" name="gender"  value="M" checked <?php if($gen=='M'){echo "checked";} ?>/><strong>M</strong>
				<input type="radio" name="gender" value="F" <?php if($gen=='F'){echo "checked";} ?>/><strong>F</strong>
                
				  <strong>Phone&nbsp;</strong>
                  
				  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $phone; ?>" />
                                  
                                  
                 
                                  

                   <?php //echo  $_SESSION['p_email'];?>
				 

				</div>
				                  
            <div class="cls"></div>
          </div>
          

		
        <div class="cls"></div>
        
        <strong>Patient ID &nbsp;</strong>
                  
				  <input style=" background: #CCC;  " type="text" name="pid" readonly="" value="<?php echo $pid; ?>">

          TPA<select name="tpa">
              
              <option value="0">Select TPA</option>
              <?php
              $mysq=  mysql_query("select tname  from tpa");
              while ($ms=  mysql_fetch_array($mysq)) {
                  
                  echo '<option value="'.$ms['tname'].'">'.$ms['tname'].'</option>';
              }
              
              
              ?>
              
              
              
          </select>
     Corporate <select name="corp">
              
         <option value="0">Select Corporate</option>
              <?php
              $mysq=  mysql_query("select corp_name from corporate");
              while ($ms=  mysql_fetch_array($mysq)) {
                  
                  echo '<option value="'.$ms['corp_name'].'">'.$ms['corp_name'].'</option>';
              }
              
              
              ?>
              
              
          </select>
    </p>

    
    <br>    
  	
   <div class="cls"></div>



<div  class="consult_head">
<div class="l_ft" style="width:200px; padding-left:5px;  margin-top:5px; ">
		
</div>
<div class="l_ft" style=" float:right; margin-right:10px; margin-top:5px;">
	
</div>
    <div class="cls"></div>
</div>    
    
<div class="insurance_block">
	<div class="insurance_type">
    	<span>Insurance Card</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" id="in_img1" name="in_img1">
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="in_img2">
    </div>
    <div class="insurance_type">
    	<span>Office I-Card</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="icard1">
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="icard2">
    </div>
   
     <div class="insurance_type">
    	<span>Others</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" multiple="true" name="o_1[]">
    </div>
    
    <div class="insurance_type">
        &nbsp;
    </div>
   
    <div class="insurance_type">
    	<span>Photo ID</span>
    </div>
    <div class="insurance_type">
    	<input type="file" class="btn" name="photo">
    </div>
    
    <br>
    <div class="insurance_type">
    	<strong><input type="submit" name="upload" value="Upload" class="btn" style="width:120px; height:35px;"></strong>
    </div>
    
    <div class="cls"></div>
</div>
  </form>
<div class="insurance_block">
	<table style="width:100%">
    	<tr>
           <th>Claims ID</th>
            <th>Name</th>
            <th>TPA</th>
            <th>Corporate</th>
            <th>Insurance</th>
            <th>I-Card</th>
            <th>Photo</th>
            <th>Others</th>
        </tr>
        <?php
        if(isset($_POST['sels']))
        {
$cl=$_POST['cl'];
if($cl!='0')
{
  $ssl=mysql_query("select * from patient_details where name='$cl' ")or die(mysql_error());
  while ($pd=mysql_fetch_array($ssl))
  {
 ?>
        <tr>
        <td><?php echo $pd['pid'] ?></td>
            <td><?php echo $pd['name']; ?></td>
            <td><?php  if($pd['tpa']!='0') { echo $pd['tpa']; } ?></td>
            <td><?php  if($pd['corporate']!='0') { echo $pd['corporate']; } ?></td>
            <td><a href="<?php if($pd['in_img1']!='images/') { echo $pd['in_img1']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a>&nbsp;&nbsp;<a href="<?php if($pd['in_img2']!='images/') { echo $pd['in_img2']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="<?php if($pd['id_img1']!='images/') { echo $pd['id_img1']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a>&nbsp;&nbsp;<a href="<?php if($pd['id_img2']!='images/') { echo $pd['id_img2']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="<?php if($pd['photo']!='images/') { echo $pd['photo']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="patient_other_documents.php?pid=<?php echo $pd['pid']; ?>"><img src="plus.png"></a>
<!--            	&nbsp;&nbsp;<a href="#">Edit</a>-->
           </td>
        </tr>
  <?php }
        
 
    
}            
            
        }
        else
        {
        
   //#Default list#//     
  $ssl=mysql_query("select * from patient_details ")or die(mysql_error());
  while ($pd=mysql_fetch_array($ssl))
  {
 ?>
        <tr>
        <td><?php echo $pd['pid'] ?></td>
            <td><?php echo $pd['name']; ?></td>
            <td><?php  if($pd['tpa']!='0') { echo $pd['tpa']; } ?></td>
            <td><?php  if($pd['corporate']!='0') { echo $pd['corporate']; } ?></td>
            <td><a href="<?php if($pd['in_img1']!='images/') { echo $pd['in_img1']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a>&nbsp;&nbsp;<a href="<?php if($pd['in_img2']!='images/') { echo $pd['in_img2']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="<?php if($pd['id_img1']!='images/') { echo $pd['id_img1']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a>&nbsp;&nbsp;<a href="<?php if($pd['id_img2']!='images/') { echo $pd['id_img2']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="<?php if($pd['photo']!='images/') { echo $pd['photo']; } else { echo 'images/no.jpg'; } ?>"><img src="plus.png"></a></td>
            <td><a href="patient_other_documents.php?pid=<?php echo $pd['pid']; ?>"><img src="plus.png"></a>
<!--            	&nbsp;&nbsp;<a href="#">Edit</a>-->
           </td>
        </tr>
  <?php }
        }      
  ?>
        
       </table>
</div>
 

</body>
</html>
<?php 
 //session_start();
 require 'uploader.class.php';
 if (isset($_POST['upload'])) {
 	
 	$pid=$_POST['pid'];
 	$spid=$_SESSION['spid']=$pid;
 	$pname=$_POST['pname'];
 	$tpa=$_POST['tpa'];
                 $corp=$_POST['corp'];
 	
                 
                 
 	if (!empty($pid)){
 	$uploader =new uploader();
 	$uploader->value($pid, $pname, $tpa,$corp);
 	$uploader->img_loader('in_img1', $_FILES['in_img1']['name'],$_FILES['in_img1']['tmp_name'],$_FILES['in_img1']['error'], $spid);
 	 	$uploader->img_loader('in_img2', $_FILES['in_img2']['name'],$_FILES['in_img2']['tmp_name'],$_FILES['in_img2']['error'], $spid);
 	 	$uploader->img_loader('icard1', $_FILES['icard1']['name'],$_FILES['icard1']['tmp_name'],$_FILES['icard1']['error'], $spid);
 	 	 	$uploader->img_loader('icard2', $_FILES['icard2']['name'],$_FILES['icard2']['tmp_name'],$_FILES['icard2']['error'], $spid);
 	 	 	$uploader->img_loader('photo', $_FILES['photo']['name'],$_FILES['photo']['tmp_name'],$_FILES['photo']['error'], $spid);
// 	 	 	 	$uploader->img_loader('o_img1', $_FILES['o_1']['name'],$_FILES['o_1']['tmp_name'],$_FILES['o_1']['error'], $spid);


$oname=$_FILES['o_1']['name'];
    
   if(!empty($oname))
   {
       foreach ($oname as $key => $value) {
           
           
           
               
          $fname=$_FILES['o_1']['name'][$key];

           $tmp_name=$_FILES['o_1']['tmp_name'][$key];
           $error=$_FILES['o_1']['error'][$key];
           $desc="images";
               
           
           
move_uploaded_file($tmp_name, "$desc/".$fname);
$saved="$desc/".$fname;
mysql_query("insert into patient_other_img (`img_id`,`claim_id`,`img`) values('NULL','$pid','$saved')")or die(mysql_error());
           //echo 'Reply has been send';

unset($_SESSION['p_id']);
unset($_SESSION['p_name']);
           
       } 

   }


// 	 	 	 	$uploader->img_loader('o_img2', $_FILES['o_2']['name'],$_FILES['o_2']['tmp_name'],$_FILES['o_2']['error'], $spid);
 	}
 else 
 {
 	echo 'Can t insert null values';
 }
 
 }
 ?>