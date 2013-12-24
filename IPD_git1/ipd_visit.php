

 	<?php 
        session_start();
	error_reporting(0);
                  include("condb.php");
  $uid=$_SESSION['uid'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
  
  $sql=  mysql_query("select reception from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['reception'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
                  include("header.php");
	include("menubar.php");
    
	 ?>

  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
    <style type="text">
      .date_txt{}
    </style>

  
      <div id="opd_bill" style="height:20px; margin-bottom:2px;">
  		<div style="float:right; font-weight:900"><a href="admission-ipd.php"> + ADD IPD Visit</a></div>
        
     </div>
   
  
  
   <div class="miscel_charge">
      <ul class="visit_sum">
        <li><a href="#tabs-3" class="last_li" style="color:#FFFFFF; font-weight:900; font-size:90%">Admitted Patients</a></li>
        <li  style="float:right"><a href="admission-list.php">Admission List</a></li>
        <li   style="float:right"><a href="discharge-list.php">Discharge List</a></li>
        <div class="cls"></div>
  </ul>
</div>  
   
      <div id="tabs-3">
        <div style="width:100%; border:1px solid lightgray; float:left;">
        		  <div class="bill_clr" style="font-weight:600;  background:#AEB4C2; color:#000; font-size:11px;">
                      
                      <div class="l_ft" style="text-align:left; width:150px;">Serial Number</div>
                      <div class="l_ft" style="text-align:left; width:150px;">IP ID</div>
                      <div class="l_ft" style="text-align:left; width:200px;">Patient Name</div>
                      <div class="l_ft" style="width:150px;">DOA</div>
                      <div class="l_ft" style="text-align:left; width:150px;">Bed No</div>
                      <div class="l_ft" style="text-align:left; width:130px;">Doctor Incharge</div>
                </div>
               <div class="cls"></div>
                  <form>
                  <?php
                if(isset($_POST['get_result']))
                {
                    $date1=$_POST['indate'];
                    $date2=$_POST['outdate'];
                    // start total patient tab
                    $k=1;
                    $res3=mysql_query("SELECT p.p_name,p.patient_id,v.visit_id,v.bed_no,v.visit_date,v.ref_dr FROM patient_info p,visit_register v,beds_master_table b WHERE b.availability=1 and p.patient_id=b.p_id and v.p_id=p.patient_id AND v.visit_date BETWEEN '$date1' AND '$date2' ORDER BY v.visit_date DESC")or die(mysql_error());
                    while($row3=mysql_fetch_array($res3))
                    {
                        
                      if($i%2==0){  ?>
                            <div class="bill_height">
                                <div class="l_ft ip_name b_order" style="text-align:left; width:200px"><?php echo $row3['p_name']; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $k; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                                <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
                                
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
                            </div>
                        <?php } else{?>
                            <div class="bill_clr">
					           <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $row3['p_name']; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $k; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                                <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>
								<div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                                                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>

                            </div>
                        <?php }$i++;
                          $k++;?>
                    <?php }}

                else
                {
                // start total patient tab
                    $k=1;
                $res1=mysql_query("SELECT * FROM beds_master_table where availability=1")or die(mysql_error());
                while($row1=mysql_fetch_array($res1))
                {
                    $p_id=$row1['p_id'];

                $res=mysql_query("SELECT * FROM patient_info where patient_id='$p_id' ")or die(mysql_error());

                while($row=mysql_fetch_array($res))
                {
                    //echo $row['p_name'];


                    $patient_id=$row['patient_id'];
                    $res3=mysql_query("select * from visit_register where p_id='$patient_id'")or die(mysql_error());
                    while($row3=mysql_fetch_array($res3))
                    {

                        $anchor="<a href='search_ipd_visit_first.php?visitId=".$row['patient_id']."'>".$row3['visit_id']."</a>";
                        $anchor1="<a href='search_ipd_visit_first.php?visitId=".$row['patient_id']."'>".$row['p_name']."</a>";
                        if($i%2==0)
                            $className="bill_clr";
                        else
                            $className="bill_height";
                          ?>
                            <div class="<?php echo $className?>">
                                
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $k; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?=$anchor;?></div>
                                <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?=$anchor1;?></div>
                                <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3['visit_date']; ?></div>

                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['bed_no']; ?></div>
                                <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['ref_dr']; ?></div>
                                

                            </div>
                        
                            
                        <?php $i++;
                          $k++;?>
                    <?php }}}} ?>
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
