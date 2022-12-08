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
$sqlread = "SELECT * FROM data";
$result = $conn->query($sqlread);
if ($result->num_rows == 0)
    echo '<script>document.getElementById("reset").style.display = "block"</script>';
else
    echo '<script>document.getElementById("reset").style.display = "none"</script>';
echo "<center>No of records:" . $result->num_rows . "</center>
<table style='margin-left: auto;margin-right: auto;'>
<form method=POST>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"] . ": " . $row["a"] . " + " . $row["b"] . " = " . $row["c"] . "</td>
    <td><button type='submit' name='remove' value='" . $row["id"] . "'>Remove</button></td>
    <td><button type='submit' name='edit' value='" . $row["id"] . "'>Edit</button></td></tr>";
}
echo "</table></form>";

// Close Connection
$conn->close();
?>