<?php

if (isset($_GET["passkey"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "astem";

    
    
    $email = $_GET["email"];
   
    $passkey = $_GET["passkey"];
   
   

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqlread = "SELECT * FROM participants WHERE email='".$email."'";
    $result = $conn->query($sqlread);
    while($row = $result->fetch_assoc()) {
        if($row["status"]=="verified"){
                
           echo '
        <script>
         alert("Pendaftaran anda telah disahkan sebelum ini.");
         location.replace("https://dramran.com/astem/");
         </script>
         '; 
        }
    }
    if ($result->num_rows == 1) {
        $sqlupdate = "UPDATE participants SET status='verified' WHERE email='".$email."'";
        if ($conn->query($sqlupdate) === TRUE) {
        echo '
        <script>
         alert("Pendaftaran anda telah disahkan");
         location.replace("https://dramran.com/astem/");
         </script>
         ';
    } 
    else{
        echo '
        <script>
         alert("Tidak dapat disahkan, sila cuba lagi. Jika masih gagal sila hubungi pihak penganjur");
         location.replace("https://dramran.com/astem/");
         </script>
         ';
    }
    }
    $conn->close();
}
else{
    echo '
        <script>
         alert("gagal");
         die;
         </script>
         ';
}
