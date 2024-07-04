<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNHS ENROLLMENT SYSTEM</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
}

    .container{
        width: 100%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .container .message{
        width: 50%;
        padding: 0px 2%;
    }
    .container .message h1{
        font-size: 55px;
        font-weight: 900;
        color: rgba(107, 9, 9, 0.887);
    }
    .container .choice-login{
        width: 50%;
        display: flex;
    }
    .container .choice-login .choices{
        width: 250px;
        height: 300px;
        text-decoration: none;
        margin: 0px 20px;
        box-shadow: 0px 3px 10px rgb(0,0,0.5);
        padding: 20px 20px;
        transition: all 0.3s ease;
    }
    .container .choice-login .choices:hover{
        box-shadow: 0px 3px 20px rgb(198, 21, 30);
    }
    .container .choice-login .choices h3{
        color: #fff;
        font-size: 30px;
    }
    .container .choice-login .choices p{
        color: #fff;
        font-size: 14px;
        font-weight: 300;
    }
    .admin{
        background: linear-gradient(rgba(0, 0, 1, 0.375), rgba(0, 0, 1, 0.572)),url(image/adminwork.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .enrollemt{
        background: linear-gradient(rgba(0, 0, 1, 0.375), rgba(0, 0, 1, 0.572)),url(image/Registrar-Job-Description.webp);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
    <div class="container">
        <div class="message">
         <div class="logo">
            <img src="image/logo.jpg" alt="">
         </div>
         <h1>WELCOME TO SEMIRARA NATIONAL HIGH SCHOOL</h1>
        </div>
        <div class="choice-login">
            <a href="login.php">
                <div class="choices enrollemt">
                    <img src="image/checklist.png" alt="">
                    <h3>Enrollment Form</h3>
                    <p>Login to <br> Enrollment Form</p>
                  </div>
            </a>
            <a href="admin.php">
            <div class="choices admin">
                <img src="image/administrator.png" alt="">
                <h3>Admin</h3>
                <p>Login to <br> Admin</p>
              </div>
        </div>
        </a>
    </div>
</body>
</html>