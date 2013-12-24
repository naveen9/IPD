
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
$sql=  mysql_query("select pharmacy from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['pharmacy'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}
 

        
 include("header.php");
include("menubar.php");
    //require 'includes1/searchresults.php';

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
   <div style="width:990px; margin:0 auto;">
  		 <div class="field_bg">
              <div style="float:left; width:200px; "><strong>Medicine Name</strong></div>
              <div style="float:left; width:130px; margin-right:5px;"><strong>Batch No</strong></div>
              <div style="float:left; width:130px; "><strong>Unit.MRP.</strong></div>
              <div style="float:left; width:130px; "><strong>pack.</strong></div>
              <div style="float:left; width:130px; "><strong>Quantity</strong></div>
              <div style="float:left; width:130px; "><strong>Expiry Date</strong></div>


                <?php $res3=mysql_query("select * from medicine_store");
                while($row3=mysql_fetch_array($res3)){	?>

    		      <div class="cls" style="margin-bottom:15px;"></div>

                  <form method="post">
                      <INPUT type="hidden" name="chk" value="<?php echo $row3[0];?>"/>
                    <div style="float:left; width:200px; margin-right:5px;"><?php echo $row3[1];?></div>
             			  <div style="float:left; width:130px; "><strong><?php echo $row3[2];?></strong></div>
                    <div style="float:left; width:130px; "><?php echo $row3[4];?></div>
      		          <div style="float:left; width:130px; "><?php echo $row3[5];?></div>
                          <div style="float:left; width:130px; "><?php echo $row3[6];?></div>
                    <div style="float:left; width:130px;"><?php echo $row3[7];?></div>
                    <div style="float:left; width:50px; "><input type="submit"name="del" value="delete" class="btn"/></div>
	            <div class="cls" style="margin-top:15px;  border-bottom:1px solid lightgray;"></div>

        </form>
             <?php
             }
             ?>
             <?php
             if(isset($_POST['del']))
             {
                 $chk=$_POST['chk'];
                 mysql_query("delete from medicine_store where m_id='$chk'")or die(mysql_error());
             }
             ?>
      </div>
      <div class="cls" style="margin-top:20px;"></div>
  
      
  </div>
  <?php 
  	include("footer.php");
  ?>