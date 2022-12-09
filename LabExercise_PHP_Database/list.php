<?php
// Connection to MySQL parameters
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h2 style='text-align: center;'><b>Student Data Info List</b></h2>";

// Search Data
// echo "<div style='text-align:right' ><button type='submit' class='btn btn-primary btn-search'><i class='fa fa-search' name='search'></i><style = align('right')></style>Search></button></div>";

 // List Data
 $sqlstudent = "SELECT * FROM tbl_student";
 $result = $conn->query($sqlstudent);
 if ($result -> num_rows == 0)
     echo '<script>document.getElementById("reset").style.display = "block"</script>';
 else
     echo '<script>document.getElementById("reset").style.display = "none"</script>';
 
 echo "<table class='table table-hover mx-auto w-auto' style='margin-left: auto;margin-right: auto;'>
 <form method=POST>";
 echo "<tr><th>Student</th>
         <th>Matric</th>
         <th>Name</th>
         <th>Email</th>
         <th>Race</th>
         <th>Gender</th>
         <th>Actions</th></tr>";

 while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr><td><button type='submit' class='btn btn-primary'>Save</button></td>
         <td>" . $row["matric"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["race"] . "</td><td>" . $row["gender"] . "</td>
         <td><button type='submit' class='btn btn-outline-danger btn-sm' name='remove' value='" . $row["id"] . "'>Remove</button>
         <button type='submit' class='btn btn-outline-primary btn-sm' name='edit' value='" . $row["id"] . "'>Edit</button></td></tr>";
        }
 echo "</table></form>";
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
    <form action="list.php" method="post">
        Search <input type="text" name="search"><br>
        <span></span>
        Column: <select name="option">
            <option value="race">Race</option>
            <option value="gender">Gender</option>
            </select><br>
        <!-- <input type ="submit"> -->
        <button type="submit" name="submit" value="search">Search</button>
        </form>
        <?php
        if(isset($_POST["submit"])){
            $search = $_POST['search'];
            $option = $_POST["option"];

            $sqlstudent  = "SELECT * FROM student WHERE $option = '$search'";    
            $result = $conn->query($sqlstudent);
            echo "<table class='table table-hover mx-auto w-auto' style='margin-left: auto;margin-right: auto;'>
            <form method=POST><h2 style='text-align: center;'>Result</h2>";
            echo "<tr><th>Student</th>
                    <th>Matric</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Race</th>
                    <th>Gender</th></tr>";
            if ($result->num_rows > 0){
            while($row = $result->fetch_assoc() ){
                echo "<tr><tr><td><button type='submit' class='btn btn-primary'>Save</button></td>
                <td>" . $row["matric"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["race"] . "</td><td>" . $row["gender"] . "</td></tr>";
            }
            } else {
                echo "0 records";
            }
            "</table>";
        }
        ?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>