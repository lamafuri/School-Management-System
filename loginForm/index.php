<?php 
include("../db_connection.php"); 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM `user_login` WHERE `Username` = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
            // Verify the hashed password
            if (password_verify($password, $result['Password'])) {
                $_SESSION['username'] = $username;

                // Move to the admin dashboard
                header("Location: ../admin/index.php");
                exit();
            } else {
                $warn = "Incorrect Password! Try Again.";
            }
        } else {
            $warn = "Username does not exist!";
        }
    } else {
        $warn = "Username or Password is empty! Fill it.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../login_SignUp.css?v=<?php echo time(); ?>">

</head>
<body>

    <?php if (isset($warn)){
            echo "<div id='warn'> $warn </div>";
            echo " <script>
                     let warn = document.getElementById('warn');
                     if (warn) {
                         setTimeout(() => { warn.remove(); }, 3000);
                     }
                    </script>";
            $warn = null;
    }
        ?>
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo "<div id='success'>$msg</div>";
            echo " <script>
                     let suc = document.getElementById('success');
                     if (suc) {
                         setTimeout(() => { suc.remove(); }, 3000);
                     }
                    </script>";

        }
        ?>


    <form action="index.php" method="post">
        <div id="header">
            <h1><a href="../index.html">NSS</a></h1>
            <span id="line">|</span>
            <span>Login Form</span>
        </div>
        <div id="inputs">
            <div class="block">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" required><br>
            </div>
            <div class="block">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required><br>
                <a href="forgotPass.php" id="forgotPass">Forgot Password?</a>
            </div>
        </div>
        <div id="buttons">
            <button type="submit" name="submit">Login</button>
            <button type="button"><a href="../signUp/index.php" style="color:white;text-decoration:none;">No Account? Sign Up</a></button>
        </div>
    </form>

</body>
</html>
