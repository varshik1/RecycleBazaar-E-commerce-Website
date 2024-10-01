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
        .userimg {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <h3 class="text-center text-success"> User List</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>user_id</th>
                <th>Username</th>
                <th>User email</th>
                <th>User Image</th>
                <th>User address</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
         
            <?php
          $Select_users = "SELECT * FROM user_table";
          $result_users = mysqli_query($con, $Select_users);
          while ($row_data = mysqli_fetch_assoc($result_users)) {
            $user_id	 = $row_data['user_id'];
            $user_name	 = $row_data['username'];
            $user_email	 = $row_data['user_email'];
            $user_address	 = $row_data['user_address'];
            $user_image = $row_data['user_image'];

            ?>
             <tr class="text-center">
                <td><?php echo $user_id?></td>
                <td><?php echo $user_name?></td>
                <td><?php echo $user_email?></td>
                <td><img src="../login_re_prince/user_images/<?php echo $user_image?>" alt="img" class="userimg"></td>
                <td><?php echo $user_address?></td>
                <td><a href='admin_index.php?delete_user=<?php echo $user_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>   
         <?php } ?> 
        </tbody>
</body>

</html>

