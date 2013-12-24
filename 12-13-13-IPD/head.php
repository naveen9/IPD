<?php
error_reporting(0);
session_start();

date_default_timezone_set ("Asia/Kolkata");
$current_date=date("d-m-y");
$current_time=date("H:i:s");
$name=$_SESSION['uname'];
$event=$_REQUEST['event'];
if($event=="logout")
{
$_SESSION['uname']="";
header("location:index.php");
}
if($_SESSION['uname']=="")
{
header("location:index.php");
}
?>
<body>
<div id="header">
    	<div id="logo_side">
        	<?php 
				$data=mysql_query("select * from hospitals_info");
				$info=mysql_fetch_array($data);
                                echo '<img src="'.$info['logo_path'].'" height="100"/>';
                                
                                ?>
        </div>
        	<div class="welcome">
            	<span>Welcome : </span>
            <span><strong><?php echo $name;?></strong></span>
            <span id="sign">
            	<a href="#">Change Password </a>
                <a href="#">&frasl;</a>
                <a href="head.php?event=logout">Log Out</a>
             </span> 
            </div>
        <div id="sign_in_up">
        	  
             <div id="power_by"><img src="logo2.png" align="right"/></div>
        </div>
        <div class="cls"></div>
    </div>
	<div class="cls"></div>