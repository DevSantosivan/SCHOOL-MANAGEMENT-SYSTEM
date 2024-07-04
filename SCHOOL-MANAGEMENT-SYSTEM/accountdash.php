<!-- <?php
session_start();
include_once("connection.php");
$data = "SELECT * FROM users";
$list = $conn->query($data);
$listrow = $list->fetch_assoc();


if(isset($_POST['SUBMIT'])){
   $fullname = $_POST['username'];
   $email = $_POST['email'];
   $contactnum = $_POST['contact'];
   $password = $_POST['password'];
   $insertq ="INSERT INTO `users`( `username`, `email`,`contact`,`password_db`) VALUES ('$fullname','$email','$contactnum','$password')";
   $conn->query($insertq);
   $_SESSION['username'] = $fullname;
}
if(isset($_POST['delete'])){
    $id = $_POST['ID'];
    $sql = "DELETE FROM users WHERE id= '$id'";
    $conn->query($sql);

    echo header("location: accountdash.php");

  } 
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>
    <title>SNHS ENROLLMENT SYSTEM</title>
</head>
<body>
     <nav class="sidebar close">
        <header> 
            <div class="image-text">
                 <span class="image">
                 <img src="image/logo.jpg" alt="" width="45">
                </span>

                <div class="text header-text">
                    <span class="name">SNHS</span>
                    <span class="name1">Admin</span>
                </div>
             </div>

      <i class='bx bx-list-ul toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="nav-links">
                    <a href="dashboard.php">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                   </li>
                  <ul class="menu-links">
                       <li class="nav-links ">
                        <a href="studentdash.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Student</span>
                        </a>
                       </li>
                       <li class="nav-links">
                        <a href="yearlevel.php">
                            <i class='bx bx-list-ol icon'></i>
                            <span class="text nav-text">Year Level</span>
                        </a>
                       </li>
                       <li class="nav-links active">
                        <a href="accountdash.php">
                            <i class='bx bxs-user-account icon'></i>
                            <span class="text nav-text">Account</span>
                        </a>
                       </li>
                  </ul>
                  
            </div>
            
            <div class="button-content">
                <li class="mode">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                      <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
     </nav>
     <!-- container -->
     <div class="container containers">
        <header><div class="flex-header">
        
<!-- search php -->
 <!-- <?php
      
    if(isset($_POST['search-btn']))  {
        $search = $_POST['search']; 

        $sql = "SELECT * FROM  users WHERE  username LIKE '%$search%'";
        $list = $conn->query($sql);
        $listrow = $list->fetch_assoc();
       
        
    }
  ?> -->
       
    </div>
      </header>
      <!-- main content form student -->
      <div class="maincontent student">
       
         <div class="student-content">
            <div class="add-student">
              <header><span class="add-student">Account List</span></header>
             <button class="btn-add" onclick="addnews()">+ New Account</button>
            </div>
            <div class="list">
           <span>Student List</span> 
           <div class="student-list" style="overflow-y: scroll; height:45vh;"> 
            <div class="table">
               <table>
               <thead class="thead" style="position:sticky; top:0px; background-color:#fff">
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact #</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 <?php do{ ?>
                     <tr>
                        <td><?php echo $listrow['id']?></td>
                        <td><?php echo $listrow['username']?></td>
                        <td><?php echo $listrow['email']?></td>
                        <td><?php echo $listrow['contact']?></td>
                        <td><?php echo $listrow['password_db']?></td>
                        <td><div class="actions">
                            <form action="" name="delete" method="POST"><button style="background-color:transparent; border:none;" name="delete" type="submit"><i class='bx bx-trash' style="color:red;"></i></button>
                            <input type="hidden" name="ID" value="<?php echo $listrow['id'];?>"></form>
                        </td>
                        
                     </tr>
                     <?php }while($listrow = $list->fetch_assoc());?>
                   

                </tbody>
               </table>
            </div>
        </div>
         </div>
      </div>
     </div>


<!-- add modal popup -->
<div class="add-account" id="contents">
    <div class="form">
        <header><span class="caption">Add New Account</span><i class='bx bx-undo exit-icon' onclick="exits()"></i></header>
        <form action="" method ="POST" enctype="multipart/form-data"> 
            <div class="input-group">
                <div class="input-field">
                    <span>Username</span>
                    <input type="text" placeholder="Username"  name="username">
                </div>
                <div class="input-field">
                    <span>Email</span>
                    <input type="text" placeholder="Email" name="email" >
                </div>
                <div class="input-field">
                    <span>Contact</span>
                    <input type="text" placeholder="Contact"  name="contact">
                </div>
                <div class="input-field">
                    <span>Password</span>
                    <input type="text" placeholder="Password"  name="password">
                </div>

                </div>
                 <button class="btn-add" name="SUBMIT" type="submit" style="margin-top:10px; float: right;">Creat</button>
            </div>
        </form>
    </div>  
</div>
   
<script>
     function addnews(){
        var content = document.getElementById("contents");

        if(content.style.display === "none"){
            content.style.display = "flex";
        }
        else{
            content.style.display = "none";
        }
     }

     function exits(){
        var content = document.getElementById("contents");

        if(content.style.display === "flex"){
            content.style.display = "none";
        }
        else{
            content.style.display = "flex";
        }
     }
</script>

     <!-- script -->
     <script src="script/admin.js"></script>
</body>
</html>