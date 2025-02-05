<?php require_once("../db_connection.php"); ?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    try{
    $stmt = $conn->prepare("insert into contact_us (`Name`,`Email`,`Phone_No`,`Message`) values(:name,:email,:phone,:msg)");
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":msg",$msg);
    
    //Execute
    $stmt->execute();
    echo "<style>p{
        padding:20px;
        color:black;
        background-color:lightgreen;
        border:4px solid green;
    }
        button a{
            color:white;
            text-decoration:none;
    }
            button{
            background-color:blue;
            border:2px solid lightblue;
            padding:10px 15px;
    }
            
        </style>";
    echo "<p >Message Successfully sent</p>";
    echo "<button ><a href= 'index.php'>Back</a></button>";
    // header("Location:index.php");

    }
    catch(PDOException $e){ 
        die("".$e->getMessage());
}
}
