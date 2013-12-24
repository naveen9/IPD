<?php
require 'condb.php';
$cid=$_REQUEST['cid'];
?>
<center><h2>Reply</h2></center>
<form method="post" enctype="multipart/form-data">
    <input type="file" multiple="true" name="myfile[]">
    <input type="submit" name="sub" value="Send">
    
</form>
<?php
if(isset($_POST['sub']))
{
    $name=$_FILES['myfile']['name'];
    
   if(!empty($name))
   {
       foreach ($name as $key => $value) {
           
           
           
               
          $fname=$_FILES['myfile']['name'][$key];

           $tmp_name=$_FILES['myfile']['tmp_name'][$key];
           $error=$_FILES['myfile']['error'][$key];
           $desc="query";
               
           
           
           move_uploaded_file($tmp_name, "$desc/".$fname);
           mysql_query("insert into query_reply values('NULL','$cid','$fname')");    
           echo 'Reply has been send';
           
       } 
       
       
       
   }
 else {
       
   echo 'Choose file';
     
 }
}

