<?php
include("../templates/top-nav.php");
include '../connection.php';
include("sidebar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
        	document.getElementById("reg").innerHTML="Logout";
        	document.getElementById("reg").href="../index.php";
           </script>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link href="../css/maindashboard.css" rel="stylesheet">
</head>
<body>
	<div id="update" style="margin-left: 25%;margin-top:8%;">
	<div class="container">
		<div class="heading">
		<h1>Added Sub-Categories</h1>
	</div>
		<div class="border"></div>
<?php
$catid=$_GET['catid'];
$selectqury="SELECT * FROM categories where category_id=$catid LIMIT 11 OFFSET 1";
$squery=mysqli_query($con,$selectqury);
$result=mysqli_fetch_assoc($squery);
if ($squery = mysqli_query($con,$selectqury)) {
while($result=mysqli_fetch_assoc($squery)){
		
	?>
	<div class=" card ">
		<a href="viewproducts.php">
	<div class="card_body ">
		<div class="name">
		<h1 class="imgname"><?php echo $result['category_name']?></h1></div>
		<div class="img">
		<img id="category_image" src="<?php echo $result['category_img'];?>"></div>
</div>
</a>
<div class="btn-group">

  <a href="updatecat.php?upname=<?php echo $result['category_name'];?>"><button type="button" class="btn btn-success">Update</button></a>
  <button type="button" class="btn btn-danger"><a href="deletecat.php?delname=<?php echo $result['category_name'];?>">Delete</a></button>
</div>
</div>
<?php }
}
?>
</div>
</div>
</body>
</html>