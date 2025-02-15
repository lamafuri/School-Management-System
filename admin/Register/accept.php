<?php
    $id = $_GET['id'];
    try{
        include("../../db_connection.php");
        
        // recode fetching
        $fetch_sql = "select * from `registration` where `ID`=$id";
        $stmt = $conn->query($fetch_sql);
        $std = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $std['Full_Name'];
        $pic = $std['Profile_Picture'];
        $pic_path = $std['PP_Path'];
        $email = $std['Email'];
        $phone = $std['Phone'];
        $dob = $std['DOB'];
        $address = $std['Address'];
        $stream = $std['Stream'];
        // inseting into registered student
        $sql =  "INSERT INTO `registered_student` (`ID`, `Full_Name`, `Profile_Picture`, `PP_Path`, `Email`, `Phone`, `Address`, `Stream`, `DOB`) VALUES (:id, :name, :pic, :pic_path, :email, :phone,:address, :stream, :dob);";
        $stmt = $conn->prepare($sql);
        // binding
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":pic", $pic);
        $stmt->bindParam(":pic_path", $pic_path);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":stream", $stream);
        $stmt->bindParam(":dob", $dob);
        $insertion = $stmt->execute();


        // deleting from registration
        $delete_sql = "DELETE FROM `registration` WHERE `registration`.`ID` = $id";
        $deletion = $conn->query($delete_sql);

        if($deletion && $insertion){
            header("Location: register_request.php");
        }
        else{
            echo("<script>alert('Form Acception unsuccessfull');</script>"); 
        }

    }
    catch(PDOException $e){
        echo($e->getMessage());
    }