<?php
include_once("connection.php");
session_start();
$data = "SELECT * FROM students_tb";
$list = $conn->query($data);
$listrow = $list->fetch_assoc();
$total = $list->num_rows;
$male = "male";
$female = "female";
$ID = "username";

$sql_male = "SELECT COUNT(*) AS male_count FROM students_tb WHERE sex = 'male'";
$result_male = $conn->query($sql_male);

$sql_female = "SELECT COUNT(*) AS female_count FROM students_tb WHERE sex = 'female'";
$result_female = $conn->query($sql_female);

if ($result_male && $result_female) {
    // Output male count
    $row_male = $result_male->fetch_assoc();

    // Output female count
    $row_female = $result_female->fetch_assoc();

} else {
    echo "Error: " . $conn->error;
}


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
                <li class="nav-links active">
                    <a href="#">
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
                       <li class="nav-links">
                        <a href="yearlevel.php">
                            <i class='bx bx-list-ol icon'></i>
                            <span class="text nav-text">Year Level</span>
                        </a>
                       </li>
                       <li class="nav-links">
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
     <div class="container containers">
        <!-- <header><div class="flex-header">
             <div class="search-bar"><span><input type="text" placeholder="Search"></span><i class='bx bx-search'></i></div> -->
        <!-- <div class="image-user" style="float:right">
            <div class="img logout">
                 <img src="img/prof2.jpg" alt="">
            </div>
            <span class="users">Ivansantos@gmail.com</span>
        </div>
    </div> -->
      <!-- </header> -->
      
      <div class="maincontent">
        <header><span>Dashbaord</span></header>
        <P>SYS 2024-2025</P>
        <div class="overview-content">
            <div class="content">
                <h4 style="color: rgb(115, 253, 10);"><?php echo $total?></h4>
                <p>Total Students</p>
            </div>
            <div class="content">
                <h4 style="color: rgb(234, 72, 28);"><?php echo $total?></h4>
                <p>Total Enrolled</p>
                 <div class="gender" style="display: flex;">
                    <span style="display: flex;">female<p style="color: red; margin: 0px 5px;"><?php echo $row_female["female_count"]?></p></span>
                    <span style="display: flex;">Male<p style="color: rgb(32, 41, 211); margin: 0px 5px;"><?php echo $row_male["male_count"]?></p></span>
                 </div>  
            </div>
            <a href="accountdash.php">
            <div class="content">
                <p>Registered Account</p>
            </div>
            </a>
        </div>
         <div class="list">
           <span>Student List</span> 
           <div class="student-list" style="overflow-y: scroll; height:60vh;"> 
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
                        <th>Year Level</th>
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
                        <td><?php echo $listrow['yearlevel']?></td>
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


     <!-- script -->

     <script src="script/admin.js"></script>
</body>
</html>