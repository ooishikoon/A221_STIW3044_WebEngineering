<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$email = $_SESSION['email'];

?>

<form action="index.php">
    <button class="gradient-button gradient-button-1">Home Page</button>
</form>

<h2 style='text-align: center;'><b>History</b></h2>

<table class='table table-hover mx-auto w-auto' style='margin-left: auto;margin-right: auto;'>
<!-- <form method=POST form action = "update.php"> -->
<tr><th>Pick up Date</th>
        <th>Return Date</th>
        <th>Car</th>
        <th>Unit Price</th>
        <th>Rent Days</th>
        <th>Total Price</th></tr>

<?php
 // List Data
 $sqlread = "SELECT * FROM tbl_rental WHERE email = '$email'";
 $result = $conn->query($sqlread);
 if ($result -> num_rows == 0)
     echo '<script>document.getElementById("reset").style.display = "block"</script>';
 else
     echo '<script>document.getElementById("reset").style.display = "none"</script>';

 while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["pickupdate"] . "</td>
    <td>" . $row["returndate"] . "</td>
    <td>" . $row["car"] . "</td>
    <td>" . $row["unitprice"] . "</td>
    <td>" . $row["day"] . "</td>
    <td>" . $row["totalprice"] . "</td>
    </tr>";
    
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
    <link rel="stylesheet" type="text/css" href="css/style1.css">

    <style>
        .gradient-button {
            margin: 10px;
            font-family: Book Antiqua;
            font-size: 20px;
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: #FFF;
            box-shadow: 0 0 20px #eee;
            border: none;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            cursor: pointer;
            display: inline-block;
            border-radius: 25px;
        }

        .btn-grad:hover {
            background-position: right center;
            /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }


        .gradient-button:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
            margin: 8px 10px 12px;
        }

        .gradient-button-1 {
            background-image: linear-gradient(to right, #2b5876 0%, #4e4376  51%, #2b5876  100%);
        }

        .gradient-button-1:hover {
            background-position: right center;
        }
    </style>

</head>

<body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>