<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Webhis Login</title>
<link rel="stylesheet" type="text/css" href="style_by.css" />
<link rel="stylesheet" type="text/css" href="login-code.css" />
<script src="hide_show.js" type="text/javascript"></script>

	
</head>

<body>
<div id="container" style="background:#F5F5F5;">
	<div id="header">
    	<div id="logo_side">
        	<img src="final.png" />
        </div>
		<div align="center">
		
                    
                    
                    <?php
		require 'condb.php';
		error_reporting(0);
		
		if($error_msg)
		{
		echo $error_msg;
		}
		?>
		</div>
    	
  </div>
<div class="cls"></div>
<form method="post" action="login.php">   
 <div id="menuu" style="background:#49afc7; height:36px; margin-bottom:30px;">
 	<div style=" margin:0px 0px 0px 350px">
		<label for id="">User Name</label>
        <input type="text" name="uname" placeholder="enter the user name"/>
        <label for id="">Password</label>
        <input type="password" name="pwd" placeholder="enter the user name"/>
 <span style=" "><input type="submit" name="login" value="LOGIN" class="btn"></span>
     </div>

  </div> 
</form>  
       <div class="cls"></div>
<?php 
				$data=mysql_query("select * from hospitals_info");
				$info=mysql_fetch_array($data);
				?>
			<div style="float:left; width:37%; margin-right:2%">
				<?php echo '<img src="'.$info['logo_path'].'" height="100"/>'?><br><br>
			
				
				
				<?php echo '<img src="'.$info['img_path'].'" height="150"/>'?>
				<br>
				<br><br>
				
				<b><?php echo $info[0]; ?>
				<br/>
<?php echo $info[1]; ?></b>
<br><h4>Call Us:<h4>Reception:<?php echo $info['reception_no']; ?><br>Ambulance:<?php echo $info['ambulance_no'];?><br>Emergency: <?php echo $info['emergency_no'];?><br>E-Mail: <?php echo $info['hospital_email'];?>
        	</div>
<form method="post" action="signup.php">			
        <div style="float:left; width:50%; padding:1.5%">
            
            
            <h2 style="color: yellowgreen; text-height: 20px;  "><?php echo $error_msg=$_REQUEST['error_msg']; ?></h2>
            
            
				<div style="margin-bottom:20px;"><header><strong>Sign Up</strong></header></div>
                <div>
                <input type="text" name="r_name" placeholder="Your Name" class="btm_marg" style="width:400px;" />

                </div>
                
                <div>
                <input type="text" name="username" placeholder=" Select UserName" style="width:400px;" class="btm_marg" />
                
                </div>
                
                <div>
                <input type="password" name="password" placeholder="Select Password" style="width:400px;" class="btm_marg" />
                
                </div>
                
                <div>
                <input type="text" name="r_mob" placeholder="Enter Mobile Number" style="width:400px;" maxlength="10" class="btm_marg"/>
                
                </div>


                <div></div>
                <div style="width:100%; margin-top:20px;">
                	<label for id="" style="color:#000; margin-right:30px;">Gender</label>
                    <input type="radio" name="sex" value="M" />&nbsp;&nbsp;&nbsp;&nbsp; Male&nbsp;&nbsp;&nbsp;&nbsp;
                    

                    <input type="radio"  name="sex" value="F" />&nbsp;&nbsp;&nbsp;&nbsp;Female&nbsp;&nbsp;&nbsp;&nbsp;

                </div>
                
                <div style="margin-top:20px;"><input type="submit" name="signup" value="Sign Up" class="btn"></div>
        </div>
</form>		
        <div class="cls"></div>


</div>
</body>
</html>
