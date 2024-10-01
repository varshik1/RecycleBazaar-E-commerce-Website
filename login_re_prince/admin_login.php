<?php
session_start();

// Include your database connection file
include('../admin_area/connect.php');

if (isset($_POST["admin_login"])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Sanitize user inputs (prevent SQL injection)
    $admin_username = mysqli_real_escape_string($con, $admin_username);

    // Fetch admin record from database
    $select_query = "SELECT * FROM admin_table WHERE admin_name='$admin_username'";
    $result = mysqli_query($con, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row_data = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($admin_password, $row_data['admin_password'])) {
            // Password correct, set session variables and redirect to admin area
            $_SESSION['admin_id'] = $row_data['admin_id'];
            $_SESSION['admin_name'] = $row_data['admin_name'];

            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('../admin_area/admin_index.php','_self')</script>";
            exit(); // Ensure script stops execution after redirect
        } else {
            echo "<script>alert('Invalid Credentials: Incorrect Password')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials: User not found')</script>";
    }
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            overflow: hidden;
        }
        .main {
            background-color: cornflowerblue;
        }
        .button {
            background-color: #45ba5b;
        }
        #userLogin{
          color : red
        }
    </style>
</head>
<body>
    <div class="container-sm main mt-5 w-50 border-2 border rounded-4 p-5 shadow shadow-lg">
        <div class="d-flex flex-row justify-content-center">
            <h2 class="text-center mb-5">Admin login</h2>
        </div>

        <div class="row d-flex justify-content-sm-evenly">
            <div class="col-lg-6 col-xl-5">
                <img src="admin_login.jpg" alt="Admin registration" class="img-thumbnail w-70">
            </div>

            <div class="col-lg-6 col-xl-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label"><b>Username</b></label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="button py-2 px-3 border-1 ms-4 rounded-3" name="admin_login" value="Login">
                    </div>
                    <br>
                    <div>
                    <a class="small fw-bold mt-2 pt-1"  href="admin_login.php" class="link-danger" id="userLogin"> User Login</a></p></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
