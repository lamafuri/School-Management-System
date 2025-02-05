<?php
    include("../db_connection.php");
    if(isset($_GET['update_id'])){
        $id = $_GET['update_id'];
        try{
            $stmt = $conn->prepare("select * from user_login where `ID`=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC); //only one data is selected
    }
    catch(PDOException $e){
        die("". $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIST Sign Up</title>
    <link rel="stylesheet" href="../login_SignUp.css">
</head>
<body>
    <form action="#" method="post" id="signUpForm">
        <div id="header">
            <h1><a href="../index.html">NSS</a></h1>
            <span id="line">|</span>
            <span>Update Passwords</span>
        </div>
        <div id="inputs">
            <div class="block">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo($row['Username'])?>" required>
            </div>
            <div class="block">
                <label for="password">Old Password</label>
                <input type="password" name="old_password" id="password" required>
            </div>
            <div class="block">
                <label for="confPassword">New Password</label>
                <input type="password" name="new_password" id="confPassword" required>
            </div>
        </div>
        <div id="buttons">
            <button type="submit">Update</button>
            <a href="../loginForm/index.php" id="info_acc">Already have an account?</a>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $input_pwd = $_POST['old_password'];
        $new_pass = $_POST['new_password'];
        //hashing the password
        $new_pass = password_hash($new_pass,PASSWORD_DEFAULT);
        require "../db_connection.php";
        if(password_verify($input_pwd,$row['Password'])){
            //here pwd is password inputed from update form
            //$row['Password'] is the password taken from database i.e hashed !! go to top of page for more
        try {
            $stmt=$conn->prepare("update `user_login` set Username = :user , Password = :pwd where ID=:id");
            $stmt->bindParam(":user",$username);
            $stmt->bindParam(":pwd",$new_pass);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            // echo "<script>alert('Account updated successfully');</script>";
            header("Location:index.php#user");
        } catch (PDOException $e) {
            echo "<script>alert('Error: " . $e->getMessage() ."');</script>";
            }
        }
        else {
            echo "<script>alert('Enter correct old password');</script>'";
        }
    }
    ?>
</body>
</html>

