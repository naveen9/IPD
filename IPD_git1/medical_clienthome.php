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
    <div style="float:left; padding-left:5px">medical records</div>
    <div style="float:right; margin-top:-6px;">
        <form method="post" action="search_medi_clin.php" autocomplete="off">
          <span><input type="text" name="search1" placeholder="Bed No" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" style="width:60px;"/></span>
          <span><input type="submit" name="find1" value="Search" class="btn" style="width:100px;"/></span>
        </form>
     </div>
   </div>   
			<form method="post" action="search_medi_clin.php" autocomplete="off">
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
                <input type="text"  name="name1"/>
            </div>
                    	
                    	<div class="l_ft"  style="width:195px;">
                        <select name="cat"  style="width:135px; padding:5px 0px">
                          <option value="category" selected> category</option>
                          
                          <option>Admission request</option><option>Admission sheet</option><option>Clinical Assesment sheet</option><option>Doctors Notes</option><option>Treatment Chart(order and dispense)</option><option>Nursing notes</option><option>OT notes</option><option>PAC form</option><option>Anaesthesia Notes</option><option>ICU notes</option><option>Consent papers</option><option>Charge sheet</option><option>Consumable sheet</option><option>Discharge Summary</option><option>Diagnostic reports</option><option>MLC chart</option><option>Others</option><option>Birth form</option><option>Death form</option><option>Diet chart</option>

                       </select>
                    </div>
           
	                    
	                    <div style="float:left; width:195px;"><input type="date" name="date"/></div>
	                    <div style="float:left; width:195px;">
    	                    <input multiple="true" type="file" name="o_1[]" id="myfile" style="width:135px;"/>
                      </div>
                      <div style="float:left; width:195px;">    
    	                    <input type="submit" name="upload" value="upload" class="btn btn-success">
	                    </div>
                    </form>
                    <div class="cls"></div>
                
                







<?php
//////////////////////////////UPLOADER/////////////////////////////////
require 'uploader.class.php';
$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['v_id'];
if (isset($_POST['upload']))
{
$imgname=unhack($_POST['name1']);
	$cat=unhack($_POST['cat']);
	$imgdate=unhack($_POST['date']);
	$phone=unhack($_POST['phone']);
$oname=$_FILES['o_1']['name'];
    
   if(!empty($oname))
   {
       foreach ($oname as $key => $value) {
           
           
           
               
          $fname=$_FILES['o_1']['name'][$key];

           $tmp_name=$_FILES['o_1']['tmp_name'][$key];
           $error=$_FILES['o_1']['error'][$key];
           $desc="images/medic_image";
               
           
           
move_uploaded_file($tmp_name, "$desc/".$fname);
$saved="$desc/".$fname;
mysql_query("insert into medical_record values('','$p_id','$v_id','$saved','$imgname','$cat','$imgdate')")or die(mysql_error());
           //echo 'Reply has been send';
           
       } 

   }

}

/////////////////////////////////END UPLOADER/////////////////////////
?>



                           <form method="post" >

 
<!--********************LIST BY DOCTOR***********************************-->
<div class="l_ft"  style="width:195px;">
                        <select name="cat"  style="width:135px; padding:5px 0px">
                          <option value="category" selected> category</option>
                          
                          <option>Admission request</option><option>Admission sheet</option><option>Clinical Assesment sheet</option><option>Doctors Notes</option><option>Treatment Chart(order and dispense)</option><option>Nursing notes</option><option>OT notes</option><option>PAC form</option><option>Anaesthesia Notes</option><option>ICU notes</option><option>Consent papers</option><option>Charge sheet</option><option>Consumable sheet</option><option>Discharge Summary</option><option>Diagnostic reports</option><option>MLC chart</option><option>Others</option><option>Birth form</option><option>Death form</option><option>Diet chart</option>

                       </select>
                    </div>
<input type="submit" name="doc" value="category" class="btn" style="margin:0px 180px 0px -15px" > 
<input type="submit" name="all" value="ALL"  class="btn" style="margin:0px 220px 0px 0px">
 
  </form>
                    
                    <div style="background:lightgreen; padding:10px 0px; font-weight:700;">		
            	      <div style="float:left; width:250px; padding-left:10px;">Image</div>
                    <div style="float:left; width:200px; padding-left:10px;">File Name</div>
                    <div style="float:left; width:200px; padding-left:10px;">Category</div>
                    <div style="float:left; width:200px; padding-left:10px;">Date</div>
 <div class="cls"></div>                   
  </div>
 
               <?php
if(isset($_POST['doc']))
            {
                $cat1=$_POST['cat'];

                $res3=mysql_query("select * from medical_record where p_id='$p_id' and category='$cat1' order by med_id DESC ")or die(mysql_error());
                while($row3=mysql_fetch_array($res3)){  

echo'<div class="row" >';
	$docs_id=$row3['my_id'];
	$img=$row3['img'];
	$record_name=$row3['record_name'];
	$category=$row3['category'];

	$date=$row3['date'];

	//$link="http://localhost/$img";
?>

<div style="background:#ccc; padding:10px 0px; font-weight:700; margin:5px 0px">		
            	    <div style="float:left; width:250px;">
                	    <?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="100" width="100"/></a>';?>
        					</div>
                    <div style="float:left; width:200px; padding-left:10px;">
					               <?php echo $record_name;?>
					         </div>
                   <div style="float:left; width:200px; padding-left:10px;">
                     	<?php echo $category;?>
					         </div>
                    <div style="float:left; width:200px; padding-left:10px;">
                       <?php echo $date;?>
                    </div>
                  <div class="cls"></div>
    </div>
    
  

<?php echo '</div>'; }
}?>
                    
                     <?php
if(isset($_POST['all']))
            {
                $cat1=$_POST['cat'];

                $res3=mysql_query("select * from medical_record where p_id='$p_id' order by med_id DESC ")or die(mysql_error());
                while($row3=mysql_fetch_array($res3)){  

echo'<div class="row" >';
	$docs_id=$row3['my_id'];
	$img=$row3['img'];
	$record_name=$row3['record_name'];
	$category=$row3['category'];

	$date=$row3['date'];

	//$link="http://localhost/$img";
?>

<div style="background:#ccc; padding:10px 0px; font-weight:700; margin:5px 0px">		
            	    <div style="float:left; width:250px;">
                	    <?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="100" width="100"/></a>';?>
        					</div>
                    <div style="float:left; width:200px; padding-left:10px;">
					               <?php echo $record_name;?>
					         </div>
                   <div style="float:left; width:200px; padding-left:10px;">
                     	<?php echo $category;?>
					         </div>
                    <div style="float:left; width:200px; padding-left:10px;">
                       <?php echo $date;?>
                    </div>
                  <div class="cls"></div>
    </div>
    
  

<?php echo '</div>'; }
}?>
</div>
</div>
</body>
</html>
