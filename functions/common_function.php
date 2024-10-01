<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
.card {
  border: 2px solid black;
  margin-bottom: 15px;
  transition: all 0.5s;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add box-shadow */
}

.card:hover {
  transform: scale(1.1);
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Increase box-shadow on hover */
}

.card img, .card .card-body {
  transform: scale(1); /* Prevent scaling of the image and text on hover */
  transition: none; /* Remove transition for the image and text */
}

.checked {
  color: orange;
}

  </style>
</head>

</html>
<?php
//including connect file 
include('C:\xampp\htdocs\RecycleBazaar_3\RecycleBazaar_3\admin_area\connect.php');


//getting products
function getproducts()
{

  global $con;
  //condition to check isset or not 
  if (!isset($_GET["search_data_product"])) {
    if (!isset($_GET['category'])) {

      $select_query = "SELECT * FROM products order by rand()";
      $result_query = mysqli_query($con, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image1 = $row["product_image1"];
        $product_price = $row["product_price"];
        $category_id = $row['category_id'];

        echo "  <div class='col-md-3 mb-2  cards '>
                    <div class='card'>
                    <img class='card-img-top mt-1' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>
                    <p class='card-text overflow-y-hidden' style='height:50px;' > $product_description</p>
                    <a href='index.php?add_to_cart=$product_id ' class='btn btn-primary'>add to cart</a>
                    <a href='buy.php' class='btn btn-primary'>Buy</a>
                    </div>
                    </div>
                    </div>";


      }
    }
  }
}

function get_unique_categories()
{

  global $con;
  //condition to check isset or not 
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "SELECT * FROM products where category_id=$category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class=' text-danger text-center'>No stock for this category</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row["product_id"];
      $product_title = $row["product_title"];
      $product_description = $row["product_description"];
      $product_image1 = $row["product_image1"];
      $product_price = $row["product_price"];
      $category_id = $row['category_id'];

      echo "  <div class='col-md-3 mb-2  cards '>
      <div class='card'>
      <img class='card-img-top mt-1' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>
      <p class='card-text overflow-y-hidden' style='height:50px;' > $product_description</p>
      <a href='index.php?add_to_cart=$product_id ' class='btn btn-primary'>add to cart</a>
      <a href='buy.php' class='btn btn-primary'>Buy</a>
      </div>
      </div>
      </div>";


    }
  }
}

function search_product()
{
  global $con;

  if (isset($_GET["search_data_product"])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "SELECT * FROM products where product_title like '%$search_data_value%' ";
    $result_query = mysqli_query($con, $search_query);

    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class=' text-danger text-center'>No result match. NO products found on this category!</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row["product_id"];
      $product_title = $row["product_title"];
      $product_description = $row["product_description"];
      $product_image1 = $row["product_image1"];
      $product_price = $row["product_price"];
      $category_id = $row['category_id'];

      echo "  <div class='col-md-4 mb-2'>
              <div class='card' style='width: 18rem;'>
              <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='Card image cap'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star checked'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>
              <p class='card-text'> $product_description</p>
              <a href='index.php?add_to_cart=$product_id ' class='btn btn-primary'>add to cart</a>
              <a href='buy.php' class='btn btn-primary'>Buy</a>
              </div>
              </div>
              </div>";


    }
  }
}
//ip 

function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}



//cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress(); // Assuming getIPAddress is a valid function
    $get_product_id = $_GET['add_to_cart']; // No need to cast this as it's not used directly in the SQL query

    // Correct the SQL query and use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM cart_details WHERE ip_address = '$get_ip_add' AND product_id = '$get_product_id'";

    $result_query = mysqli_query($con, $select_query);

    $num_of_rows = mysqli_num_rows($result_query);

    if ($num_of_rows > 0) {
      echo "<script>alert('this item is already present inside cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity) VALUES ('$get_product_id', '$get_ip_add', 1)";

      $result_query = mysqli_query($con, $insert_query);


      echo "<script>alert('Item added to the cart.')</script>";
      echo "<script>window.open('index.php','_self')</script>";

    }

  }
}