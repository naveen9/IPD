<?php
//session_start();
//include 'login_handler/login_gate.php';
error_reporting(0);
require '../condb.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>View Report</title>
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
<section id="content_container">
  
     <div class="main_content_cont">
     <h1 id="top_txt">Search Lab report     
      </h1>
         <br><a href="create_lab_report.php"><h2>Go back</h2></a> <br>  
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        	<div>Enter Reciept No </div>
            <div><input type="text" name="recpt"></div>
        	
            
            
<!--            <div>Patient Name</div>
            <div><input type="text" name="patient"></div>
        	<div>Category</div>
            <div><input type="text" name="cat"></div>
        	<div>Result </div>
            <div><textarea name="result" class="txt_area" ></textarea></div>
        	<div>Date of test</div> 
            <div><input type="date" name="dot"></div>
        	<div>Date of report</div>
            <div><input type="date" name="dor"></div>
        	<div><input type="file" id="new_picture"  name="new_picture" /></div>-->
        	<div><input type="submit" value="Search" name="search" /></div>

        </form>
        </div>
        </section>
                <div class="cls"></div>
                
<?php
if(isset($_POST['search']))
{
$recpt=$_POST['recpt'];
if(!empty($recpt))
{
$sql=  mysql_query("select * from lab where recp_id='$recpt'");    
if(mysql_num_rows($sql)==1)
{
     $rr=  mysql_fetch_array($sql);
?>
               
<section id="content_container">
  
     <div class="main_content_cont">
         <div>Patient Name</div>
         <div><input type="text" name="patient" value="<?php echo $rr['p_name']; ?>" readonly></div>
        	<div>Category</div>
                <div><input type="text" name="cat" value="<?php echo $rr['cat']; ?>" readonly></div>
        	<div>Result </div>
                <div><textarea name="result" class="txt_area"   readonly><?php echo $rr['result']; ?></textarea></div>
        <div>Date of test</div>
                <div><input type="text" name="cat" value="<?php echo $rr['date_of_test']; ?>" readonly></div>
        <div>Date of report</div>
                <div><input type="text" name="cat" value="<?php echo $rr['date_of_report']; ?>" readonly></div>
        
                <div>Report</div>
                <div><a href="<?php echo $rr['img']; ?>"><img height="200px" width="200px" src="<?php echo $rr['img']; ?>"</a></div>
                
     </div>
</section>

<?php
}   
if(mysql_num_rows($sql)==0)
 {
 echo '<section id="content_container">';
  
     echo '<div class="main_content_cont">';
    echo 'Not patient found';
 
    echo '</div>';
echo '</section>';    
 }

}

if(empty($recpt))
{
 echo '<section id="content_container">';
  
     echo '<div class="main_content_cont">';
    echo 'Insert a reciept number';
 
    echo '</div>';
echo '</section>';    
    
}
}
