<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "case_study";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>