<?php
session_start();
error_reporting(0);
include("header.php");
include("menubar.php");

 ?>

  <div id="opd_bill">
            <div class="b_register">
               <div class="l_ft"  style="width:200px; text-align:left; padding-left:5px;"><a href="main_store.php">Inventory List</a></div>
                <div class="l_ft"  style="width:240px;"><a href="invent_add-medicine.php">Add Inventory</a></div>
                <div class="cls"></div>
            </div>
        <div style="float:right; margin-right:10px;">

         </div>
    <div class="cls"></div>
    </div>

     <!-- center part start -->
  <div style="width:100%; margin:0 auto;">
      <?php echo "<br/>"; echo $_SESSION['msg'];  ?>
  		<div style="width:100%; height:20px; padding:5px 0px; background:#CCC;">

			<span style="float:left; width:200px; margin:0px 5px;"><strong> Add Inventory</strong></span>
        	<form action="I_add-medicine-process.php" method="post">


      </div>
      <div style="width:100%; background:#91C8FF; height:20px; padding:5px 0px;">

        	<div style="float:left; width:200px; margin:0px 5px;"><strong>Inventory Name</strong></div>
            <div style="float:left; width:150px;"><strong>Type</strong></div>
           	<div style="float:left; width:120px;"><strong>Total Bill</strong></div>
          <div style="float:left; width:120px;"><strong>Quantity</strong></div>
          <div style="float:left; width:145px;"><strong>Bill Date</strong></div>
            <div style="float:left; width:145px;"><strong>Expiry Date</strong></div>
            <div class="cls" style="margin-bottom:15px;"></div>
            	
            <div style="float:left; width:200px;  margin:0px 0px 0px 5px;"><input type="text" name="m_name" value="" /></div>
					<div class="l_ft"  style="width:150px;">
                        <select name="type"  style="width:140px; padding:5px 0px">
                          <option value="category" selected> fixed </option>
                          
                          <option>Fixed</option>
                          <option>Consumable</option>
                       </select>
                    </div>
			<div style="float:left; width:120px; margin-right:5px;"><input type="text" name="mrp" value="" style="width:90px;" /></div>
				<div style="float:left; width:120px;">
                    <input type="text" name="quantity" value="" style="width:90px;" />
                  </div>
                  <div style="float:left; width:145px;">
                        <input type="text" name="expiry_date" placeholder="mm-yyyy" style="width:115px;"  />
                  </div>
                  <div style="float:left; width:145px;">
                        <input type="text" name="expiry_date" placeholder="mm-yyyy" style="width:115px;"  />
                  </div>
                  <div style="float:left; width:80px;  margin-left:10px;"><input type="submit" value="Add" name="add" class="btn" /></div>
			 </form>
		</div>
	  </div>
   <?php
 	include("footer.php");
    unset($_SESSION['msg']);
  ?>