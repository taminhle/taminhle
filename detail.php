<?php
session_start(); 
 require("templates/header.php");

 $product_id=$_GET['product_id'];


 ?>


  <div id="detail">
  	<?php  
            // mo ket noi csdl
      	require("library/config.php");
        // thuc hien cau truy van 
        $result=mysqli_query($conn,"SELECT image,title_product,price FROM product where product_id=$product_id");
           $data=mysqli_fetch_assoc($result);
         echo"<img src='images/$data[image]'>";
      	 echo"<div id='info'>";
      	 echo"<h1>$data[title_product]</h1>";
      	 echo"<p>Gia:".number_format($data['price'])."VND</p><br/>";
      	 echo"<a href='add_cart.php?product_id=$product_id'>Mua hang</a>";
      	 echo"</div>";
      	?>
  </div>

<div style="clear: both;"></div>
<!-- 
phan binh luan --> 

<?php 
require("templates/footer.php");
 ?>
