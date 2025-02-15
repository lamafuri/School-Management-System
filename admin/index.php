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
    <title>Admin | NIST</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/80934cd64a.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        <div class="logo">
            <img src="../images/logo.png" alt="logo">
        </div>
        <div class="header">
            <h1>Admin Page</h1>
        </div>
        <div class="navBar">
            <a href="#"><img id="profilePic" src="../images/profile_default.jpeg" alt=""></a>
        </div>
        <div id="username">
            <p><?php
            echo $_SESSION['username']?></p>
        </div>
    </nav>
    <div id="profile-dropdown">
        <a href="logout.php"><button><i class="fa-solid fa-right-from-bracket"></i>  Log Out</button></a>
    </div>
    <script>
        let logoutBtn =document.getElementById("profile-dropdown");
        let status = logoutBtn.style.display;
        document.getElementById("profilePic").addEventListener("click",()=>{
            if(status == 'none'){
            logoutBtn.style.display = 'block';
            status = 'shown';
            }
            else{
                logoutBtn.style.display='none';
                status = 'none';
            }
        })
        document.getElementById("profilePic").addEventListener("mouseover",()=>{
            logoutBtn.style.display ='block';
        })
    </script>
    <section id="dashboard">
        <div class="box" id="facultyBox"><p>Faculty</p></div>
        <script>document.getElementById("facultyBox").addEventListener('click',()=>{
            window.location.href = "faculty.php";
        })</script>
        <div class="box" id="userBox"><p>User</p></div>
        <div class="box" id="reg_std"><p>Registered Students</p></div>
        <div class="box" id="reg_req"><p>Registration Request</p> </div>
        <script>
        document.getElementById("reg_req").addEventListener('click',()=>{
            window.location.href = "Register/register_request.php";
            
        })
        document.getElementById("reg_std").addEventListener('click',()=>{
            window.location.href = "../Registration/registered_student.php";
            
        })
        </script>
        <div class="box" id="msgBox"><p>Message Received</p></div>
    </section>
    <section id="msg">
        <h1>Message Received From Contact Form</h1>
        <!-- confirm box -->
        <div class="confirmBox" id="confirmBox">
            <div class="upper">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div class="info">
                    <h2>Do you really want to delete it!</h2>
                    <p>You are about to delete this account. <br>
                    You won't be able to recover your account once it is deleted.</p>
                    <div class="line"></div>
                </div>
            </div>
            <div class="buttons">
                <button id="cancel" class="confirm-btn">Cancel</button>
                <button id="delete" class="confirm-btn"><i class="fa-solid fa-trash"></i>  Delete</button>
            </div>
        </div>
        <div class="res-table">
        <table border="1">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Date</th>
                <th>Operator</th>
            </tr>
            <!-- PHP CODE -->
             <!-- Read Operation -->
            <?php
                include "../db_connection.php";
                // echo $db_username ;
                try{
                    $stmt = $conn->prepare("select * from contact_us");
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $sn = 1;
                    foreach($result as $row){
                        $msgId = $row['ID'];
                        echo "<tr><td>".$sn++."</td>";
                        echo "<td>".$row['Name']."</td>";
                        echo "<td>".$row['Email']."</td>";
                        echo "<td>".$row['Phone_No']."</td>";
                        echo "<td>".$row['Message']."</td>";
                        echo "<td>".$row['Submitted_At']."</td>";
                        echo "<td><button class ='delete single' style = 'width:2rem; margin-left:1rem;' onclick='deleteId($msgId);'><a><i class=\"fa-solid fa-trash\"></i></a></button></td></tr>";
                    }
                }
                catch(PDOException $e){
                    echo "".$e->getMessage()."";
                }
            ?>
            <script>
                document.getElementById("cancel").addEventListener('click',()=>{
                document.getElementById("confirmBox").style.display='none';
                    });
                function deleteId(msgId){
                    document.getElementById('confirmBox').style.display ="block";
                    document.getElementById('delete').addEventListener('click',()=>{
                        console.log(msgId);
                        window.location.assign("msgDelete.php?msgId=" + msgId); //here i took chatgpt reference
                    })
                    }
            </script>
        </table>
        </div>
    </section>
    <section id="user">
        <h1>User Details</h1>
        <div class="create"> 
            <button class="but"><a href="../signUp/index.php">Add User</a></button>
        </div>
        <div class="res-table">
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th >Operation</th>
            </tr>
            <?php
            try{
                $stmt = $conn->prepare("select * from user_login;");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $id = $row['ID'];
                    echo "<tr><td>".$row['ID']."</td>";
                    echo "<td>".$row['Username']."</td>";
                    echo "<td>".$row['Password']."</td>";
                    echo  "<td id='operation'>
                    <button class='change but' style='width:fit-content;'><a href="."updateAcc.php?update_id=$id"."><i class=\"fa-solid fa-key\"></i>Change Password</a></button>
                    <button class='delete but' style = 'margin-top:.7rem;' onclick = deleteAcc($id)><a><i class=\"fa-solid fa-trash\"></i>    Delete Account</a></button>
                </td></tr>";
                }
            }
            catch(PDOException $e){
                echo "".$e->getMessage();
            }
            ?>
            <script>
                function deleteAcc(id){
                    let todo = document.getElementById("confirmBox");
                    todo.style.display = "block";
                    document.getElementById('delete').addEventListener('click',()=>{
                        console.log(id);
                        window.location.href ="deleteAcc.php?delete_id="+id;
                    });
                }
            </script>
        </table>
        </div>
    </section>
    <script src="script.js"></script>

</body>
</html>