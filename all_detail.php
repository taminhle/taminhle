<?php 
session_start();
$cate_id=$_GET["cate_id"];

 require("templates/header.php");
 ?>

<div id="product-bia">
                <?php 
                   // mo ket noi csdl
                      require('library/config.php');
             $result=mysqli_query($conn,"SELECT product_id,title_product,image,price FROM product where cate_id = $cate_id order by product_id desc");
             while($data=mysqli_fetch_assoc($result)) {
              echo"<ul>";
                    echo"<li>";
                        echo"<div class='content'>";
                            echo"<a href='detail.php?product_id=$data[product_id]'>";
                              echo"<img src='images/$data[image]'>";
                              echo"<p class='title'>$data[title_product]</p>";
                              echo"<p class='price'>".number_format($data['price'])."</p>";
                            echo"</a>";
                        echo"</div>";
                    echo"</li>";
                 echo"</ul>";
             }
                   mysqli_close($conn);
                
           
                 ?>
     	        
              </div>
     <div style="clear: both;"></div>


 <?php 
require("templates/footer.php");
  ?>