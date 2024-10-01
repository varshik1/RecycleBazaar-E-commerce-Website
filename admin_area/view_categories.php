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

</head>

<body>
    <h3 class="text-center text-success"> Categories </h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Category id</th>
                <th>Category Title</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
           
            <?php
          $Select_categories = "SELECT * FROM categories";
          $result_categories = mysqli_query($con, $Select_categories);
          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            ?>
            <tr class="text-center">
            <td><?php echo $category_id?></td>
            <td> <?php echo $category_title?></td>
            <td><a href='admin_index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
         <?php } ?> 
        
          
        </tbody>
</body>

</html>