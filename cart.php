<?php  
 session_start();

require("templates/header.php");
  $flag=NULL;


 ?>

<div id="cart" style="width: 470px; margin: auto;">
	<?php 
	echo"<table border='1' style='text-align: center; border-collapse: collapse;'>";
	echo"<tr>";
		echo"<th style='width: 60px;'>Xóa</th>";
		echo"<th style='width: 150px;'>Sản phảm</th>";
		echo"<th style='width: 80px;'>Đơn giá</th>";
		echo"<th style='width: 80px;'>Số Lượng</th>";
		echo"<th style='width: 100px;'>Thành tiền</th>";
	echo"</tr>";

        if(!isset($_SESSION['cart'])){// ban dau,neu nguoi dung chua mua hang 
             $flag=false;
              }else{// nguoc lai,neu nguoi dung da mua hang
                foreach($_SESSION['cart'] as $product_id => $soluong) {               
                if(isset($product_id)){  // da mua hang va cac san pham van con trong gia hang
              	$flag=true;
              }else{
                // da nua hang cac san pham da bi xoa het, khong con trong gio hang
                $flag=false;
                }
               }
              }

 
              if($flag==false){
              	echo "<tr>";
              	 echo"<td colspan='5'>giỏ hàng chưa có sản phẩm nào</td>";
              	 echo"</tr>";
              	 echo"</table><a href='index.php'>Trở về trang chủ</a>";
              	
              }else{
          foreach ($_SESSION['cart'] as $product_id => $soluong) {
          	      $arr[]="'".$product_id."'";
          }
          $string = implode(",", $arr);
          require("library/config.php");
          $result=mysqli_query($conn,"SELECT product_id,title_product,price  FROM product WHERE product_id in ($string)");
          $tongtien=0;
         while($data=mysqli_fetch_assoc($result))
         {
		    	  echo"<tr>";
		    		  echo"<td><a href='del_cart.php?product_id=$data[product_id]'>Xóa</a></td>";
		    		  echo"<td>$data[title_product]</td>";
		    		  echo"<td>".number_format($data['price'])."</td>";
		    	  echo"<td>";
		    		  echo"<select class='quanly' data-product_id='$data[product_id]' style='border: 1px solid #ccc;'>";   
                          $soluong=$_SESSION['cart'][$data['product_id']];
		    			           for ($i=1; $i<=100; $i++) { 
                          if($i==$soluong)
                          {
		                    	   echo"<option value='$i' selected='selected'>$i</option>";
                          } else{
                              echo"<option value='$i'>$i</option>";

                          }
		                    }
		    			 
		    		  echo"</select>";
		    	  echo"</td>";
		    	  $thanhtien=$soluong*$data['price'];
		    	  echo"<td>".number_format($thanhtien)."</td>";
		     echo"</tr>";
         $tongtien+=$thanhtien;
         }
       $_SESSION["tongtien"]=$tongtien;
    	  echo"<tr>";
    		  echo"<td colspan='4'>Tổng tiền</td>";
    		  echo"<td>".number_format($tongtien)."</td>";
    	  echo"</tr>";
      echo"</table>";
        echo"<div style='float: left;'><a href='index.php'>Mua tiếp sản phảm</a></div>";
	  echo"<div style='float: right;'><a href='customer.php'>Thanh toán sản phẩm</a></div>";
	echo"<div style='margin-bottom: 20px;'></div>";
     }

?>
</div>
 <?php 
require("templates/footer.php");
  ?>