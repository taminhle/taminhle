<?php 
session_start();
$product_id=$_GET['product_id'];
unset($_SESSION['cart'][$product_id]);
header("location:cart.php");
exit();

 ?>