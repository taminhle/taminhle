<?php 
session_start();
 require("templates/header.php");
 $product_id=$_GET['product_id'];
 if (isset($_SESSION['cart'][$product_id])) {
 	$soluong=$_SESSION['cart'][$product_id];
 }else{
 	 $soluong=1;
 }

$_SESSION['cart'][$product_id]=$soluong;
header("location:cart.php");
exit();
 ?>