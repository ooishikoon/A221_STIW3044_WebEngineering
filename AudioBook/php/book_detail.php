<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>";
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  ';
  
  

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href = "../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport content="width=device-width, initial-scale=1.0">
    <title>Polygon Audiobook</title>
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }
        
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .text {
            padding: 30px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
        
        .w3-grid-template {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            padding: 30px;
            grid-gap: 30px;
        }
        
        .w3-card-4, w3-container {
            border-radius: 10px;
        }
        
        .w3-container {
            border-radius: 10px;
        }
        
        .h3 {
            text-align: center;
        }
        
        .p {
            font-size: 30px;
        }
        
        .large-font{
            font-size:xxx-large;
        }
        
        ion-icon{
            fill:transparent;
            stroke:black;
            stroke-width:30;
            transition:all 0.5s;
        }
        
        ion-icon.active{
            animation:like 0.5s 1;
            fill:red;
            stroke:none;
        }
        
        body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
        .w3-row-padding img {
                margin-bottom: 12px
        }
        
        .bgimg {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100%;
        }
        a {
            text-decoration: none;
            padding: 8px 16px;
            color: white;
        }
        
        a:hover {
            background-color:black;
            color: white;
        }
        
        .round {
            border-radius: 50%;
        }
        
        #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
        }
        
    </style>
    
    <script>
    
    </script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
        <!--<a href="home.php" class=" w3-large round" ><i class="fa fa-arrow-left"></i></a>-->
            <a href="home.php" class="navbar-brand">
                <img src="../images/others/logo2.png" height="50">
            </a>
            <div class="container-fluid">
                <!--<span class="navbar-brand h2"><strong>Welcome to Polygon AudioBook Website</strong></span>-->
                <a href="home.php" class="navbar-brand h2"><strong>Welcome to Polygon AudioBook Website</strong></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Menu</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item active bg-dark" aria-current="true" href="home.php" style="color: white"><strong>Home</strong></a></li>
                            <li><a class="dropdown-item" href="favourite.php"><strong>Favourite</strong></a></li>
                            <li><a class="dropdown-item" href="profile.php"><strong>Profile</strong></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="login.php"><strong>Logout</strong></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <nav class="w3-sidebar w3-hide-medium w3-hide-small" style="width:40%;height:90%";>
        <div class="bgimg">
        <?php
        $book_id = $_GET['id'];
        $sqlbook = "SELECT book_id,  book_cover  FROM tbl_audiobook WHERE book_id=$book_id";
        $result = $conn->query($sqlbook);
            if ($result->num_rows >= 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $book_id = $row["book_id"];
                    $book_cover = $row["book_cover"];

                    echo '<img src="data:image/jpeg;base64,'.base64_encode($book_cover).'"
                         style="width:100%;height:100%;"/>';
                }
            }
    ?>
    </div>
</nav>

<div class="w3-main w3-padding-small" style="margin-left:40%">

  <!-- Header -->
  <header class="w3-container w3-center" style="padding:20px 16px">
    <h1 class="w3-jumbo"><b>
    <?php
        $book_id = $_GET['id'];
        $sqlbook = "SELECT  book_name FROM tbl_audiobook WHERE book_id=$book_id";
        $result = $conn->query($sqlbook);
            if ($result->num_rows >= 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $book_name = $row["book_name"];
                    echo $book_name;
                }
            }
    ?>
    </b>
    </h1>
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-black"  style="padding:20px 16px" >
    <h2>About</h2>
    <hr class="w3-opacity" >
    <p>
    <?php
        $book_id = $_GET['id'];
        $sqlbook = "SELECT  book_name, book_author, book_description FROM tbl_audiobook WHERE book_id=$book_id";
        $result = $conn->query($sqlbook);
            if ($result->num_rows >= 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $book_name = $row["book_name"];
                    $book_author = $row["book_author"];
                    $book_description = $row["book_description"];

                    echo "<hr class='w3-opacity'><p>Book Name   : $book_name</p>" ;
                    echo "<hr class='w3-opacity'><p>Book Author : $book_author</p>" ;
                    echo "<hr class='w3-opacity'><p>Description : $book_description</p>" ;
                }
            }
    ?>
    </p>
    
    <h3 class="w3-padding-16">Audio List</h3>
    <?php
        $book_id = $_GET['id'];
        $sqlbook = "SELECT tbl_audiobook.book_id, tbl_audio.audio_id, tbl_audio.audio, tbl_audio.audio_name FROM tbl_audiobook INNER JOIN tbl_audio ON tbl_audiobook.book_id = tbl_audio.book_id WHERE tbl_audiobook.book_id=$book_id ORDER BY tbl_audio.audio_id ASC";
        $result = $conn->query($sqlbook);
            if ($result->num_rows >= 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $book_id = $row["book_id"];
                    $audio_id = $row["audio_id"];
                    $audio_name = $row["audio_name"];
                    $audio = $row["audio"];

                echo "<div class='w3-padding-16'> ";
                echo "<p>$audio_name</p> ";
                echo " <div class='w3-light-grey'> ";
                echo " <div class='w3-container w3-center' style='width:100%' >";
                echo '<audio controls>';
                echo '<source src="data:audio/mpeg;base64,'.base64_encode($audio).'">';
                echo '</audio>';
                echo "</div> ";
                echo "</div> ";
                echo "</div> ";
                }
            }
    ?>
    <br>

  <!-- End About Section -->
  </div>

  
  <!-- Footer -->
  <id = "footer" class="w3-container w3-padding-64 w3-light-grey w3-center w3-opacity w3-xlarge" style="margin:-24px">
    <p class="w3-medium">Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
  <!-- End footer -->
  </footer>
  
<!-- END PAGE CONTENT -->
</div>
         
     
</body>
</html>