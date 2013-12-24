<?php
error_reporting(0);
/**
 * Created by JetBrains PhpStorm.
 * User: Sameer
 * Date: 7/13/13
 * Time: 2:17 PM
 * Facebook:- www.facebook.com/sam0hack
 * Email:- sam.nyx@live.com
 */
?>
<title>Medicine</title>


<body>
<div id="container">
    <?php
    session_start();
    //error_reporting(0);
    include("header.php");
    include("menubar.php");
    include("condb.php");

    if($_REQUEST['error_msg'])
    {
        $message=$_REQUEST['error_msg'];
        echo '<h1 style="font-size:20px; color:red;">'.$message.'</h1>';
    }
    if($_REQUEST['error_msg1'])
    {
        $message=$_REQUEST['error_msg1'];
        echo '<h1 style="font-size:20px; color:blue;">'.$message.'</h1>';

    }
    ?>


    


<div id="opd_bill" style="height:20px;">
    <div style="float:left">
        <span class="p_adding">Medicine</span>
    </div>
    <div style="float:right; margin-right:10px;">
            <div style="width:150px; float:left;margin-left:0px;">
            <span><strong>Patient ID :</strong></span>
            <span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
        </div>

        <div style="width:150px; float:left;margin-left:20px;">
            <span><strong>Patient Name:</strong></span>
            <span><label for> <?php echo $_SESSION['p_name']; ?></label></span>
        </div>



        <div style="width:150px; float:left;margin-left:20px;">
            <span><strong>Bed No:</strong></span>
            <span><label for> <?php echo $_SESSION['bed_no']; ?></label></span>
        </div>

        <div style="width:118px; float:left;  margin-left:20px;">
            <span style="margin-left:0px;"><strong>IP Id :</strong></span>
            <span><label for> <?php echo $_SESSION['v_id']; ?></label></span>
        </div>
        
        <div class="cls"></div>

    </div>
</div>

    

    <div id="main_center_container">
    
<div class="miscel_charge">
      <ul class="visit_sum">
                            <li><a href="s_search1.php">Visit</a></li>
            <li><a href="s_search11.php">Procedure</a></li>
            <li><a href="s_search2.php">Diagnosis</a></li>
            <li><a href="s_search.php">Miscellaneous Charges</a></li>
            
                   <li><a href="s_madison_search.php">Consumamble</a></li>
                   <li><a href="s_search_operation_theater.php">Operation theator</a></li>
                   <li><a href="s_search_ip-management.php">Room Management</a></li>
                   <li><a href="s_receive_payment_search1.php">Receive Payment</a></li>
<!--                   <li><a href="ipd_visit_summary.php">Search Patient</a></li>-->
                   <li><a href="s_opd-visit-summary.php">Payment summary</a></li>
                   <li><a href="s_clienthome.php">Patient document</a></li>
                </ul>
    <div class="cls" style="height:2px;"></div> 
                <div class="cls"></div>
        </div>
        


    <form method="post" action="s_medicine_add1.php">
        <div id="opd_bill">
            <span class="p_adding"><strong>Add Medicine Details</strong></span>
        </div>
        <?php echo $_SESSION['error']; ?>
        <div style="overflow-y:scroll; overflow-x:hidden; height:250px; padding-left:5px;">
            <div class="consult_head">

                <div style=" background:lightgray; padding: 10px "><?php $dom=$_SESSION['dom'];
                if( empty($dom))
                {
                    ?><span><input type="date" name="dom"  /></span></div>
                <?php
            }
                else
                { 
                    ?>
                    <span><input type="text" name="dom" value="<?php echo $dom ;?>" /></span></div>
                <?php
                }
                ?>
            
                 <div style="width:100%; background:#a1b2c3; height:20px; padding:5px 0px; margin-bottom: 15px;">
                    <div style="float:left; width:180px; margin-right:5px;"><strong>Medicine Name</strong></div>
                    <div style="float:left; width:100px; "><strong>Batch No</strong></div>
                    <div style="float:left; width:100px; "><strong>UnitMRP(Rs)</strong></div>
                    <div style="float:left; width:100px; "><strong>Quantity</strong></div>
                    
                    <div style="float:left; width:175px; "><strong>Exp Date</strong></div>
                    <div style="float:left; width:100px;"><strong>Tax(%)</strong></div>
                    <div style="float:left; width:100px; text-align:center"><strong>Total</strong></div>
                    <div style="float:left; width:100px; text-align: center "><strong>Add</strong></div>
                </div>
                <div class="cls" style="margin-bottom:5px;"></div>
                <div style="float:left; width:180px;"><input name="m_name" type="text" id="inputStringM" onKeyUp="lookupM(this.value);" ></div>
                <!--<div style="float:left; width:180px;"><input name="m_name" type="text" ></div>-->
                <div style="float:left; width:100px; "><input type="text" name="batch_no" id="batch_no" class="jag_txt1" style="width:75px" /></div>
                <div style="float:left; width:100px; "><input type="text" name="mrp" id="mrp" class="jag_txt1"  style="width:75px" /></div>
                <div style="float:left; width:100px; "><input type="text" name="quantity" id="packs" class="jag_txt1"  style="width:75px" /></div>
                
                <div style="float:left; width:175px; "><input type="text" name="exp_date" id="exp_date"  class="jag_txt1"/></div>
                <div style="float:left; width:100px;"><input type="text" name="tax" id="tax" class="jag_txt1"  style="width:70px" /></div>
                <div style="float:left; width:100px; text-align: center"><span>&nbsp;</span></div>
                <div style="float:left; width:80px; text-align:center;"><input type="submit" name="add" value="Add" class="btn"" /></div>
                
                <div class="cls" style=" margin-bottom:15px;">
				</div>
				    <div align="left" class="suggestionsBoxM" id="suggestionsM" style="display:none;">
                <div align="left" class="suggestionListM" id="autoSuggestionsListM">
				</div>
				</div>
				
				
				
            </div>
            <div class="cls"></div>
            <?php
            $p_id=$_SESSION['p_id'];
            $b_id=$_SESSION['b_id'];

            $sql=mysql_query("select * from patient_medicine where p_id='$p_id'and bill_id='$b_id'")or die(mysql_error());
            while($data=mysql_fetch_array($sql))
            {
                ?>

                <div style="float:left; width:180px; text-align:left"><?php echo $data[7]; ?></div>
                <div style="float:left; width:80px; text-align: center "><?php echo $data[8]; ?></div>
                <div style="float:left; width:80px;  text-align: center"><?php echo $data[9]; ?></div>
                
                <div style="float:left; width:100px;  text-align: center"><?php echo $data[11]; ?></div>
                <div style="float:left; width:195px; text-align:center;"><?php echo $data[12]; ?></div>
                <div style="float:left; width:120px;  text-align:center;"><?php echo $data[13]; ?></div>
                <div style="float:left; width:100px; text-align:center;"><span><?php echo $data[14]; ?></span></div>
                <div style="float:left; width:110px; text-align:center; "><a href="s_medicine_add1.php?delete=<?php echo $data[0]; ?>">Delete</a></div>
                <div class="cls" style="margin:40px 0px; background: red"></div>
            <?php
            }
            ?>

        </div>




        <div style="background: #a1b2c3; padding: 4px 5px;">
            <div id="bil_id" style="width:200px; background:#a1b2c3; float: left;">
                <h3>Sub Total: <?php $st=mysql_query("select SUM(sub_total) from patient_medicine where p_id='$p_id'and bill_id='$b_id' ")or die(mysql_error());
                    $sub_total=mysql_fetch_array($st);
                    echo $sub_total[0];
                    $_SESSION['sub_total']=$sub_total[0];

                    ?></h3>

                <span><label for=""><?php echo $current_date;?></label></span>
            </div>

            <div style="float: right;" >
                <span ><input type="submit" name="newe" value="Save and add New" class="btn" /></span>
<span><input type="submit" name="cancel" value="Cancel" class="btn" />
    <!--<span><input type="submit" name="print" value="Print" class="btn" />-->
</span>
            </div>
            <div class="cls"></div>
        </div>
</div>


</body>
</div>


</form>
</body>
</html>
