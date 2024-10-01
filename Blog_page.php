<?php
include('admin_area/connect.php'); // Ensure this file establishes $con connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <style>
        {
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
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: left;
            margin: 10px 80px 10px;

        }


        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: calc(50% - 40px);
            min-width: 300px;
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
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .description {
            font-size: 1rem;
            color: #777;
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
    </style>
</head>

<body>

<?php
// Query to fetch blog posts
$Select_users = "SELECT * FROM blog";
$result_users = mysqli_query($con, $Select_users);

if ($result_users) {
    while ($row_data = mysqli_fetch_assoc($result_users)) {
        $Blog_id = $row_data['Blog_id'];
        $Blog_title = $row_data['Blog_title'];
        $date = $row_data['date'];
        $user_name = $row_data['user_name'];
        $Blog_description = $row_data['Blog_description'];
        // $Blog_image = $row_data['Blog_image']; // Uncomment if you need to use Blog_image
        // $Blog_content = $row_data['Blog_content']; // Uncomment if you need to use Blog_content
        ?>
        <div class="container">
            <div class="card">
                <h1 class="object-name"><?php echo $Blog_title?></h1>
                <h2 class="date">Posted Date: <?php echo $date?></h2>
                <h2 class="author">Published by: <?php echo $user_name?></h2>
                <p class="description">
                    <?php echo $Blog_description ?>
                </p>
                <a href='view_more.php?id=<?php echo $Blog_id ?>' class='btn btn_cont'>See more</a>
            </div>
        </div>
    <?php
    } // End while loop
} else {
    echo "No blog posts found."; // Handle case where no blog posts are fetched
}
?>

</body>
</html>
