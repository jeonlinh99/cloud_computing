<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<?php
include('inc/conn.php');
?>
<?php 
// define ariables and set to empty values
session_start();
if (isset($_POST["login"])) {
		// lấy thông tin người dùng
	$username = $_POST["userName"];
	$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	if ($username == "" || $password =="") {
		echo "userName or password not be empty!";
	}else{
		$sql = "select * from user where userName = '$username' and password = '$password' ";
		echo $sql;
		$query = mysqli_query($conn,$sql);
		$usertypes= mysqli_fetch_array($query);
			if($usertypes['acc_verify']== '1'){
				$_SESSION['userName'] = $username;
				header('location: admin/index.php');
			}
			else if($usertypes['acc_verify'] =='0')
			{
				$_SESSION['userID']= $userID;
				$_SESSION['userName']= $username;
				header('location: index.php');
			}
			 else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }

			// Lấy ra thông tin người dùng và lưu vào session

	 

			
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			
		}
	}
?>
<div class="header">
	<h2> Login</h2>

</div>
<form method="post" action="login.php">
	
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="userName">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" name="login">Login</button>
	</div>
	<p>
		Not yet a member? <a href="register.php"> Sign up</a>
	</p>
</form>

</body>
</html>