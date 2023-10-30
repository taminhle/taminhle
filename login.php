<?php 
session_start();
require("templates/header.php");
$loi=array();
$username=$password=NULL;
  $loi["username"]=$loi["password"]=$loi["login"]=NULL;

if(isset($_POST["ok"])){
   if(empty($_POST["txtname"]))
   {
     $loi["username"]="* Xin vui nhập vào Username<br/>";
   }else{
    $username=$_POST["txtname"];
   }

   if(empty($_POST["txtpass"]))
   {
    $loi["password"]="* Xin vui lòng nhập vào Password<br/>";
   }else{
    $password=$_POST["txtpass"];
   }


    if($username && $password)
    {
      require("library/config.php");

      $result=mysqli_query($conn,"SELECT * FROM user where username ='$username' and password = '$password'");

      if (mysqli_num_rows($result)==1) 
      {
        $data=mysqli_fetch_assoc($result);

        $_SESSION["level"]=$data["level"];
        if($_SESSION["level"]==2)
        {
          header("location:admin/admin.php");
          exit();
        }else{

        $_SESSION["username"]=$username;
          header("location:index.php");
          exit();
        }
      }else{
        $loi["login"]="* Wrond Username or Password ";
      }

      mysqli_close($conn);
    }
}




 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

  <div id="input-login">
  	<div style="width: width: 500px; color: #fff; background-color: blue; font-weight: bold; font-family: cursive; text-align: center;"><h3>Đăng Nhập</h3></div>
  	   <form action="login.php" method="post">
  	   	  <table>
  	   	  	  <tr>
  	   	  	  	  <td>Username</td>
  	   	  	  	  <td><input type="text" name="txtname"><?php echo $loi["username"];?></td>
  	   	  	  </tr>
  	   	  	  <tr>
  	   	  	  	<td>Password</td>
  	   	  	  	<td><input type="password" name="txtpass"><?php echo $loi["password"];?></td> 
              
  	   	  	  </tr>
  	   	  	  <tr>
  	   	  	  	
  	   	  	  	<td><input type="submit" name="ok" value="LoGin" id="submit" style="cursor: pointer; padding: 5px; background-color: teal; color: #fff;>"></td>
  	   	  	  </tr>
  	   	  </table>
  	   </form>
  </div>
  <div style="width: 250px; height: 150px; margin: auto; text-align: center; color: #f00;">
    <?php 
        
        
         echo $loi["login"];
     ?>

  </div>
</body>
</html>



 <?php 
require("templates/footer.php");
 ?>