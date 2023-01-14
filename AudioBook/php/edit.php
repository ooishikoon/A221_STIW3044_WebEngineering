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

session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile Page</title>
        <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }
        
        p.mb-0 {
            padding: 5px 0;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
    </style>
    </head>
    <body>
        <img src="../images/others/bannerTop.png" class="img-fluid" alt="Responsive image">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
                <div class="container-fluid">
                    <a class="navbar-brand">
                        <img src="../images/others/logo2.png" height="50">
                    </a>
                    <div class="container-fluid">
                        <span class="navbar-brand h2"><strong>Welcome to Polygon AudioBook Website</strong></span>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong>Menu</strong>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"><strong>Home</strong></a></li>
                                    <li><a class="dropdown-item" href="#"><strong>Favourite</strong></a></li>
                                    <li><a class="dropdown-item active bg-dark" aria-current="true" href="profile.php" style="color: white"><strong>Profile</strong></a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="login.php"><strong>Logout</strong></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <?php
                                    $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                    $result = $conn->query($sqlread);
                                    if ($result->num_rows > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                    }
                                ?>
                                
                                <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row["user_pic"]) . "' alt='user pic' class='rounded-circle img-fluid' style='width: 113px;'>"; ?>
                                
                                <h5 class="my-3"><?php echo $row['user_name']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class='col-lg-9'>
                        <div class='card mb-4'>
                            <div class='card-body'>
                                <?php
                                    if (isset($_POST["editName"])) {
                                        $sqlread = "SELECT user_name FROM tbl_users WHERE user_id=" . $_POST["editName"];
                                        $result = $conn->query($sqlread);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlread);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            
                                            echo "<form method='POST'><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                            echo "<div class='col-sm-6'><input type='name' class='form-control form-control-sm' name='user_name' value='" . $row['user_name'] . "' placeholder='Your name' required></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editName' value='" . $_POST["editName"] . "'>Submit</button></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelName' value='" . $_POST["editName"] . "'>Cancel</button></div>";
                                            echo "</div></form>";
                                        
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_email'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Email</button></div></div>";
                                            
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_phone'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Phone</button></div></div>";
                                        }
                                    }
                                    else if (isset($_POST["editEmail"])) {
                                        $sqlread = "SELECT user_email FROM tbl_users WHERE user_id=" . $_POST["editEmail"];
                                        $result = $conn->query($sqlread);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlread);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            
                                            echo "<div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_name'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Name</button></div></div>";
                                        
                                            echo "<form method='POST'><hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                            echo "<div class='col-sm-6'><input type='email' class='form-control form-control-sm' name='user_email' value='" . $row['user_email'] . "' placeholder='Your email address' required></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editEmail' value='" . $_POST["editEmail"] . "'>Submit</button></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelEmail' value='" . $_POST["editEmail"] . "'>Cancel</button></div>";
                                            echo "</div></form>";
                                            
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_phone'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Phone</button></div></div>";
                                        }
                                    }
                                    else if (isset($_POST["editPhone"])) {
                                        $sqlread = "SELECT user_phone FROM tbl_users WHERE user_id=" . $_POST["editPhone"];
                                        $result = $conn->query($sqlread);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                            $result = $conn->query($sqlread);
                                            if ($result->num_rows > 0) {
                                                $row = mysqli_fetch_assoc($result);
                                            }
                                            
                                            echo "<div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Full Name</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_name'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Name</button></div></div>";
                                        
                                            echo "<hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Email Address</p></div>";
                                            echo "<div class='col-sm-6'><p class='text-muted mb-0'>" . $row['user_email'] . "</p></div>";
                                            echo "<div class='col-sm-2'><button type='button' class='btn btn-outline-secondary btn-sm' disabled>Change Email</button></div></div>";
                                            
                                            echo "<form method='POST'><hr><div class='row'>";
                                            echo "<div class='col-sm-3'><p class='mb-0'>Contact Number</p></div>";
                                            echo "<div class='col-sm-6'><input type='tel' class='form-control form-control-sm' name='user_phone' value='" . $row['user_phone'] . "' placeholder='Your phone number' required></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-primary btn-sm' name='process_editPhone' value='" . $_POST["editPhone"] . "'>Submit</button></div>";
                                            echo "<div class='col-sm-1'><button type='submit' class='btn btn-outline-danger btn-sm' name='process_cancelPhone' value='" . $_POST["editPhone"] . "'>Cancel</button></div>";
                                            echo "</div></form>";
                                        }
                                    }
                                
                                    if (isset($_POST["process_editName"])) {
                                        $user_id = $_POST["process_editName"];
                                        $user_name = $_POST['user_name'];
            
                                        $sqlupdate = "UPDATE tbl_users set user_name ='$user_name' where user_id = '$user_id' ";
            
                                        if ($conn->query($sqlupdate) === TRUE) {
                                            echo "<script>alert('Name updated successfully!');
                                            location.replace('profile.php');</script>";
                                        }
                                    }
                                    else if (isset($_POST["process_cancelName"])) {
                                        echo "<script>alert('You have canceled to update name.');
                                        location.replace('profile.php');</script>";
                                    }
                                    else if (isset($_POST["process_editEmail"])) {
                                        $user_id = $_POST["process_editEmail"];
                                        $user_email = $_POST['user_email'];
            
                                        $sqlupdate = "UPDATE tbl_users set user_email ='$user_email' where user_id = '$user_id' ";
            
                                        if ($conn->query($sqlupdate) === TRUE) {
                                            echo "<script>alert('Email address updated successfully!');
                                            location.replace('profile.php');</script>";
                                        }
                                    }
                                    else if (isset($_POST["process_cancelEmail"])) {
                                        echo "<script>alert('You have canceled to update email address.');
                                        location.replace('profile.php');</script>";
                                    }
                                    else if (isset($_POST["process_editPhone"])) {
                                        $user_id = $_POST["process_editPhone"];
                                        $user_phone = $_POST['user_phone'];
            
                                        $sqlupdate = "UPDATE tbl_users set user_phone ='$user_phone' where user_id = '$user_id' ";
            
                                        if ($conn->query($sqlupdate) === TRUE) {
                                            echo "<script>alert('Contact number updated successfully!');
                                            location.replace('profile.php');</script>";
                                        }
                                    }
                                    else if (isset($_POST["process_cancelPhone"])) {
                                        echo "<script>alert('You have canceled to update contact number.');
                                        location.replace('profile.php');</script>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button type="button" class="btn btn-secondary btn-lg btn-block" disabled>Logout</button>
                </div>
                <br>
                <div class="copyright">
                    <p>Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
                </div>
            </div>
    </body>
</html>