 <?php
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];
$user=$_SESSION['uname'];

if(empty($uid))
{
    header('location:index.php');
    exit();
}
$sql=  mysql_query("select inventory from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['inventory'];
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
        <li><a href="#tabs-3" class="last_li">Discharge List</a></li>
        <li  style="float:right"><a href="admission-list.php">Admission List</a></li>
        <li   style="float:right"><a href="ipd_visit.php">Admitted Patients</a></li>
        <div class="cls"></div>
  </ul>
</div>  
   <div class="cls"></div>
              <div id="tabs-3">
            <div style="width:100%; border:1px solid lightgray; float:left;">
              <form>
                <div class="bill_clr" style="font-weight:600;   background:#AEB4C2; font-size:11px;">
                    
                    <div class="l_ft" style="text-align:left; width:150px;">Serial Number</div>
                    <div class="l_ft" style="text-align:left; width:150px;">IP ID</div>
                    <div class="l_ft" style="text-align:left; width:200px;">Patient Name</div>
                    <div class="l_ft" style="width:150px;">DOD</div>
                    <div class="l_ft" style="text-align:left; width:150px;">Bed No</div>
                    <div class="l_ft" style="text-align:left; width:150px;">Doctor Incharge</div>
                </div>
                <div class="cls"></div>
                  <?php
         
     
     
 $k=1;
                if(isset($_POST['get_result']))
                {
                $date1=$_POST['indate'];
                $date2=$_POST['outdate'];
                    // start total patient tab
                    $res3=mysql_query("SELECT p.p_name,d.p_id,d.v_id,v.bed_no,d.disc_date,v.visit_id,v.ref_dr 
                    FROM patient_info p,visit_register v,discharge_table d 
                    WHERE p.patient_id=d.p_id and d.v_id=v.visit_id AND d.disc_date 
                    BETWEEN '$date1' AND '$date2'")or die(mysql_error());

                    
                    while($row3=mysql_fetch_array($res3))
                            {
                        
                        $anchor="<a href='discharge_payment_sumery.php?visitId=".$row3[2]."'>".$row3[3]."</a>";
                                  if($i%2==0){  ?>
                                    <div class="bill_height">
                                        <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[1]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[0]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3[4]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?=$anchor;?></div>
                                                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[6]; ?></div>
                                    </div>
                                <?php } else{?>
                                    <div class="bill_clr">
                                        <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[1]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[0]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row3[4]; ?></div>
                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?=$anchor;?></div>
                                                                        <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[6]; ?></div>
                                    </div>
                                <?php }$i++;
                                  $k++?>
                            <?php }}
                            else
                              {
                                // start total patient tab
                                $k=1;
                $res1=mysql_query("SELECT * FROM discharge_table")or die(mysql_error());
                while($row1=mysql_fetch_array($res1))
                {
                    $p_id=$row1['p_id'];
                    $v_id=$row1['v_id'];
                    $res=mysql_query("SELECT * FROM patient_info where patient_id='$p_id' ")or die(mysql_error());
                      while($row=mysql_fetch_array($res))
                        {
                        //echo $row['p_name'];
                          //$patient_id=$row['patient_id'];
                            $res3=mysql_query("select * from visit_register where visit_id='$v_id'")or die(mysql_error());
                            while($row3=mysql_fetch_array($res3))
                            {
                                
                                $anchor="<a href='discharge_payment_sumery.php?visitId=".$row3['visit_id']."'>".$row3['bed_no']."</a>";
                        
                                
                              if($i%2==0){  ?>
                                <div class="bill_clr">
                                    <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row['p_name']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row1['disc_date']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?=$anchor;?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[7]; ?></div>
                                </div>
                            <?php } else{?>
                                <div class="bill_height">
                                    <div class="l_ft ip_name b_order " style="text-align:left; width:200px"><?php echo $k; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3['visit_id']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row['p_name']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="width:150px;"><?php echo $row1['disc_date']; ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?=$anchor;?> ?></div>
                                    <div class="l_ft b_order ip_bill" style="text-align:left; width:150px;"><?php echo $row3[7]; ?></div>
                                </div>
                            <?php }$i++;
                              $k++;?>
    <?php }}} }
    ?>
    

    
    
    
   
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