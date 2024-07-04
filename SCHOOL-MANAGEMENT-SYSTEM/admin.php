<?php
include_once("connection.php");
session_start();

if(isset($_POST['submits'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_tb WHERE email = '".$email."' AND password ='".$password."'";
    $list = $conn->query($sql);

    if(mysqli_num_rows($list)> 0){
        echo header("location: dashboard.php");
    }
    else {
        echo ' <div class="alert-container" style="width:100%; display:flex; align-items:center; justify-content:center;">
        <div class="alert" style="background-color:red; width:450px; height:50px; position:absolute; top:10px; text-align:center; padding:10px; border-radius:5px;">
                <p style="color:#fff; font-weight:500;">Invalid Email or Password!</p>
             </div>
        </div>';
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
            <P>Welcome back Admin!</P>
            <form action="" method = "post">
                <div class="input-field">
                    <span>Username</span>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>
                <div class="input-field">
                    <span>Password</span>
                    <input type="password" placeholder="Enter your password" name="password" required>
                </div>
                <button type="submit" name="submits">Login</button>
            </form>
        </div>
    </div>
   

</body>
</html>