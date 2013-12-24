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
	
        <form method="post" action="search_query.php" autocomplete="off">
		
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
    	<span>Query</span>
  </div>
    <div class="query_type">
   	  <input type="file" id="query" name="query" class="btn" style="width:100%">
  </div>
    <div class="query_type">
   	<div style="float:left; width:50%; margin-top:10px;">Remarks</div>
        <div style="float:left; width:50%"><input type="text" name="rem" style="width:100%;  margin-top:5px;"></div>
        <div class="cls"></div>
  </div>
    <div class="query_type">
    	<input type="submit" name="sub" value="Send Query" class="btn">
  </div>
   <div class="cls"></div>
</form>
</div>
  <div class="cls"></div>
      <div style=" width:100%;">
      	<div class="doc_payment">
          		<div><strong>Name</strong></div>
                <div><strong>Query ID</strong></div>
<!--                <div><strong>TPA</strong></div>-->
                <div><strong>Query Image</strong></div>
                <div><strong>Remarks</strong></div>
              
                <div><strong>&nbsp;&nbsp;</strong></div>
                <div><strong>&nbsp;&nbsp;</strong></div>
   </div>
    <div class="cls"></div> 
    <?php
    $sql=  mysql_query("select * from query");
    while ($query=  mysql_fetch_array($sql)) {
    

    ?>
    <div class="doc_payment">
          		<div><strong><?php echo $query['name']; ?></strong></div>
                <div><strong><?php echo $query[0]; ?></strong></div>
<!--                <div><strong>mahindratech</strong></div>-->
                <div><strong><a href="<?php echo $query['query']; ?>">Query</a></strong></div>
                <div><strong><?php echo $query['remarks']; ?></strong></div>
           
                <div><strong><a href="reply.php?cid=<?php echo $query[0]; ?>" onclick="javascript:void window.open('reply.php?cid=<?php echo $query[0]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" > Reply</a></strong></div>
        <div><strong><a href="view_reply.php?cid=<?php echo $query[0]; ?>" onclick="javascript:void window.open('view_reply.php?cid=<?php echo $query[0]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">  View Reply</a></strong></div>
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
     $rem=$_POST['rem'];
    $c_id=$_SESSION['p_id'];
           $name=$_FILES['query']['name'];
           $type=$_FILES['query']['type'];
           $tmp_name=$_FILES['query']['tmp_name'];
           $iname=$_SESSION['p_name'];
           if(!empty($name))
           {
           $destination ="query";
           $p_id=$_SESSION['p_id'];
           move_uploaded_file($tmp_name,"$destination/".$name);
           $query="$destination/".$name;
           mysql_query("insert into query values('NULL','$iname','$p_id','$query','$rem')")or die(mysql_error());
           echo 'Your Query has been uploaded';
           
           }
           else
           {
               echo 'Upload a query first';
           }
           
          
       }
        

?>