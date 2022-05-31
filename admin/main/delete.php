<?php
session_start(); 
include "../connection.php";

 $nam=$_GET['names'];
  $delq="DELETE FROM admin where name='$nam'";
  $delres=mysqli_query($con,$delq);

  if($delres){?>
    <script type="text/javascript">alert("deleted")</script>
    <?php header("location:maindashboard.php"); 
  }else{?>
    <script type="text/javascript">alert("not deleted")</script>
<?php
}
if($nam==$_SESSION['name']){
  unset($_SESSION['name']);
  header("location:../index.php");
}
?>


