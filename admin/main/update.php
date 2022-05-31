<?php
include("../templates/top-nav.php");
include("sidebar.php");
include("../connection.php");

	$updname=$_GET['upname'];
	$selquery="SELECT * FROM admin where name='$updname'";

    if(isset($_POST['update'])){
      $name=$_POST['name'];
    	$email=$_POST['email'];
    	$newpass=$_POST['newpass'];
    	$renewpass=$_POST['renewpass'];
    	if($newpass==$renewpass){
    	$updquery="UPDATE `admin` SET name='$name',email='$email',password='$newpass',cpass='$renewpass' where name='$updname';";
    	$updateres=mysqli_query($con,$updquery);
    	 if($updateres){?>
    <script type="text/javascript">alert("Updated Successfully")</script>
    <?php 
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
  <h2>Update Details</h2>
  <div class="border"></div>
  <?php
  $result = mysqli_query($con,$selquery); 
    while ($row = mysqli_fetch_assoc($result)){?>
  <form style="margin-top: 3%;" action="" method="POST">
    <div class="form-group">
      <label for="name">Username:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter New Username" name="name" 
      value="<?php echo $row['name']; ?>" required/>
    </div>
    <div class="form-group">
      <label for="email">Email-id:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter New E-Mail Id" name="email"
      value="<?php echo $row['email']; ?>" required/>
    </div>
    <div class="form-group">
      <label for="pass">Old Password:</label>
      <div class=input-group>
      <input type="password" class="form-control" id="pass" name="pass" 
      value="<?php echo $row['password']; ?>" required readonly>
       <div class="input-group-btn">
        <i class="fa fa-eye eye" onClick="clicks('passwd',this)"></i>
      </div>
    </div>
</div>
    <div class="form-group">
      <label for="newpass">Enter New Password:</label>
      <div class=input-group>
      <input type="password" class="form-control" id="newpass" placeholder="New Password" name="newpass" required>
      <div class="input-group-btn">
        <i class="fa fa-eye eye" onClick="newpassclick('passwd',this)"></i>
      </div>
    </div>
</div>
    <div class="form-group">
      <label for="renewpass">Repeat New Password:</label>
      <div class=input-group>
      <input type="password" class="form-control" id="renewpass" placeholder="Repeat New Password" name="renewpass" required>
      <div class="input-group-btn">
        <i class="fa fa-eye eye" onClick="renewpassclick('passwd',this)"></i>
      </div>
    </div>
</div>
    <div class="form-group" style="text-align: center;" ;>
    <button type="submit" class="btn btn-primary" name="update" id="update" >Update</button>
</div>
<?php
}?>
  </form>
</div>
</div>
<script type="text/javascript">
	function clicks(id,el){
   			var temp = document.getElementById("pass");
            if (temp.type == "password") {
                            temp.type = "text";
                            el.className="fa fa-eye-slash";
            }else{
            	temp.type = "password";
                            el.className="fa fa-eye";
            }
           
	}

	function newpassclick(id,el){
   			var temp = document.getElementById("newpass");
            if (temp.type == "password") {
                            temp.type = "text";
                            el.className="fa fa-eye-slash";
            }else{
            	temp.type = "password";
                            el.className="fa fa-eye";
            }
           
	}

	function renewpassclick(id,el){
   			var temp = document.getElementById("renewpass");
            if (temp.type == "password") {
                            temp.type = "text";
                            el.className="fa fa-eye-slash";
            }else{
            	temp.type = "password";
                            el.className="fa fa-eye";
            }
           
	}

</script>
</body>
</html>