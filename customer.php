<?php 
session_start();
  require("templates/header.php");
  $loi=array();
$loi["name"]=$loi["sdt"]=$loi["diachi"]=NULL;
$Name=$Phone=$address=NULL;

  if(isset($_POST["ok"])) {
  	
        if (empty($_POST["txtname"])) {
            $loi["name"]="* Xin vui lòng nhập vào Họ Tên<br/>"; 
         }else{
         	$Name=$_POST["txtname"];
         }


         if (empty($_POST["txtsdt"])) {
         	$loi["sdt"]="* Xin vui lòng nhập vào Số điện thoại</br>";
         }else{
         	$Phone=$_POST["txtsdt"];
         }
        
        if (empty($_POST["txtaddres"])) {
        	$loi["diachi"]="* Xin vui lòng nhập vào Địa chỉ";
        }else{
        	$address=$_POST["txtaddres"];
        }

        if ($Name && $Phone && $address) {
        	// mo ket noi csdl
        	require("library/config.php");

        	// thuc hien cau truy van luu tong tin khach hang vao trong ban hoadon
        	$result=mysqli_query($conn,"SELECT max(mahd) FROM hoadon");
        	if (mysqli_num_rows($result)==0) {
        		$mahd=1;
        	}else{
        		   	$data=mysqli_fetch_assoc($result);
            $mahd=$data['max(mahd)']+1; 
        	}
          
        	mysqli_query($conn,"INSERT INTO  hoadon(mahd,ngay,hoten,sdt,diachi,tongtien)
        		                           values('$mahd',now(),'$Name','$Phone','$address','$_SESSION[tongtien]')");

        	// thuc hien cau truy van luu tong tin khach hang vao trong ban chitiet_hoadon
            foreach ($_SESSION['cart'] as $product_id => $soluong) {
            	
        	mysqli_query($conn,"INSERT INTO chitiet_hoadon (mahd,product_id,soluong)
        		                               value('$mahd','$product_id','$soluong')");
            }

            //huy thong tin gio hang
            session_destroy();
             echo"; <span style='color: #f00;'>Đơn hàng được thanh toán thành công </span>,<a href='index.php'>trở về trang chủ</a>";

      // dong ket noi csdl
             mysqli_close($conn);
        }



  }


 ?>
<div id="customer">
	<form action="customer.php" method="post">
	<table>
		<tr>
			<td colspan="2" style="text-align: center;">Thông tin khách hàng</td>
		</tr>
		<tr>
			<td>Họ tên:</td>
			<td><input type="text" name="txtname"></td>
		</tr>
		<tr>
			<td>SDT:</td>
			<td><input type="text" name="txtsdt"></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><textarea cols="30" rows="3" name="txtaddres"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="ok" value="Xác nhận và thanh toán"></td>
		</tr>
	</table>
</form>


</div>



<div style="width: 270px; margin: auto; text-align: center; color: #f00;">
	 <?php 
         echo $loi["name"];
         echo $loi["sdt"];
         echo $loi["diachi"];
	  ?>
</div>

 <?php 
  require("templates/footer.php");
 ?>