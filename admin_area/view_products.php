<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Proudct Title</th>
                <th>Product Image</th>
                <th>Proudct Price</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            
          
           <?php 
            $select_query = "SELECT * FROM products order by rand()";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
              $product_id = $row["product_id"];
              $product_title = $row["product_title"];
              $product_description = $row["product_description"];
              $product_image1 = $row["product_image1"];
              $product_price = $row["product_price"];
              $category_id = $row['category_id'];
           
           ?>
            <tr class="text-center">
                <td><?php echo $product_id?></td>
                <td><?php echo $product_title?></td>
                <td><img src="./product_images/<?php echo $product_image1?>" alt="img" class="img"></td>
                <td><?php echo $product_price?></td>
                <td>True</td>
<td><a href='admin_index.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
</body>

</html>

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