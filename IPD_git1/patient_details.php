<?php
ob_start();
//session_start();
include("header.php"); 
include("menubar.php");
?>

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
    </div>
</div>
 <div class="cls"></div>
<br>
<?php
$pid=$_SESSION['p_id'];
$pname=$_SESSION['p_name'];
    ?>
<form method="post" enctype="multipart/form-data">
    <p>Pid<input type="text" name="pid" value="<?php echo $pid; ?>">
      Name<input type="text" name="pname" value="<?php echo $pname; ?>">
      TPA<input type="text" name="tpa"></p>
      Insurance Card |Image 1<input type="file" id="in_img1" name="in_img1">|Image 2<input type="file" name="in_img2">  <br/>
      I Card | Image 1<input type="file" name="icard1">|Image 2<input type="file" name="icard2">  <br/>
      Photo<input type="file" name="photo"><br/>
      Other | Image 1<input multiple="true" type="file" name="o_1[]"><br/>
      <input type="submit" name="upload" value="Send">
      </form>
 <?php 
 //session_start();
 require 'uploader.class.php';
 if (isset($_POST['upload'])) {
 	
 	$pid=$_POST['pid'];
 	$spid=$_SESSION['spid']=$pid;
 	$pname=$_POST['pname'];
 	$tpa=$_POST['tpa'];
 	
 	if (!empty($pid)){
 	$uploader =new uploader();
 	$uploader->value($pid, $pname, $tpa);
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
 <hr>
 Click a patient id to view patient details
 <?php
  $ssl=mysql_query("select pid from patient_details")or die(mysql_error());
  while ($pd=mysql_fetch_array($ssl))
  {
 ?>
<br/>

<a href="patients.php?pid=<?php echo $pd[0]; ?>" onclick="javascript:void window.open('patients.php?pid=<?php echo $pd[0]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $pd[0]; ?></a>

  <?php } ?>