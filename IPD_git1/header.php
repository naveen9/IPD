<?php 
ob_start();
session_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WebHis Compact IPD</title>

  
  <script src="js/jquery-1.5.js" type="text/javascript"></script>
    <script src="js/ajax-ui.js" type="text/javascript"></script>
  <script src="js/hide_show.js" type="text/javascript"></script>
    <script src="js/jquer-1.9.1-1.js" type="text/javascript"></script>
      <script src="js/jquery.min.js" type="text/javascript"></script>
	  <script src="js/jquery.timeentry.js" type="text/javascript"></script>
        <script src="js/jquery.timepicker.min.js" type="text/javascript"></script>
          <script src="js/jquery.ui.timepicker.js" type="text/javascript"></script>
  <script src="js/jquery-ui-min.js" type="text/javascript"></script> 
    <script src="js/selectValid.js" type="text/javascript"></script> 
      <script src="js/tabcode.js" type="text/javascript"></script>
        <script src="js/tabcode-ui.js" type="text/javascript"></script>
<!--  -->
 
    <script type="text/javascript" src="includes1/jquerySearch.js"></script>
    <link rel="stylesheet" href="includes1/searchStyle.css" type="text/css">
 <script type="text/javascript" src="includes2/jquerySearch.js"></script>
    <link rel="stylesheet" href="includes2/searchStyle.css" type="text/css">
	<script type="text/javascript" src="includesConsumable/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesConsumable/searchStyle.css" type="text/css">
	<script type="text/javascript" src="includesMedicine/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesMedicine/searchStyle.css" type="text/css">
	<script type="text/javascript" src="includesAd/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesAd/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesCo/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesCo/searchStyle.css" type="text/css">
	<link rel="stylesheet" href="patient-css.css" type="text/css">
	<script type="text/javascript" src="includesOt/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesOt/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesIp/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesIp/searchStyle.css" type="text/css">
	<script type="text/javascript" src="includesCop/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesCoP/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesVp/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesVp/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesVpP/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesVpP/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesD/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesD/searchStyle.css" type="text/css">
	
	
	<script type="text/javascript" src="includesDs/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesDs/searchStyle.css" type="text/css">
	
	<script type="text/javascript" src="includesR/jquerySearch.js"></script>
    <link rel="stylesheet" href="includesR/searchStyle.css" type="text/css">
	
	<!--<script type="text/javascript" src="includesDi/jquerySearch.js">
  function goForward()
  {
  window.history.forward(1)
  }</script>-->
    <link rel="stylesheet" href="includesDi/searchStyle.css" type="text/css">
	
    <!--  -->
        
<link rel="stylesheet" type="text/css" href="css/doc.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.timeentry.css" />     
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" /> 
<link rel="stylesheet" type="text/css" href="css/jquey-ui.css" />
<link rel="stylesheet" type="text/css" href="css/login-code.css" />
<link rel="stylesheet" type="text/css" href="css/mainstyle.css" />

<link rel="stylesheet" type="text/css" href="css/style_by.css" />
<link rel="stylesheet" type="text/css" href="css/tabcode.css" />
<link rel="stylesheet" type="text/css" href="css/tab-code.css" />
<link rel="stylesheet" type="text/css" href="css/patient-css.css" />
<!--<script type="text/javascript">

function disableBackButton()
 {
  //location.href("logout.html");

 }
if(window.history.forward(1) != null)
         window.history.forward(1);
</script>-->
</head>

<body>
<div id="container">
	<div id="header" style="background:rgba(243, 232, 245, 0.67); width:1000px;">
    	<div id="logo_side">
        	<?php 
				$data=mysql_query("select * from hospitals_info");
				$info=mysql_fetch_array($data);
                                echo '<img src="'.$info['logo_path'].'" height="100"/>';
                                
                                ?>
        </div>
        	<div class="welcome" style="width:530px;">
            	<span></span>
            <span><strong></strong></span>
            <span id="sign">
                <?php echo $_SESSION['uname']; echo $_SESSION['uid'];  ?> ||
                <a href="changepwd.php">Change Password </a>
                <a href="#">&frasl;</a>
                <a href="log_out.php" onclick="disableBackButton()">Log Out</a>
             </span> 
            </div>
        <div id="sign_in_up">
        	  
             <div id="power_by"><img src="image/logo.png" align="left"/></div>
        </div>
        <div class="cls"></div>
    </div>
<div class="cls"></div>