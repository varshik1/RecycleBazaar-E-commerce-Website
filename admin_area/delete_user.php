<?php
include('connect.php'); 

if(isset($_GET['delete_user'])){
   $delete_id=$_GET['delete_user']; 

   $Select_product = "Delete from `user_table` where user_id=$delete_id";
$result_product=mysqli_query($con,$Select_product);
if($result_product){
echo"<script>alert('user deleted successfully')</script>";
echo"<script>window.open('./admin_index.php','_self')</script>";

}
}
?>