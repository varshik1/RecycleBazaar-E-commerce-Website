<?php
// Include the connection file
include('admin_area/connect.php');

if (isset($_POST['insert_product'])) {
    // Get form data
    $Blog_title = $_POST['Blog_title'];
    $Blog_description = $_POST['Blog_description'];
    $Blog_content = $_POST['Blog_content'];
    $user_name = $_POST['name'];
  



    // Accessing images (make sure to handle file uploads appropriately)
    $Blog_image1 = $_FILES['Blog_image']['name'];

    $temp_image1 = $_FILES['Blog_image']['tmp_name'];

    if ($Blog_title == '' or $Blog_description == '' or $Blog_content == '' or $Blog_image1 == ''or $user_name == '') {
        echo "<script>alert('please fill all the availabel fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./admin_area/Blog_images/$Blog_image1");
    }

    //insert query
    $insert_products = "insert into `blog` (Blog_title,Blog_description,Blog_content,Blog_image,date,user_name) values ('$Blog_title','$Blog_description','$Blog_content','$Blog_image1',NOW(),'$user_name')";
    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
        echo "<script>alert('Successfully inserted products')</script>";
        echo "<script>window.open('Blog_page.php','_self')</script>";

    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center"> Insert blog</h1>
        <!-- starting of form     -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- FOR TITLE -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="produc_title" class="form-lable"> Product title</label>
                <input type="text" name="Blog_title" id="Blog_title" class="form-control"
                    placeholder="Enter blog title" autocomplete="off" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="produc_title" class="form-lable"> your name</label>
                <input type="text" name="name" id="name" class="form-control"
                    placeholder="Enter your name" autocomplete="off" required="required">
            </div>
            <br>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="produc_title" class="form-lable"> blog content</label>
                <input type="text" name="Blog_content" id="Blog_content" class="form-control"
                    placeholder="Enter blog content" autocomplete="off" required="required">
            </div>
            <br>
            <!-- FOR DESCRIPTION -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-lable"> blog DESCRIPTION</label>
                <input type="text" name="Blog_description" id="Blog_description" class="form-control"
                    placeholder="Enter blog dscription" autocomplete="off" required="required">
            </div><br>

            

            <!--FOR  IMAGE-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="produc_image" class="form-lable"> Blog image</label>
                <input type="file" name="Blog_image" id="Blog_image" class="form-control"
                    placeholder="Enter product image" autocomplete="off" required="required">
            </div><br>

           

            <!-- FOR BUTTON-->
            <div class="form-outline mb-4 w-50 m-auto">
                <INPUT type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>

</body>

</html>