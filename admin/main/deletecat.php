<?php
include "../connection.php";

 $delname=$_GET['delname'];
  $delq="DELETE FROM categories where category_name='$delname'";
  $delres=mysqli_query($con,$delq);

  if($delres){?>
    <script type="text/javascript">alert("deleted")</script>
    <?php header("location:viewcategories.php"); 
    }
  else{?>
    <script type="text/javascript">alert("not deleted")</script>
<?php
}
?>


