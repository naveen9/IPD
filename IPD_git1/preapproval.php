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
        
        <div class="cls"></div>
 		<div id="opd_bill" style="height:20px;">
   			<div style="float:left">
   				<span class="p_adding">Query form</span>
   			</div>
        <div style="float:right; margin-right:10px;">

  		 </div>
    <div class="cls"></div>
    </div>
   <div id="main_center_container">
    <div class="record_feed">
	
        <form method="post" action="search_approval.php" autocomplete="off">
		
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
    	   	 <div>
            	    	<strong>Name</strong>
        		
                        <input type="text" readonly="" name="name" value="<?php echo $_SESSION['p_name'];?>"/>
				
                <strong>Age&nbsp;</strong>
                
                <input type="text" readonly="" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:52px;" /> 
                
                

				  <strong>Phone&nbsp;</strong>
                  
                                  <input type="text" readonly="" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;" value="<?php echo $_SESSION['p_mob'];?>" />
                   <strong>Email&nbsp;</strong>
                   <input type="text" name="p_email" readonly="" maxlength="50" class="size_input" id="txtChar" style="width:150px;" value="<?php echo $_SESSION['p_email'];?>" />
                 <?php $pid= $_SESSION['p_id'];?>


                   <?php //echo  $_SESSION['p_email'];?>
                   	<div style="float:right; margin-top:3px">
<!--				 		<input type="submit" name="find" value="Add" class="btn" style="width:69px;;"/>-->
                 	</div>
		  </div>
		     <div class="cls"></div>
        </div>
     <div class="cls"></div>
  
  <div class="category">
		<div style="width:150px; float:left;">
				<span><strong>Patient ID :</strong></span>
				<span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
		</div>
		<div style=" float:right;  ">
            &nbsp;
		</div>	
		<div class="cls"></div>
      </div>

	<div class="cls"></div>
  <div class="cls"></div>
</div>    
    
<div class="query_block">
    <form method="post" enctype="multipart/form-data">
    <div class="query_type">
        <span style="">Pre.approval.Letter </span>
  </div>
    <div class="query_type">
        <input type="file" id="query" name="prea[]" multiple="true" class="btn" style="width:100%">
  </div>
        
       <!-- discharge summary's--->
         <div class="query_type">
    	<span>Discharge.summary's</span>
  </div>
    <div class="query_type">
   	  <input type="file" id="query" name="ds[]" multiple="true" class="btn" style="width:100%">
  </div>
        
       <!-- Final bill--->
         <div class="query_type">
             <span>Final.Bill</span>
  </div>
    <div class="query_type">
   	  <input type="file" id="query" name="fn[]" multiple="true" class="btn" style="width:100%">
  </div>
        
       
       <!--approval letter--->
         <div class="query_type">
    	<span>Approval.Letter</span>
  </div>
    <div class="query_type">
   	  <input type="file" id="query" name="ap[]" multiple="true" class="btn" style="width:100%">
  </div>
        
       
       <!-- Final cheque --->
         <div class="query_type">
    	<span>Final.Cheque</span>
  </div>
    <div class="query_type">
   	  <input type="file" id="query" name="fc[]" multiple="true" class="btn" style="width:100%">
  </div>
        
       
    <div class="query_type">
    	<input type="submit" name="sub" value="Send Query" class="btn">
  </div>
<div class="cls"></div>
       <div class="cls"></div>
</form>
</div>
  <div class="cls"></div>
      <div style=" width:100%;">
      	<div class="doc_payment">
            <div><strong>Claim Id</strong></div>
          		<div><strong>Pre approval letter</strong></div>
                <div><strong>Discharge.summary</strong></div>
               
               <div><strong> &nbsp; &nbsp;Final.bill </strong></div>
                <div><strong>Approval.letter</strong></div>
                <div><strong> &nbsp; &nbsp;Final.cheque</strong></div>
              
   </div>
    <div class="cls"></div> 
    <?php
    $sql=  mysql_query("select * from preapp");
    while ($query=  mysql_fetch_array($sql)) {
    

    ?>
    <div class="doc_payment">
        <div><strong><?php echo $query['id']; ?></strong></div>
        <div><strong><?php $preap=$query['identifier']; if($preap=='preapproval_letter') {   echo '<a href="'.$query['img'].'"><img src="plus.png"></a>';  } ?></strong></div>
                <div><strong></strong></div>
<!--                <div><strong></strong></div>-->
                <div><strong><?php $des=$query['identifier']; if($des=='discharge_summary') {   echo '<a href="'.$query['img'].'"><img src="plus.png"></a>';  } ?></strong></div>
                <div><strong></strong></div>
           
                <div><strong></strong></div>
        <div><strong></strong></div>
    </div>
    
    <?php } ?>
    <!--   <div class="cls"></div>-->
   
   <div class="cls"></div>
</div>
      </body>
      </html>
<?php
 if(isset($_POST['sub']))
       {
            
            $c_id=$_SESSION['p_id'];
            $prea=$_FILES['prea']['name'];
            $ds=$_FILES['ds']['name'];
            $fn=$_FILES['fn']['name'];
            $ap=$_FILES['ap']['name'];
            $fc=$_FILES['fc']['name'];
           $destination="images/preapp";
           
           if(!empty($c_id))
           {
           
           
           if(!empty($prea))
           {
             
           foreach ($prea as $key => $value) {
           
           if(is_uploaded_file($_FILES['prea']['tmp_name'][$key]))
           {
          
               $fname=$_FILES['prea']['name'][$key];

           $tmp_name=$_FILES['prea']['tmp_name'][$key];
           $error=$_FILES['prea']['error'][$key];
           move_uploaded_file($tmp_name, "$destination/".$fname);
$saved="$destination/".$fname;
          
mysql_query("insert into preapp (`id`,`pid`,`img`,`identifier`) values('NULL','$c_id','$saved','preapproval_letter')")or die(mysql_error());
           }
           }
           
           
           }
           
           //////////////////////////////////////////////////////////////////////////////////////DS///////////////////////////////////////////////////
           if(!empty($ds))
           {
             
           foreach ($ds as $key => $value) {
           
           
           
               
          $dname=$_FILES['ds']['name'][$key];

           $dtmp_name=$_FILES['ds']['tmp_name'][$key];
           $derror=$_FILES['ds']['error'][$key];
            if(is_uploaded_file($_FILES['ds']['tmp_name'][$key]))
           {
           move_uploaded_file($dtmp_name, "$destination/".$dname);
$saved="$destination/".$dname;
          // mysql_query("update preapp set img='$saved' , identifier='preapp'  ");
          
mysql_query("insert into preapp (`id`,`pid`,`img`,`identifier`) values('NULL','$c_id','$saved','discharge_summary')")or die(mysql_error());
           }
           }
           
           
           }
           
           
           //////////////////////////////////////////////////////////////////////////////////////FN///////////////////////////////////////////////////
           if(!empty($fn))
           {
             
           foreach ($fn as $key => $value) {
           
           
           
               
          $dname=$_FILES['fn']['name'][$key];

           $dtmp_name=$_FILES['fn']['tmp_name'][$key];
           $derror=$_FILES['fn']['error'][$key];
            if(is_uploaded_file($_FILES['fn']['tmp_name'][$key]))
           {
           move_uploaded_file($dtmp_name, "$destination/".$dname);
$saved="$destination/".$dname;
          // mysql_query("update preapp set img='$saved' , identifier='preapp'  ");
          
mysql_query("insert into preapp (`id`,`pid`,`img`,`identifier`) values('NULL','$c_id','$saved','final_bill')")or die(mysql_error());
           }
           }
           
           
           }
           
           
          
            //////////////////////////////////////////////////////////////////////////////////////AP///////////////////////////////////////////////////
           if(!empty($ap))
           {
             
           foreach ($ap as $key => $value) {
           
           
           
               
          $dname=$_FILES['ap']['name'][$key];
          $apt=$_FILES['ap']['type'][$key];
           $dtmp_name=$_FILES['ap']['tmp_name'][$key];
           $derror=$_FILES['ap']['error'][$key];
           
           if(is_uploaded_file($_FILES['ap']['tmp_name'][$key]))
           {
           move_uploaded_file($dtmp_name, "$destination/".$dname);
$saved="$destination/".$dname;
          // mysql_query("update preapp set img='$saved' , identifier='preapp'  ");
          
mysql_query("insert into preapp (`id`,`pid`,`img`,`identifier`) values('NULL','$c_id','$saved','approval_letter')")or die(mysql_error());
           }
           }
           
           
           }
           
           
            //////////////////////////////////////////////////////////////////////////////////////FC///////////////////////////////////////////////////
           if(!empty($fc))
           {
             
           foreach ($fc as $key => $value) {
           
           
           
               
          $dname=$_FILES['fc']['name'][$key];

           $dtmp_name=$_FILES['fc']['tmp_name'][$key];
           $derror=$_FILES['fc']['error'][$key];
          
           
            if(is_uploaded_file($_FILES['fc']['tmp_name'][$key]))
           {
           
           move_uploaded_file($dtmp_name, "$destination/".$dname);
$saved="$destination/".$dname;
          // mysql_query("update preapp set img='$saved' , identifier='preapp'  ");
          
mysql_query("insert into preapp (`id`,`pid`,`img`,`identifier`) values('NULL','$c_id','$saved','final_cheque')")or die(mysql_error());
           }
           }
           
           
           }
           
           
           
           
           
           
           }
           else
           {
               echo 'Upload a query first';
           }
           
          
       }
        

?>