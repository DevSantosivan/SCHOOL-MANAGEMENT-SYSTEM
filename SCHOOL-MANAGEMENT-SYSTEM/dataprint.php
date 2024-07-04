<?php
include_once("connection.php");

$data = "SELECT * FROM students_tb";
$list = $conn->query($data);
$listrow = $list->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js' rel='stylesheet'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css" rel="stylesheet">
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/ju/jq-3.7.0/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    
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
    font-size:13px;
}
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 100vh;
        background-color:#fff4;
    }
    .container{
     width: 100%;
     padding:0px 40px;
    }
    table{
        margin:0px -40px;
    }
    .img{
       overflow:hidden;
       width: 50px;
       height:50px;
       border-radius:50%;
    }
    .img img{
        width: 100%;
        height:100%;
    }
    .exit button{
        border:none;
        padding:8px;
        color:#fff;
        cursor: pointer;
    }
    .exit button i{
        font-size:25px;
        color:#121221;
    }
</style>
<body>
    <div class="container">
        <P>SNHS ALL STUDENT LIST</P>
        <div class="exit"><a href="studentdash.php"><button><i class='bx bx-exit'></i></button></a></div>
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
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
            <tfoot>
                <tr>
                <th>#</th>
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
            </tfoot>
        </table>
    </div>
    
     <script>
          new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
     </script>

    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="text/Javascript/" src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script type="text/Javascript/" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script type="text/Javascript/" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/Javascript/" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script type="text/Javascript/" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script type="text/Javascript/" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script type="text/Javascript/" src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
</body>
</html>

