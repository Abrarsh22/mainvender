<?php
	session_start();
?>
<?php include "templates/top-nav.php"; ?>

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
        <link href="css/adminstyle.css" rel="stylesheet">
        <link href="css/templatestyle.css" rel="stylesheet">
        <script>
 	document.getElementById("reg").innerHTML="Register";
 	document.getElementById("reg").href="./templates/Register.php";
 </script>
    </head>
<body>
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<h4><b>Admin Login</b></h4>
			<p class="message"></p>
			<form id="admin-login-form" method="POST" >
			  <div class="form-group">
			    <label for="email">UserName :</label>
			    <input type="name" class="form-control" name="name" id="name"  placeholder="Enter Username" required>
			    <small id="emailHelp" class="form-text text-muted">Enter your registered username</small>
			  </div>
			  <div class="form-group">
			    <label for="password">Password :</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			  </div>
			  <div class="button">
			  <button type="submit" id="login" class="btn login-btn" name="login"> Login</button>
			</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
<?php include "connection.php"; ?>
<?php
if(isset($_POST['login'])){
		$name=$_POST['name'];
		$password=$_POST['password'];
		$q="SELECT * FROM `admin` WHERE name='$name' and password='$password'";
		$res=mysqli_query($con,$q);
		$num=mysqli_num_rows($res);
		if($num==1){
			$_SESSION['name']=$name;
			header('location:./main/maindashboard.php');
		}else{
			?><script type="text/javascript">alert("Admin not registered");</script><?php
	}

		
	}
?>
