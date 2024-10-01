<!-- connect file -->
<?php
include('admin_area/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- css link -->
  <link rel="stylesheet" href="styles.css" />

  <!-- bootstrap css link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .nav1{
        background-color: #2b7dc7;

      }
      .bg{
        background-color:  #c0c0c0 ;
      }
    </style>
</head>

<body class="bg">
  <!-- first child -->

  <div class="container-fluid p-3 ">
    <nav class="navbar nav1 navbar-expand-lg navbar-light">
      <img src="./images/r.png" alt="" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link " href="index.php"><h4>Home </h4><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><h4>Blogs</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><h4>contact Us</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><h4>Request</h4></a>
          </li>
          <!-- <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <h5>Login</h5>
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="#">Admin-Login</a>
    <a class="dropdown-item" href="#">User-Login</a>
  </div>
</li> -->

          <!-- <li class="nav-item ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <h5>Login</h5>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Admin-Login</a></li>
            <li><a class="dropdown-item" href="#">Use-Login</a></li>
          </ul>
        </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search_products.php" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
          <input type='submit' value='Search' class="btn btn-close-white border border-2 shadow-5  " name="search_data_product">
        </form>
      </div>
    </nav>

    <!--  -->
    <?php 
    cart();
    ?>

    <!-- second child -->
    <!-- <div class="bg-secondary text-light text-center"> -->
      <!-- <h4>store</h4> -->
      <!-- <p>Recycle to Reimagine: Turning Trash into Treasure!</p> -->
      <!-- <button href="" type="button" class="btn btn-primary"> <a href="insert_product.php" class="link-danger">Login</a></button> -->
    <!-- </div> -->

    
    <div class=" mt-2 bg-secondary  rounded-4   ">
        <ul class="gap-3 list-unstyled d-flex  flex-row justify-content-center ">
          <li class="nav-item ">
            <a href="#" class="nav-link text-light">
              <h4>categories</h4>
            </a>
          </li>

          <?php
          $Select_categories = "SELECT * FROM categories";
          $result_categories = mysqli_query($con, $Select_categories);
          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
          }
          ?>

        </ul>

      </div>

    </div>

    <!-- third child -->
    <div class="row px-5 bg">
      <div class="col-md-12">
        <!-- products -->
        <div class="row">
          <!-- fetching products -->
          
            <?php
              search_product();
          getproducts();
          get_unique_categories();
          // $ip = getIPAddress();
          // echo 'User Real IP Address - ' . $ip;
          ?>
          
          


        </div>

      </div>

    </div>
      
    <!-- last child -->
    <div class="bg-light text-center mb- ms-5 p-3">
      <p>Designed by team RycycleMart-2023</p>
    </div>
  <!-- bootstrape js link -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <style>
      body{
        overflow-x:hidden ;
      }
    </style>

    
</body>

</html>