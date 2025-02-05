<?php
    session_start();
    include "../db_connection.php";
    try{
        $id = $_GET['delete_id'];
        $stmt = $conn->prepare("DELETE FROM `user_login` WHERE `user_login`.`ID` = :uid");// do not keep placeholder inside "" or ''
        $stmt->bindParam(":uid", $id);
        $stmt->execute();
        echo "correct";
        header("Location: index.php#user");
    }
    catch(PDOException $e){
        die("". $e->getMessage());
    }
