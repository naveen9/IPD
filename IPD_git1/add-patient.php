<title>Consultation</title>
<body>
<div id="container">
<?php
error_reporting(0);
include("header.php");
include("menubar.php");
include("condb.php");


if($_REQUEST['error_msg'])
{
    $message=$_REQUEST['error_msg'];
    echo $message;
}
?>





<div id="opd_bill" style="height:20px;">
    <div style="float:left">
        <span class="p_adding">ADMISSION</span>
    </div>
    <div style="float:right; margin-right:10px;">
        <a href="patient-demographics.html"><img src="man.png"  width="20" height="20" align="absbottom"/>Demographics</a>
    </div>
</div>

<div id="main_center_container">
    <div class="record_feed">

        <form method="post" action="search_add-patient.php">

            <div id="search_exist">
                <div id="search_txt" class="p_adding">Search Existing Patient</div>
                <div class="p_adding">
                    <span><input type="text" name="search" placeholder="PID/Name/Ph/Email" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();"  /></span>
                    <span><input type="submit" name="find" value="Search" class="btn"/></span>
                    <div align="left" class="suggestionsBox1" id="suggestions1" style="display:none;">
                        <div align="left" class="suggestionList1" id="autoSuggestionsList1">
                        </div>
                    </div>
                </div>
            </div>


        </form>

        <form method="post" name="form1" action="create_vid.php">
            <div id="add_new_patient">
                <div id="add_txt">Add New Patient</div>
                <div>

                    <strong>Name</strong>

                    <input type="text" name="name" value="<?php echo $_SESSION['p_name'];?>"/>

                    <strong>Age&nbsp;</strong>

                    <input type="text" name="age" maxlength="3" class="size_box" id="txtChar" value="<?php echo $_SESSION['p_age'];?>" style="width:50px;" />




                    <input type="radio" name="gender" value="M" checked <?php if($_SESSION['p_gender']=='M'){echo "checked";} ?>/><strong>M</strong>
                    <input type="radio" name="gender" value="F" <?php if($_SESSION['p_gender']=='F'){echo "checked";} ?>/><strong>F</strong>

                    <strong>Phone&nbsp;</strong>

                    <input type="text" name="phone" maxlength="10" class="size_input" id="txtChar" style="width:90px;" value="<?php echo $_SESSION['p_mob'];?>" />
                    <?php $pid= $_SESSION['p_id'];?>
                    <strong>Marital Status&nbsp;</strong>


                    <?php //echo  $_SESSION['p_email'];?>

                    <input type="submit" name="create_visit_id" value="CreateVisitID" class="btn"/>
                </div>
                <!--
                	
                -->

                <div class="cls"></div>
            </div>

    </div>

    <div class="cls"></div>
</div>

<div class="category">
    <div style="width:300px; float:left; ">
        <span id="cate"><strong>Category</strong></span>
            <span style="margin-left:15px;"><input type="radio" name="category" checked="checked" />
                <strong>General</strong></span>
        <span><input type="radio" name="category" /><strong>Emergency</strong></span>
    </div>
    <div style="width:150px; float:left;margin-left:50px;">
        <span><strong>Patient ID :</strong></span>
        <span><label for> <?php echo $_SESSION['p_id']; ?></label></span>
    </div>
    <div style="width:298px; float:right;  margin-left:50px;">
        <span style="margin-left:0px;"><strong>Visit Id :</strong></span>
            <span>
			<?php echo $_SESSION['v_id']; ?>
            </span>
    </div>
    <div class="cls"></div>
</div>
</form>


</div>


</body>
</div>
</form>
</body>
</html>
