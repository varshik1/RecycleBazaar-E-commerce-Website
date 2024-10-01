<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .admin_image {
            float: left;
            padding: 0px 13px 0px;
            height: 50px;
        }
        .text{
            color: white;
            float: right;
            padding-right: 30px;
        }
       
    </style>

    <!-- bootstrap css link -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="" alt="">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">welcome <?Php  session_start();
       $username = $_SESSION['admin_username'];
        echo $username;
      ?> </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center m-3">Manage Details</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class=" d-flex col-md-12 bg-secondary p-1 align-items-center">
                
                <div class="button ">
                    <button><a href="admin_index.php?view_categories" class="nav-link text-light bg-info my-1">Show Categories</a></button>
                    <button><a href="admin_index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="admin_index.php?view_products" class="nav-link text-light bg-info my-1">view products</a></button>
                    <button><a href="admin_index.php?user_list" class="nav-link text-light bg-info my-1">UserList</a></button>
                </div>
            </div>
        </div>

        <!-- forth child -->
        <div class="container my-5">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            } 
            if (isset($_GET['user_list'])) {
                include('user_list.php');
            }
            if (isset($_GET['delete_product'])) {
                include('delete_product.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            ?>
        </div>

    </div>
    <!-- bootstrape js link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        body{
            overflow-x:hidden ;
        }
    </style>
</body>

</html>