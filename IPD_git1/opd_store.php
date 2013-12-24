
<?php
	error_reporting(0);
	include("header.php");
include("menubar.php");
    //require 'includes1/searchresults.php';
include("condb.php");
?>
<Script type="text/javascript">
                  function DisplayDateTime() {
					 
                        var DateTime = new Date();
                        var strYear= DateTime.getFullYear();
                        var strMonth= DateTime.getMonth();
                        var strDay = DateTime.getDate();
                        var strHours = DateTime.getHours();
                        var strMinutes = DateTime.getMinutes();
                        var strSeconds = DateTime.getSeconds();
                        var tagDiv=document.getElementById("dd");
                        tagDiv.innerText = "DD/MM/YYYY  HH:MM:SS";
                        tagDiv.innerText = strDay + "/" + strMonth + "/" + strYear + "  " + strHours + ":" + strMinutes + ":" + strSeconds;

                  }
				  window.onload=function(){
					  	DisplayDateTime();
				  }

            </Script>

  <!--Nav bar End -->
  <div id="opd_bill" style="height:40px;">
            <span style="float:left; width:200px; "><strong>OPD STORE</strong></span>
        <div style="float:right; margin-right:10px;">

         </div>
    <div class="cls"></div>
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
              <div style="float:left; width:150px; margin-right:5px;"><strong>Type</strong></div>
              <div style="float:left; width:150px; "><strong>MRP.</strong></div>
              <div style="float:left; width:150px; "><strong>Quantity</strong></div>
              <div style="float:left; width:200px; "><strong>Expiry Date</strong></div>


                <?php $res3=mysql_query("select * from inventory_store");
                while($row3=mysql_fetch_array($res3)){	?>

    		      <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                    <input type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[1];?></div>
             			  <div style="float:left; width:150px; "><strong><?php echo $row3[2];?></strong></div>
                    <div style="float:left; width:150px; "><?php echo $row3[3];?></div>
      		          <div style="float:left; width:150px; "><?php echo $row3[4];?></div>
                    <div style="float:left; width:150px;"><?php echo $row3[5];?></div>
                    <div style="float:left; width:100px; "><input type="submit"name="del" value="delete" class="btn"/></div>
                    <div style="float:left; width: 4px; "><input type="submit"name="details" value="details" class="btn"/></div>
	            <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             ?>
             <?php
             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from inventory_store where in_id='$chk'")or die(mysql_error());
             }
             ?>
      </div>
      <div class="cls" style="margin-top:20px;"></div>
  
      
  </div>
  <?php 
  	include("footer.php");
  ?>