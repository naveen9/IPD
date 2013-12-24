<?php
	error_reporting(0);
	include("header.php");
    include("menubar.php");

 ?>
   <!-- center part start -->
  <div style="width:990px; margin:0 auto;">
      <?php echo "<br/>"; echo $_SESSION['msg'];  ?>
  		<div style="width:100%; height:20px; padding:10px 0px; background:#CCC; border-radius:6px;">

        	<form action="add-medicine-process.php" method="post">


      </div>
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

        	<div style="float:left; width:180px; margin-right:5px;"><strong>Medicine Name</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Batch No</strong></div>
           	<div style="float:left; width:180px; margin-right:5px;"><strong>MRP(Rs)</strong></div>
            <div style="float:left; width:180px; margin-right:5px;"><strong>Expiry Date</strong></div>
            <div class="cls" style="margin-bottom:15px;"></div>
            <div style="float:left; width:180px; margin-right:5px;"><input type="text" name="m_name" value="" class="jag_txt" /></div>
            <div style="float:left; width:180px; margin-right:5px;"><input type="text" name="batch_no" value=""  class="jag_txt" /></div>
            <div style="float:left; width:180px; margin-right:5px;"><input type="text" name="mrp" value=""  class="jag_txt" /></div>
            <div style="float:left; width:180px; margin-right:5px;"><input type="date" name="expiry_date"  class="jag_txt" /></div>
           	<div style="float:left; width:180px; margin-right:5px;">
            <input type="submit" value="Add" name="add" class="jag_btn"  class=  "jag_btn" /></div>

          </form>
  </div>

  </div>
 
 </body>
 </html>