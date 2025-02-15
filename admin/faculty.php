<?php session_start(); 
if(!isset($_SESSION['username'])){
    header("location: ../loginForm/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Members</title>
    <link rel="stylesheet" href="facultyStyle.css">
    <style>
        #img:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="flex">
        <div class="logo">
            <div id="img">
                <img src="../images/logo.png" alt="Logo" />
            </div>
            <script>document.getElementById("img").addEventListener('click', () => {
                    window.location.href = "index.php";

                })</script>
        </div>
        <h2 class="gallery-heading">Faculty Members</h2>
    </div>
    <div class="gallery" id="faculty-gallery"></div>
    <script src="faculty_script.js"></script>
</body>

</html>