
<!DOCTYPE html>
<?php
ob_start();
include("header.php"); 
include("menubar.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Query</title>
    </head>
    <body>
    <center>Submit a query</center>
    <form method="post" enctype="multipart/form-data">
       Enter a claim  id <input type="text" name="search"><input type="submit" name="srch" value="Search">
            
        <p><input type="file" id="query" name="query"><input type="submit" name="sub" value="Send Query"></p>
    </form>
        <?php
        session_start();
        
        require 'condb.php';
       
        if(isset($_POST['srch']))
        {
            $search=$_POST['search'];
           if(!empty($search))
           {
               $sql=mysql_query("select pid from patient_details where pid='$search'");    
             if(mysql_num_rows($sql)==1)
             {
                 $data=mysql_query("select pid from patient_details where pid='$search'");
                  $result=mysql_fetch_array($data);
                  $c_id= $result[0];
                 $_SESSION['c_id']=$c_id;
                 echo 'Claim id found ['.$c_id.']';
             }
 else {
     echo 'No claim id found';
     unset($_SESSION['c_id']);
 }
               
           }
           else
           {
               echo 'Please enter Clain id ';
           }   
        }
        
        if(isset($_POST['sub']))
       {
           $name=$_FILES['query']['name'];
           $type=$_FILES['query']['type'];
           $tmp_name=$_FILES['query']['tmp_name'];
           
           if(!empty($name))
           {
           $destination ="query";
           $c_id=$_SESSION['c_id'];
           move_uploaded_file($tmp_name,"$destination/".$name);
           $query="$destination/".$name;
           mysql_query("insert into query values('NULL','$c_id','$query','NULL')")or die(mysql_error());
           echo 'Your Query has been uploaded';
           
           }
           else
           {
               echo 'Upload a query first';
           }
           
          
       }
        
       
?>
    <p>Reply a Query</p> 
<?php
  $sql=mysql_query("select * from query ")or die(mysql_error());
  while($d=mysql_fetch_array($sql))
  {
    
?>
    
    Claim id<a href="reply.php?cid=<?php echo $d[1]; ?>" onclick="javascript:void window.open('reply.php?cid=<?php echo $d[1]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" > <?php  echo   $d[1]; ?></a>
    <a href="view_reply.php?cid=<?php echo $d[1]; ?>" onclick="javascript:void window.open('view_reply.php?cid=<?php echo $d[1]; ?>','1384252115538','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">  View Reply</a>

    <br/> 
    
    
    <?php  
}

?>
    </body>
</html>
