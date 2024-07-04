<?php
include_once("connection.php");

$grade = "Grade-11";

$sql = "SELECT * FROM students_tb WHERE yearlevel LIKE '%$grade%'";
 $list = $conn->query($sql);
 $listrow = $list->fetch_assoc();
?>
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
                       <li class="nav-links">
                        <a href="studentdash.php">
                            <i class='bx bxs-user icon'></i>
                            <span class="text nav-text">Student</span>
                        </a>
                       </li>
                       <li class="nav-links active">
                        <a href="#">
                            <i class='bx bx-list-ol icon'></i>
                            <span class="text nav-text">Year Level</span>
                        </a>
                       </li>
                       <li class="nav-links">
                        <a href="account_dash.php">
                            <i class='bx bxs-user-account icon'></i>
                            <span class="text nav-text">Account</span>
                        </a>
                       </li>
                  </ul>
                  
            </div>
            
            <div class="button-content">
                <li class="mode">
                    <a href="">
                        <i class='bx bx-log-out icon'></i>
                      <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
     </nav>
     <div class="container containers">
    
        <div class="maincontent student">
         <div class="student-content">

            <div class="searc-student">
              <header><span class="add-student">Grade 11 Student</span></header>
              <form action="" method ="POST" enctype = "multipart/form-data">
            <div class="search-bar"><span><input type="text" name="search" placeholder="Search"></span>
            <button name = "search-btn" type="submit" style="background-color:transparent; border:none;"><i class='bx bx-search' type="submit"></i></button></div>
         </form>
            </div>
            <!-- search php -->
       <?php
      
      if(isset($_POST['search-btn']))  {
          $search = $_POST['search']; 
  
          $sql = "SELECT * FROM  students_tb WHERE fname LIKE '%$search%' || mname LIKE '%$search%' || lname LIKE '%$search%' || yearlevel LIKE '%$search%' || sex LIKE '%$search%'";
          $list = $conn->query($sql);
          $listrow = $list->fetch_assoc();
         
          
        }
      ?>
              <div class="student-list">
                <div class="table">
                <table>
                <thead class="thead" style="position:sticky; top:0px; background-color:#fff">
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Birth Date</th>
                        <th>Place of Birth</th>
                        <th>Email</th>
                        <th>Contact #</th>
                        <th>Mother</th>
                        <th>Father</th>
                        <th>Parent #</th>
                    </tr>
                </thead>
                <tbody>
                <?php do{ ?>
                     <tr>
                        <td><?php echo $listrow['id']?></td>
                        <td><div class="img"><img src="uploads/<?php echo $listrow['profilepic']?>" alt=""></div></td>
                        <td><?php echo $listrow['fname']?><span> </span> <?php echo $listrow['mname']?> <?php echo $listrow['lname']?></td>
                        <td><?php echo $listrow['sex']?></td>
                        <td><?php echo $listrow['age']?></td>
                        <td><?php echo $listrow['BOD']?></td>
                        <td><?php echo $listrow['POB']?></td>
                        <td><?php echo $listrow['contact_num']?></td>
                        <td><?php echo $listrow['email']?></td>
                        <td><?php echo $listrow['mothername']?></td>
                        <td><?php echo $listrow['fathername']?></td>
                        <td><?php echo $listrow['father_contact']?></td>
                        
                     </tr>
                     <?php }while($listrow = $list->fetch_assoc());?>
                   

                </tbody>
               </table>
                </div>
            </div>
        
         </div>
     </div>
      </div>
     </div>
      </div>
     </div>


     <!-- script -->

     <script src="script/admin.js"></script>
</body>
</html>