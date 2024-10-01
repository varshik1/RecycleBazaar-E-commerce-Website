
<?php
include('admin_area/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View more</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #9AAA97;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            width: 80%;
            margin: 2% auto;
            padding: 5%;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .object-name {
            font-size: 1.5rem;
            color: #128603;
            margin-bottom: 10px;
        }

        .date {
            font-size: 1rem;
            color: #9AAA97;
            margin-bottom: 10px;
        }

        .author {
            padding-top: 5px;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .description {
            font-size: 1rem;
            color: #777;
        }

        .user-img {

            border-radius: 50%;
            width: 55px;
            max-width: 100%;
            float: left;
        }

        /* .immg {
            margin-top: 5%;
            width: 20%;
        } */

        .product-img {
            border-radius: 15px 15px;
            margin-left: 1%;
            float: right;
            width: 30%;
            max-width: 100%;
            margin-top: 10px;
        }

        .btn {
            color: white;
            margin-top: 10px;
            display: inline-block;
            padding: 10px 25px;
            border-radius: 50px;
            background-color: #128603;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #1fbe0a;
        }

        .btn_cont {
            font-size: large;
            color: white;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .card {
                width: 90%;
            }

            .user-img,
            .immg,
            .product-img {
                max-width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            .card {
                width: 95%;
            }
        }
    </style>
</head>

<body>
<div class="container">
<?php
if(isset($_GET['id'])){
    $id= $_GET['id'].'';
}

$Select_users = "SELECT * FROM blog where Blog_id=$id";
$result_users = mysqli_query($con, $Select_users);
while ($row_data = mysqli_fetch_assoc($result_users)) {
  $Blog_id	 = $row_data['Blog_id'];
  $Blog_title	 = $row_data['Blog_title'];
  $date	 = $row_data['date'];
  $user_name	 = $row_data['user_name'];
  $Blog_description= $row_data['Blog_description'];
  $Blog_image = $row_data['Blog_image'];
  $Blog_content = $row_data['Blog_content'];

  ?>
   <div class="card">
            <div class="card-content">
                <h1 class="object-name"><?php echo $Blog_title?></h1>
                <h2 class="date">Posted Date: <?php echo $date?></h2>
                <!-- <div class="immg"><img class="user-img" src="user.png" alt="user"> </div> -->
                <h2 class="author">Published by:<?php echo $user_name?></h2><br>
                <img class="product-img" src="./admin_area/Blog_images/<?php echo $Blog_image?>" alt="chair">
                <a class="description">
                <?php echo $Blog_content?>
                </a>
            </div>
        </div>


<?php } ?> 
    
        
</body>

</html>