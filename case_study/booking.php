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
    <title>Rental Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background-image: url("images/booking.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div style="width: 50%; margin:auto; margin-top:50px; padding:20px; background-color: rgba(255, 255, 255, 0.5); border-radius: 20px;">
    <h1 style="text-align: center;">Car Rental</h1><br>

    <form method="post" action="rent.php">
    <div style="width:80%; margin:auto">

      <div class="mb-3">
      <i class="material-icons">date_range</i>
        <label for="pickup" class="form-label">Pickup Date</label>
        <input type="date" class="form-control" name="pickupdate" id="pickupdate" aria-describedby="textHelp">
      </div>

      <div class="mb-3">
      <i class="material-icons">date_range</i>
        <label for="return" class="form-label">Return Date</label>
        <input type="date" class="form-control" name="returndate" id="returndate" aria-describedby="textHelp">
      </div>

      <div class="mb-3">
      <i class="material-icons">toys</i>
          <label for="car" class="form-label">Car</label>
          <div class="mb-3">
            <select onchange="dispUnitPrice()" class="form-control" name="car" id="car">
                <option value="" disabled selected hidden>Please choose the car</option>
                <option value="Alza">Alza</option>
                <option value="Ativa">Ativa</option>
                <option value="Bezza">Bezza</option>
                <option value="Camry">Camry</option>
                <option value="Myvi">Myvi</option>
                <option value="Vios">Vios</option>
            </select>
          </div>
      </div>

      <div class="mb-3">
      <i class="material-icons">alarm</i>
        <label for="day" class="form-label">Days</label>
        <input type="text" class="form-control" name="day" id="day" aria-describedby="textHelp" readonly>
      </div>

      <div class="mb-3">
      <i class="material-icons">local_atm</i>
        <label for="unitprice" class="form-label">Price (Per Day)</label>
        <input type="text" class="form-control" name="unitprice" id="unitprice" aria-describedby="textHelp" readonly>
      </div>

      <div class="mb-3">
      <i class="material-icons">local_atm</i>
        <label for="totalprice" class="form-label">Total Price</label>
        <input type="text" class="form-control" name="totalprice" id="totalprice" aria-describedby="textHelp" readonly>
      </div>

      <div class="calculateButton">
            <button name="calc" onclick="calcfunction()">Show the price</button>
      </div>

    <br>

      <p style="text-align:center;"><h5><strong>Payment Method</strong></h5>
      <br>Hong Leong Bank<br>Polygon Car Rental<br>73945729235</p>

      <div class="form-outline mb-3">
        <label class="form-label" for="form3Example1cg"></label>
        <p style="font: size 20px;"><strong>Please upload your receipt here. Thank You.</strong></p>
        <input type="file" name="receipt" id="receipt" class="form-control form-control-lg" required />
      </div>
      <div class="button">
            <button name="rent" type="submit" id="send">Rent Now</button>
      </div>
      <div class="button1">
            <button onclick="window.location.href = 'index.php';">Cancel</button>
    </div>
    </form>
  </div>
  </div>
    
</body>
</html>

<script>
    function dispUnitPrice(){
      var e = document.getElementById("car");
      var val = e.options[e.selectedIndex].value;
      var unitprice;

      if (val == "Alza"){
        unitprice = "RM150";
      }
      if (val == "Ativa"){
        unitprice = "RM120";
      }
      if (val == "Camry"){
        unitprice = "RM200";
      }
      if (val == "Myvi" || "Bezza"){
        unitprice = "RM100";
      }
      if (val == "Vios"){
        unitprice = "RM170";
      }

      document.getElementById("unitprice").value = unitprice;
    }

    function calcfunction() {

        var d1 = new Date(document.getElementById("pickupdate").value);
        var d2 = new Date(document.getElementById("returndate").value);
        var diff = d2.getTime() - d1.getTime();

        var daydiff = diff / (1000 * 60 * 60 * 24);

        var e = document.getElementById("car");
        var val = e.options[e.selectedIndex].value;

        document.getElementById("day").value = daydiff;
      
        if (val == "Alza"){
        document.getElementById("totalprice").value = "RM" + Math.round(daydiff) * 150;
        }
        if (val == "Ativa"){
        document.getElementById("totalprice").value = "RM" + Math.round(daydiff) * 120;
        }
        if (val == "Camry"){
        document.getElementById("totalprice").value = "RM" + Math.round(daydiff) * 200;
        }
        if (val == "Myvi" || "Bezza"){
          document.getElementById("totalprice").value = "RM" + Math.round(daydiff) * 100;
        }
        if (val == "Vios"){
        document.getElementById("totalprice").value = "RM" + Math.round(daydiff) * 170;
        }
    }
</script>

