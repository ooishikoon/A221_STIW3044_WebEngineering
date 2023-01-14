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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
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
            padding: 30px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
    </style>
    <script>
        function password() {
            var x = document.getElementById("user_password");
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
        <form action="" id="form" method="post" class="rounded-3">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="../images/others/login banner.png" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <div class="container1">
                            <img class="float-left" src="../images/others/logo.png" style = "width: 120; height: auto;">
                            <div class="text">
                                <h4><strong>Welcome to Polygon AudioBook!</strong></h4>
                            </div>
                        </div>
                        <hr><br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="email">Email:*</label>
                            <div class="col-10">
                                <input type="email" class="form-control" name="user_email" placeholder="Your email address" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="password">Password:*</label>
                            <div class="col-10">
                                <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Your password" required>
                                <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password()">
                                <label class="form-check-label" for="flexCheckDefault">Show Password</label>
                            </div>
                        </div>

                        <br>
                        <div class="d-grid">
                            <button class="btn btn-secondary btn-lg" name="login" type="submit">Login</button>
                        </div>
                        
                        <?php
                            session_start();
                            if (isset($_POST['login'])) {
                                $user_email = $_POST['user_email'];
                                $user_password = sha1($_POST['user_password']);
                                $sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$user_email' AND user_password = '$user_password'";
                                $result = $conn->query($sqllogin);
                                
                                if ($result->num_rows > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $_SESSION['user_id'] = $row['user_id'];
                                    echo "<script>alert('Login Successful!');
                                    location.replace('home.php');</script>";
                                } else {
                                    echo "<script>alert('Incorrect Email or Password');</script>";
                                }
                            }
                        ?>

                        <br>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;"><b>Register here</b></a></p>
                        <div class="copyright">
                            <p>Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>