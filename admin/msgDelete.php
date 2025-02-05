<?php
    include("../db_connection.php");
    $msgId = $_GET['msgId'];
    if(isset($_GET['msgId'])){
        echo $msgId;
    try{
        $stmt = $conn->prepare("DELETE FROM `contact_us` WHERE `contact_us`.`ID` = :msgId");
        $stmt->bindParam(":msgId",$msgId);
        $stmt->execute();
        header("Location: index.php#msg");
    }
    catch(PDOException $e) {
        die("". $e->getMessage());
    }
}