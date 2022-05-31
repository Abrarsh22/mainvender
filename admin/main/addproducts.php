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
          function changefun(){
            var catname=document.getElementById("catname");
            document.getElementById("id").value=catname.value;
          }
          
           </script>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link href="../css/maindashboard.css" rel="stylesheet">

</head>
<body>
<div id="update" style="margin-left: 25%;margin-top:8%;">
	<div class="container">
		<div class="heading">
		<h1>Add Products</h1>
	</div>
		<div class="border"></div>
    <div class="addbtn" style="display:flex;justify-content: center;">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  	+ADD PRODUCT
</button>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: orange;font-size: 25px;font-weight: bold">
        <h4 class="modal-title" style="font-size: 30px;margin-top: 20px;">Add a Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      	<form style="margin-top: 3%;" action="addproducts.php" method="POST" enctype="multipart/form-data" >
      <div class="form-group">
  <label for="sel1">Select Category name:</label>
  <select class="form-control selcat" id="catname" name="catname" onchange="changefun(this)">
    <option value="0">Select a Category</option>
    <?php
    $selectqury="SELECT category_id,category_name FROM categories group by category_id";
$squery=mysqli_query($con,$selectqury);
$result=mysqli_fetch_assoc($squery);
if ($squery = mysqli_query($con,$selectqury)) {
while($result=mysqli_fetch_assoc($squery)){
  ?>
    <option value="<?php echo $result['category_id']?>"><?php echo $result['category_id'] .'=>'. $result['category_name'] ?></option>
    
<?php }
}
?>
</select>
</div>

    <div class="form-group">
      <label for="id"> Product Id:</label>
      <input class="form-control" id="id" placeholder="Enter Product Id" name="id"  required readonly />
    </div>

<div class="form-group">
  <label for="subcat">Select Sub-Category name:</label>
  <select class="form-control subname" id="subname" name="subname" >
    <option>Select Sub-Category</option>
</select>
</div>

    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name"  required/>
    </div>
  
    <div class="form-group">
      <label for="image">Product Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter Product Image" name="image" required/>
    </div>
    
    <div class="form-group">
      <label for="image">Product Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Product price" name="price" required/>
    </div>

    <div class="form-group">
      <label for="prodesc">Product Description:</label>
      <textarea class="form-control" id="pdes" placeholder="Enter Product detail" name="pdes" rows="8" cols="50" required ></textarea>
    </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" name="add" class="btn btn-success"></input>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

  </form>
  <?php
if(isset($_POST['add'])){
  $catname=$_POST['catname'];
  $id=$_POST['id'];
  $subname=$_POST['subname'];
  $pname=$_POST['name'];
 $pimage=$_FILES['image'];
 $pprice=$_POST['price'];
 $pdes=$_POST['pdes'];
 $filename=$pimage['name'];
  $filepath=$pimage['tmp_name'];
  $fileerror=$pimage['error'];
  if($fileerror==0){
    $destifile='products/'.$filename;
    move_uploaded_file($filepath, $destifile);
$inssql="INSERT INTO `products`( `Category Name`, `Product Id`, `Sub-Category Name`, `Product Name`, `Product Image`, `Product Price`, `Product Description`) VALUES ('$catname',$id,'$subname','$pname','$destifile',$pprice,'$pdes')";
$query=mysqli_query($con,$inssql);
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
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".selcat").change(function()
{
var catid=$(this).val();
var post_id = 'id='+ catid;

$.ajax
({
type: "POST",
url: "getdadat.php",
data: post_id,
cache: false,
success: function(subcat)
{
$(".subname").html(subcat);
} 
});

});
});

</script>
</body>
</html>

