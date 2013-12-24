<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="ajax-ui.js"></script>
    <script type="text/javascript" src="jquery-ui-min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquey-ui.css">

  

<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>

<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>

</head>

<body>
  <div class="f_l">
        	<label for="startDate">Date :</label>
			    <input name="startDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
        </div>
        
        <ul style="list-style:url(../anuj/Webhosp/image/doctor-cartoon.png)">
       		<li>ram</li>
            <li>ram</li>
            <li>ram</li>
            
        </ul>
</body>
</html>
