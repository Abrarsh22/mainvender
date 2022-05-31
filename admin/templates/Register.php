<?php include "top-nav.php"; ?>
<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>
		Admin Dashboard
	</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
        <link href="../css/adminstyle.css" rel="stylesheet">
        <link href="../css/templatestyle.css" rel="stylesheet">

 <script>
 	function validate(){
 	var password=document.getElementById("password").value;
 	var cpassword=document.getElementById("cpassword").value;
 	if(password!=cpassword){
 		alert('password not matching');
 		header("location:Register.php");
 	}
 }
 	document.getElementById("reg").innerHTML="Login";
 	document.getElementById("reg").href="../index.php";
</script>
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<h4><b>Admin Register</b></h4>
			<p class="message"></p>
			<form id="admin-login-form" onsubmit="return validate()" method="POST" action="#">
			  <div class="form-group">
			  	<label for="name">Enter your Name :</label>
			    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" required>
			    <label for="email">Enter your Email address :</label>
			    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email" required>
			    <small id="emailHelp" class="form-text text-muted">Enter your registered email-id</small>
			  </div>
			  <div class="form-group">
			    <label for="password">Password :</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			  </div>
			  <div class="form-group">
			    <label for="conpassword">Confirm Password :</label>
			    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
			  </div>
			  <input type="hidden" name="admin_login" value="1">
			  <div class="button">
			  <button type="submit" id="button" class="btn login-btn" name="register"> Register</button>
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php include "connection.php"; ?>
<?php

	if(isset($_POST['register'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$q="SELECT * FROM `admin` WHERE name='$name' && email='$email'";
		$res=mysqli_query($con,$q);
		$num=mysqli_num_rows($res);
		if($num>0){
			?><script type="text/javascript">alert("Admin already registered")</script><?php
		}else{
			$insert="INSERT INTO `admin`(`name`, `email`, `password`, `cpass`) VALUES ('$name','$email','$password','$cpassword')";
			mysqli_query($con,$insert);
			?><script type="text/javascript">alert("Success");</script><?php
	}

		
	}
?>