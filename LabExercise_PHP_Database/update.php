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
} else
    echo "<center>Successful connected</center>";

 // List Data
 $sqlstudent = "SELECT * FROM tbl_student";
 $result = $conn->query($sqlstudent);
 if ($result -> num_rows == 0)
     echo '<script>document.getElementById("reset").style.display = "block"</script>';
 else
     echo '<script>document.getElementById("reset").style.display = "none"</script>';
 
 echo "<center>No of records:" . $result->num_rows . "</center>
 <table class='table table-hover mx-auto w-auto' style='margin-left: auto;margin-right: auto;'>
 <form method=POST>";
 echo "<tr><th>Student</th>
         <th>Matric</th>
         <th>Name</th>
         <th>Email</th>
         <th>Race</th>
         <th>Gender</th>
         <th>Actions</th></tr>";

 while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr><td><button type='submit' class='btn btn-primary'>Save</button></td><td>" . $row["matric"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["race"] . "</td><td>" . $row["gender"] . "</td>
         <td><button type='submit' class='btn btn-outline-danger btn-sm' name='remove' value='" . $row["id"] . "'>Remove</button>
         <button type='submit' class='btn btn-outline-primary btn-sm' name='edit' value='" . $row["id"] . "'>Edit</button></td></tr>";
        }
 echo "</table></form>";

// Remove Data Row
if (isset($_POST["remove"])) {
    $sql = "DELETE FROM tbl_student WHERE id=" . $_POST['remove'];
    $conn->query($sql);
    echo "<center>Data (" . $_POST['remove'] . ") deleted</center>";
}

// Edit Record
if (isset($_POST["edit"])) {
    $sqlstudent = "SELECT * FROM tbl_student WHERE id=" . $_POST["edit"];
    $result = $conn->query($sqlstudent);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<center>Edit id=" . $_POST["edit"] . " <form method='POST'><input type='text' class='form-control' name='matric' value='" . $row['matric'] . "' required>";
        echo "<input type='text' name='name' class='form-control' value='" . $row['name'] . "'>";
		echo "<input type='text' name='email' class='form-control' value='" . $row['email'] . "'>";
		echo "<input type='text' name='race' class='form-control' value='" . $row['race'] . "'>";
		echo "<input type='text' name='gender' class='form-control' value='" . $row['gender'] . "'>";
        echo "<button type='submit' name='process_edit' value='" . $_POST["edit"] . "' >Submit</button><button><a href=' '></a>Cancel</button></form></center>";
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

    $sqlupdate = "UPDATE tbl_student SET matric ='$matric', name ='$name', email ='$email', race ='$race', gender ='$gender' WHERE id='$id' ";

    if ($conn->query($sqlupdate) === TRUE) {
        echo "<center>Data Updated</center>";
    }
}

// Close Connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Student</title>
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