<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polygon Car Rental</title>

    <style>
        body {
            background-image: url("images/background.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .header {
            padding: 50px;
            text-align: center;
            color: white;
            font-family: Book Antiqua;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        .center {
            text-align: center;
        }

        .gradient-button {
            margin: 10px;
            font-family: Book Antiqua;
            font-size: 20px;
            padding: 15px;
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
            background-image: linear-gradient(to right, #F09819 0%, #EDDE5D 51%, #F09819 100%);
        }

        .gradient-button-1:hover {
            background-position: right center;
        }
    </style>

</head>

<body>
    <div class="header">
        <h1 style="font-size:50px;"><b>WELCOME TO<br>POLYGON CAR RENTAL</b></h1>
    </div>

    <div class="center">
        <form action="booking.php">
            <button class="gradient-button gradient-button-1">Book Now!</button>
        </form>
        <form action="history.php">
            <button class="gradient-button gradient-button-1">History</button>
        </form>
        <form action="register.php">
            <button class="gradient-button gradient-button-1">Log out</button>
        </form>

    </div>
</body>

</html>