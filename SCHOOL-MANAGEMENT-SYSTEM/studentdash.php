<?php
include_once("connection.php");
$data = "SELECT * FROM students_tb";
$list = $conn->query($data);
$listrow = $list->fetch_assoc();


if(isset($_POST['SUBMIT'])){
   $fname = $_POST['fname'];
   $mname = $_POST['mname'];
   $lname = $_POST['lname'];
   $sex = $_POST['sex'];
   $age = $_POST['age'];
   $BOD = $_POST['birty'];
   $POD = $_POST['placebirth'];
   $yearleve = $_POST['yearleve'];
   $email = $_POST['email'];
   $contactnum = $_POST['contactnum'];
   $moname = $_POST['mothername'];
   $faname = $_POST['fathername'];
   $facontact = $_POST['mothercontact'];


    $upload = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $file = 'uploads/'.$upload;

    if(move_uploaded_file($tempname,$file)){
        $insertq ="INSERT INTO `students_tb`(`profilepic`, `fname`, `mname`, `lname`, `sex`, `age`, `BOD`, `POB`, `yearlevel`, `contact_num`, `email`, `mothername`, `fathername`, `father_contact`) VALUES ('$upload','$fname','$mname','$lname','$sex','$age','$BOD','$POD','$yearleve','$contactnum','$email','$moname','$faname','$facontact')";
        $conn->query($insertq);
        echo header("location: studentdash.php");
    }
}
if(isset($_POST['delete'])){
    $id = $_POST['ID'];
    $sql = "DELETE FROM students_tb WHERE id= '$id'";
    $conn->query($sql);

    echo header("location: studentdash.php");

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
     <!-- delete form -->
    <!-- <divs class="addnew-popups" id= "addnew-popupss">
       <div class="delete-form">
           <form action="delete.php" method ="POST" enctype="multipart/form-data">
           <div class="popup-success" style="width:350px; height:300px  ; padding:15px; display:flex; justify-content:center;align-items:center; flex-direction:column;">
         <img src="img/trash.gif" alt="" width="70">
         <p>Would you like to delete this item?</p>
         <div class="btn-flex">
           <button type ="submit" name="delete">Yes</button>
          <a href="student.php"><button>Discard</button></a>
         </div>
         <input type="hidden" name="ID" value="<?php echo $listrow['id'];?>">
         </div>
        </form>
        </div>
   </divs> -->

     <nav class="sidebar close">
        <header> 
            <div class="image-text">
                 <span class="image">
                 <img src="image/logo.jpg" alt="" width="45">
                </span>
                <input type="hidden" name="ID" value="<?php echo $listrow['id'];?>"></form>
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
                       <li class="nav-links active">
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
     <!-- container -->
     <div class="container containers">
        <header><div class="flex-header">
        <form action="" method ="POST" enctype = "multipart/form-data">
            <div class="search-bar" style="box-shadow: 0px 1px 3px 0px gray"><span><input type="text" name="search" placeholder="Search"></span>
            <button name = "search-btn" type="submit" style="background-color:transparent; border:none;"><i class='bx bx-search' type="submit"></i></button></div>
         </form>
<!-- search php -->
 <?php
      
    if(isset($_POST['search-btn']))  {
        $search = $_POST['search']; 

        $sql = "SELECT * FROM  students_tb WHERE fname LIKE '%$search%' || mname LIKE '%$search%' || lname LIKE '%$search%' || yearlevel LIKE '%$search%' || sex LIKE '%$search%'";
        $list = $conn->query($sql);
        $listrow = $list->fetch_assoc();
       
        
    }
  ?>
    </div>
      </header>
      <!-- main content form student -->
      <div class="maincontent student">
        
         <div class="student-content">
            <div class="add-student">
              <header><span class="add-student">Student List</span></header>
             <button class="btn-add" id="#toggleButton" onclick="addnews()">+ Add Student</button>
            </div>
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
                        <th>Action</th>
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
                        <td><div class="actions">
                            <a href='studentedit.php?id=<?php echo $listrow['id'];?>' style="text-decoration:none;"><i class='bx bxs-edit' class="btn-add"></i></a>
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

         <a href="dataprint.php"><button class="print-btn"><i class='bx bx-printer' style="font-size:15px">Print</i></button></a>
      </div>
     </div>


<!-- add modal popup -->
<div class="edit-student-popup" id="contents">
    <div class="form">
        <header><span class="caption">Add New Student</span><i class='bx bx-undo exit-icon' onclick="exits()"></i></header>
        <form action="" method ="POST" enctype="multipart/form-data">
            <div class="input-group">
                <div class="profile-pic">
                    <div class="img">
                        <img src="https://www.sunsetlearning.com/wp-content/uploads/2019/09/User-Icon-Grey-300x300.png" alt="" class="profile-pic-img">
                        </div>
                        <label for="input-file" class="btn-upload">+ Upload image</label>
                        <input type="file" accept="image/jpeg, image/jpeg, image/png, image/jpg" class="input-file" id="input-file" name="image">
                </div>
            </div>  
            <div class="input-group">
                <div class="input-field">
                    <span>First Name</span>
                    <input type="text" placeholder="Enter first name"  name="fname">
                </div>
                <div class="input-field">
                    <span>Middle Name</span>
                    <input type="text" placeholder="Enter middle name" name="mname" >
                </div>
                <div class="input-field">
                    <span>Last Name</span>
                    <input type="text" placeholder="Enter last name"  name="lname" >
                </div>
                <div class="input-field">
                    <span>Sex</span>
                    <input type="text" placeholder="Enter sex"  name="sex" >
                </div>
                <div class="input-field">
                    <span>Age</span>
                    <input type="text" placeholder="Enter sex"  name="age" >
                </div>
                <div class="input-field">
                    <span>Birth Date</span>
                    <input type="date"  name="birty" >
                </div>
                <div class="input-field">
                    <span>Place of Birth</span>
                    <input type="text" placeholder="Enter contact number"  name="placebirth" >
                </div>
                <div class="input-field">
                    <span>Year Level</span>
                    <select name="yearleve" id="">
                        <option>Select Grade</option>
                         <option value="Grade-7">Grade 7</option>
                         <option value="Grade-8">Grade 8</option>
                         <option value="Grade-9">Grade 9</option>
                         <option value="Grade-10">Grade 10</option>
                         <option value="Grade-11">Grade 11</option>
                         <option value="Grade-12">Grade 12</option>
                     </select>
                </div>
                <div class="input-field">
                    <span>Email</span>
                    <input type="text" placeholder="Enter email"  name="email">
                </div>
                <div class="input-field">
                    <span>Contact Number</span>
                    <input type="text" placeholder="Enter email"  name="contactnum">
                </div>
                <div class="input-field">
                    <span>Mother Name</span>
                    <input type="text" placeholder="Enter email"  name="mothername">
                </div>
                <div class="input-field">
                    <span>Father Name</span>
                    <input type="text" placeholder="Enter email"  name="fathername">
                </div>
                <div class="input-field">
                    <span>Parents #</span>
                    <input type="text" placeholder="Enter paren number"  name="mothercontact">
                </div>
                 <button class="btn-add" name="SUBMIT" type="submit" style="margin-top:10px">Submit</button>
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