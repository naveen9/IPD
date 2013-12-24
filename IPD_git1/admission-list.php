 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
    include("condb.php");
	 ?>

  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
    <style type="text">
      .date_txt{}
    </style>

  
    <form method="post">
      <div id="opd_bill" style="height:25px; margin-bottom:2px;">
  		<div style="float:left; text-align:left; margin-top:-5px;">
        	<input type="date" name="indate"> &nbsp; T0 &nbsp;&nbsp;<input type="date" name="outdate">
        	
      <span style="margin-left:80px;"><input type="submit" name="get_result" class="btn" 
                               style="width:120px; height:30px; font-size:12px; width:120px"/></span>
        </div>
        <div style="float:right">+ &nbsp;ADD IPD Visit</div>
     </div>
     </form>
   
  
  
   <div class="miscel_charge">
      <ul class="visit_sum">
        <li><a href="#tabs-3" class="last_li">Admission List</a></li>
        <li  style="float:right"><a href="ipd_visit.php">Admitted Patients</a></li>
        <li   style="float:right"><a href="discharge-list.php">Discharge List</a></li>
        <div class="cls"></div>
  </ul>
</div>  
   <div id="tabs-1">
        <div style="width:100%; border:1px solid lightgray; float:left;">
          
            <div class="bill_clr" style="font-weight:600;   background:#AEB4C2; font-size:11px;">
                
                <div class="l_ft" style="text-align:left; width:150px;">Serial Number</div>
                <div class="l_ft" style="text-align:left; width:150px;">IP ID</div>
                <div class="l_ft" style="text-align:left; width:200px;">Patient Name</div>
                <div class="l_ft" style="width:150px;">DOA</div>
                <div class="l_ft" style="text-align:left; width:150px;">Bed No</div>
                <div class="l_ft" style="text-align:left; width:150px;">Doctor Incharge</div>
                <div class="cls"></div>
            </div>
              <form>  
              <?php
              $k=1;
              if(isset($_POST['get_result']))
              {
                  $date1=$_POST['indate'];
                  $date2=$_POST['outdate'];
                  $res3=mysql_query("SELECT p.p_name,p.patient_id,v.visit_id,v.bed_no,v.visit_date FROM patient_info p,visit_register v WHERE v.p_id=p.patient_id AND v.visit_date BETWEEN '$date1' AND '$date2' ORDER BY v.visit_date DESC ")or die(mysql_error());
                  while($row3=mysql_fetch_array($res3))
                  {
                    if($i%2==0){  ?>
                          <div class="bill_height">
                              <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['p_name']; ?></div>
                              <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
                          </div>
                      <?php } else{?>
                          <div class="bill_clr">
                              <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['p_name']; ?></div>
                              <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                              <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
                          </div>
                      <?php }$i++;
                      $k++;?>
                  <?php }}
                  else
                  {
                      $k=1;
                    // start total patient tab
                  $res=mysql_query("SELECT * FROM patient_info")or die(mysql_error());
                    while($row=mysql_fetch_array($res))
                      {
           //echo $row['p_name'];
                        $patient_id=$row['patient_id'];
                   $res3=mysql_query("select * from visit_register where p_id='$patient_id'")or die(mysql_error());
                   while($row3=mysql_fetch_array($res3))
                   {

                      if($i%2==0){  ?>
                <div class="bill_height">
                  <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row['p_name']; ?></div>
                  <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
                </div>
              <?php } else{?>
              <div class="bill_clr">
                  <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row['p_name']; ?></div>
                  <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                  <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
              </div>
                  <?php }$i++;
                  $k++;?>
                  <?php }}} ?>
              </form>
            </div>
        </div>
            <div class="cls"></div>
   </div>
  
    <div style="width:100%; margin:0 auto;">
        <div style="width:100%; border:1px solid lightgray; float:left;">
       		   
          
        </div>
      </div>
    </div>
</body>
</html>