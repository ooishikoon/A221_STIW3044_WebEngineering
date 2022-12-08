<?php



if (isset($_POST["submitpre"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "astem";

    $email = $_POST["email"];
    //echo $email;
    $ans1 = $_POST["answer1"];
    $ans2 = $_POST["answer2"];
    $ans3 = $_POST["answer3"];
    $ans4 = $_POST["answer4"];
    $ans5 = $_POST["answer5"];
   // echo $ans1;
   // echo $ans2;
   // echo $ans3;
   // echo $ans4;
   // echo $ans5;

    

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
     alert("Your email is not in our record");
     location.replace("https://localhost/astem/pre.html");
     </script>
     ';
    }
    else {
    


    $sqlread = "SELECT * FROM pre WHERE email='" . $email . "'";
    $result = $conn->query($sqlread);

    if ($result->num_rows > 0) {
        
        echo '
    <script>
     alert("Attendance has been recorded before");
     location.replace("http://localhost.com/astem/");
     </script>
     ';
    } else {

        $sqlinsert = "INSERT INTO pre (email, ans1, ans2, ans3, ans4, ans5) VALUES ('" . $email . "', '" . $ans1 . "', '" . $ans2 . "', '" . $ans3 . "', '" . $ans4 . "', '" . $ans5 . "')";


        if ($conn->query($sqlinsert) === TRUE) {
             echo '
    <script>
     alert("Attendance succesfully recorded");
     location.replace("http://localhost/astem/");
     </script>
     ';
            
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
            echo '
    <script>
     alert("Attendance is not successfully recorded");
     location.replace("http://localhost/astem/pre.html");
     </script>
     ';
        }
    }
    $conn->close(); 
}
}
