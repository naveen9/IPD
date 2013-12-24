
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
    //require 'includes1/searchresults.php';


if($_REQUEST['find'])
{
	if($_REQUEST['search']!=''){
		$SQL="select * from inventory_store where in_name like '%".$_REQUEST['search']."%'";
	}else {
		$SQL="select * from inventory_store";
	}
}else {
	$SQL="select * from inventory_store";
}
?>

  <!--Nav bar End -->
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

  <form method="post">
  	<div style="width:990px; margin:20px auto;" id="search_exist">
          <div id="search_txt" class="p_adding">Search Inventory Name</div>
            <div class="p_adding">
              <span>
<input type="text" name="search" placeholder="Medicine Name" id="inputStringCo" value="<?php echo $_REQUEST['search']; ?>"  /></span>
                <span><input type="submit" name="find" value="Search" class="btn"/></span>
            <div align="left" class="suggestionsBoxAd" id="suggestionsCo" style="display:none;">
<div align="left" class="suggestionListAd" id="autoSuggestionsListCo">
</div>
</div>
            </div>
        </div>
  </form>

   <div style="width:990px; margin:50px auto;">
  		 <div class="field_bg">
              <div style="float:left; width:200px; "><strong>Inventory Name</strong></div>
              <div style="float:left; width:100px; text-align:center; margin-right:5px;"><strong>Type</strong></div>
              <div style="float:left; width:100px; text-align:center; "><strong>Unit Price</strong></div>
              <div style="float:left; width:100px; text-align:center; "><strong>Quantity</strong></div>
              <div style="float:left; width:170px;  text-align:center; "><strong>Expiry Date</strong></div>


                <?php $res3=mysql_query($SQL);
                while($row3=mysql_fetch_array($res3)){	?>

    		      <div class="cls" style="margin-bottom:15px; height:1px; background:#FFFFFF"></div>

                  <form method="post" action="main_store_tran.php">
                    <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[1];?></div>
             			  <div style="float:left; width:100px; text-align:center;"><?php echo $row3[2]; ?></div>
                    <div style="float:left; width:100px; text-align:center;"><?php echo $row3[3];?></div>
      		          <div style="float:left; width:100px; text-align:center; "><?php echo $row3[5];?></div>
                    <div style="float:left; width:170px;  text-align:center;"><?php echo $row3[6];?></div>
                    <div style="float:left; width:75px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                    <div style="float:left; width:145px; "><input type="submit"name="details" value="purchase details" class="btn"/></div>
                    <div style="float:left; width:0px; "><input type="submit"name="transfer" value="Transfer" class="btn"/></div>
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