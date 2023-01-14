<?php

if (isset($_POST["signup"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learning";

    $user = $_POST["username"];
    //echo $user;
    $email = $_POST["email"];
    //echo $email;
    $pass = $_POST["password"];
    //echo $pass;

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sqlread = "SELECT email FROM users WHERE email='" . $email . "'";
    $result = $conn->query($sqlread);

    if ($result->num_rows > 0) {
        echo '
        <script>
         alert("Unsuccessful registration !\nEmail:' . $email . ' already used for registration");
         history.back();
         </script>
         ';
    } else {

        $sqlinsert = "INSERT INTO users (username, email, password) VALUES ('" . $user . "', '" . $email . "', '" . $hashed_password . "')";


        if ($conn->query($sqlinsert) === TRUE) {
            echo '
        <script>
         alert("Registration is Successful");
         location.replace("http://localhost/learning/");
         </script>
         ';
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo '
        <script>
         alert("Registration is failed\n' . $sqlinsert . '");
         location.replace("http://localhost/learning/");
         </script>
         ';
        }
    }
    $conn->close();
}
