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
		<h1>Add categories</h1>
	</div>
		<div class="border"></div>
  <form style="margin-top: 3%;" action="addcategories.php" method="POST" enctype="multipart/form-data">
  	<div class="form-group">
      <label for="id">Category Id:</label>
      <input type="number" class="form-control" id="id" placeholder="Enter category Id" name="id"  required/>
    </div>
 
    <div class="form-group">
      <label for="name">Category Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter category Name" name="name"  required/>
    </div>
  
    <div class="form-group">
      <label for="image">Category Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" required/>
    </div>
    
    <div class="form-group" style="text-align: center;" ;>
    <button type="submit" class="btn btn-primary" name="submit" id="submit" >Add Category</button>
	</div>
  </form>
	
<?php
if(isset($_POST["submit"])){ 
	$img_id=$_POST['id'];
	$img_name=$_POST['name'];
	$img_file=$_FILES['image'];
	//print_r($img_file);
	$filename=array();
	$filename=$img_file['name'];
	$filepath=$img_file['tmp_name'];
	$fileerror=$img_file['error'];
	if($fileerror==0){
		$destifile='uploads/'.$filename;
		move_uploaded_file($filepath, $destifile);

		$insquery="INSERT INTO `categories`(`category_id`,`category_name`, `category_img`) VALUES ($img_id,'$img_name','$destifile')";
		$query=mysqli_query($con,$insquery);
		if($query){
			echo "Success";
		}else{
			echo "Error";
		}
	}
}

?>    
	</div>
	</div>
</body>
</html>