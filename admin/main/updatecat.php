<?php
include("../templates/top-nav.php");
include("sidebar.php");
include("../connection.php");

	$upname=$_GET['upname'];
	$selquery="SELECT * FROM categories where category_name='$upname'";

    if(isset($_POST['update'])){
      $category_name=$_POST['name'];
      $category_image=$_FILES['image'];
      $filename=$category_image['name'];
      $filepath=$category_image['tmp_name'];
      $fileerror=$category_image['error'];
  if($fileerror==0){
    $destifile='uploads/'.$filename;
    move_uploaded_file($filepath, $destifile);
    	$updquery="UPDATE `categories` SET category_name='$category_name',category_img='$destifile' where category_name='$upname';";
    	$updateres=mysqli_query($con,$updquery);
    	 if($updateres){?>
    <script type="text/javascript">alert("Updated Successfully")</script>
    <?php header("location:viewcategories.php");
  }
}
else{?>
	<script type="text/javascript">alert("Password Not Maching ");</script>
<?php
} 
}
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
	<div id="update" style="margin-left: 30%;margin-top:8%;">
	<div class="container">
  <h2>Update Categories</h2>
  <div class="border"></div>
  <?php
  $result = mysqli_query($con,$selquery); 
    while ($row = mysqli_fetch_assoc($result)){?>
  <form style="margin-top: 3%;" action="" method="POST" enctype="multipart/form-data">
     <div class="form-group">
      <label for="id">Category Id:</label>
      <input type="number" class="form-control" id="id" placeholder="Enter category Id" name="id"  required readonly value="<?php echo $row['category_id'] ?>"/>
    </div>
 
    <div class="form-group">
      <label for="name">Category Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter category Name" name="name"  required
      value="<?php echo $row['category_name'] ?>"/>
    </div>
  
    <div class="form-group">
      <label for="image">Category Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" required/>
    </div>
    <div class="form-group" style="text-align: center;" ;>
    <button type="submit" class="btn btn-primary" name="update" id="update" >Update</button>

      <img src="<?php echo $row['category_img'] ?>" height="200px" width="200px" alt="sorry">
</div>
<?php
}?>
  </form>
</div>
</div>
</body>
</html>