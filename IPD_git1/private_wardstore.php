<?php
session_start();
    error_reporting(0);
    //require 'includes1/searchresults.php';
include("condb.php");


$uid=$_SESSION['uid'];

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


  <!--Nav bar End -->
  <div id="opd_bill" style="height:20px; padding-left:5px;">
         Private Ward Store
        
   
    </div>

  <div style="width:990px; margin:20px auto;" id="search_exist">
          <div id="search_txt" class="p_adding">Search Inventory Name</div>
            <div class="p_adding">
              <span>
<input type="text" name="search" placeholder="Medicine Name" id="inputStringCo" onKeyUp="lookupCo(this.value);" onBlur="fillCo();"  /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
            <div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
<div align="left" class="suggestionListAd" id="autoSuggestionsListCo">
</div>
</div>
            </div>
        </div>

   <div style="width:990px; margin:50px auto;">
         <div class="field_bg">
              <div style="float:left; width:200px; "><strong>Inventory Name</strong></div>
              <div style="float:left; width:150px; text-align:center; margin-right:5px;"><strong>Type</strong></div>
              <div style="float:left; width:150px; text-align:center "><strong>Quantity</strong></div>
              <div style="float:left; width:150px; text-align:center "><strong>Date</strong></div>
              <div style="float:left; width:200px; text-align:center "><strong>Expiry Date</strong></div>


                <?php $res3=mysql_query("select * from ot_store where type_of_store='Private Word Store'");
                while($row3=mysql_fetch_array($res3)){  
                    $ot_id=$row3[0];?> 

                  <div class="cls" style="margin-bottom:15px; height:1px; background:#FFF;"></div>

                  <form method="post" action="main_store_tran.php">
                    <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[3];?></div>
                          <div style="float:left; width:150px; text-align:center"><?php echo $row3[4]; ?></div>
                    <div style="float:left; width:150px; text-align:center"><?php echo $row3[5];?></div>
                      <div style="float:left; width:150px; text-align:center"><?php echo $row3[7];?></div>
                    <div style="float:left; width:200px;  text-align:center"><?php echo $row3[6];?></div>
                    
                    <div style="float:left; width: 80px; "><input type="submit"name="transfer1" value="Transfer" class="btn"/></div>
                    <div style="float:left; width: 20px; "><a href='used_inventrey.php?used=<?php echo $ot_id; ?> '>Consume</a></div>
                <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             ?>
             
      </div>
      <div class="cls" style="margin-top:20px;"></div>
  
      
  </div>
  <?php 
    include("footer.php");
  ?>