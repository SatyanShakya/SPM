<?php

@include 'config.php';

if(isset($_POST['submit'])){
$name=mysqli_escape_string($conn,$_POST['name']);
$email=mysqli_escape_string($conn,$_POST['email']);
$pass=md5($_POST['password']);
$cpass=md5($_POST['cpassword']);
$user_type=$_POST['user_type'];

$select="SELECT * FROM user_form WHERE email='$email' && password='$pass' ";

$result=mysqli_query($conn, $select);

if(mysqli_num_rows($result)>0){
	$error[]='user already exist';
}
	else{
		if ($pass != $cpass) {
			$error[]='Password not matched!';
		}else{
			$insert="INSERT INTO user_form(name,email,password,user_type)VALUES('$name','$email','$pass','$user_type')";
			mysqli_query($conn,$insert);
			header('location:login_form.php');
		}

	}

};


?>



<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="form-container">
		<form action="" method="post">
			<h3>Register Now</h3>
			<?php
			if (isset($error)) {
				foreach ($error as $error ) {
					echo '<span class="error-msg">'.$error.'</span>';
				};
			};
			?>
			<input type="text" name="name" placeholder="Enter Your name">
			<input type="email" name="email" placeholder="Enter Your email">
			<input type="password" name="password" placeholder="Enter Your password">
			<input type="password" name="cpassword" placeholder="Confirm Your password">
			<select name="user_type">
				<option value="user ">
					user
				</option>
				<option value="admin ">
					admin
				</option>

			</select>

			<input type="submit" name="submit" value="Register" class="form-btn">
			<p>already have an account? <a href="login_form.php">Login</a></p>
		</form>
	</div>

</body>
</html>