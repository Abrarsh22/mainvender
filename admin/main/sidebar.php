<?php
include("../connection.php");
session_start();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Template · Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="../css/maindashboard.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="../css/templatestyle.css" rel="stylesheet">
<style type="text/css">
  .panel-body,.panel-footer,.panel-collapse{
    background-color: lightgrey;
    font-color:none;
    margin-top: 4%;
    font-size: 20px;
  }
</style>
</head>
<body>
 <div class="w3-sidebar w3-bar-block" >
  <h2 class="w3-bar-item">Dashboard</h2>
  <a href="maindashboard.php" class="w3-bar-item w3-button">Admins</a>
  <a href="viewsubcat.php" class="w3-bar-item w3-button">Users</a>
  <a href="viewcategories.php" class="w3-bar-item w3-button">Categories</a>
  <a href="sub-categories.php" class="w3-bar-item w3-button">Sub-Categories</a>

  <a href="addproducts.php" class="w3-bar-item w3-button">Products</a>  
</div>
</body>
</html>