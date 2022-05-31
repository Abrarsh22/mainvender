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
		<h1>Added Categories</h1>
	</div>
		<div class="border"></div>		
		<div class="row addbtn" style="">
			<div class="col-md-6 search">
			<input type="search" name="search">
		</div>
		<div class="col-md-6">
	<a href="addcategories.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  	+ADD CATEGORY
</button></a>
</div>
</div>
<?php
$selectqury="SELECT  * FROM categories GROUP BY category_id ";
$squery=mysqli_query($con,$selectqury);
$result=mysqli_fetch_assoc($squery);
if ($squery = mysqli_query($con,$selectqury)) {
while($result=mysqli_fetch_assoc($squery)){
	?>

	<div class=" card ">

	<a href="viewsubcat.php?catid=<?php echo $result['category_id'];?>">
	<div class="card_body ">
		<div class="name">
		<h1 class="imgname"><?php echo $result['category_name']?></h1></div>
		<div class="img">
		<img id="category_image" src="<?php echo $result['category_img'];?>"></div>

		
</div>
</a>
<div class="btn-group">

  <a href="updatecat.php?upname=<?php echo $result['category_name'];?>"><button type="button" class="btn btn-success optbtn">Update</button></a>
  <a href="deletecat.php?delname=<?php echo $result['category_name'];?>"><button type="button" class="btn btn-danger optbtn">Delete</button></a>
</div>
</div>
<?php }

} 
?>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function()
{
	$(".optionsbtn").click(function()
	{
		$(".optbtn").slideToggle();
	});
});
</script>
</body>
</html>