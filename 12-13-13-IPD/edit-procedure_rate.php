<?php
session_start();

?>

<?php
include("header.php");
include("menubar.php");
include("condb.php");
error_reporting(0);

if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo $message;
}
?>
  
  <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
        <span class="p_adding">Edit Procedure Rate</span>
        </div>
        
        <div class="'cls"></div>
   </div>
   
   <div style="width:989px;">
   	<!--MAIN DIV START HERE--->
<?php
require_once 'condb.php';
$id=$_SESSION['id'];
$select=("SELECT * FROM `proc_info` where pid='$id'");
$query=mysql_query($select)or die(mysql_error());
while($res=mysql_fetch_array($query)){
    $name=$res[1];
    //$opd=$res[4];
    // $cghs=$res[5];
    //$general=$res[6];
    ////$icu=$res[7];
    //$vip=$res[8];
}

?>

       <div style="float:left; width:500px; border:1px solid lightgray; padding:15px;">
        	<div class="bill_clr" style="padding:0px -30px;">
                <!---FORM START HERE-->
                <form action="rate.php" method="post">

                <div class="l_ft n_w">Procedure Name</div>
                <div class="l_ft n_w"><input type="text" name="proc_name" value="<?php echo $name; ?>"/></div>
			</div>	            
          <div class="cls"></div>
          
          <div class="l_ft n_w"><strong>Category</strong></div>
            <div class="l_ft n_w"><strong>Rate</strong></div>
          <div class="cls"></div>
         <?php

         $id=$_SESSION['id'];
         //echo $id;
           $select2=("SELECT * FROM `proc_mode_rate` where belongs_proc='$id'");
           $query2=mysql_query($select2)or die(mysql_error());
         $count=mysql_num_rows($query2);
         echo"<input type='hidden' name='count' value='$count'>";
         echo"<input type='hidden' name='procid' value='$id'/>";

         $i=0;

           while($res=mysql_fetch_array($query2)){
           $mode=$res['mode'];
           $rate=$res['rate'];
          echo '<div class="l_ft n_w">'.$mode.'</div>';
            echo "<input type='hidden' name='mode".$i."' value='$mode'/>";
               echo"<input type='text' name='rate".$i."' value='$rate'/>";
               $i++;
           }
         ?>

          <!---
           <div class="l_ft n_w">CGHS</div>
            <div class="l_ft n_w"><input type="text" name="cghs1" value="<?php// echo $cghs; ?>"></div>
          <div class="cls"></div>

			<div class="l_ft n_w">General Ward</div>
            <div class="l_ft n_w"><input type="text" name="general1" value="<?php ///echo $general; ?>"/></div>
          <div class="cls"></div>
          
          <div class="l_ft n_w">ICU</div>
            <div class="l_ft n_w"><input type="text" name="icu1" value="<?php // echo $icu; ?>"/></div>
          <div class="cls"></div>
          <div class="l_ft n_w">VIP Ward</div>
            <div class="l_ft n_w"><input type="text" name="vip1" value="<?php //echo// $vip; ?>"/></div>
          <div class="cls"></div>
          --->
      </div>
      <div class="cls"></div>
      	
      <div class="fill_data">
   			<div id="bil_id">
                    <span><strong>&nbsp;</strong></span>
                    <span><label for="">&nbsp;</label></span>
	</div>
                
                <div id="bil_id" style="width:500px;">
                    <span><strong>&nbsp;</strong></span>
                    <span><label for="">&nbsp;</label></span>
				</div>

                <div>            
                    <span >
                    <input type="submit" value="Save" name="save" class="btn" />
                    </span>
				</div>
 		 </div>
       </form>
   </div>
   
   
  </div>
</body>
</html>
<?php
error_reporting(0);
//$icu1=$_POST['icu1'];

?>