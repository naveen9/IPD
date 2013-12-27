<?php
ob_start();
session_start();
require 'condb.php';
$session_id=$_SESSION['session_id'];
if(empty($session_id))
{
    header("location:index.php");
}
 else {
$query=mysql_query("select `usertype` from `user_data` where `id`='$session_id' AND `usertype`='admin'")or die( mysql_error());
     if(mysql_num_rows($query)==0)
     {
echo $session_id; 

   header("location: index.php?error_msg=".urlencode("Something went wrong"));       
     }
 else {
         
     ?>
<h1 style="float: left;  "><a href="User_veri.php">Go back</a></h1>
<hr>

<center><h2 style="color:  tomato">User Privileges settings</h2></center>
<hr>

<table border="1" bordercolor="lightgreen" style="background-color: olivedrab; color: white " width="100%" cellpadding="3" cellspacing="3">
  <tr>
    <th>User List</th>
                <th>Default Page</th>
                <th>Dashboard</th>
                <th>Reception</th>
                <th>IPD billings</th>
                <th>Pharmacy</th>
                <th>Diagnostics</th>
                <th>Inventory</th>
                <th>Accountings</th>
                <th>Data MX</th>
                <th>MIS</th>
                <th>Hosp Admin</th>
                <th>Med.Records</th>
                <th>Claims</th>
                <th>Update</th>
  </tr>
  
  <?php
        $sql=  mysql_query("select name,id from user_data where verify=1 AND username!='admin'");
       $i=0;
        while ($n=  mysql_fetch_array($sql))
        {
            $ids=$n['id'];
        ?>
        <tr>    
<form method="post">
    <input type="hidden" name="cval" value="<?php echo $ids; ?>">
        
        
            <?php $chk=  mysql_query("select * from user_priv where user_id='$ids'")or die(mysql_error());
                    $fet=  mysql_fetch_array($chk);
                    $dbrd=$fet['dashboard'];
                    $recp=$fet['reception'];
                    $ipd_bil=$fet['ipd_billing'];
                    $phar=$fet['pharmacy'];
                    $diag=$fet['diagnostics'];
                    $invent=$fet['inventory'];
                    $account=$fet['accounting'];
                    $datamx=$fet['data_mx'];
                    $mis=$fet['mis'];
                    $hospad=$fet['hosp_admin'];
                    $med=$fet['med_records'];
                    $claims=$fet['claim'];
                    $dfpage=$fet['default_page'];
                    $dflink=$fet['default_link'];
                    
                    
                    $seldf=  mysql_query("select * from df_pages where link='$dflink'");
                    $ftdf=  mysql_fetch_array($seldf);
                    $dfp2=$ftdf['name'];
                    $dflink2=$ftdf['link']
                    ?>
                <td><?php  echo $n['name']; ?></td>
                <td><select name="df">
                   
                    <?php
                    
                    if($dfp2!="")
                    {
                        echo '<option value="'.$dflink2.'">'.$dfp2.'</option>';
                    }
                     echo '<option value="0">Select Page</option>';
                     $get_page=  mysql_query("select * from df_pages where name!='$dfpage'")or die(mysql_error());
                    while ($page=mysql_fetch_array($get_page)) { 
                       
                        echo '<option value="'.$page['link'].'">'.$page['name'].'</option>';
                        
                    }
?>
                
                    
                    </select></td>
                    
                    
                    <td><input type="checkbox"  name="dashboard" <?php if($dbrd==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="reception" <?php if($recp==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="ipd" <?php if($ipd_bil==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="pharmacy" <?php if($phar==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="diagnostics" <?php if($diag==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="inventory" <?php if($invent==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="accounting" <?php if($account==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="data_mx" <?php if($datamx==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="mis" <?php if($mis==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="hosp_admin" <?php if($hospad==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="med_records" <?php if($med==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="checkbox"  name="claims" <?php if($claims==1) { echo  'checked="yes"'; } ?>></td>
                    <td><input type="submit" name="sub" value="Update"></td>
                    
</form>                
        </tr> 
        
        <?php $i++; } ?>
        
</table>


         <?php
     
 }
     if(isset($_POST['sub']))
     {
     
          $cval=$_POST['cval'];//Unique Id
          $df=$_POST['df'];//Page Link
          $dboard=$_POST['dashboard'];
          $recpti=$_POST['reception'];
          $ipd=$_POST['ipd'];
          $pharmacy=$_POST['pharmacy'];
          $diagnostics=$_POST['diagnostics'];
          $inventory=$_POST['inventory'];
          $accounting=$_POST['accounting'];
          $datamx=$_POST['data_mx'];
          $mis=$_POST['mis'];
          $hosp_admin=$_POST['hosp_admin'];
          $med_records=$_POST['med_records'];
          $claims=$_POST['claims'];
             
          
          
      if($df!='0')
 {
    mysql_query("update user_priv set default_link='$df' where user_id='$cval'");
      mysql_query("update user_data set default_link='$df' where id='$cval'");
  header('location:User_man.php');
    
 }    
            
if(!empty($dboard))
              {
                //  echo $dboard;
              mysql_query("update user_priv set dashboard=1 where user_id='$cval'")or die(mysql_error());
               header('location:User_man.php');
              
              }
              else
              {
              mysql_query("update user_priv set dashboard=0 where user_id='$cval'")or die(mysql_error());    
               header('location:User_man.php');
              
              }
                  
                  if(!empty($recpti))
                  {
                      
                       mysql_query("update user_priv set `reception`='1' where user_id='$cval'")or die(mysql_error());
                   header('location:User_man.php');
                       
                  }
                  else
                  {
                      mysql_query("update user_priv set `reception`='0' where user_id='$cval'")or die(mysql_error());
                   header('location:User_man.php');
                      
                  }
                      if(!empty($ipd))
                      {
                       mysql_query("update user_priv set ipd_billing=1 where user_id='$cval'");   
                       header('location:User_man.php');
                       
                      }
                      else
                      {
                       
                          mysql_query("update user_priv set ipd_billing=0 where user_id='$cval'");
                       header('location:User_man.php');
                          
                      }
                          if(!empty($pharmacy))
                          {
                              mysql_query("update user_priv set pharmacy=1 where user_id='$cval'");
                           header('location:User_man.php');
                              
                          }
                          else
                          {
                              mysql_query("update user_priv set pharmacy=0 where user_id='$cval'");
                           header('location:User_man.php');
                              
                          }
                              if(!empty($diagnostics))
                              {
                                  mysql_query("update user_priv set diagnostics=1 where user_id='$cval'");
                               header('location:User_man.php');
                                  
                              }
                              else 
                              {
                                  mysql_query("update user_priv set diagnostics=0 where user_id='$cval'");
                               header('location:User_man.php');
                                  
                              }
                                  if(!empty($inventory))
                                  {
                                      mysql_query("update user_priv set inventory=1 where user_id='$cval'");
                                   header('location:User_man.php');
                                      
                                  }
                                  else
                                  {
                                      mysql_query("update user_priv set inventory=0 where user_id='$cval'");
                                   header('location:User_man.php');
                                      
                                  }
                                      if(!empty($accounting))
                                      {
                                          mysql_query("update user_priv set accounting=1 where user_id='$cval'");
                                       header('location:User_man.php');
                                          
                                      }
                                      else
                                      {
                                          mysql_query("update user_priv set accounting=0 where user_id='$cval'");
                                       header('location:User_man.php');
                                          
                                      }
                                          if(!empty($datamx))
                                          {
                                              mysql_query("update user_priv set data_mx=1 where user_id='$cval'");
                                           header('location:User_man.php');
                                              
                                          }
                                          else
                                          {
                                              mysql_query("update user_priv set data_mx=0 where user_id='$cval'");
                                           header('location:User_man.php');
                                              
                                          }
                                              if(!empty($mis))
                                              {
                                                  mysql_query("update user_priv set mis=1 where user_id='$cval'");
                                               header('location:User_man.php');
                                                  
                                              }
                                              else
                                              {
                                                  mysql_query("update user_priv set mis=0 where user_id='$cval'");
                                               header('location:User_man.php');
                                                  
                                              }
                                                  if(!empty($hosp_admin))
                                                  {
                                                      mysql_query("update user_priv set hosp_admin=1 where user_id='$cval'");
                                                   header('location:User_man.php');
                                                      
                                                  }
                                                  else
                                                  {
                                                      mysql_query("update user_priv set hosp_admin=0 where user_id='$cval'");
                                                   header('location:User_man.php');
                                                      
                                                  }
                                                      if(!empty($med_records))
                                                      {
                                                          mysql_query("update user_priv set med_records=1 where user_id='$cval'");
                                                       header('location:User_man.php');
                                                          
                                                      }
                                                      else
                                                      {
                                                          mysql_query("update user_priv set med_records=0 where user_id='$cval'");
                                                       header('location:User_man.php');
                                                          
                                                      }
                                                          if(!empty($claims))
                                                          {
                                                              mysql_query("update user_priv set claim=1 where user_id='$cval'");
                                                           header('location:User_man.php');
                                                              
                                                          }
                                                          else
                                                          {
                                                              mysql_query("update user_priv set claim=0 where user_id='$cval'");
                                                           header('location:User_man.php');
                                                              
                                                          }
          


//  echo $cval;
          //    mysql_query("update user_priv set default_link='$df' where user_id='$cval'")or die(mysql_error());         
                        
                       
            
          
         }
         
         
     }
     
//           $df;
//           $dboard;
//           $recpti;
//           $ipd;
//           $pharmacy;
//           $accounting;
//           $diagnostics;
//           $inventory;
//           $datamx;
//           $mis;
//           $hosp_admin;
//           $med_records;
//           $claims;
//           
?>