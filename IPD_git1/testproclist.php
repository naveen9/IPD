if (isset($_POST['select'])) {

$select=("SELECT * FROM `procedure` ");
$query=mysql_query($select)or die(mysql_error());


while ($data=mysql_fetch_array($query)) {

echo '<div class="cls"></div>';//MAIN DATA DIV



echo '<div class="l_ft silver_green" style="width:100%">';


    //-----------------------------FOR OPD---------------------------------------------\\
    if(isset($cat)=='opd') {

    echo '<div class="l_ft chk"><input type="checkbox" name="check" checked="checked" style="width:30px;" /></div>';

    //PROCEDURE NAME
    echo '<div class="l_ft d_name_w"><a href="edit-procedure_rate.php?'.$data[0].'">'.$data[1].'</a></div>';

    //OPD RATE
    echo '<div class="l_ft d_name_w">'.$data[4].'</div>';
    //PROCEDURE TYPE

    echo '<div class="l_ft d_name_w">'.$data[2].'</div>';

    //PROCEDURE CATEGORY
    echo '<div class="l_ft">'.$data[3].'</div>';




    echo '</div>';

//echo '</div>';//END MAIN DATA DIV
//echo'</div>';
//echo'</div>';

}
//echo '<div class="cls"></div>';

//--------------------------END OPD----------------------------------------\\

//-----------------------------FOR PRIVATE---------------------------------------------\\
if ($cat=='private') {

echo '<div class="l_ft chk"><input type="checkbox" name="check" checked="checked" style="width:30px;" /></div>';

//PROCEDURE NAME
echo '<div class="l_ft d_name_w"><a href="edit-procedure_rate.php?'.$data[0].'">'.$data[1].'</a></div>';

//OPD RATE
echo '<div class="l_ft d_name_w">'.$data[4].'</div>';
//PROCEDURE TYPE

//echo '<div class="l_ft d_name_w">'.$data[2].'</div>';

//PROCEDURE CATEGORY
echo '<div class="l_ft">'.$data[3].'</div>';




echo '</div>';

//echo '</div>';//END MAIN DATA DIV
//echo'</div>';
//echo'</div>';

}
//echo '<div class="cls"></div>';

//--------------------------END OPD----------------------------------------\\

}
}
?>