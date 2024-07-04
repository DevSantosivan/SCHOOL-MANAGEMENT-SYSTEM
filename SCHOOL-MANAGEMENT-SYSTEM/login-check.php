<?php
include_once("connection.php");
session_start();

if(isset($_POST['submits'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $list = $conn->query($sql);

    if(mysqli_num_rows($list)> 0){
        echo header("location: enrollment.php.php");
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