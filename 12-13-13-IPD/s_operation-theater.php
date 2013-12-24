<?php 
	error_reporting(0);
require 'condb.php';
	include("header.php");
	include("menubar.php");
    session_start();
    if($_REQUEST['error_msg'])
    {
        $message=$_REQUEST['error_msg'];
        echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';    }
if($_REQUEST['error_msg1'])
{
    $message=$_REQUEST['error_msg1'];
    echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

}
	 ?>
	 
	 
	 
	 
<style type="text/css">
.t {
	width:30px;
}
.i {
	width:175px;
}
.tt {
	width:200px;
}
.se {
	display:inline-block;
	width:250px;
	border:1px solid lightgray;
	background:url(ccc.png) repeat;
}
.se a {
	text-decoration:none;
	color:#00172F;
	padding:0px 12px;
}
.dt {
	width:250px;
}
.list_name {
	width:150px;
	font-weight:600;
	font-size:11px
}
#try {
	width:246px;
}
.pro_items {
	float:left;
	width:190px;
	display:block;
	height:30px;
	background:#88C4FF;
	border:1px solid lightgray;
	padding:5px 0px 5px 10px;
	color:#555;
}
.pro_items1 {
	float:left;
	width:284px;
	display:block;
	background:#D9ECFF;
	border:1px solid lightgray;
	height:30px;
	padding:5px 8px 5px 8px;
}
.pro_items1 span {
	margin:0px 20px;
}
.pro_items1 input[type="text"] {
	margin:0px;
	padding:0px;
	width:285px;
	height:30px;
	font-size:12px;
	font-weight:500;
	color:#555;
}
</style>

  <script>
function calculateValues()
{
// for form
var Procedure_Fee=document.getElementById("Procedure_Fee").value;
var Adnl_Surgeon_cahrge=document.getElementById("Adnl_Surgeon_cahrge").value;
var OT_Charge=document.getElementById("OT_Charge").value;
var Anasethetics_charge=document.getElementById("Anasethetics_charge").value;
var Consumable_charge=document.getElementById("Consumable_charge").value;
var Implant_Charge=document.getElementById("Implant_Charge").value;
var Other_Charge=document.getElementById("Other_Charge").value;
var sum=Number(Procedure_Fee)+Number(Adnl_Surgeon_cahrge)+Number(OT_Charge)+Number(Anasethetics_charge)+Number(Consumable_charge)+Number(Implant_Charge)+Number(Other_Charge);
document.getElementById('package').value=sum;
// end form

// for form1
var Procedure_Fee1=document.getElementById("Procedure_Fee1").value;
var Adnl_Surgeon_cahrge1=document.getElementById("Adnl_Surgeon_cahrge1").value;
var OT_Charge1=document.getElementById("OT_Charge1").value;
var Anasethetics_charge1=document.getElementById("Anasethetics_charge1").value;
var Consumable_charge1=document.getElementById("Consumable_charge1").value;
var Implant_Charge1=document.getElementById("Implant_Charge1").value;
var Other_Charge1=document.getElementById("Other_Charge1").value;
var sum1=Number(Procedure_Fee1)+Number(Adnl_Surgeon_cahrge1)+Number(OT_Charge1)+Number(Anasethetics_charge1)+Number(Consumable_charge1)+Number(Implant_Charge1)+Number(Other_Charge1);
document.getElementById('package1').value=sum1;
// end form1

// for form2
var Procedure_Fee2=document.getElementById("Procedure_Fee2").value;
var Adnl_Surgeon_cahrge2=document.getElementById("Adnl_Surgeon_cahrge2").value;
var OT_Charge2=document.getElementById("OT_Charge2").value;
var Anasethetics_charge2=document.getElementById("Anasethetics_charge2").value;
var Consumable_charge2=document.getElementById("Consumable_charge2").value;
var Implant_Charge2=document.getElementById("Implant_Charge2").value;
var Other_Charge2=document.getElementById("Other_Charge2").value;
var sum2=Number(Procedure_Fee2)+Number(Adnl_Surgeon_cahrge2)+Number(OT_Charge2)+Number(Anasethetics_charge2)+Number(Consumable_charge2)+Number(Implant_Charge2)+Number(Other_Charge2);
//alert(sum2);
document.getElementById('package2').value=sum2;
// end form2



}
</script>


        
        <div id="opd_bill" style="height:20px;">
            <div style="float:left">
                <span class="p_adding">OT Billing</span>
            </div>
          <div id="add_new_patient"  style="float:right; width:820px;">
            <form action="#" method="post">
              <div style="float:left; width:50px; "> Name :</div>
                  <div style="float:left; width:120px;"><label for><?php echo $_SESSION['p_name'];?></label></div>
                  <div style="float:left; width:40px; ">Age :</div>
                  <div style="float:left; width:90px;"><label for><?php echo $_SESSION['p_age'];?></label></div>
                 <div style="float:left; ">Gender &nbsp;:</div>
                  <div style="float:left; margin-left:10px;"><input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/>
                    <strong>M</strong>
                    <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/>
                    <strong>F</strong>&nbsp;&nbsp;&nbsp;
                </div>
               <div style="float:left; ">Phone&nbsp;&nbsp;:&nbsp;&nbsp;</div>
               <div style="float:left; "><label for><?php echo $_SESSION['p_mob'];?></label></div>
                <div style="float:left; margin:0px 10px;">Bed No:</div>
                <div style="float:left;  margin:0px 0px;"><label id="bedno"><?php echo $_SESSION['bed_no'];?></label></div>
                 
            </form>
          </div>
         <div class="cls"></div>
        </div>
 <div class="cls"></div>

<div class="category">
        <div style="width:200px; float:left; ">
            <span id="cate">Category</span>
            <span style="margin-left:15px;"><input type="radio" name="category" checked="checked" />
                General</span>
            <span><input type="radio" name="category" />Emergency</span>
        </div>
        <div style="width:100px; float:left;margin-left:50px;">
            <span>Patient ID :</span>
            <span><label for> <?php echo $p_id= $_SESSION['p_id']; ?></label></span>
        </div>
        
        <div style="width:100px; float:left;  margin-left:50px;">
            <span style="margin-left:0px;">IP Id :</span>
            <span>
			<?php echo $_SESSION['v_id']; ?>
            </span>
        </div>
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Bed No :</span>
            <span>
			<?php echo $_SESSION['bed_no']; ?>
            </span>
        </div>
    
    <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">OT Id :</span>
            <span>
			<?php echo $ot_bill_id=$_SESSION['ot_id'];?>
            </span>
        </div>
    
    
    
    
        
        <div style="width:150px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Mode :</span>
            <span>
			<?php echo $_SESSION['mode']; ?>
            </span>
        </div>
        <div style="width:100px; float:left;  margin-left:10px;">
            <span style="margin-left:0px;">Panel :</span>
            <span>
			<?php echo $_SESSION['panel']; ?>
            </span>
        </div>
        <div class="cls"></div>
    </div>
      


<div class="miscel_charge">
      <ul class="visit_sum">
                            <li><a href="s_search1.php">Visit</a></li>
            <li><a href="s_search11.php">Procedure</a></li>
            <li><a href="s_search2.php">Diagnosis</a></li>
            <li><a href="s_search.php">Miscellaneous Charges</a></li>
            <li><a href="s_madison_search1.php">Medicine</a></li>
                   <li><a href="s_madison_search.php">Consumamble</a></li>
                   
                   <li><a href="s_search_ip-management.php">Room Management</a></li>
                   <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
<!--                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>-->
                   <li><a href="s_opd-visit-summary.php">Payment summary</a></li>
                   <li><a href="s_clienthome.php">Patient document</a></li>
                </ul>
    <div class="cls" style="height:2px;"></div> 
</div>
        <div class="cls"></div>

<div id="opd_bill" style="padding:0;">
 <div style="float:left; width:300px;">Procedures</div>
 

<div class="l_ft" style="width:400px;"><a href="addoc.php">Surgeon Name</a> 



<select name="surgeon_name">
<?php
$sel=mysql_query("select doc_name from doc_master_table");
while ($data=mysql_fetch_array($sel)) {
    echo '<option>'.$data[0].'</option>';
}
?>

</select>

</div>




   <div style="float:left; width:300px;">Date <input type="date"  name="ot_bill_date"/></div>
   <div class="cls"></div>
  </div>

<div style="overflow-x:scroll; overflow-y:hidden; scrollbar-base-color:red;">
<div style="width:4000px;">
  <div style="background:#FFF; width:200px; float:left">
      
    <div class="pro_items"><strong>Details</strong></div>
    <div class="pro_items"><strong>Procedure Name</strong></div>
    <div class="pro_items"><strong>Surgeon Fee</strong></div>
    <div class="pro_items"><strong>Adnl Surgeon charge</strong></div>
    <div class="pro_items"><strong>OT Charge</strong></div>
    <div class="pro_items"><strong>Anasethetics charge</strong></div>
    <div class="pro_items"><strong>Consumable charge</strong></div>
    <div class="pro_items"><strong>Implant Charge</strong></div>
    <div class="pro_items"><strong>Other Charge</strong></div>
    <div class="pro_items"><strong>
      <input type="checkbox" value="" name="calculate"  onclick="calculateValues()" />
      Package</strong></div>
  </div>

  <div style="background:#FFF; width:300px; float:left">
      <div class="pro_items1" id="pro_items1"> <span>
        </span> <span>Edit</span> <span>Delete</span></div>
      <div class="pro_items1">
        <input type="text" placeholder="Procedure name" style="width:45%" name="Procedure_Name" id="inputStringD" onKeyUp="lookupD(this.value);" />
        <input type="text" placeholder="Procedure fee" style="width:45%" name="Total_Fee" id="amount" />
      </div>
      <div class="pro_items1">
        <input type="text" placeholder="procedure fee" name="Procedure_Fee" id="Procedure_Fee"  />
      </div>
      <div class="pro_items1">
        <input type="text" name="Adnl_Surgeon_cahrge" id="Adnl_Surgeon_cahrge" />
      </div>
      <div class="pro_items1">
        <input type="text" name="OT_Charge" id="OT_Charge" />
      </div>
      <div class="pro_items1">
        <input type="text" name="Anasethetics_charge" id="Anasethetics_charge" />
      </div>
      <div class="pro_items1">
        <input type="text" name="Consumable_charge" id="Consumable_charge" />
      </div>
      <div class="pro_items1">
        <input type="text" name="Implant_Charge" id="Implant_Charge" />
      </div>
      <div class="pro_items1">
        <input type="text" name="Other_Charge" id="Other_Charge" />
      </div>
      <div class="pro_items1">
        <input type="text" placeholder="package" name="package" id="package" />
      </div>
      <div align="left" class="suggestionsBoxD" id="suggestionsD" style="display:none;">
<div align="left" class="suggestionListD" id="autoSuggestionsListD">
  </div>
      </div>
  </div>
          
  <div style="background:#FFF; width:300px; float:left">
      <div class="pro_items2" id="pro_items2"> <span>
        </span> <span>Edit</span> <span>Delete</span></div>
      <div class="pro_items2">
        <input type="text" placeholder="Procedure name" style="width:45%" name="Procedure_Name1"id="inputStringD" onKeyUp="lookupD(this.value);"  />
        <input type="text" placeholder="Procedure fee" style="width:45%" name="Total_Fee1"  />
      </div>
      <div class="pro_items2">
          <input type="text" name="Procedure_Fee1" id="Procedure_Fee1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="Adnl_Surgeon_cahrge1" id="Adnl_Surgeon_cahrge1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="OT_Charge1" id="OT_Charge1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="Anasethetics_charge1" id="Anasethetics_charge1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="Consumable_charge1" id="Consumable_charge1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="Implant_Charge1" id="Implant_Charge1" />
      </div>
      <div class="pro_items2">
          <input type="text" name="Other_Charge1" id="Other_Charge1" />
      </div>
      <div class="pro_items2">
          <input type="text" placeholder="package1" name="package1" id="package1" />
      </div>
 <div align="left" class="suggestionsBoxD" id="suggestionsD" style="display:none;">
<div align="left" class="suggestionListD" id="autoSuggestionsListD">
  </div>
      </div>
  </div>
  <div style="background:#FFF; width:300px; float:left">
      <div class="pro_items3" id="pro_items3"> <span>
        </span> <span>Edit</span> <span>Delete</span></div>
      <div class="pro_items3">
        <input type="text" placeholder="Procedure name2" style="width:45%" name="Procedure_Name2" id="inputStringD" onKeyUp="lookupD1(this.value);" />
        <input type="text" placeholder="Procedure fee" style="width:45%" name="Total_Fee2" id="amount" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Procedure_Fee2" id="Procedure_Fee2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Adnl_Surgeon_cahrge2" id="Adnl_Surgeon_cahrge2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="OT_Charge2" id="OT_Charge2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Anasethetics_charge2" id="Anasethetics_charge2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Consumable_charge2" id="Consumable_charge2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Implant_Charge2" id="Implant_Charge2" />
      </div>
      <div class="pro_items3">
          <input type="text" name="Other_Charge2" id="Other_Charge2" />
      </div>
      <div class="pro_items3">
          <input type="text" placeholder="package2" name="package2" id="package2" />
      </div>  
  </div>
     <div align="left" class="suggestionsBoxD" id="suggestionsD" style="display:none;">
<div align="left" class="suggestionListD" id="autoSuggestionsListD">
  </div>
      </div>
  </div>
  <div style="clear:both;"></div>
</div>
 
<div class="category s">
  <div style="float:left;"></div>
  <div style="float:right;"> <span>


          
          
    <input type="submit" value="Clear all"name="clear_all" class="btn" />
    </span>



      <span>
    <input type="submit" name="save" value="Save" class="btn" />
          <input type="submit" name="home" value="Estimated" class="btn" />
    </span>
      </form>
  </div>
  <div class="cls"></div>
</div>
</div>
<div id="lightBox" style="position:absolute;display:none; top: 500px; right: 580px; z-index: 100; width: 430px; height: 350px; color: black; background:  #5b80b2;  margin-right: 150px; padding-right:15px;   ">
    
    <label>Procedure Name:</label><input type="text" id="procedureName"/><br/>
    <label>Total Fee:</label><input type="text" id="TotalFee"/><br/>
    <label>Procedure Fee:</label><input type="text" id="procedureFee" /><input type="hidden" id="procamount"/><br/>
    <label>Adnl Surgeon charge:</label><input type="text" id="adnl_surgeon_charge"/><input type="hidden" id="adnlamount"/><br/>
    <label>OT Charge:</label><input type="text" id="OTCharge"/><input type="hidden" id="otamount"/><br/>
    <label>Anasethetics charge:</label><input type="text" id="anasethetics_charge" /><input type="hidden" id="anasetamount"/><br/>
    <label>Consumable charge:</label><input type="text" id="consumable_charge"/><input type="hidden" id="consumableamoun"/><br/>
    <label>Implant Charge:</label><input type="text" id="implant_charge"/><input type="hidden" id="implantamount"/><br/>
    <label>Other Charge:</label><input type="text" id="other_charge"/><input type="hidden" id="otheramount"/><br/>
    
    <input type="button" id="closeLightBox" value="save" onkeyup="proc_fee()" style="width:100px;height:40px;margin:20px"/>
</div>

<script src="js/jquer-1.9.1-1.js"></script>
<script>
$(document).ready(function(){
    $('#pro_items1 span').eq(1).click(function(){
        
        var procedureName=$('input[name=Procedure_Name]').val();
        var procedureFee=$('input[name=Procedure_Fee]').val();
        var TotalFee=$('input[name=Total_Fee]').val();
        
        $('#procedureName').val(procedureName);
        $('#TotalFee').val(TotalFee);
        $('#lightBox').show();
    });
    
    $('#closeLightBox').click(function(){
        $('#lightBox').hide();
        $('input[name=Procedure_Fee]').val($('#procamount').val());
        $('input[name=Adnl_Surgeon_cahrge]').val($('#adnlamount').val());
        
        $('input[name=OT_Charge]').val($('#otamount').val()); 
        $('input[name=Anasethetics_charge]').val($('#anasetamount').val());
        
        $('input[name=Consumable_charge]').val($('#consumableamoun').val());
        $('input[name=Implant_Charge]').val($('#implantamount').val());
        $('input[name=Other_Charge]').val($('#otheramount').val());
        
        
        
        
    })
})
 function proc_fee(){   
      
	var TotalFee =document.getElementById("TotalFee").value;
        
       
        var procedureFee =document.getElementById("procedureFee").value;
        
        var adnl_surgeon_charge =document.getElementById("adnl_surgeon_charge").value;
         
         var OTCharge =document.getElementById("OTCharge").value;
         
         var anasethetics_charge =document.getElementById("anasethetics_charge").value;
         
         var consumablecharge =document.getElementById("consumable_charge").value;
         
         var implantcharge =document.getElementById("implant_charge").value;
         
          var othercharge =document.getElementById("other_charge").value;
         
         
        var proc_amount=(TotalFee/100)*procedureFee;
        var adnl_amount=(TotalFee/100)*adnl_surgeon_charge;
        
        var ot_amount=(TotalFee/100)*OTCharge;
        var anaset_amount=(TotalFee/100)*anasethetics_charge;
         var consumable_amount=(TotalFee/100)*consumablecharge;
          var implant_amount=(TotalFee/100)*implantcharge;
           var other_amount=(TotalFee/100)*othercharge;
        
        
       
      
        document.getElementById("procamount").value=proc_amount;
        document.getElementById("adnlamount").value=adnl_amount;
        document.getElementById("otamount").value=ot_amount;
        document.getElementById("anasetamount").value=anaset_amount;
        document.getElementById("consumableamoun").value=consumable_amount;
        document.getElementById("implantamount").value=implant_amount;
        document.getElementById("otheramount").value=other_amount;
	
}



</script>


<div id="lightBox1" style="position:absolute;display:none; top: 500px; right: 200px; z-index: 100; width: 430px; height: 350px; color: black; background:  #5b80b2;  margin-right: 150px; padding-right:15px;   ">
     <label>Procedure Name:</label><input type="text" id="procedureName1"/><br/>
    <label>Total Fee:</label><input type="text" id="TotalFee1"/><br/>
    <label>Procedure Fee:</label><input type="text" id="procedureFee1" /><input type="hidden" id="procamount1"/><br/>
    <label>Adnl Surgeon charge:</label><input type="text" id="adnl_surgeon_charge1"/><input type="hidden" id="adnlamount1"/><br/>
    <label>OT Charge:</label><input type="text" id="OTCharge1"/><input type="hidden" id="otamount1"/><br/>
    <label>Anasethetics charge:</label><input type="text" id="anasethetics_charge1" /><input type="hidden" id="anasetamount1"/><br/>
    <label>Consumable charge:</label><input type="text" id="consumable_charge1"/><input type="hidden" id="consumableamoun1"/><br/>
    <label>Implant Charge:</label><input type="text" id="implant_charge1"/><input type="hidden" id="implantamount1"/><br/>
    <label>Other Charge:</label><input type="text" id="other_charge1"/><input type="hidden" id="otheramount1"/><br/>
    
    <input type="button" id="closeLightBox1" value="save" onkeyup="proc_fee1()" style="width:100px;height:40px;margin:20px"/>
</div>
   
</div>

<script src="js/jquer-1.9.1-1.js"></script>
<script>
$(document).ready(function(){
    $('#pro_items2 span').eq(1).click(function(){
        
        var procedureName1=$('input[name=Procedure_Name1]').val();
        var procedureFee1=$('input[name=Procedure_Fee1]').val();
        var TotalFee1=$('input[name=Total_Fee1]').val();
        
        $('#procedureName1').val(procedureName1);
        $('#TotalFee1').val(TotalFee1);
        
      
        $('#lightBox1').show();
    });
    
 
$('#closeLightBox1').click(function(){
        $('#lightBox1').hide();
        $('input[name=Procedure_Fee1]').val($('#procamount1').val());
        $('input[name=Adnl_Surgeon_cahrge1]').val($('#adnlamount1').val());
        
        $('input[name=OT_Charge1]').val($('#otamount1').val()); 
        $('input[name=Anasethetics_charge1]').val($('#anasetamount1').val());
        
        $('input[name=Consumable_charge1]').val($('#consumableamoun1').val());
        $('input[name=Implant_Charge1]').val($('#implantamount1').val());
        $('input[name=Other_Charge1]').val($('#otheramount1').val());
        
        
        
        
    })
})
 function proc_fee1(){   
      
	var TotalFee1 =document.getElementById("TotalFee1").value;
        
       
        var procedureFee1 =document.getElementById("procedureFee1").value;
        
        var adnl_surgeon_charge1 =document.getElementById("adnl_surgeon_charge1").value;
         
         var OTCharge1 =document.getElementById("OTCharge1").value;
         
         var anasethetics_charge1 =document.getElementById("anasethetics_charge1").value;
         
         var consumablecharge1 =document.getElementById("consumable_charge1").value;
         
         var implantcharge1 =document.getElementById("implant_charge1").value;
         
          var othercharge1 =document.getElementById("other_charge1").value;
         
         
        var proc_amount1=(TotalFee1/100)*procedureFee1;
        var adnl_amount1=(TotalFee1/100)*adnl_surgeon_charge1;
        
        var ot_amount1=(TotalFee1/100)*OTCharge1;
        var anaset_amount1=(TotalFee1/100)*anasethetics_charge1;
         var consumable_amount1=(TotalFee1/100)*consumablecharge1;
          var implant_amount1=(TotalFee1/100)*implantcharge1;
           var other_amount1=(TotalFee1/100)*othercharge1;
        
        
       
      
        document.getElementById("procamount1").value=proc_amount1;
        document.getElementById("adnlamount1").value=adnl_amount1;
        document.getElementById("otamount1").value=ot_amount1;
        document.getElementById("anasetamount1").value=anaset_amount1;
        document.getElementById("consumableamoun1").value=consumable_amount1;
        document.getElementById("implantamount1").value=implant_amount1;
        document.getElementById("otheramount1").value=other_amount1;
	
}



</script>



<div id="lightBox2" style="position:absolute;display:none; top: 500px; right: -100px; z-index: 100; width: 430px; height: 350px; color: black; background:  #5b80b2;  margin-right: 150px; padding-right:15px;   ">
     <label>Procedure Name:</label><input type="text" id="procedureName2"/><br/>
    <label>Total Fee:</label><input type="text" id="TotalFee2"/><br/>
    <label>Procedure Fee:</label><input type="text" id="procedureFee2" /><input type="hidden" id="procamount2"/><br/>
    <label>Adnl Surgeon charge:</label><input type="text" id="adnl_surgeon_charge2"/><input type="hidden" id="adnlamount2"/><br/>
    <label>OT Charge:</label><input type="text" id="OTCharge2"/><input type="hidden" id="otamount2"/><br/>
    <label>Anasethetics charge:</label><input type="text" id="anasethetics_charge2" /><input type="hidden" id="anasetamount2"/><br/>
    <label>Consumable charge:</label><input type="text" id="consumable_charge2"/><input type="hidden" id="consumableamoun2"/><br/>
    <label>Implant Charge:</label><input type="text" id="implant_charge2"/><input type="hidden" id="implantamount2"/><br/>
    <label>Other Charge:</label><input type="text" id="other_charge2"/><input type="hidden" id="otheramount2"/><br/>
    
    <input type="button" id="closeLightBox2" value="save" onkeyup="proc_fee2()" style="width:100px;height:40px;margin:20px"/>
</div>
   
</div>

<script src="js/jquer-1.9.1-1.js"></script>
<script>
$(document).ready(function(){
    $('#pro_items3 span').eq(1).click(function(){
        
        var procedureName2=$('input[name=Procedure_Name2]').val();
        var procedureFee2=$('input[name=Procedure_Fee2]').val();
        var TotalFee2=$('input[name=Total_Fee2]').val();
        
        $('#procedureName2').val(procedureName2);
        $('#TotalFee2').val(TotalFee2);
        
      
        $('#lightBox2').show();
    });
    
 
$('#closeLightBox2').click(function(){
        $('#lightBox2').hide();
        $('input[name=Procedure_Fee2]').val($('#procamount2').val());
        $('input[name=Adnl_Surgeon_cahrge2]').val($('#adnlamount2').val());
        
        $('input[name=OT_Charge2]').val($('#otamount2').val()); 
        $('input[name=Anasethetics_charge2]').val($('#anasetamount2').val());
        
        $('input[name=Consumable_charge2]').val($('#consumableamoun2').val());
        $('input[name=Implant_Charge2]').val($('#implantamount2').val());
        $('input[name=Other_Charge2]').val($('#otheramount2').val());
        
        
        
        
    })
})
 function proc_fee2(){   
      
	var TotalFee2 =document.getElementById("TotalFee2").value;
        
       
        var procedureFee2 =document.getElementById("procedureFee2").value;
        
        var adnl_surgeon_charge2 =document.getElementById("adnl_surgeon_charge2").value;
         
         var OTCharge2 =document.getElementById("OTCharge2").value;
         
         var anasethetics_charge2 =document.getElementById("anasethetics_charge2").value;
         
         var consumablecharge2 =document.getElementById("consumable_charge2").value;
         
         var implantcharge2 =document.getElementById("implant_charge2").value;
         
          var othercharge2 =document.getElementById("other_charge2").value;
         
         
        var proc_amount2=(TotalFee2/100)*procedureFee2;
        var adnl_amount2=(TotalFee2/100)*adnl_surgeon_charge2;
        
        var ot_amount2=(TotalFee2/100)*OTCharge2;
        var anaset_amount2=(TotalFee2/100)*anasethetics_charge2;
         var consumable_amount2=(TotalFee2/100)*consumablecharge2;
          var implant_amount2=(TotalFee2/100)*implantcharge2;
           var other_amount2=(TotalFee2/100)*othercharge2;
        
        
       
      
        document.getElementById("procamount2").value=proc_amount2;
        document.getElementById("adnlamount2").value=adnl_amount2;
        document.getElementById("otamount2").value=ot_amount2;
        document.getElementById("anasetamount2").value=anaset_amount2;
        document.getElementById("consumableamoun2").value=consumable_amount2;
        document.getElementById("implantamount2").value=implant_amount2;
        document.getElementById("otheramount2").value=other_amount2;
	
}



</script>

</script>
</body>

</html>