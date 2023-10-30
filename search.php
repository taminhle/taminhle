<?php 
require("templates/header.php");
 ?>


<div style="width: 800px; margin: auto;">
	<?php 
    $keyword=$_GET["keyword"];
    require("library/function.php");
    $keyword_tensp=unicode_convert($keyword);
 require("library/config.php");

    $result=mysqli_query($conn,"SELECT product_id, image, title_product,price FROM product where title_product like '%$keyword_tensp%'");
    if (mysqli_num_rows($result)==0) {
    	echo "<p>khong tim thay ket qua nao</p>";
    }else{
    	$number=mysqli_num_rows($result);
		echo"<p style='margin: 20px 0 0 10px;'>Tim  thay $number ket qua trong tu khoa '$keyword'</p>";
			while($data=mysqli_fetch_assoc($result)) {
				echo"<div class='results'>";
				echo"<a href='detail.php?product_id=$data[product_id]'>";
					echo"<img src='images/$data[image]' width='180'/>";
					echo"<p>$data[title_product]</p>";
				echo"</a>";
				echo"<p>Giá:".number_format($data["price"])."VND</p>";
			echo"</div>";
			}
			echo "<div style='clear: both;'></div>";	
    }
  
 mysqli_close($conn);
	 ?>
	
</div>


 <?php 
require("templates/footer.php");
 ?>