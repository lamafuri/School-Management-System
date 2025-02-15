<?php session_start(); 
if(!isset($_SESSION['username'])){
    header("location: ../../loginForm/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Request | NIST</title>
    <link rel="stylesheet" href="../../output.css?v=<?php echo time();?>">
    <style>
        body{
            padding: 2rem;
        }
        nav{
            display: flex;
            justify-content: center;
        }
        table , th , td{
            border:1px solid black;
        }
        th, td{
            padding: 1rem;
        }
        h1{
            font-size: 2rem;
            font-weight: 600;
            width: 70vw;
            margin: auto;
        }
        .imgCol{
            display: flex;
            justify-content: center;
            border: none;
            border-bottom: 1px solid black;
        }
        .imgBox{
            height: 4rem;
            width: auto;
        }

        .ppImg{
            height: 100%;
            width: auto;
            object-fit: cover;
            border-radius:50% ;
        }
        .buttons{
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        #home:hover{
            cursor: pointer;
        }
        
      
    </style>
</head>
<body>
    <nav class="flex justify-center">
        <img src="../../images/logo.png" id="home">
        <script>document.getElementById("home").addEventListener('click',()=>{
            window.location.href = "../index.php";
            console.log("pass");
        })</script>
        <h1 class="">Registration Request</h1>
    </nav>
    <!-- <img src='../Registration/student_images/Screenshot (13) - Copy.png' alt=""> -->
    <!-- student_images/Screenshot (13) - Copy.png -->
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Stream</th>
            <th>DOB</th>
            <th>Comment</th>
            <th>Operation</th>
        </tr>
        <?php

            include("../../db_connection.php");
            $stmt = $conn->query("select * from `registration`");
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // print_r( $results );
            foreach ($results as $row) {
                echo("<tr><td>".$row['ID']."</td>");
                $pic_path = '../../Registration/'.$row['PP_Path'];
                echo("<td class='imgCol'><div class='imgBox'><img src=\"$pic_path\" class='ppImg'></div></td>");
                echo("<td>".$row['Full_Name']."</td>");
                echo("<td>".$row['Email']."</td>");
                echo("<td>".$row['Phone']."</td>");
                echo("<td>".$row['Address']."</td>");
                echo("<td>".$row['Stream']."</td>");
                echo("<td>".$row['DOB']."</td>");
                echo("<td>".$row['Comments']."</td>");
                echo("<td><div class='buttons'>
                        <button class='bg-green-800 text-white px-3 rounded-sm' onclick='accept($row[ID])'>Accept</button>
                        <button class='bg-red-600 text-white px-3 rounded-sm' onclick='remove($row[ID])'>Reject</button>
                    </div></td></tr>");
            }
        ?>
    </table>
<script>
    function remove(id){
        window.location.href="reject.php?id="+id;
    }
    function accept(id){
        window.location.href="accept.php?id="+id;
    }
    <?php 
    if(isset($_GET["msg"])){
        echo("alert('$_GET[msg])");
    }
    
    ?>
</script>
</body>
</html>