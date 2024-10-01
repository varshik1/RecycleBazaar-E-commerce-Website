<?php 
include('../admin_area/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- bootstrap css link -->
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
     
        .main{

background-color: cornflowerblue;

        }
        .button{
          background-color:#45ba5b;
          margin-left: 30%;
        }
     </style>
</head>

<body>
<div class="container-sm  main mt-5 mb-5 w-50  border-3 border rounded-5 p-5 shadow shadow-lg">
      
    
    <div class="d-flex flex-row justify-content-center"> <h2 class="text-center mb-5">user registration </h2>
        <!-- <p class="small fw-bold mt-2 pt-1"> admin  <a href="admin_registration.php" class="link-danger">registration</a></p> -->
    </div>   
         <div class=" d-flex flex-column align-items-center position-relative">
        <!-- <div class="col-lg-6 col-xl-5"> -->
        <!-- <div class="row d-flex justify-contet-center"> -->
    
            
                <form action="" method="post" enctype="multipart/form-data">

                    <!-- FOR USER NAME -->
                    <div class=" mb-2">
                        <lable for="user_username" class="form-lable"> <b>Username</lable>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username" />
                    </div><br>

                    <!-- FOR EMAIL -->
                    <div class="form-email  ">
                        <lable for="user_email" class="form-lable">Email</lable>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="user_email" />
                    </div><br>

                    <!-- FOR IMAGE  -->
                    <div class="form-image  ">
                        <lable for="user_image" class="form-lable">Image</lable>
                        <input type="file" id="user_image" class="form-control" placeholder="Enter your Image" autocomplete="off" required="required" name="user_image" />
                    </div><br>

                    <!-- FOR PASSWORD  -->
                    <div class="form-password  ">
                        <lable for="user_password" class="form-lable">Password</lable>
                        <input type="password" id="user_password" class="form-control" placeholder=" password" autocomplete="off" required="required" name="user_password" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                    </div><br>

                    <div class="form-password  ">
                        <lable for="conf_user_password" class="form-lable">Confirm Password</lable>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password" />
                    </div><br>

                    <!-- FOR USER LOCATION -->
                    <div class="form-location">
                        <lable for="user_location" class="form-lable">location</lable>
                        <input type="text" id="user_location" class="form-control" placeholder="Enter your location" autocomplete="off" required="required" name="user_location" />
                    </div><br>

                    <!-- FOR USER CONTACT -->
                    <div class="form-contact">
                        <lable for="user_contact" class="form-lable">Contact</lable>
                        <input type="text" id="user_contact" class="form-control" pattern="[789][0-9]{9}" placeholder="Enter your Contact" autocomplete="off" required="required" name="user_contact" />
                    </div><br>
                    <div class="mt-2 ">
                        <input type="submit" value="Register" class="button py-2 px-3 border-1 rounded-3 " name="user_register" />
                        <p class=" small fw-bold mt-2 pt-1 mb-0"> Already have an account?
                            <a href="user_login.php" class="text-danger"> Login</a>
                        </p>
                    </div>
                </form>
        
        </div>
    



</body>

</html>

<?php 
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_location'];
    $user_contact = $_POST['user_contact'];
    $user_ip=getIPAddress();
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

$select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
$result=mysqli_query($con,$select_query);  
$row_count=mysqli_num_rows($result);
if($row_count> 0){
    echo "<script>alert('username and email already exist')</script>";
}else if($user_password!=$conf_user_password){
    echo "<script>alert('passwords do not match')</script>";
}
else{
     // Ensure the file is uploaded and not empty
    if (!empty($user_image_tmp)) {
        $user_image = $_FILES['user_image']['name'];
        $upload_directory = "./user_images/" . $user_image;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($user_image_tmp, $upload_directory)) {
            // File moved successfully
            $user_ip = $_SERVER['REMOTE_ADDR'];

            $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

            // Perform the SQL query
            $sql_execute = mysqli_query($con, $insert_query);

            if($sql_execute){
                echo "<script>alert('Sign Up Successful')</script>";  
                echo "<script>window.open('user_login.php','_self')</script>";


            } else {
                die(mysqli_error($con));
            }
        } else {
            // File upload failed
            echo "File upload failed.";
        }
    } else {
        // No file uploaded
        echo "Please upload a file.";
    }
}

   
    
}
?>
