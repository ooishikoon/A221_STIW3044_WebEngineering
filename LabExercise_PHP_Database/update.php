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

// // Add Data
// echo "<form method=POST><center><button type='submit' name='add'>Update Data</button></center></form>";
// if (isset($_POST["add"])) {
//     $sqlinsert = "INSERT INTO data (a, b, c) VALUES ('" . $a . "', '" . $b . "', '" . $c . "')";
//     if ($conn->query($sqlinsert) === TRUE) {
//         echo "<center>Data added</center>";
//     }
// }

// Edit Record
if (isset($_POST["edit"])) {
    $sqlread = "SELECT * FROM data WHERE id=" . $_POST["edit"];
    $result = $conn->query($sqlread);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<center>Edit id=".$_POST["edit"]." <form method='POST'><input type='text' name='a' value='" . $row['a'] . "'>";
        echo "<input type='text' name='b' value='" . $row['b'] . "'>";
        echo "<button type='submit' name='process_edit' value='" . $_POST["edit"] . "' >Submit</button><button><a href=' '></a>Cancel</button></form></center>";
    }
}

// Update Data
if (isset($_POST["process_edit"])) {
    $id = $_POST["process_edit"];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $a + $b;

    $sqlupdate = "UPDATE data set a ='$a', b ='$b', c ='$c' where id='$id' ";

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
	<section class="main-content">
		<div class="container">
			<h1>Student Data</h1>
			<br>

			<table class="table">
				<thead>
					<tr>
						<th>Student</th>
						<th>Matric</th>
						<th>Race</th>
						<th>Gender</th>
						<th>Contact</th>
						<th>Actions</th>
					</tr>
				</thead>
                <!-- body table -->
				<tbody>
					<tr>
						<td>
							<div class="user-info">
								<div class="user-info__img">
									<img src="images/user1.jpg" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">Kiran Acharya</h5>
									<p class="text-muted mb-0">@kiranacharyaa</p>
								</div>
							</div>
						</td>
						<td>
							<span class="active-circle bg-success"></span> Active
						</td>
						<td>Bangalore</td>
						<td>+91 9876543215</td>
						<td>
							<button class="btn btn-primary btn-sm">Contact</button>
						</td>
						<td>
							<div class="dropdown open">
								<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="triggerId1">
									<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
									<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
								</div>
							</div>
						</td>
					</tr>
                    <!-- Next data -->
					<tr>
						<td>
							<div class="user-info">
								<div class="user-info__img">
									<img src="images/user1.jpg" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">Kiran Acharya</h5>
									<p class="text-muted mb-0">@kiranacharyaa</p>
								</div>
							</div>
						</td>
						<td>
							<span class="active-circle bg-danger"></span> Inactive
						</td>
						<td>Bangalore</td>
						<td>+91 9876543215</td>
						<td>
							<button class="btn btn-primary btn-sm">Contact</button>
						</td>
						<td>
							<div class="dropdown open">
								<a href="#!" class="px-2" id="triggerId2" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="triggerId2">
									<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
									<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
								</div>
							</div>
						</td>
					</tr>
                    <!-- Next data -->
					<tr>
						<td>
							<div class="user-info">
								<div class="user-info__img">
									<img src="images/user1.jpg" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">Kiran Acharya</h5>
									<p class="text-muted mb-0">@kiranacharyaa</p>
								</div>
							</div>
						</td>
						<td>
							<span class="active-circle bg-success"></span> Active
						</td>
						<td>Bangalore</td>
						<td>+91 9876543215</td>
						<td>
							<button class="btn btn-primary btn-sm">Contact</button>
						</td>
						<td>
							<div class="dropdown open">
								<a href="#!" class="px-2" id="triggerId3" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="triggerId3">
									<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
									<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>