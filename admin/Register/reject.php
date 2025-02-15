<?php
    $id = $_GET['id'];
    include("../../db_connection.php");
    try{
        $sql = "DELETE FROM `registration` WHERE `registration`.`ID` = $id";
        $result = $conn->query($sql);
        if($result){
            header("Location: register_request.php");
        }
        else{
            echo("<script>alert('Form Rejection unsuccessfull');</script>"); 
        }
    }
    catch(Exception $e){
        echo($e->getMessage() ."");
    }