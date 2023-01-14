<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>";
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register Page</title>
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }

        form {
            width: 90%;
            margin: 20px;
            padding: 40px;
            background: #f4f7f8;
        }
        
        .container1 {
            display: flex;
            align-items: center;
        }
        
        .text {
            padding-right: 685px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }

    </style>
    <script>
        var check = function() {
            if(document.getElementById('user_password').value.length < 5) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Password must at least 6 characters!';
            } else if (document.getElementById('user_password').value !=
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Both password is not matching!';
            } else {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password OK!';
            }
        }
        
        function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
        }
        
        function password() {
            var x = document.getElementById("user_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        
        function password1() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3" enctype="multipart/form-data">
            <div class="container1">
                <div class="text">
                    <h1><strong>Registration Form</strong></h1>
                </div>
                <img class="float-right" src="../images/others/logo.png" style = "width: 100; height: auto;">
            </div>
            <hr><br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="user_pic">Profile Picture:*</label>
                <div class="col-8">
                    <input class="form-control" type="file" name="user_pic" id="user_pic" accept="image/png, image/jpeg, image/jpg" onchange="preview()" required>
                    <br><img src="https://via.placeholder.com/200x200?text=No+Picture" id="frame" class="img-thumbnail" width="200" height="200">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="name">Full Name (XXX XXX XXX):*</label>
                <div class="col-8">
                    <input type="name" class="form-control" name="user_name" placeholder="Your name" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="phone">Contact Number (xxx-xxxxxxx):*</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="user_phone" placeholder="Your phone number" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="email">Email Address (xxx@xxx.com):*</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="user_email" placeholder="Your email address" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="password">Password (must at least 6 characters):*</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="user_password" id="user_password" onkeyup='check();' placeholder="Your password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password()">
                    <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="password">Confirm Password (must match with Password):*</label>
                <div class="col-8">
                    <input type="password" class="form-control" id="confirm_password" onkeyup='check();' placeholder="Confirm password" required>
                    <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password1()">
                    <label class="form-check-label" for="flexCheckDefault">Show Confirm Password</label>
                    <br><br><span id='message'></span>
                </div>
            </div>
            <br>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="register" type="submit">Register Now</button>
            </div>
            <br>

            <?php
            if (isset($_POST["register"])) {
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_password = sha1($_POST['user_password']);
                $user_phone = $_POST['user_phone'];
                $base64image = $_POST['profile_pic'];
                $user_pic = $_FILES['user_pic']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($user_pic));
                
                $select = mysqli_query ($conn, "SELECT user_email FROM tbl_users WHERE user_email = '$user_email'");
                if (mysqli_num_rows($select) > 0) {
                    echo "<script>alert('Registration Fail! Email already exist!');</script>";
                } else {
                    $sqlinsert = "INSERT INTO tbl_users (user_name,user_email,user_password,user_phone,user_pic) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_password . "' , '" . $user_phone . "' , '" . $imgContent . "')";
                    if ($conn->query($sqlinsert) === TRUE) {
                        echo "<script>alert('Registration Successful!');
                        location.replace('login.php');</script>";
                    } else {
                        echo "<script>alert('Registration Fail!');</script>";
                    }
                }
            }
            ?>
            
            <br>
            <div class="text-center">
                <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="login.php" style="color: #393f81;"><b>Login now</b></a></p>
            </div>
                <div class="copyright">
                    <p>Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
                </div>
        </form>
    </div>
</body>
</html>