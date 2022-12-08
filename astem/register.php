<?php

if (isset($_POST["submit"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "astem";

    $name = $_POST["name"];
    //echo $name;
    $ic = $_POST["ic"];
    //echo $ic;
    $email = $_POST["email"];
    //echo $email;
    $institution = $_POST["institution"];
    //echo $institution;
    $passkey = rand(111111,99999);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqlread = "SELECT email FROM participants WHERE email='".$email."'";
    $result = $conn->query($sqlread);

    if ($result->num_rows > 0) {
        echo '
        <script>
         alert("Pendaftaran anda tidak berjaya berjaya\nEmail:'.$email.' telah didaftarkan");
         history.back();
         </script>
         ';
    } else {

        $sqlinsert = "INSERT INTO participants (fullname, ic, email, institution, passkey) VALUES ('" . $name . "', '" . $ic . "', '" . $email . "', '" . $institution . "', '" . $passkey . "')";


        if ($conn->query($sqlinsert) === TRUE) {
            $msg = "Registration is successful\nAccess code:".$passkey."\nClick for verification: https://dramran.com/astem/verify.php?email=".$email."&passkey=".$passkey."\n\nThank you";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg, 70);
            $headers = 'From: <me@dramran.com>';
            // send email
            mail($email, "Web Application Development", $msg, $headers);

            echo '
        <script>
         alert("Registration is successfull\nEmail has been sent\nPlease very the registration by clicking link in the email");
         location.replace("https://localhost/astem/");
         </script>
         ';
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo '
        <script>
         alert("The registration is not successfull\n' . $sqlinsert . '");
         location.replace("http://localhost/astem/");
         </script>
         ';
        }
    }
    $conn->close();
}
