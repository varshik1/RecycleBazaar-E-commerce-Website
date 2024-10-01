<!DOCTYPE html>
<html>
<head>
    <title>Admin Registration Form</title>
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
    </style>
</head>
<body>
    <div class="container-sm main mt-5 w-50 border-2 border rounded-4 p-5 shadow shadow-lg">
        <h2 class="text-center">Admin Registration</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="admin_name" class="form-label">Name:</label>
                <input type="text" id="admin_name" name="admin_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="admin_email" class="form-label">Email:</label>
                <input type="email" id="admin_email" name="admin_email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="admin_password" class="form-label">Password:</label>
                <input type="password" id="admin_password" name="admin_password" class="form-control" required>
            </div>

            <button type="submit" class="btn button">Submit</button>
        </form>

        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root"; // Default username for XAMPP MySQL
        $password = ""; // Default password for XAMPP MySQL
        $dbname = "mystore";

        // Establishing connection to MySQL database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieving form data (assuming form submits POST data)
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Escape user inputs for security
            $admin_name = $conn->real_escape_string($_POST['admin_name']);
            $admin_email = $conn->real_escape_string($_POST['admin_email']);
            $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT); // Hash the password for security

            // Prepare SQL insert statement
            $sql = "INSERT INTO admin_table (admin_name, admin_email, admin_password)
                    VALUES ('$admin_name', '$admin_email', '$admin_password')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success' role='alert'>New record created successfully</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }

        // Close MySQL connection
        $conn->close();
        ?>
    </div>
</body>
</html>
