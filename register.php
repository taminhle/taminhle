<?php 
require("templates/header.php");
$loi=array();
$username=$password=$sdt=$email=$gender=$birthday=$register=NULL;
$loi["username"]=$loi["password"]=$loi["sdt"]=$loi["email"]=$loi["gender"]=$loi["birthday"]=$loi["register"]=NULL;

  // kiem tra nguoi dung co nhap username

if (isset($_POST["ok"])) {

  if(empty($_POST["txtname"]))
  {
     $loi["username"]="* Xin vui lòng nhập Username<br/>";
  }else{
    $username=$_POST["txtname"];
  }

  // kiem tra nguoi dung co nhap password

   if (empty($_POST["txtpass"])) 
   {
    $loi["password"]="* Xin vui lòng nhập Password<br/>"; 
   }else{
    $password=$_POST["txtpass"];
   }
 
     // kiem tra nguoi dung co nhap sdt

   if (empty($_POST["txtsdt"]))
    {
      $loi["sdt"]="* Xin vui lòng nhập số điện thoại<br/>";
    }else{
      $sdt=$_POST["txtsdt"];
    } 

   // kiem tra nguoi dung co nhap email

    if (empty($_POST["txtmail"]))
    {
      $loi["email"]="* Xin vui lòng nhập Email<br/>";
    }else{
      $email=$_POST["txtmail"];
    } 

  // kiem tra nguoi dung co nhap gender
    if(empty($_POST["gender"]))
    {
      $loi["gender"]="* Xin vui lòng chọn giới tính<br/>";
    }else{
      $gender=$_POST["gender"];
    }
    // kiem tra nguoi dung co nhap birthday     
    if($_POST["day"]=="ngay" || $_POST["month"]=="thang" || $_POST["year"]=="nam")
    {
      $loi["birthday"]="* Xin vui lòng chọn Birthday";
    }
    else
    {
      $day=$_POST["day"];
      $month=$_POST["month"];
      $year=$_POST["year"];
    }

 
    if($username && $password && $sdt && $email && $gender && $day && $month && $year)
    {
      require("library/config.php");
           $result=mysqli_query($conn,"SELECT * FROM user where username='$username'");
           if (mysqli_num_rows($result)==0) {
               mysqli_query($conn,"INSERT INTO user(username,password,sdt,email,gender,birthday,level)

                    values('$username','$password','$sdt','$email','$gender','$year-$month-$day','1')");
                   $loi["register"]="* Đăng ký thành công <a href='login.php'>login</a> đễ vào website<br/>";

              }else{
                $loi["register"]="* Username của bạn đã có người đăng kí<br/>";
              }
                  mysqli_close($conn);
           }
       
}
 ?>
   <div id="input-register">
   	<div style="width: width: 500px; color: #fff; background-color: blue; font-weight: bold; font-family: cursive; text-align: center;"><h3>Đăng Ký</h3></div>
   	    <form action="register.php" method="post">
   	    		<table>
   	    		     <tr>
   	    		       	<td>Username:</td>
   	    		       	<td><input type="text" name="txtname"></td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>Password:</td>
   	    		     	<td><input type="password" name="txtpass"></td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>Số điện thoại:</td>
   	    		     	<td><input type="text" name="txtsdt"></td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>Email:</td>
   	    		     	<td><input type="text" name="txtmail"></td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>Giới tính:</td>
   	    		     	       <td>
   	    		     	 	        <input type="radio" name="gender" value="1">Nam
                            <input type="radio" name="gender" value="2">Nữ
                         </td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>Birthday:</td>
   	    		     	<td>
   	    		     		<select name="day">
                   	  			<option value="ngay">Ngày</option>		
                            <?php 
                                 for ($i=1; $i <=31; $i++) { 
                                   echo"<option value='$i'>$i</option>";
                                 }
                             ?>
                   	  		</select>
                   	  		<select name="month">
                   	  		    <option value="thang">Tháng</option>		
                              <?php 
                                 $thang=array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                                   foreach ($thang as $key=> $tam) {
                                     echo"<option value='$key'>$tam</option>";
                                   }
                               ?>	
                   	  		</select>
                   	  		<select name="year">
                   	  			<option value="nam">Năm</option>
                            <?php 
                                for ($j=1975; $j<=date("Y"); $j++) { 
                                     echo"<option value='$j'>$j</option>";
                                }
                             ?>
                   	  		</select>
   	    		     	</td>
   	    		     </tr>
   	    		     <tr>
   	    		     	<td>
                    <input type="submit" name="ok" value="Đăng Ký" style="cursor: pointer; padding: 5px; background-color: teal; color: #fff;">

                  </td>
   	    		     </tr>
   	    	   </table> 
   	    </form>      
   </div>
         
       <div style="width: 290px; height: 180px; margin: auto; text-align: center; color: #f00;">
                    <?php
                           echo $loi["username"];
                           echo $loi["password"];
                           echo $loi["sdt"];
                           echo $loi["email"];
                           echo $loi["gender"];
                           echo $loi["birthday"];
                            echo $loi["register"];
                    ?>                    
        </div>
  <?php 
require("templates/footer.php");
 ?>