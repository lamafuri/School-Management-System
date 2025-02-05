<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIST Sign Up</title>
    <link rel="stylesheet" href="../login_SignUp.css">
</head>
<body>
    <form action="" method="post" id="signUpForm">
        <div id="header">
            <h1><a href="../index.html">NSS</a></h1>
            <span id="line">|</span>
            <span>Sign Up</span>
        </div>
        <div id="inputs">
            <div class="block">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="block">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="block">
                <label for="confPassword">Confirm Password</label>
                <input type="password" name="confPassword" id="confPassword" required>
            </div>
        </div>
        <div id="buttons">
            <button type="submit">Sign Up</button>
            <a href="../loginForm/index.php" id="info_acc">Already have an account?</a>
        </div>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $pwd = $_POST['password'];
        $confirmPwd = $_POST['confPassword'];

        //verify if the username already exist or not in the database
        include"../db_connection.php";
        $cod = $conn->prepare("select * from `user_login` where `Username`=:username");
        $cod->bindParam(":username",$username);
        $cod->execute();
        $user_exists = $cod->fetchColumn() > 0; // Efficient user existence check
        if(!$user_exists){
            if ($pwd === $confirmPwd) {
                $pwd = password_hash($pwd, PASSWORD_DEFAULT);

                try {
                    $stmt = $conn->prepare("INSERT INTO user_login (`Username`, `Password`) VALUES (:username, :pwd)");
                    $stmt->bindParam(":username",$username);
                    $stmt->bindParam(":pwd",$pwd);
                    $stmt->execute();
                    echo "<script>alert('Account created successfully');</script>";
                    header("location: ../loginForm/index.php?msg=Account Created Successfully");
                    exit();
                } catch (PDOException $e) {
                    echo "<script>alert('Error: " . $e->getMessage() ."');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match. Please try again.');</script>";
            }
    }
    else{
    echo "<script>alert('Username already exists! Try other');</script>";
    }
    }
    ?>
</body>
</html>
