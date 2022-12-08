<?php



if (isset($_POST["submitpost"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "astem";

    $email = $_POST["email"];
    echo $email;
    $ans1 = $_POST["answer1"];
    $ans2 = $_POST["answer2"];
    $ans3 = $_POST["answer3"];
    $ans4 = $_POST["answer4"];
    $ans5 = $_POST["answer5"];
    $ans6 = $_POST["comment"];
    $ans7 = $_POST["suggest"];
    echo $ans1;
    echo $ans2;
    echo $ans3;
    echo $ans4;
    echo $ans5;
    echo $ans6;
    echo $ans7;

   // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sqlread = "SELECT email FROM participants WHERE email='" . $email . "'";
    $check = $conn->query($sqlread);
    if ($check->num_rows == 0) {
        echo '
    <script>
     alert("Your Email does not exist");
     location.replace("https://localhost.com/astem/post.html");
     </script>
     ';
    }
    else {
    


    $sqlread = "SELECT * FROM post WHERE email='" . $email . "'";
    $result = $conn->query($sqlread);

    if ($result->num_rows > 0) {
        
        echo '
    <script>
     alert("No Post test recorded");
     location.replace("http://localhost/astem/");
     </script>
     ';
    } else {

        $sqlinsert = "INSERT INTO post (email, ans1, ans2, ans3, ans4, ans5, ans6, ans7) VALUES ('" . $email . "', '" . $ans1 . "', '" . $ans2 . "', '" . $ans3 . "', '" . $ans4 . "', '" . $ans5 . "', '" . $ans6 . "', '" . $ans7 . "')";


        if ($conn->query($sqlinsert) === TRUE) {
             echo '
    <script>
     alert("Post test succesfully recorded");
     location.replace("http://localhost/astem/cert.php");
     </script>
     ';
            
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo '
    <script>
     alert("Post test is not successfull recorded");
     location.replace("http://localhost/astem/pre.html");
     </script>
     ';
        }
    }
    $conn->close(); 
}
}
