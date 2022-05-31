<?php
include('../connection.php');
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
 echo "<option>Select Sub Category</option>";
}else{
 $sql = mysqli_query($con,"SELECT * FROM `categories` WHERE category_id=$id limit 11111 offset 1");
 while($row = mysqli_fetch_assoc($sql)){
 echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
 }
 }
}
?>