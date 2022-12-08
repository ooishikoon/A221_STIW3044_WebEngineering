<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "astem";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if (isset($_SESSION['username'])) {
    header("Location: report.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
   // echo $username;
  //  echo $_POST['password'];
   // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  //  echo $password;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        //echo $row['password'];
        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: report.php");
        } else {
           echo "<script>alert('Your username or password is incorrect.')</script>";
        }
    } 
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

   <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Admin</title>
</head>

<body>
    <div class="alert alert-warning" role="alert">
       
    </div>

    <div class="container">
        <form action="" method="POST" class="login-username">
            <div class="center30 card">
	<div class="card-header">Login</div>
	<div class="card-body">

		<form>
<!-- Input type text -->
<div class="form-group">
	<label for="input_id_0">Username</label>
	<input type="text" class="form-control" name="username" id="input_id_0" placeholder="username" required>
</div>

<!-- Input type text -->
<div class="form-group">
	<label for="input_id_1">Password</label>
	<input type="password" class="form-control mt-1" name="password" id="input_id_1" placeholder="password" required>
</div>

<button type="submit" class="btn btn-primary mt-1" name="submit" id="button_id_3">Login</button>
		</form>


	</div>
</div>

            </div>
            <!-- <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p> -->
        </form>
    </div>
</body>

</html>