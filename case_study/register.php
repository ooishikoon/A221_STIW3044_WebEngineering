<?php
include_once("dbconnect.php");

session_start();
if (isset($_POST["signup"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sqlread = "SELECT email FROM users WHERE email='" . $email . "'";
    $result = $conn->query($sqlread);

    if ($result->num_rows > 0) {
        echo '
        <script>
         alert("Unsuccessful registration !\nEmail:' . $email . ' already used for registration");
         history.back();
         </script>
         ';
    } else {

        $sqlinsert = "INSERT INTO users (email, password) VALUES ('" . $email . "', '" . $hashed_password . "')";


        if ($conn->query($sqlinsert) === TRUE) {
            echo '
        <script>
         alert("Registration is Successful");
         location.replace("register.php");
         </script>
         ';
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo '
        <script>
         alert("Registration is failed\n' . $sqlinsert . '");
         location.replace("register.php");
         </script>
         ';
        }
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['email'] = $row['email'];
            echo "test";
            echo "<script>alert('Login Successful')</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('Your email or password is incorrect.')
            history.back();
            </script>";
        }
    } else {
        echo "<script>alert('Your email is not registered.')
        history.back();
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in and Sign up</title>
    <link rel="stylesheet" type="text/css" href="css/sin_sup.css">
</head>
<body>
<br>
<br>
    <div class="cont">
        <div class="form sign-in">
        <form method="POST" action="register.php">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" name="email" required=""/>
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password" required=""/>
            </label>
            <form method="post" action="register.php">
            <button type="submit" class="submit" name="login">Sign In</button>
			</form>
        </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>

            <div class="form sign-up">
            <form method="POST" action="register.php">
                <h2>Create your Account</h2>
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required=""/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" id="pass" required=""/>
                </label>
                <br><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="password1()">
                    <script>
                        function password1() {
                            var x = document.getElementById("pass");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                <form method="post" action="register.php">
                <button type="submit" class="submit" name="signup">Sign Up</button>
                </form>
			</form>
                
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>