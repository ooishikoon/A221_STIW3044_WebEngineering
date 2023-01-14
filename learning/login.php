<?php

$servername = "localhost";
$user = "root";
$dbpassword = "";
$dbname = "learning";

// Create connection
$conn = new mysqli($servername, $user, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];


    //  echo $_POST['password'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //  echo $password;
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['email'] = $row['email'];
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