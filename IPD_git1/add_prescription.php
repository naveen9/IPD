	<?php 
	error_reporting(0);
	include("header.php");
	include("menubar.php");
	 ?>
	
	<style type="text/css">
.spa {
	width:120px;
}
.pa {
	width:40px;
}
th {
	border-bottom:1px solid;
}
td {
	border-bottom:1px solid;
	padding:10px 0px;
}
</style>
	

	
  
      <div id="opd_bill"> <span></span> </div>
<div style="width:100%; margin:0 auto;">
 <div class="pateint_resume">
          <div>
            <div class="bg_head"><strong>Patient ID :</strong></div>
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
    <div class="main_right_content">
          <div style="height:25px; padding-top:5px;" class="bg_head">  <span><strong>Add Prescriptions</strong></span> <span style="float:right;">Go to:
              <select style="width:160px; height:20px; margin-left:0px;"/>
          
            <option value="volvo">......................</option>
            </select>
            </span> </div>
          <div style="border-bottom:1px solid lightgray; padding:10px 5px;"> <span style="margin-left:250px;"><strong>Template:</strong>
              <select style="width:160px; height:20px; margin-left:0px;"/>
          
            <option value="volvo">......................</option>
            </select>
            </span> <span style=" margin-left:100px; color:#0066FF;"><strong>History:</strong>
            <select style="width:160px; height:20px; margin-left:0px;"/>
            
            <option value="volvo">......................</option>
            </select>
            </span> </div>
          
          <div id="pur_menu">
               <ul>
               <li><a href="#" id="pr">Drugs</a>
               		 <ul>
                    	<li><a href="#">Convenience</a></li>
                        <li><a href="#">Designation</a></li>
                        <li><a href="#">Procedure</a></li>
                        <li><a href="#">Health package</a></li>
                    </ul>
               </li>
               <li><a href="#" id="pu">Symptoms</a></li>
               <li><a href="#" id="pa">Diagnosis</a></li>
               <li><a href="#" id="pr">Bed Charges/Transfer</a></li>
               <li><a href="#" id="pu">Examination</a></li>
               <li><a href="#" id="pu">Investigation</a></li>
               </ul>
       </div>


          
          
          <div id="pro">
        <div><span><strong>Consultation</strong></span><span>
          <label for id="">on 06 apr </label>
          </span></div>
        <form>
              <table width="1000" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                  <tr class="r_border">
                <th>Medicine</th>
                <th>Start Date</th>
                <th>No Of Days </th>
                <th>End Date</th>
                <th>Dose</th>
                <th>No of times in a day</th>
                <th>Remarks</th>
                <th>Delete?</th>
              </tr>
                  <tr class=" even">
                <td><input type="text" class="spa" /></td>
                <td><input type="date"  class="spa" id="txtChar" onkeypress="return validateNumbersOnly(event)" /></td>
                <td><input type="text"  class="pa" id="txtChar" onkeypress="return validateNumbersOnly(event)" /></td>
                <td><input type="text"  class="spa" id="txtChar" onkeypress="return validateNumbersOnly(event)"/></td>
                <td><input type="text"  class="spa" id="txtChar" onkeypress="return validateNumbersOnly(event)"/></td>
                <td><select style="width:110px; height:20px; margin-left:0px;"/>
                  
                      <option value="volvo">......................</option>
                      </select></td>
                <td><textarea  class="spa"></textarea></td>
                <td>Delete?</td>
              </tr>
                  <tr class="odd">
                <td><input type="text" class="spa" /></td>
                <td><input type="date"  class="spa" /></td>
                <td><input type="text"  class="pa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><select style="width:110px; height:20px; margin-left:0px;"/>
                  
                      <option value="volvo">......................</option>
                      </select></td>
                <td><textarea  class="spa"></textarea></td>
                <td>Delete?</td>
              </tr>
                  <tr class=" even">
                <td><input type="text" class="spa" /></td>
                <td><input type="date"  class="spa" /></td>
                <td><input type="text"  class="pa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><select style="width:110px; height:20px; margin-left:0px;"/>
                  
                      <option value="volvo">......................</option>
                      </select></td>
                <td><textarea  class="spa"></textarea></td>
                <td>Delete?</td>
              </tr>
                  <tr class="odd">
                <td><input type="text" class="spa" /></td>
                <td><input type="date"  class="spa" /></td>
                <td><input type="text"  class="pa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><select style="width:110px; height:20px; margin-left:0px;"/>
                  
                      <option value="volvo">......................</option>
                      </select></td>
                <td><textarea  class="spa"></textarea></td>
                <td>Delete?</td>
              </tr>
                  <tr class=" even">
                <td><input type="text" class="spa" /></td>
                <td><input type="date"  class="spa" /></td>
                <td><input type="text"  class="pa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><input type="text"  class="spa" /></td>
                <td><select style="width:110px; height:20px; margin-left:0px;"/>
                  
                      <option value="volvo">......................</option>
                      </select></td>
                <td><textarea  class="spa"></textarea></td>
                <td>Delete?</td>
              </tr>
                  <tr class="odd">
                <td><strong>Advice</strong></td>
                <td><textarea class="spa" />
                      </textarea></td>
                <td><textarea class="spa" />
                      </textarea></td>
                <td><textarea class="spa" />
                      </textarea></td>
                <td><textarea class="spa" />
                      </textarea></td>
                <td><textarea class="spa" />
                      </textarea></td>
              </tr>
                  <tr>
                <td>Next Appointment</td>
                <td><input type="text" /></td>
              </tr>
                </tbody>
          </table>
            </form>
      </div>
          <div id="pur">
        <p>No purchases made against this account</p>
      </div>
          <div id="pay">
        <p>No payments received till now</p>
      </div>
        </div>
  </div>
    </div>

</body>
</html>
