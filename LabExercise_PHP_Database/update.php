<?php
// Connection to MySQL parameters
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Edit Record
if (isset($_POST["edit"])) {
    $sqlstudent = "SELECT * FROM tbl_student WHERE id=" .$_POST["edit"];
    $result = $conn->query($sqlstudent);
  
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<center><form method = 'POST' form action = 'update.php' enctype='multipart/form-data'>
        <h2>Modify the data you want</h2>
        <table class= 'table table-borderless mx-auto w-auto' style='margin-left: auto;margin-right: auto;'>
        <tr><td><b>Matric  :</strong></td><td> <input type='text' name='matric' value='" . $row['matric'] . "'><br><br></td></tr>";
        echo "<tr><td><b>Name  :</strong></td><td> <input type='text' name='name' value='" . $row['name'] . "'><br><br></td></tr>";
        echo "<tr><td><b>Email  :</strong></td><td> <input type='email' name='email' value='" . $row['email'] . "'><br><br></td></tr>";
        echo "<tr><td><b>Race  :</strong></td><td> <input type='text' name='race' value='" . $row['race'] . "'><br><br></td></tr>";
        echo "<tr><td><b>Gender  :</strong></td><td> <input type='text' name='gender' value='" . $row['gender'] . "'><br><br></td></tr>";
        echo "<tr><td><b>Image  :</strong></td><td> <input type='file' name='image' required><br><br></td></tr>";
        echo "<tr><td colspan='2', style='text-align: center'><button type='submit' class='btn btn-primary' name='process_edit' value='" . $_POST["edit"] . "' >Submit</button></td></tr>
        </table></form></center>";
        
    }
    
  }

// Update Data
if (isset($_POST["process_edit"])) {

    $id = $_POST["process_edit"];
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $race = $_POST['race'];
    $gender = $_POST['gender'];
    //Get the content of the image and then add slashes to it 
    $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));

    $sqlupdate = "UPDATE tbl_student set matric ='$matric', `name` ='$name', email ='$email', `race` ='$race', gender ='$gender', `std_image` = '$imagetmp' where id='$id' ";


    if ($conn->query($sqlupdate) === TRUE) {
        echo "<br><br>";
        echo "<center><h2>Data Updated Successfully</h2>";
        echo "<br><a href='list.php'><button type='submit' class='btn btn-success btn-lg' name='back' value=''>Back to List</button></a></center>";
    }

}

// Close Connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Table UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>