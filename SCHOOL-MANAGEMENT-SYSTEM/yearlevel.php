<?php
include_once("connection.php");

$data = "SELECT * FROM students_tb";
$list = $conn->query($data);
$listrow = $list->fetch_assoc();

// $grade7 = "Grade-7";
// $grade8 = "Grade-8";
// $grade9 = "Grade-9";
// $grade10 = "Grade-10";
// $grade11 = "Grade-11";
// $grade12 = "Grade-12";

// $grade7s = "SELECT COUNT(*) AS grade7_count FROM students_tb WHERE yearlevel = 'Grade-7'";
// $result_grade7 = $conn->query($grade7s);

// $grade7s = "SELECT COUNT(*) AS grade8_count FROM students_tb WHERE yearlevel = 'Grade-8'";
// $result_grade8 = $conn->query($grade8s);

// $grade9s = "SELECT COUNT(*) AS grade9_count FROM students_tb WHERE yearlevel = 'Grade-9'";
// $result_grade9 = $conn->query($grade9s);

// $grade10s = "SELECT COUNT(*) AS grade10_count FROM students_tb WHERE yearlevel = 'Grade-10'";
// $result_grade10 = $conn->query($grade10s);

// $grade11s = "SELECT COUNT(*) AS grade11_count FROM students_tb WHERE yearlevel = 'Grade-11'";
// $result_grade11 = $conn->query($grade11s);

// $grade12s = "SELECT COUNT(*) AS grade12_count FROM students_tb WHERE yearlevel = 'Grade-12'";
// $result_grade12 = $conn->query($grade12s);

// if ($result_grade7 && $result_grade8 &&$result_grade9 &&$result_grade10 &&$result_grade11 &&$result_grade12 ) {
//     // Output male count
//     $row_grade7 = $result_grade7->fetch_assoc();
//     // Output female count
//     $row_grade8 = $result_grade8->fetch_assoc();

//     $row_grade9 = $result_grade9->fetch_assoc();

//     $row_grade10 = $result_grade10->fetch_assoc();

//     $row_grade11 = $result_grade11->fetch_assoc();

//     $row_grade12 = $result_grade12->fetch_assoc();

// } else {
    
// }
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
      <div class="maincontent">
        <header><span>Year and Level</span></header>
        <div class="overview-content flex-year" style="width:800px;">
          <a href="grade7.php"><div class="content" style="width:150px; margin:0px 5px;">
                <p style="color: rgb(234, 72, 28);">Grade 7</p>    
            </div>
            </a>
            <a href="grade8.php">
            <div class="content" style="width:150px;  margin:0px 5px;">
            <p style="color:green">Grade 8</p>       
            </div>
            </a>
            <a href="grade9.php">
            <div class="content" style="width:150px;  margin:0px 5px;">
            <p style="color:blue;">Grade 9</p>   
                   
            </div>
            </a>
            <a href="grade10.php">
            <div class="content" style="width:150px;  margin:0px 5px;">
            <p style="color: black;">Grade 10</p>   
            </div>
            </a>
            <a href="grade11.php">
            <div class="content" style="width:150px;  margin:0px 5px;">
            <p style="color: gray;">Grade 11</p>   
                  
            </div>
            </a>
            <a href="grade12.php">
            <div class="content" style="width:150px;  margin:0px 5px;">
            <p style="color: orange;">Grade 12</p>   
                 
            </div>
            </a>
        </div>
        <div class="maincontent student">
         <div class="student-content">

            <div class="searc-student">
              <header><span class="add-student">All Student List</span></header>
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
             <div class="list">
           <span>Student List</span> 
           <div class="student-list" style="overflow-y: scroll; height:45vh;"> 
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

         <a href="dataprint.php"><button class="print-btn"><i class='bx bx-printer' style="font-size:15px">Print</i></button></a>
      </div>
     </div>


     <!-- script -->

    
     <script type="text/javascript" src="script/admin.js"></script>
</body>
</html>