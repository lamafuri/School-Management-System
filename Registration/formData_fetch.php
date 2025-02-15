<?php
    include("../db_connection.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
    
        $student_name = htmlspecialchars(($_POST['fullname']));
        $address = htmlspecialchars(($_POST['address']));
        $stream = htmlspecialchars(($_POST['stream']));
        $phone = htmlspecialchars(($_POST['phone']));
        $email = htmlspecialchars(($_POST['email']));
        $dob = htmlspecialchars(($_POST['dob']));
        $comments = htmlspecialchars(($_POST['comments']));

        // photo
        $file_array = $_FILES['photoPP'];
        $file_name = basename($_FILES['photoPP']['name']);
        $tmp_name = $_FILES['photoPP']['tmp_name'];
        $filePath_location ="student_images/".$file_name;
        move_uploaded_file($tmp_name , $filePath_location);

        $sql = "INSERT INTO `registration` (`Full_Name`, `Profile_Picture`, `PP_Path`, `Email`, `Phone`, `Address`, `Stream`, `DOB`, `Comments`) VALUES (:name, :fileName, :filePath , :email, :phone, :address, :stream, :dob, :comments);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $student_name);
        $stmt->bindParam(":fileName", $file_name);
        $stmt->bindParam(":filePath", $filePath_location);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":stream", $stream);
        $stmt->bindParam(":dob", $dob);
        $stmt->bindParam(":comments", $comments);
        $stmt->execute();
        echo("<script> window.location.href='index.php?msg=\"Data Submission Successful\"'</script>");
    }