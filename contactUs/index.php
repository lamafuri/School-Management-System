<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIST Contact Us</title>
    <link rel="stylesheet" href="../login_SignUp.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/80934cd64a.js" crossorigin="anonymous"></script>

</head>
<body id="contactFormBody">
    <div id="contactInfo">
        <div id="box">
            <div class="content">
                <div id="Con_icons"><i class="fa-solid fa-location-pin"></i></div>
                <p>
                    <span>Address</span><br>
                    Lainchour , Kathmandu <br>
                    Nepal
                </p>
            </div>
            <div class="content">
                <div id="Con_icons"><i class="fa-solid fa-phone"></i></div>
                <p>
                    <span>Phone</span><br>
                    +977 (1) 4523706 / 4522050 <br>+977 (1) 4535408 / 4529035 <br>+977 (1) 4528724 / 4535243
                </p>
            </div>
            <div class="content">
                <div id="Con_icons"><i class="fa-solid fa-envelope"></i></div>
                <p>
                    <span>Email</span><br>
                    info@nss.edu.np, nistcoll@gmail.com
                </p>
            </div>
        </div>

    </div>
    <form action="data_insertion.php" method="post" id="contactUs">
        <div id="header">
            <h1><a href="../index.html">NSS</a></h1>
            <span id="line">|</span>
            <span>Contact Us</span>
        </div>
        <div id="inputs">
            <div class="block">
                <label for="Name">Name</label><br>
                <input type="text" name="name" id="name" required> <br>
            </div>
            <div class="block">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required><br>
            </div>
            <div class="block">
                <label for="phone">Phone Number</label><br>
                <input type="number" name="phone" id="phone" required><br>
            </div>
            <div class="block">
                <label for="msg">Message</label><br>
                <textarea name="msg" id="msg" cols="30" rows="10"></textarea> <br>
            </div>
        </div>
        <div id="buttons">
            <button type="submit">Submit</button>
        </div>
    </form>

</body>

</html>