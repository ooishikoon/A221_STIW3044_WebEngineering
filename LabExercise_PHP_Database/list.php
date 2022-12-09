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
     echo "<tr><td>";
     echo "<img src='data:image/jpg;base64,".base64_encode( $row['std_image'] )."'
        style='object-fit:contain;
            width:100px;
            height:100px;
            border: solid 1px #CCC'/></td>
         <td>" . $row["matric"] . "</td>
         <td>" . $row["name"] . "</td>
         <td>" . $row["email"] . "</td>
         <td>" . $row["race"] . "</td>
         <td>" . $row["gender"] . "</td>
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
        <div style='text-align:right'>
        <tr>
        Search: <input type="text" name="search">
        Column: <select name="column">
            <option value="race">Race</option>
            <option value="gender">Gender</option>
            </select>
        <button type="submit" class='btn btn-primary btn-search' name="submit" value="search"><i class='fa fa-search'></i>Search</button>
        </tr>;
        </div>
        </form>
        <?php
        if(isset($_POST["submit"])){
            $search = $_POST['search'];
            $sqlstudent  = "SELECT * FROM tbl_student WHERE race = '$search'"; 
            $sqlstudent  = "SELECT * FROM tbl_student WHERE gender = '$search'"; 
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
                echo "<tr><tr>
                <td>" . $row["matric"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["race"] . "</td>
                <td>" . $row["gender"] . "</td>
                </tr>";
            }
            } else {
                echo "0 records";
            }
            "</table>";
        }
        ?>
        <!-- echo "<tr><tr><td><button type='submit' class='btn btn-primary'>Save</button></td> -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>