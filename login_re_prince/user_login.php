<?php 
include('../admin_area/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user Login</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="your-integrity-value-here" crossorigin="anonymous">
  <style>
    body {
      overflow: hidden;
    }
    
    .main{
          background-color: cornflowerblue;
        }
        .button{
          background-color:#45ba5b;
        }
        
        #adminLogin{
          color : red
        }
  </style>


</head>

<body>
<div class="container-sm  main mt-5 w-50  border-2  rounded-4 p-5  shadow-lg">
   
    <div class="d-flex flex-row justify-content-center">
      <h2 class="text-center mb-5">User login </h2>
      
    </div>
    <div class="row d-flex justify-content-sm-evenly">
      <div class="col-lg-6 col-xl-5">
        <img src="admin_login.jpg" alt="Admin registration" class="img-fluid">
      </div>

      <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
          <div class="form-outline mb-4">
            <label for="username" class="form-label"> <b>Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" require class="form-control">
          </div>

          <div class="form-outline mb-4">
            <label for="password" class="form-label">password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" require class="form-control">
          </div>

          <div>
            <input type="submit" class="button py-2 border border-black ms-5 rounded-3 px-3 border-0" name="user_login" value="Login">
            <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="user_registration.php" class="link-danger">Register</a>
              <br>
            <a class="small fw-bold mt-2 pt-1"  href="admin_login.php" class="link-danger" id="adminLogin"> admin Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>


</body>

</html>

<?php
if (isset($_POST["user_login"])) {
  // Ensure your database connection is properly established and the $con variable is defined
  session_start();
  $user_username = $_POST['username'];
  $user_password = $_POST['password'];
  $_SESSION['user_username'] = $user_username;


  $select_query = "SELECT * FROM `user_table` WHERE username='$user_username'";
  $result = mysqli_query($con, $select_query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row_data = mysqli_fetch_assoc($result);

    // Changed from $row_data['$user_password'] to $row_data['user_password']
    if ($user_password=== $row_data['user_password']) {
      echo "<script>alert('Login successful')</script>";
      echo "<script>window.open('../index.php','_self')</script>";


    } else {
      echo "<script>alert('Invalid Credentials: Incorrect Password')</script>";
    }
  } else {
    echo "<script>alert('Invalid Credentials: User not found')</script>";
  }
}

?>