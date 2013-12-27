 	<?php 
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
	include("menubar.php");
  
  if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}
	 ?>	
	<style type="text/css">
.t {
	width:30px;
}
.i {
	width:200px;
}
.t_d {
	width:200px;
}
</style>





<?php
$p_id=$_SESSION['p_id'];
$v_id=$_SESSION['visit_id'];
$q=mysql_query("select * from patient_info where patient_id='$p_id'")or die(mysql_error());
        
            $search_result=mysql_fetch_array($q);
            
                
                $p_name=$search_result['p_name'];
                $p_age=$search_result['p_age'];
                $p_gender=$search_result['p_gender'];
                $p_email=$search_result['p_email'];
                $p_mob=$search_result['p_mob'];


                $p_address=$search_result['p_address'];
                $p_guardian=$search_result['p_guardian'];
                $p_g_relation=$search_result['p_g_relation'];
                $p_bgroup=$search_result['p_bgroup'];
                $p_height=$search_result['p_height'];

                $p_weight=$search_result['p_weight'];
                $marital_status=$search_result['marital_status'];
              
?>
      <form method="post" action="search_demographics.php" autocomplete="off">
   <div id="opd_bill" style="height:20px;">
    <div style="float:left; padding-left:5px">Patient Demographics</div>
    <div style="float:right; margin-top:-6px;">
          <div class="p_adding">
                <span>
            <input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputStringCo" onKeyUp=				                     "lookupCo(this.value);" onBlur="fillCo();"  /></span>
                            <span><input type="submit" name="find" value="Search" class="btn"/></span>
                        <div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
						<div align="left" class="suggestionListAd" id="autoSuggestionsListCo"></div>
</div>
            </div>
     </div>
   </div>   
      </form>
      <div class="patient_demo">
  			<div class="demo_l">
            	<div class="header">
                	<div style="float:left; padding-left:5px">Patient Form</div>
    <div style="float:right; margin-right:50px;">
          	Patient ID :<label id="patientid"><?php echo $_SESSION['p_id'];?></label>
          
      </div>


      <div class="cls"></div>
                </div>
<form method="post" action="demo.php">
            	<div class="f_l">
                	<div>Full Name :</div>
                </div>
                <div class="f_l">
                	<div><input type="text" name="p_name" value="<?php echo $p_name;?>" /></div>
                </div>
                <div class="f_l">
                	<div>Gender :</div>
                </div>
                <div class="f_l">
                	<div>
                        
                        
                         
                        <input type="radio" name="gender" value="M" checked <?php if($p_gender=='M'){echo "checked";} ?>/><strong>Male</strong>
				<input type="radio" name="gender" value="F" <?php if($p_gender=='F'){echo "checked";} ?>/><strong>Female</strong>
            		</div>
                  </div>  
                    <div class="f_l">
                    	<div>Date of Birth/Age :</div>
                    </div>
                    <div class="f_l">
                    	<div><input type="date" /><input type="text" name="p_age" value="<?php echo $p_age;?>" placeholder="Age...."  /></div>
                    </div>
                <div class="f_l">
                    	<div>Phone No :</div>
                    </div>
                    <div class="f_l">
                    	<div><input type="text"  name="phone" value="<?php echo $p_mob;?>" /></div>
                    </div>
                    <div class="f_l">
                    	<div>Marital Status :</div>
                    </div>
                    <div class="f_l">
                    	<div>
                        <select name="status" value="<?php echo $marital_status;?>"  style="width:190px;">
                        <option value="">
                         <?php if (empty($marital_status)) {
                       echo ' select';
                      }
                      else
                      {

                        echo $marital_status;
                      }
                      ?>





                        </option>
                        	<option>Married</option>
                            <option> Un Married</option>
                            <option>Divorcee</option>
                        </select>
                        </div>
                    </div>
                    <div class="f_l">
                    	<div>Email ID :</div>
                    </div>
                    <div class="f_l">
                    	<div><input type="text" name="p_email" value="<?php echo $p_email;?>" /></div>
                    </div>
                    
                <div class="f_l">
                    	<div>Blood Group :</div>
                    </div>
                    <div class="f_l">
                    	<div><select name="blood" value="<?php echo $p_bgroup;?>" style="width:190px;">
                        <option value="">

                      <?php if (empty($p_bgroup)) {
                       echo ' Choose Blood Group..';
                      }
                      else
                      {

                        echo $p_bgroup;
                      }
                      ?>





                       .</option>
                        	<option >A</option>
                            <option > B</option>
                            <option >O</option>
                            <option >AB</option>
                            <option >A+</option>
                            <option > B+</option>
                            <option >O</option>
                            <option >AB-</option>
                        	</select>
                        </div>
                    </div>

                
                <div class="f_l">
                    	<div>Height :</div>
                    </div>
                    <div class="f_l">
                    	<div><input type="text" style="width:60px;" />&nbsp; cm</div>
                    </div>
                <div class="f_l">
                    	<div>Weight :</div>
                    </div>
                    <div class="f_l">
                    	<div><input type="text" style="width:60px;" />&nbsp; Kg</div>
                    </div>






                   
              </div>
		<div class="demo_r">
        <div class="header">Guardian Form</div>
        <div class="f_l">
               <div>Guardian Name :</div>
        </div>
         <div class="f_l">
              <div><input type="text" name="guar_name" value="<?php echo $p_guardian;?>" /></div>
         </div>
         <div class="f_l">
               <div>Relation :</div>
        </div>
         <div class="f_l">
              <div> 
             	 	<input type="text" name="relation"value="<?php echo $p_g_relation;?>" />
             </div> 
         </div>
         <div class="f_l">
               <div>Address :</div>
        </div>
         <div class="f_l">
              <div><textarea name="add" value="<?php echo $p_address;?>" placeholder="write Address....." style="height:90px; width:190px"></textarea></div>
         </div>
       

    </div>
          <div class="demo_r">
        
        <div class="f_l">
               
            <table>
               <tr>
                   <div></div>
                   <td>Allergies :</td>
                   <td>Diseases</td>
                   <td>Photo</td>
               </tr>
               <tr>
                   
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   
               </tr>
               <tr>
                   
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   
               </tr>
               <tr>
                   
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   
               </tr>
               <tr>
                   
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   <td><input type="text" style=" width:100px;" name="relation"value="<?php echo $p_g_relation;?>" /></td>
                   
               </tr>
            </table>

        </div>
        
               
         </div>
        
          
    
    <div class="cls"></div>
    
     <div class="fill_data">
        <div id="bil_id">
         <span>
          <!--<input type="submit" name="blank" value="Print blank form" class="btn">-->
          <input type="submit" name="save1" value="Print blank form" class="btn">
          </span> <span>
          <!--<input type="submit" name="print" value="Print Admission form" class="btn">-->
          <input type="submit" name="save2" value="Print Admission form" class="btn">
          </span>
         </div>
        <div id="save_clear" style="text-align:right; margin-right:0px;"> 
        <span>
          <input type="submit" name="save" value="save" class="btn" style="text-align:right">
        </span> 
      </div>
      </div>
      </form>
</div>
</body>
</html>
