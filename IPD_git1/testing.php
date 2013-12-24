<?php
/**
 * Created by JetBrains PhpStorm.
 * User: I B M
 * Date: 8/23/13
 * Time: 3:05 PM
 * To change this template use File | Settings | File Templates.
 */
session_start();
$v_id=$_SESSION['visit_id'];
$i = $_SESSION['sum_amount'];
$p_id=$_SESSION['p_id'];
$b_id=$_SESSION['b_id'];
echo "This is session  $v_id";
echo '<br>';
echo "This is due amount $i";

echo '<br>';
echo "This is p_id $p_id";


echo '<br>';
echo "This is biil_id $b_id";

