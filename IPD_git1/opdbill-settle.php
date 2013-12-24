 	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>

<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
  	<div id="opd_bill" style="height:23px;"> 
  		<div class="f_l m_r">Bill Settlement</div> 
        <div class="todate_w f_l m_l">
       	  <input type="radio" name="date" style="margin:0px 15px 0px 20px;" />
        </div>
        <div class="f_l">
        	    <label for="startDate">Date :</label>
			    <input name="startDate" id="startDate" class="date-picker" style=" border-radius:6px; height:20px; border:1px solid lightgray;" />
		</div> 
        <div class="todate_w f_l" style="margin-left:50px;">
           <input type="radio" name="date" style="margin:0px 0px 0px 0px;" />
        </div> 
        <div class="f_l">
        	<input type="date" /></div>
        <div class="todate_w f_l" style="margin:0px 20px 0px 20px;">To</div>
        <div class="f_l"></div> 
        <div class="f_l"><input type="date" /></div>
   </div>
      <div class="right_top" style="background:#F2F2F2;">
       <!--
       <span style="margin-left:-5px;">Beneficiary Name</span>
            <span>
            	<select id="select_size">
                      <option value="volvo">......................</option>
                      
				</select>
            </span>    -->
        <span style="margin-left:740px;"><input type="text" name="search" placeholder="ID/Name/Ph/Email" /></span>
                <span><input type="button" name="search" value="Search" class="btn" /></span>
      </div>
      <div style="width:100%; margin:0 auto;">
      	<div style="background:url(ccc.png) repeat;  height:25px; padding:5px 5px 0px 5px;">
            <div class="l_ft settle"><strong>Visit ID</strong></div>
            <div class="l_ft re_name"><strong>Patient Name</strong></div>
            <div class="l_ft settle"><strong>Total Bill</strong></div>
            <div class="l_ft settle"><strong>Total Payment</strong></div>
            <div class="l_ft settle"><strong>Discount</strong></div>
            <div class="l_ft settle"><strong>Due Amount</strong></div>
            <div class="l_ft re_name"><strong>Receivement Payment</strong></div>

          </div>
           <div class="cls"></div>
            <div style=" height:25px; padding:5px 5px 0px 5px;">        
                <div class="l_ft settle">201</div>
                <div class="l_ft re_name">Rajesh Tiwary</div>
                <div class="l_ft settle">1000</div>
                <div class="l_ft settle">0</div>
                <div class="l_ft settle" style="color:#00F"> Rs 5000</div>
                <div class="l_ft settle">  Rs 4000 </div>
                <div class="l_ft re_name"><a href="receive_payment.html"> Receive payment </a></div>
                <div class="cls"></div>
			</div>
            <div style="background:#E6E6E6;  height:25px; padding:5px 5px 0px 5px;">        
                <div class="l_ft settle">201</div>
                <div class="l_ft re_name">Manoj pandey</div>
                <div class="l_ft settle">4435</div>
                <div class="l_ft settle">1000</div>
                <div class="l_ft settle">50</div>
                <div class="l_ft settle" style="color:#00F">Rs 6000</div>
                <div class="l_ft settle"><a href="receive_payment.html">Receive Payment</a></div>
				<div class="cls"></div>			        
        </div>
  <div class="cls"></div>
  <div style=" height:25px; padding:5px 5px 0px 5px;">        
                <div class="l_ft settle">201</div>
                 <div class="l_ft re_name">rajnath singh</div>
                <div class="l_ft settle">4435</div>
                <div class="l_ft settle">1000</div>
                <div class="l_ft settle">Rs 300</div>
                <div class="l_ft settle" style="color:#00F">Rs 500</div>
                <div class="l_ft settle"><a href="receive_payment.html">Receive Payment</a></div>
                <div class="cls"></div>
			</div>
            <div style="background:#E6E6E6;  height:25px; padding:5px 5px 0px 5px;">        
                <div class="l_ft settle">201</div>
                <div class="l_ft re_name">sameer khan</div>
                <div class="l_ft settle">4435</div>
                <div class="l_ft settle">1000</div>
                <div class="l_ft settle">Rs 100</div>
                <div class="l_ft settle" style="color:#00F">Rs 200</div>
                <div class="l_ft settle"><a href="receive_payment.html">Receive Payment</a></div>
				<div class="cls"></div>			        
        </div>
    </div>
</div>
</body>
</html>

