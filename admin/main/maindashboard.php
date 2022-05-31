<?php include("../templates/top-nav.php");?>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="../css/maindashboard.css" rel="stylesheet">
        <link href="../css/templatestyle.css" rel="stylesheet">
        <script type="text/javascript">
        	document.getElementById("reg").innerHTML="Logout";
        	document.getElementById("reg").href="../index.php";
           </script>

</head>
<body>
	<?php include("sidebar.php")?>
<div id="admin" class="mainsection" style="margin-left:30%">
	<div class="body">

	<h2>Welcome ,<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "";}?></h2><br>
	<div class="border"></div>
	<h2>Admins</h2>
	<?php 
	include ("../connection.php");	
	$select="SELECT name,email FROM `admin`"?>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>E-mail</th>
        <th style="padding-left:150px;">Action</th>
      </tr>
    </thead>;
    <?php
    if ($result = mysqli_query($con,$select)) {
    while ($row = mysqli_fetch_assoc($result)) {?>
    <tbody>
      <tr>
        <td><?php echo $row['name']?></td>  
        <td><?php echo $row['email']?></td>
        <td><a href="update.php?upname=<?php echo $row['name'];?>"><button class="btn btn-success" type="button" name="upduser" value="upduser" >Update</button></a></td>
        <td style="padding-left: 0px;"><a href="delete.php?names=<?php echo $row['name'];?>"><button class="btn btn-danger" type="button" name="deluser" value="deluser" >Delete</button></a></td>
      </tr>

    </tbody>;
<?php

  }
}
 
  
  ?>
	</div>
</div>
</body>
</html>
