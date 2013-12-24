	 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
	<style type="text/css">
		.t {
			width:30px;
		}
		.i {
			width:200px;
		}
		.t_d {
			width:200px;
		}
		th {
			border-bottom:1px solid;
		}
		td {
			width:30px;
			font-size:12px;
		}
		tr.b {
			border:1px solid lightgray;
			height:50px;
		}
		table {
			border-collapse:collapse;
		}
		#pay1{color:#0000AE; font-weight:600;}
		#pay1:hover{text-decoration:underline;}
	</style>
  
      
      <div class="right_top"><strong>Patient Profile</strong></div>
      <div id="opd_bill">
       <span>Make Payment</span>
       <span style="margin-left:305px;">Visit Id</span>
            <span>
            	<select id="select_size">
                      <option value="volvo">......................</option>
                      
				</select>
            </span>    
        <span style="margin-left:80px;"><input type="text" name="search" placeholder="PID/Name/Ph/Email" /></span>
                <span><input type="button" name="search" value="Search"  style="background:#6FB7FF; color:#FFF; padding:3px;  width:70px; border:1px solid #FFF; border-radius:5px;" /></span>
       </div>
      <div style="width:100%; margin:0 auto;">
    <div class="pateint_resume">
          <div>
            <div><strong>Patient ID :</strong></div>
            <img src="Photo-0269.jpg" width="80" height="80" align="top" /> </div>
          <div id="patient_field_name">Patient Name : Ramdev swami</div>
          <div class="pt_record">
          	<div><strong>Age</strong>&nbsp;:&nbsp;&nbsp;<label for="">38 years</label></div>
            <div><strong>Sex</strong>&nbsp;:&nbsp;&nbsp;<label for="">Male</label></div>
            <div><strong>DOB</strong>&nbsp;:&nbsp;&nbsp;<label for="">13 march,1978</label></div>
            <div>
              <label for id=""></label>
            </div>
          </div>
          <div id="patient_field_name">Contact</div>
          <div class="pt_record">
          <div><strong>Email</strong>&nbsp;:<label for="#">singhrabindra87@gmial.com</label></div>
            <div><strong>Contact No</strong>&nbsp;:&nbsp;&nbsp;<label for="">8285611929</label></div>
            
            <div><strong>Address</strong>&nbsp;:&nbsp;&nbsp;
            	<label for="">Vill:raghunandanpur, po:Turki</label>
                <label for="">Vill:raghunandanpur, ps:Kurki</label>
                <label for="">Vill:raghunandanpur, Dist:Kaimur(bhabua)</label>
                </div>
        </div>
        </div>
    <div class="right-content">
          <div class="right_top"> <span><strong>Billed Items </strong></span> </div>
<div style="">
 <form action="#" method="get">
  <table width="735px" class="thhh">
   <tr class="b">
   	<td><span style="margin-left:10px">1</span></td>
    <td style="width:290px; padding-left:30px;">Dr.R.K.Nag</td>
    <td><label for id="fee">500</label></td>
    <td align="right">%</td>
    <td><input type="text" style="width:50px;" /></td>
    <td><input type="text" /></td>
    <td><a href="receive_payment.html" id="pay1">Pay</a></td>
     </tr>
    <tr class="b">
   	<td><span style="margin-left:10px">2</span></td>
    <td style="width:290px; padding-left:30px;">Dr.R.K.Nag</td>
    <td><label for id="fee">500</label></td>
    <td align="right">%</td>
    <td><input type="text" style="width:50px;" /></td>
    <td><input type="text" /></td>
    <td><a href="receive_payment.html" id="pay1">Pay</a></td>
     </tr>
     <tr class="b">
   	<td><span style="margin-left:10px">3</span></td>
    <td style="width:290px; padding-left:30px;">Dr.R.K.Nag</td>
    <td><label for id="fee">500</label></td>
    <td align="right">%</td>
    <td><input type="text" style="width:50px;" /></td>
    <td><input type="text" /></td>
    <td><a href="receive_payment.html" id="pay1">Pay</a></td>
     </tr>
     <tr class="b">
   	<td><span style="margin-left:10px">4</span></td>
    <td style="width:290px; padding-left:30px;">Dr.R.K.Nag</td>
    <td><label for id="fee">500</label></td>
    <td align="right">%</td>
    <td><input type="text" style="width:50px;" /></td>
    <td><input type="text" /></td>
    <td><a href="receive_payment.html" id="pay1">Pay</a></td>
     </tr>
     <tr class="b">
   	<td><span style="margin-left:10px">5</span></td>
    <td style="width:290px; padding-left:30px;">Dr.R.K.Nag mbbs bhu varanasibhu varanasibhu varanasi</td>
    <td><label for id="fee">500</label></td>
    <td align="right">%</td>
    <td><input type="text" style="width:50px;" /></td>
    <td><input type="text" /></td>
    <td><a href="receive_payment.html" id="pay1">Pay</a></td>
     </tr>
          </table>
            </form>
      </div>
      
      <div class="right_top"> <span><strong>Pay to Doctor </strong></span> </div>
      <form action="#" method="get">
  <table width="100%" class="thhh">
   <tr class="b">
   	<td><span style="margin-left:10px">Amount</span></td>
    <td><input type="text" style="width:60px;" /></td>
    <td><label for id="fee">Billed Amount:</label></td>
    <td align="right"></td>
    <td>&nbsp;</td>
    <td>490/700</td>
    <td>&nbsp;</td>
     </tr>
     </table>
     </form>
 <script type="text/javascript"> 
<!-- 
function showMe (it, box) { 
var vis = (box.checked) ? "visible" : "hidden"; 
document.getElementById(it).style.visibility = vis;
//document.getElementById(it).style.display = vis;
} 
//--> 
</script>
          <div class="fill_data">
        <div id="bil_id" style="width:736px"> 
        <div style="float:left;">
			<input type="checkbox" name="chk" onclick="showMe('dis', this)"/>&nbsp;&nbsp;&nbsp;Refund
          </div>
          <div id="dis" style=" margin-left:10px; font-style:float:left; width:500px;">
           <span>
    <label for="" style="color:#0000A8">&nbsp;&nbsp;&nbsp;Discount&nbsp;:</label>
           </span> 
				<span><input type="text" placeholder="Amount" style="width:50px;"/></span>          
                <span><input type="text" style="width:300px;" /></span>          
              </div>  

        <div style="float:left; width:130px"> <span>
         <a href="receive_payment.html"> <input type="submit" value="Save" class="btn" /></a>
          </span>
           <span>
             <input type="submit" value="Print"  class="btn"/>
          </span>
           </div>
           	  <div class="cls"></div>
     </div>
 
        </div>
  </div>
  <div class="cls"></div>
    </div>
</div>
</body>
</html>
