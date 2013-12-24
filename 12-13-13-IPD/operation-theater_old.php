 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
    session_start();
    if($_REQUEST['error_msg'])
    {
        $message=$_REQUEST['error_msg'];
        echo $message;
    }
	 ?>
<style type="text/css">
			.t{width:30px;}
			.i{width:175px;}
			.tt{width:200px;}
			 .se{display:inline-block; width:250px; border:1px solid lightgray; background:url(ccc.png) repeat;}
			 .se a{text-decoration:none; color:#00172F; padding:0px 12px;  }
			 .dt{width:250px; }
			 .list_name{ width:150px; font-weight:600; font-size:11px}
			  #try{width:246px;}
			 
		</style>
 
    <div id="opd_bill" style="height:20px;">
   			<span style="float:left;">OT Billing</span>
            <span style=" float:right;margin-right:100px;">Patient ID :
            <albel for><?php echo $_SESSION['p_id'];?></label></span>
  </div>
     <div class="record_feed">
    	<div id="search_exist">
        	<div id="search_txt">Search Existing Patient</div>
<form method="post" action="search_operation_theater.php">


            <div>
            	<span><input type="text" name="search" placeholder="PID/Name/Ph/Email" /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
            </div>
</form>
        </div>
        
       <div id="add_new_patient"  style="float:left; width:1060px;">
        	<div id="add_txt" style="margin-left:20px;"></div>
            <form action="#" method="post">
            	<table cellpadding="0" cellspacing="" border="0" width="1040" style="margin-left:20px;">
           	  <tr>
                    	<td width="52" class="t">Name</td>
                      <td class="t"><input type="text" class="i"  value="<?php echo $_SESSION['p_name'];?>" /></td>
                      <td width="108" class="t">&nbsp;&nbsp;Age</td>
                      <td width="134"><input type="text" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" onkeypress="return validateNumbersOnly(event)" />Years&nbsp;&nbsp;&nbsp;</td>
                      <td width="68" class="t">Gender</td>
                      <td width="134"><input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                          <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>&nbsp;&nbsp;&nbsp;</td>
                      <td width="57" class="t">Phone</td>
                      <td width="134"><input type="tel" maxlength="10" class="size_input"  value="<?php echo $_SESSION['p_mob'];?>" id="txtChar" onkeypress="return validateNumbersOnly(event)" /></td>
                      <td width="57" class="t">Email</td>
                      <td width="134"><input type="email"  value="<?php echo $_SESSION['p_email'];?>" class="i"/></td>

                  </tr>
                </table>
          </form>
        </div>
        <div class="cls"></div>
    </div>
  <div class="category">
    		<span id="cate">Category</span>
            <span><input type="radio" name="category" />General</span>
            <span><input type="radio" name="category" />Emergency</span>

            <span style="margin-left:20px;">Visit ID :</span>
      <span><label><?php echo $_SESSION['v_id'];?></label></span>


            
            <span  style="margin-left:135px;">OT Id</span>
            <span><?php echo $_SESSION['ot_id'];?></label>

            </span>  
      </div>
      
       <div id="opd_bill">
   			<span>Procedures</span>
            
  		</div>
        <div>
        	<div  style=" overflow-x:scroll; overflow-y:hidden; scrollbar-base-color:red">
        	<form action="#" method="post" style=" width:100%;">
            	<table border="0" width="100%" style=" margin-left:30px; ">
                	<tr>
                    	<td><div class="list_name">Details</div></td>
                        <td class="dt">
                        	<div class="se">
                            	<a href="#"><strong>1.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                          </td>
                        <td  class="dt">
                        	<div class="se">
                            	<a href="#"><strong>2.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                        <td  class="dt">
                        	<div class="se">
                            	<a href="#"><strong>3.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                        <td  class="dt">
                        	<div  class="se">
                            	<a href="#"><strong>4.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                        <td  class="dt">
                        	<div  class="se">
                            	<a href="#"><strong>5.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                         <td  class="dt">
                        	<div  class="se">
                            	<a href="#"><strong>6.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                         <td  class="dt">
                        	<div class="se">
                            	<a href="#"><strong>7.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                         <td  class="dt">
                        	<div class="se">
                            	<a href="#"><strong>8.</strong></a>
                                <a href="operation-details.html">Edit</a>
                                <a href="#">Delete</a>
                                <a href="#">Paste</a>
                               </div>
                        </td>
                    </tr>
                    
                    <tr class="odd">
                    	<td>
                         <div class="list_name">Procedure name</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try">
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="even">
                    	<td>
                         <div class="list_name">Procedure Fee</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="odd">
                    	<td>
                         <div class="list_name">Adnl Surgeon Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    <tr class="even">
                    	<td>
                         <div class="list_name">OT Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="odd">
                    	<td>
                         <div class="list_name">Anasethetics Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="even">
                    	<td>
                         <div class="list_name">Consumamble Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="odd">
                    	<td>
                         <div class="list_name">Implant Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr class="even">
                    	<td>
                         <div class="list_name">Other Charge</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                    
                    <tr style="background:#6699cc;">
                    	<td>
                         <div class="list_name"><input type="checkbox" />&nbsp;Package</div>
                        </td>
                        <td>	
                        <div>
                            <input  type=text list=browsers id="try"  >
                            <datalist id=browsers>
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                            </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td> 
                        	<div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                        </td>
                        <td>
                        	<div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                        <td>
                        <div>
                            <input type=text list=browsers id="try" >
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                         <td>
                        <div>
                            <input type=text list=browsers  id="try">
                            <datalist id=browsers >
                            <option> Google
                            <option> IE9
							</datalist>
                           </div>
                         </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="cls"></div>
        </div>
    
      <div class="category s">
      		<div style="float:left;"></div>
    		<div style="float:right;">
      		<span><input type="button" value="Clear all" class="btn" /></span>
            <span><input type="button" value="Save" class="btn" /></span>
            </div>
            <div class="cls"></div>
      </div>
  </div>
</body>
</html>
