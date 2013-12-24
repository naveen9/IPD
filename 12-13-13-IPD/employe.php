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
$sql=  mysql_query("select hosp_admin from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['hosp_admin'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}



?>
<style type="text/css">
input[type="text"]{ height:80px; border:1px solid #CCC; border-radius:5px;}
</style>
<?php
include("header.php"); 
include("menubar.php");

date_default_timezone_set("Asia/Calcutta");
                        $billdate = date("y-m-d");


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
   				<span class="p_adding">Employee Registration</span>
   			</div>
        <div style="float:right; margin-right:10px;">
 
  		 </div>
    <div class="cls"></div>
    </div>
   <div id="main_center_container">
    <div class="record_feed">
	
<form method="post" autocomplete="off">

		
    	<div id="search_exist">
        	<div id="search_txt" class="p_adding">Search Existing Employee</div>
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
		
        <form method="post" action="emp_reg.php" >
        <div id="add_new_patient">
    	   	<div id="add_txt">Add New Employee</div>
               <div>
            	
            	<strong>Name</strong>
                    <input type="text" name="name"/>
	        <strong>&nbsp;&nbsp;&nbsp;&nbsp;Age&nbsp;</strong>
                    <input type="text" name="age" maxlength="3" class="size_box" id="txtChar" style="width:60px;" /> 
                        
                
                             <strong>&nbsp;&nbsp;&nbsp;&nbsp;Sex&nbsp;</strong>
                 		<input type="radio" name="gender" value="M" checked /><strong>M</strong>
				<input type="radio" name="gender" value="F" /><strong>F</strong>
                
				  <strong>&nbsp;&nbsp;&nbsp;&nbsp;Phone&nbsp;</strong>
                                  <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:120px;"  />
                                   <strong>&nbsp;&nbsp;&nbsp;&nbsp;Salary&nbsp;</strong>
                                  <input type="text" name="salary" maxlength="10" class="size_input" id="txtChar" style="width:70px;"/>
                                  <br> <br> <strong>Email&nbsp;</strong>
                   <input type="text" name="p_email" maxlength="50" class="size_input" id="txtChar" style="width:150px;"/>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Designation</strong> &nbsp;&nbsp;<select name="designation">
        <option value="category" selected> selet Designation...........</option>
        <?php
        $query=mysql_query("select * from emp_designation ")or die(mysql_error());
        while($op1=mysql_fetch_array($query))
        {
            echo '<option>'.$op1[1].'</option>';
        }

        ?>
    </select>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Address</strong>
             <input type="text" name="add"  class="size_input" id="txtChar" style="width:185px;" />
             <input type="submit" name="Add_emp" value="Add Employee" class="btn" style="float:right;" />
         </div>
				                  
            <div class="cls"></div>
          </div>
</form>
        
        
        
        
        
        
        
        
        
        
        
        
        
     
        
    
          

		
        <div class="cls"></div>
   </div>        
       <div class="cls"></div>
       <div class="emp_clssifi">
           <div class="nam_e"><strong>Name</strong></div>
           <div class="tiny"><strong>Age</strong></div>
           <div class="tiny"><strong>Sex</strong></div>
           <div class="ph"><strong>Phone</strong></div>
           <div class="tiny"><strong>Salary</strong></div>
           <div class="e_mail"><strong>Email ID</strong></div>
           <div class="d_desig"><strong>Designation</strong></div>
           <div class="adres"><strong>Address</strong></div>
       </div>
       <?php
       $query=mysql_query("select * from employe");
       while ($benValues = mysql_fetch_array($query)) {
         ?>                           
       
       
       
       
<div class="emp_clssifi">
          <div class="nam_e"><?php echo $benValues['emp_name'];?></div>
           <div class="tiny"><?php echo $benValues['age'];?></div>
           <div class="tiny"><?php echo $benValues['gender'];?></div>
           <div class="ph"><?php echo $benValues['emp_mobile'];?></div>
           <div class="tiny"><a href="salary.php?pid=<?php echo $benValues['emp_id']; ?>" onclick="javascript:void window.open('salary.php?pid=<?php echo $benValues['emp_id']; ?>','1384252115538','width=500,height=200,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,');return false;"><?php echo $benValues['salary']; ?></a></div>
           <div class="e_mail"><?php echo $benValues['email_id'];?></div>
           <div class="d_desig"><?php echo $benValues['position'];?></div>
           <div class="adres"><?php echo $benValues['add'];?></div>
        
          
       </div>
       <?php }
       ?>
   <div class="cls" style="border-bottom:1px solid lightgray;"></div>

<div class="cls"></div>
<!--      panel end -->

<div class="fill_data">
<div id="bil_id" style="width:900px; float:left; text-align:right;">	
<span><strong>&nbsp;</strong></span>
<span><label for=""><?php echo $current_date;?></label></span>



</div>
 


</span>
<span>


</span>
 </form>





</body>
</html>


