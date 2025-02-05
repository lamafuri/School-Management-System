<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "college_project";
$port = 3307;
$dsn = "mysql:host=localhost;port=$port;dbname=$db_name";
try{
    $conn = new PDO($dsn,$db_username , $db_password );
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "". $e->getMessage();
}