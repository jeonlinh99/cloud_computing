
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<?php include('inc/conn.php');
if(isset($_POST['btn_register'])){
	$userName = $_POST["userName"];
	$userEmail = $_POST["userEmail"];
	$password = $_POST["password"];
	if($userName =="" || $userEmail ==""|| $password ==""){
		echo "Please enter information";
	}else{
		$sql ="select *from user where userName='$userName'";
		$kt=mysqli_query($conn, $sql);
		if(mysqli_num_rows($kt) > 0){
			echo "Account have already existed";
		}else{
			$sql = "insert into user(userName, userEmail,password) values ('$userName', '$userEmail', '$password')";
			mysqli_query($conn, $sql);
			header('Location: index.php');
		}
	}
}


 ?>
<div class="header">
	<h2> Register</h2>
</div>
<form method="post" action="register.php">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="userName" >
		<label>Email</label>
		<input type="text" name="userEmail">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" name="btn_register" class="btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php"> Sign in</a>
	</p>
</form>

</body>
</html>