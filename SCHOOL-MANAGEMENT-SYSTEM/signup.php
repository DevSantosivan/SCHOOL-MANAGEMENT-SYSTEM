<?php
include_once("connection.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $types = "users";
    $usercheck = "SELECT * FROM `users` WHERE username = '$username' AND email = '$email'";
    $result = $conn->query($usercheck);
     $count = mysqli_num_rows($result);

    if($password != $confirmpassword){
        echo ' <div class="alert-container" style="width:100%; display:flex; align-items:center; justify-content:center;">
        <div class="alert" style="background-color:red; width:450px; height:50px; position:absolute; top:10px; text-align:center; padding:10px; border-radius:5px;">
                <p style="color:#fff; font-weight:500;">Password is not Match!</p>
             </div>
        </div>';
    }
    else{
        if($count>0){
            echo ' <div class="alert-container" style="width:100%; display:flex; align-items:center; justify-content:center;">
            <div class="alert" style="background-color:red; width:450px; height:50px; position:absolute; top:10px; text-align:center; padding:10px; border-radius:5px;">
                    <p style="color:#fff; font-weight:500;">Email already exist or Username!</p>
                 </div>
            </div>';
          }
          else{
             $sql = "INSERT INTO  `users` (`username`,`email`,`contact`,`password_db`) VALUE ('$username','$email','$contact',' $password')";
             $conn->query($sql);
             echo ' <div class="alert-container" style="width:100%; display:flex; align-items:center; justify-content:center;">
            <div class="alert" style="background-color:green; width:450px; height:50px; position:absolute; top:10px; text-align:center; padding:10px; border-radius:5px;">
                    <p style="color:#fff; font-weight:500;">Successfully registerd!</p>
                 </div>
            </div>';
          }
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/account.css">
    <title>SNHS ENROLLMENT SYSTEM</title>
</head>
<body>
    <div class="container">
        <div class="information">
            <div class="img">
                <img src="image/logo.jpg" alt="">
            </div>
            <h1>SNHS ENROLLMENT SYSTEM</h1>
        </div>
        <div class="form">
            <h1>Login</h1>
            <P>Welcome back user's!</P>
            <form action="" method = "POST" enctype="multipart/form-data">
                <div class="input-field">
                    <span>Username</span>
                    <input type="text"  name="username" required>
                </div>
                <div class="input-field">
                    <span>Email</span>
                    <input type="email"  name="email" required>
                </div>
                <div class="input-field">
                    <span>Contact Number</span>
                    <input type="text"  name="contact" required>
                </div>
                <div class="input-field">
                    <span>Password</span>
                    <input type="password"  name="password" required>
                </div>
                 <div class="input-field">
                    <span>Confirm Password</span>
                    <input type="password"  name="confirmpassword" required>
                </div>
                <button type="submit" name="submit">Sing Up</button>
            </form>
            <div class="flex-choice" style="display: flex; justify-content: space-between; margin-top: 10px;"><p>Already have an account?</p><a href="login.php">Login here</a></div>
        </div>
    </div>

</body>
</html>