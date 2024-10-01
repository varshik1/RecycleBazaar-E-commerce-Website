<?php
include('connect.php'); 

if(isset($_GET['delete_category'])){
   $delete_id=$_GET['delete_category']; 

   $Select_product = "Delete from `categories` where category_id=$delete_id";
$result_product=mysqli_query($con,$Select_product);
if($result_product){
echo"<script>alert('category deleted successfully')</script>";
echo"<script>window.open('./admin_index.php','_self')</script>";

}
}
?>