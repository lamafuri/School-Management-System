<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration | NIST</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIST Sign Up</title>
    <link rel="stylesheet" href="../login_SignUp.css">
    <link rel="stylesheet" href="style.reg.css?v=<?php echo time(); ?>">
</head>
    <div class="image">
        <img src="../images/registration_di.jpg" id="di_img">
        <div id="info">
            <img src="../images/logo-white.png">
            <h1>Application Open Academic Year 2081-82</h1>
            <h3>Eligibility Criteria</h3>
            <div class="criteria">
                <table class="box">
                    <tr>
                        <th>Science</th>
                    </tr>
                    <tr>
                        <td>GPA 2.8</td>
                    </tr>
                    <tr> 
                        <td>Subject Grades:</td>
                    </tr>
                    <tr>
                        <td>C in Maths and Science</td>
                    </tr>
                    <tr>
                        <td>And D in other subjects</td>
                    </tr>
                </table>
                <table class="box">
                    <tr>
                        <th>Management</th>
                    </tr>
                    <tr>
                        <td>GPA 2.2</td>
                    </tr>
                    <tr> 
                        <td>Subject Grades:</td>
                    </tr>
                    <tr>
                        <td>D in each subjects</td>
                    </tr>
                    <tr>
                        <td>.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <form action="formData_fetch.php" method="post" id="#form" enctype="multipart/form-data">
        <div id="header">
            <h1><a href="../index.html">NSS</a></h1>
            <span id="line">|</span>
            <span>Registration</span>
        </div>
        <div id="inputs">
            <div class="block">
                <label for="fullname">Student's Name</label>
                <input type="text" name="fullname" id="fullname" required>
            </div>
            <div class="block">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="block stream">
                <label for="Stream">Stream</label><br>
                <select name="stream" id="streamSelect" style="height:2rem; padding:.5rem;" required>
                    <option value="">Select Stream</option>
                    <option value="Science">Science</option>
                    <option value="Management">Management</option>
                </select>
            </div>
            <div class="block">
                <label for="mobile">Mobile no.</label><br>
                <input type="number" name="phone" required>
            </div>
            <div class="block">
                <label for="email">Email</label><br>
                <input type="email" name="email" required>
            </div>
            <div class="block">
                <label for="DOB">Date of Birth</label><br>
                <input type="date" name="dob" required>
            </div>
            <div class="block">
                <label for="photoPP">Your Photo</label><br>
                <input type="file" name="photoPP" required>
            </div>
            <div class="block">
                <label for="comments">Additional comments</label><br>
                <textarea name="comments" id="" rows="10" style="width:100%"></textarea>
            </div>
            <button type="submit">Submit</button>
        </div>
        
    </form>
    <?php
        if(isset($_GET['msg'])){
            echo("<script>alert(`$_GET[msg];`)</script>");
        }
    ?>
    
</body>
</html>