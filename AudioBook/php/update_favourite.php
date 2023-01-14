<?php
include_once("dbconnect.php");

session_start();
$user_id = $_SESSION['user_id'];


if ($_GET['submit'] == "add") {
		$book_id = $_GET['book_id'];
		$favourite_qty = "1";
		$favouritetotal = 0;
		$stmt = $conn -> prepare("SELECT * FROM tbl_favourite WHERE user_id = '$user_id' AND book_id = '$book_id'");
		$stmt -> execute();
		$number_of_rows = $stmt -> rowCount();
		$result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		$rows = $stmt -> fetchAll();
		if ($number_of_rows > 0) {
			foreach($rows as $favourite) {
				$favouriteqty = $favourite['favourite_qty'];
			}
			$favouriteqty = $favouriteqty + 1;
			$updatefavourite = "UPDATE `tbl_favourite` SET `favourite_qty`= '$favouriteqty' WHERE user_id = '$user_id' AND book_id = '$book_id'";
			$conn -> exec($updatefavourite);
            
			alert("You had added into your favourite.");

		} else {
			$addfavourite = "INSERT INTO `tbl_favourite`(`user_id`, `book_id`) VALUES ('$user_id','$book_id')";
			try {
				$conn -> exec($addfavourite);

			} catch (PDOException $e) {
				$response = array('status' => 'failed', 'data' => null);
				sendJsonResponse($response);
				return;
			}
		}
		$stmtqty = $conn -> prepare("SELECT * FROM tbl_favourite WHERE user_id = '$user_id'");
		$stmtqty -> execute();
		$resultqty = $stmtqty -> setFetchMode(PDO::FETCH_ASSOC);
		$rowsqty = $stmtqty -> fetchAll();
		$myfavourite = array();
		$response = array('status' => 'success', 'data' => $myfavourite);
		sendJsonResponse($response);
}

if ($_GET['submit'] == "delete") {
    $favourite_id = $_GET['favourite_id'];
    try {
        $sqldelete = "DELETE FROM tbl_favourite WHERE favourite_id = $favourite_id";
        $stm = $conn -> prepare($sqldelete);
        $stm -> execute();
        $myfavourite = array();
		$response = array('status' => 'deleted', 'data' => $myfavourite);
    }catch (PDOException $e) {
        $response = array('status' => 'failed', 'data' => null);    
    }
    
	sendJsonResponse($response);
}
function sendJsonResponse($sentArray) {
	header('Content-Type: application/json');
	echo json_encode($sentArray);
}

?>