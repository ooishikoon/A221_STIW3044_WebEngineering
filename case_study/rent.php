<?php
include_once("dbconnect.php");

session_start();
$email = $_SESSION['email'];

if (isset($_POST["rent"])) {
    
    $pickupdate = $_POST["pickupdate"];
    $returndate = $_POST["returndate"];
    $day =$_POST["day"];
    $car = $_POST["car"];
    $unitprice = $_POST["unitprice"];
    $totalprice = $_POST["totalprice"];
    $receipt = $_POST['receipt'];

    $sqlselect = "SELECT * FROM `tbl_rental` WHERE (`pickupdate` = '$pickupdate' AND `returndate`= '$returndate' AND `car` = '$car')";
    $sqlrent = "INSERT INTO `tbl_rental` (`email`, `pickupdate`, `returndate`, `car`, `unitprice`, `day`, `totalprice`,`receipt`) VALUES ('$email', '$pickupdate', '$returndate', '$car', '$unitprice', '$day', '$totalprice', '$receipt')";

    try{
        $result = $conn->query($sqlselect);
        
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<script>
                alert('The slot is full.');
                </script>";
                echo "<script>
                window.location.href = 'booking.php';
                </script>";
            } else {
                $result1 = $conn->query($sqlrent);
                echo "<script>
                alert('Rent Successful');
                </script>";
                echo "<script>
                window.location.href = 'index.php';
                </script>";
            }
        } 
        
    } catch (PDOException $e){
        echo "<script>
        alert('Rent Failed');
        </script>";
    }

}
?>