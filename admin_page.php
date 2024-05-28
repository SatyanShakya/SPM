<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="content">
			<h3>hi, <span>Admin</span></h3>
			<h1>Welcome <span></span></h1>
			<p>This is admin page</p>
			<a href="login_form.php" class="btn">Login</a>
			<a href="register_form.php" class="btn">Register</a>
			<a href="logout.php" class="btn">Logout</a>
		</div>
	</div>
</body>
</html>