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
$sql=  mysql_query("select data_mx from user_priv where user_id='$uid' ")or die(mysql_error());
$ft=  mysql_fetch_array($sql);
$db=$ft['data_mx'];
if($db==0)
{
    echo 'You are not Authorized to access this page ';
    exit();
}


include("header.php");
include("menubar.php");

error_reporting(0);
if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo $message;
}
?>
  <div id="opd_bill" style="height:20px;">
   		<div style="float:left">
            <a href="#" class="ch"><strong>Procedure Rate</strong></a>
        </div>
        <div class="add-doc_change" style="float:right"><img src="plus.png" align="absmiddle" />
      	<a href="procedure_info.php" class="ch"><strong>Add New procedure </strong></a>
        </div>

        <div class="'cls"></div>
   </div>
   <div style="padding:5px; background:#CAE4FF" class="bg_head"> 
   		<span><img src="searchesimg.png" align="absmiddle" />
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="srch_txt" class="i" placeholder="Enter a procedure" />
            <input type="submit" name="srch" value="Search">
            </form>
            </span>
            <span style="margin-left:240px;"><strong></strong>
        <form  action="procedure-list.php" method="post">
            <select name="spanel" style="width:160px; height:20px; margin-left:0px;"/>
                <option value="">Select Panel</option>
               <?php
               $sel=  mysql_query("select pn_cash_corp from proc_info group by pn_cash_corp");
               while ($ob=  mysql_fetch_object($sel)) {
                   echo "<option>{$ob->pn_cash_corp}</option>";
               }
               
               ?>
        </select>
        
        
<span style="float:right"><strong></strong>
       
<select name="stype" style="width:160px; height:20px; margin-left:0px;"/>
<option value="">Select Category</option>
            <?php
           
            $select=("SELECT * FROM proc_info group by type");
            $query=mysql_query($select)or die(mysql_error());
            while($op=mysql_fetch_array($query)){

            echo '<option>'.$op[2].'</option>';

}
            ?>
        </select>
        <input type="submit" name="select" value="Select" class="btn"/>
  
        </span>
    </form>      

  </div>
        
            
  <div id="main_center_container">
  <div style="float:left; width:990px;">
  	

<?php
error_reporting(0);
session_start();
include 'condb.php';
//IF SUBMIT BUTTON CLICKED
$stype=$_POST['stype'];
$spanel=$_POST['spanel'];



?>
       
<!--------HERE------------->

<?php
if (isset($_POST['select'])) {

    if(!empty($stype) AND empty($stype))
    {
$selectt=  mysql_query("SELECT  * FROM `proc_info` where type='$stype' ");
echo  "<table><th>Procedure</th><th>Type</th><th>Room</th><th>Rate</th>";
while ($qq=  mysql_fetch_array($selectt)) 
                {
  $pid=$qq['pid'];
  $selector=  mysql_query("SELECT  * FROM `procedure_room_rate` where pid='$pid' ")or die(mysql_error());
    
       
    echo "<tr><td>{$qq['p_name']}</td> <td>{$qq['type']}</td>";
  
   while ($qq2=  mysql_fetch_array($selector)) {
    
  
    
    
    echo "<td>{$qq2['room_type']}</td> <td>{$qq2['charges']}</td></tr>";
    
    
    }
    
    
    }
    echo "</table>";
    }
    if(!empty($spanel) AND empty($stype))
    {
$selectp=  mysql_query("SELECT  * FROM `proc_info` where pn_cash_corp='$spanel' ");

while ($qq=  mysql_fetch_array($selectp)) 
                {
  $pid=$qq['pid'];
  echo  "<table><th>Procedure</th><th>Type</th><th>Room</th><th>Rate</th><tr>";
  $selector=  mysql_query("SELECT  * FROM `procedure_room_rate` where pid='$pid' ")or die(mysql_error());
    
       
    echo "<td>{$qq['p_name']}</td> <td>{$qq['type']}</td>";
  
   while ($qq2=  mysql_fetch_array($selector)) {
    
  
    
    
    echo "<td>{$qq2['room_type']}</td> <td>{$qq2['charges']}</td>";
    
    
    }
    
    
    }
    echo "</tr></table>";    


    }
   
    
    if(!empty($spanel) AND !empty($stype))
    {
$selectb=  mysql_query("SELECT  * FROM `proc_info` where pn_cash_corp='$spanel' AND type='$stype' ");


while ($qq=  mysql_fetch_array($selectb)) 
                {
  $pid=$qq['pid'];
  echo  "<table><th>Procedure</th><th>Type</th><th>Room</th><th>Rate</th><tr>";
  $selector=  mysql_query("SELECT  * FROM `procedure_room_rate` where pid='$pid' ")or die(mysql_error());
    
       
    echo "<td>{$qq['p_name']}</td> <td>{$qq['type']}</td>";
  
   while ($qq2=  mysql_fetch_array($selector)) {
    
  
    
    
    echo "<td>{$qq2['room_type']}</td> <td>{$qq2['charges']}</td>";
    
    
    }
    
    
    }
    echo "</tr></table>";    




    }

}
if(isset($_POST['srch']))
{
    $srch_txt=$_POST['srch_txt'];
    if(!empty($srch_txt))
    {
$selectb=  mysql_query("SELECT  * FROM `proc_info` where p_name like'%".$srch_txt."%'  ");


while ($qq=  mysql_fetch_array($selectb)) 
                {
  $pid=$qq['pid'];
  echo  "<table><th>Procedure</th><th>Type</th><th>Room</th><th>Rate</th><tr>";
  $selector=  mysql_query("SELECT  * FROM `procedure_room_rate` where pid='$pid' ")or die(mysql_error());
    
       
    echo "<td>{$qq['p_name']}</td> <td>{$qq['type']}</td>";
  
   while ($qq2=  mysql_fetch_array($selector)) {
    
  
    
    
    echo "<td>{$qq2['room_type']}</td> <td>{$qq2['charges']}</td>";
    
    
    }
    
    
    }
    echo "</tr></table>";    




    }
        
    
    else
    {
        echo "Please enter a search word";
    }
}




?>



<div class="cls"></div>
             </div>

 
