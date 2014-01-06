<script type="text/css">.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEF4;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #006699; color: #FFFFFF; background: none; background-color:#00557F;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }</script>
<style>.datagrid table {  border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #0070A8; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #00496B; border-left: 1px solid #E1EEF4;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEF4; color: #00496B; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEF4;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #006699;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #006699; color: #FFFFFF; background: none; background-color:#00557F;}div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; } 
.scrollit {
    overflow:scroll;
    height:100px;
}
</style>
<script type="text/javascript">
    function close_window() {
       /* Sam js*/
  if (confirm("Close this Window?")) {
    close();
  }
}
</script>  


  <?php
require 'condb.php';
$id=$_REQUEST['did'];



echo ' <center><h3>Update Doctor Info</h3></center>';


//Select all doctor's from doctors master table
$query=mysql_query("SELECT * FROM  `doc_master_table` WHERE varified='yes' AND doc_id='$id' ")or die(mysql_error());
$res=mysql_fetch_row($query);
    $name= $res[1];
    $id= $res[0];
    $mob= $res[2];
    $email= $res[3];
    $gen= $res[4];
    $age= $res[5];
    $address= $res[6];
    $veri= $res[8];
    $spc=$res[7];
    $pan=$res[9];
    $gra=$res[10];
    $opd_time=$res[11];
    echo '<form method="post">';
?>

<div class="datagrid" style="overflow:scroll;height:180px;"><table>
        
<thead><tr><th>Name</th><th>Mobile</th><th>Email</th><th>Gender</th><th>Age</th><th>Address</th><th>Specialization</th><th>Pan</th><th>Graduation</th><th>OPD timing</th></tr></thead>
<!--<tfoot><tr><td colspan="4"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>-->
<tr class="alt"><td><input type="hidden" name="chk" value="<?php echo $id; ?>">
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="name"></td>
<td><input type="text" name="mob" value="<?php echo $mob; ?>" placeholder="Mobile"></td>
<td><input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email"></td>
<td><input type="text" name="gen" value="<?php echo $gen; ?>" placeholder="Gender"></td>
<td><input type="text" name="age" value="<?php echo $age; ?>" placeholder="Age"></td>
<td><input type="text" name="add" value="<?php echo $address; ?>" placeholder="Address"></td>
<td><input type="text" name="spec" value="<?php echo $spc; ?>" placeholder="specialization"></td>
<td><input type="text" name="pan" value="<?php echo $pan; ?>" placeholder="pan"></td>
<td><input type="text" name="gra" value="<?php echo $gra; ?>" placeholder="graduation"></td>
<td><input type="text" name="opdtime" value="<?php echo $opd_time;  ?>" placeholder="d"></td></tr>

<!--<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>-->
<!--<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr class="alt"><td>data</td><td>data</td><td>data</td><td>data</td></tr>
<tr><td>data</td><td>data</td><td>data</td><td>data</td></tr>-->

</table>

    <br/>
<input type="submit" name="sub" value="Update">
    </div>

    <?php
echo '</form>';
if(isset($_POST['sub']))
{
    $chk=$_POST['chk']; 
    $name=$_POST['name']; 
    $mob=$_POST['mob']; 
    $email=$_POST['email']; 
    $gen=$_POST['gen'];
    $age=$_POST['age']; 
    $add=$_POST['add']; 
    $apec=$_POST['spec']; 
    $pan=$_POST['pan']; 
    $gra=$_POST['gra'];
    $opdtime=$_POST['opdtime'];
mysql_query("update doc_master_table set `doc_name`='$name',`doc_mob`='$mob',`doc_email`='$email',`doc_gender`='$gen', `doc_dob`='$age',`doc_address`='$add',`specialization`='$apec',`pan`='$pan',`deegre`='$gra',`opd_time`='$opdtime' where doc_id='$id'")or die(mysql_error());
    
echo "Data Updated</br>";
echo '<a href="#" onclick="close_window();return false;">close</a>';
    
}
    
?>