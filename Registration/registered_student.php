<?php session_start(); 
if(!isset($_SESSION['username'])){
    header("location: ../loginForm/index.php");
    exit();
}
?>
<?php
require("../db_connection.php");
$sql = "SELECT * FROM `registered_student`";
$stmt = $conn->query($sql);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="styles.done.css">
</head>
<body>

    <nav>
        <div class="logo" id="home"><img src="../images/logo.png" alt=""></div>
        <script>document.getElementById("home").addEventListener('click',()=>{
            window.location.href = "../admin/index.php";
            console.log("pass");
        })</script>
        <div class="logo topic">Registered Sudent</div>
    </nav>

    <h2>Student Details</h2>
    <div class="student-container">
        <?php
        foreach ($students as $student) {
            $std_det ="<div class='card'>
                            <img src='$student[PP_Path]' alt='Student Photo'>
                            <h3>$student[Full_Name]</h3>
                            <p>ID: $student[ID]</p>
                            <p>Stream: $student[Stream]</p>
                            <p>Phone: $student[Phone]</p>
                            <p>Address: $student[Address]</p>
                            <p>DOB: $student[DOB]</p>
                            <p>Phone: $student[Phone]</p>
                        </div>";
            echo $std_det;
        }
        ?>
    </div>
</body>
</html>
