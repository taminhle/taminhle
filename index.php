<?php 
session_start();
require("templates/header.php");


 ?>
<div id="slider">
  <div id="all-picture">
     <div class="iamge"><img src="images/sp1.png"></div>
      <div class="iamge"><img src="images/sp2.jpg"></div>
      <div class="iamge"><img src="images/sp3.jpg"></div>
      <div class="iamge"><img src="images/sp4.jpg"></div>
  </div>
     

</div>
<br/>
         
         <div id="main-right">
                 <h3 style="color: #f00;margin-top: 20px;">Sản Phẩm Bia</h3>
         	  <div id="product-bia">
                <?php 
                   // mo ket noi csdl
                require("library/config.php");
                $result=mysqli_query($conn,"SELECT product_id,title_product,image,price FROM product where cate_id=1 order by product_id desc limit 6");
               while ( $data=mysqli_fetch_assoc($result)) {
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
                <h3 style="color: #f00;margin-top: 20px;">Nước Ngọt</h3><hr>
                   <div id="product-bia">
                    <?php 
                    require("library/config.php");
                $result2=mysqli_query($conn,"SELECT  product_id,title_product,image,price FROM  product  where cate_id=2 order by product_id desc limit 6");
              while ($data2=mysqli_fetch_assoc($result2)) {         
                      echo"<ul>";
                       echo"<li>";
                        echo"<div class='content'>";
                            echo"<a href='detail.php?product_id=$data2[product_id]'>";
                            echo"<img src='images/$data2[image]'>";
                            echo"<p class='title'>$data2[title_product]</p>";
                            echo"<p class='price'>".number_format($data2['price'])."</p>";
                            echo"</a>";
                         echo"</div>";
                         echo"</li>";     
                         echo"</ul>";
                } 

                         mysqli_close($conn);
                     ?>
     	        
              </div>

         </div>
        
        <div id="main-left">
        	<div id="quangcao">
            <ul>
                <li><img src="images/giay-converse-.jpg" width="210" height="300"></li>
                <li><img src="images/giay-the-thao-nam-nike.jpg" width="210" height="300"></li>
                <li><img src="images/giay-the-thao.jpg" width="210" height="300"></li>
                <li><img src="images/giay_the_thao_nu.jpg" width="210" height="300"></li>
            </ul>         
        	</div>
        </div>
        <div style="clear: both;"></div>


<?php 
require("templates/footer.php");
 ?>

 