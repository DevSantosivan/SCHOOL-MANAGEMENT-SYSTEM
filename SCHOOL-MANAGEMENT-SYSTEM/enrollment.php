<?php
include_once("connection.php");


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
   $mocontact = $_POST['mothercontact'];
   $faname = $_POST['fathername'];
   $facontact = $_POST['fathercontact'];


    $upload = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $file = 'uploads/'.$upload;

    if(move_uploaded_file($tempname,$file)){
        $insertq ="INSERT INTO `students_tb`(`profilepic`, `fname`, `mname`, `lname`, `sex`, `age`, `BOD`, `POB`, `yearlevel`, `contact_num`, `email`, `mothername`, `fathername`, `mother_contact`, `father_contact`) VALUES ('$upload','$fname','$mname','$lname','$sex','$age','$BOD','$POD','$yearleve','$contactnum','$email','$moname','$mocontact','$faname','$facontact')";
        $conn->query($insertq);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style/reg.css">
    <title>SNHS ENROLLMENT SYSTEM</title>
</head>
<body>
    <div class="container">
        <div class="tittle" style="margin-bottom: 30px;"><a href="index.php">Exit</a><h2>Registration form</h2></div>
        <div class="student-list form">
         <div class="edit-content">
             <form action="" method ="POST" enctype="multipart/form-data" class="edit-container" style="display:flex;">
                 <div class="input-group">
                     <div class="profile-pic" id="profile-pic">
                         <div class="img">
                             <img src="https://www.sunsetlearning.com/wp-content/uploads/2019/09/User-Icon-Grey-300x300.png" alt="" id="profile-pic-img-upload">
                             </div>
                             <label for="input-file" class="btn-upload">+ Upload image</label>
                             <input type="file" accept="image/jpeg, image/jpeg, image/png, image/jpg" id="input-file" name="image" required>
                     </div>
                 </div>  
                 <div class="input-group" style="width:70%;">
                     <div class="input-field">
                         <span>First Name</span>
                         <input type="text" placeholder="Enter first name"  name="fname" required>
                     </div>
                     <div class="input-field">
                         <span>Middle Name</span>
                         <input type="text" placeholder="Enter middle name" name="mname" required>
                     </div>
                     <div class="input-field">
                         <span>Last Name</span>
                         <input type="text" placeholder="Enter last name"  name="lname" required>
                     </div>
                     <div class="input-field">
                         <span>Sex</span>
                         <input type="text" placeholder="Enter gender"  name="sex" required>
                     </div>
                     <div class="input-field">
                         <span>Age</span>
                         <input type="text" placeholder="Enter email address"  name="age" required>
                     </div>
                     <div class="input-field">
                         <span>Birth Date</span>
                         <input type="date"  name="birty" required>
                     </div>
                     <div class="input-field">
                        <span>Place of Birth</span>
                        <input type="text" placeholder="Enter place of birth"  name="placebirth" required>
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
                 </div>


                 <div class="input-group" style="width:70%; margin: 0px 30px;">
                    <div class="input-field">
                        <span>Email Address</span>
                        <input type="text" placeholder="Enter email address"  name="email" required>
                    </div>
                    <div class="input-field">
                        <span>Contact Number</span>
                        <input type="text" placeholder="Enter contact number"  name="contactnum" required>
                    </div>
                    <div class="input-field">
                        <span>Mother name</span>
                        <input type="text" placeholder="Mother name" name="mothername" required>
                    </div>
                    <div class="input-field">
                        <span>Mother Contact Number</span>
                        <input type="text" placeholder="Mother contact number" name="mothercontact"required>
                    </div>
                    <div class="input-field">
                        <span>Father name</span>
                        <input type="text" placeholder="Father name"  name="fathername" required>
                    </div>
                    <div class="input-field">
                        <span>Father Contact Number</span>
                        <input type="text" placeholder="Father contact number" name="fathercontact" required>
                    </div>
                    <button class="btn-add" name="SUBMIT" type="submit" style="margin-top:10px; margin-left: 40px;">Apply</button>
                </div>
            </form>
          </div>
           </div>
       </div>
       

       <script>
        let profilepic = document.getElementById("profile-pic-img-upload");
        let fileupload = document.getElementById("input-file");
          fileupload.onchange = function(){
        profilepic.src = URL.createObjectURL(fileupload.files[0]);
        }
       </script>
</body>
</html>