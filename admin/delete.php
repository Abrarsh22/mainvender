<?php 
include "connection.php";
if(isset($_POST['name'])){
   $name = mysqli_real_escape_string($con,$_POST['name']);

   $sel="SELECT * FROM `admin` WHERE name='$name'";
  $checkRecord = mysqli_query($con,$sel);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM `admin` WHERE name='$name'";
    mysqli_query($con,$query);
    echo 1;
    exit;
  }else{
    echo "No data found";
    exit;
  }
echo "Error";
exit;
}
?>