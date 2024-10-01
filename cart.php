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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cart_img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- first child -->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="./images/r.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Request</a>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordere">
                    <thead>
                        <tr>
                            <th>product title</th>
                            <th>product image</th>
                            <th>price</th>
                            <th>remove</th>
                            <th>product title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                       
                          global $con;
                          $get_ip_add = getIPAddress();
                          $total_price = 0;
                          $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                          $result = mysqli_query($con, $cart_query);
                          while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row["product_id"];
                            $select_products = "Select * from `products` where product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_product_price = mysqli_fetch_array($result_products)) {
                              $product_price = array($row_product_price['product_price']);
                              $price_table=$row_product_price['product_price'];
                              $product_title=$row_product_price['product_title'];
                              $product_image1=$row_product_price['product_image1'];
                              $product_values = array_sum($product_price);
                              $total_price += $product_values;
                           
                          
                        ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt=""class="cart_img"></td>
                            <td><?php echo $price_table?></td>

                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>

                            <td>
                                <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                            </td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
                <div>
                    <?php echo $total_price?>
                </div>
            </div>
        </div>
                            </form>
        <!-- function to remove item  -->
        <?php 
        function remove_cart_item(){
            global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="Delete from `cart_details` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item=remove_cart_item();
        ?>

    </div>
    <!-- last child -->
    <div class="bg-light text-center p-3">
        <p>Designed by team Recycle Bazaar-2024</p>
    </div>
    </div>

    <!-- bootstrape js link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</body>

</html>