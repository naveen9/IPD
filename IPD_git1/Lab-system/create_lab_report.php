<?php
//session_start();
//include 'login_handler/login_gate.php';
error_reporting(0);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Create Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/main-style.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/login-code.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />

<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-600.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script type="text/javascript" src="js/hide_show.js"></script>






<script>
			$(function() {
				var $elem = $('#content');
				
				$('#nav_up').fadeIn('slow');
				$('#nav_down').fadeIn('slow');  
				
				$(window).bind('scrollstart', function(){
					$('#nav_up,#nav_down').stop().animate({'opacity':'0.2'});
				});
				$(window).bind('scrollstop', function(){
					$('#nav_up,#nav_down').stop().animate({'opacity':'1'});
				});
				
				$('#nav_down').click(
					function (e) {
						$("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
						$(".nav_up").css("bottom",0);
						$(".nav_down").hide();	
					});
				$('#nav_up').click(
					function (e) {
						/*$('html, body').animate({scrollBottom: '0px'}, 800);*/
						$('html, body').animate({scrollTop: $elem.height()}, 800);
						$(".nav_up").hide();
						$(".nav_down").show();
							
					}
				);
            });
			

        </script>
</head>
<body>

 <?php
//error_reporting(0);
session_start();
require '../condb.php';
//$_SESSION['email'];
//$_SESSION['psswd'];

if (isset($_POST['submit']))
{
	//Variables
	$recp=$_POST['recpt'];
	$patient=$_POST['patient'];
	$cat=$_POST['cat'];
	$result=$_POST['result'];
	$dot=$_POST['dot'];
	$dor=$_POST['dor'];
	
	//Properties of the uploaded file
	$name=$_FILES['new_picture']['name'];
	$type=$_FILES['new_picture']['type'];
	$size=$_FILES['new_picture']['size'];
	$tmp_name=$_FILES['new_picture']['tmp_name'];
	$error=$_FILES['new_picture']['error'];
	//Validate must upload file and not empty receipt no and patient name
	if($error > 0 OR $recp=="" OR $patient=="")
	{
		echo "<h1>There is an ERROR</h1>";
	}
	//Check there is reciept exists OR not
elseif (file_exists("upload/".$recp))
{
	echo "Receipt Exists";
}
	
else 
{
	////////////////////SuperScriptStart//////////////////////////////////////
mkdir("reports/".$recp);
$destination="reports/$recp";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
mysql_query("insert into lab VALUES('$recp','$patient','$cat','$result','$saved','$dot','$dor')")or die(mysql_error());
echo '<h1>Report is successfuly Uploaded To The Server</h1>';
///////////////////////EndSuperScript///////////////////////////////////
}
}
?>

<!--Nav bar End -->

 <!-- center part start -->
  <section id="content_container">
  
     <div class="main_content_cont">
     <h1 id="top_txt">Welcome to Lab Report Making facility  
     
     </h1>
         <br><a href="view_reports.php"><h2>Click here to View Report</h2></a> <br>  
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        	<div>Reciept No </div>
            <div><input type="text" name="recpt"></div>
        	<div>Patient Name</div>
            <div><input type="text" name="patient"></div>
        	<div>Category</div>
            <div><input type="text" name="cat"></div>
        	<div>Result </div>
            <div><textarea name="result" class="txt_area" ></textarea></div>
        	<div>Date of test</div> 
            <div><input type="date" name="dot"></div>
        	<div>Date of report</div>
            <div><input type="date" name="dor"></div>
        	<div><input type="file" id="new_picture"  name="new_picture" /></div>
        	<div><input type="submit" value="Save Report" name="submit" /></div>

        </form>
        </div>
        </section>
                <div class="cls"></div>
                
