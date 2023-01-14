<?php
include_once("dbconnect.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['submit'])) {
    $operation = $_GET['submit'];
    if ($operation == 'delete') {
        $book_id = $_GET['book_id'];
        $sqldeletebook = "DELETE FROM `tbl_audiobook` WHERE book_id = '$book_id'";
        $conn->exec($sqldeletebook);
        echo "<script>alert('Favourite deleted')</script>";
    }
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
  
  session_start();
  $user_id = $_SESSION['user_id'];
 
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
        
    </style>
    
    <script>
     function updateFavourite(favourite_id,op) {
          if (confirm("Are your sure?")) {
            jQuery.ajax({
        		type: "GET",
        		url: "update_favourite.php",
        		data: {
        			favourite_id: favourite_id,
        			submit: op,
        		},
        		cache: false,
        		dataType: "json",
        		success: function(response) {
        		    var res = JSON.parse(JSON.stringify(response));
        		    console.log(op);
        			console.log(res.status);
        		}
        	});
          }
        }
        
    </script>
    
</head>
<body>
<img src="../images/others/bannerTop.png" class="img-fluid" alt="Responsive image">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="home.php" class="navbar-brand">
                <img src="../images/others/logo2.png" height="50">
            </a>
            <div class="container-fluid">
                <span class="navbar-brand h2"><strong>My Favourite</strong></span>
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
                            <li><a class="dropdown-item" href="home.php"><strong>Home</strong></a></li>
                            <li><a class="dropdown-item active bg-dark" aria-current="true" href="favourite.php" style="color: white"><strong>Favourite</strong></a></li>
                            <li><a class="dropdown-item" href="profile.php"><strong>Profile</strong></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="login.php"><strong>Logout</strong></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="w3-grid-template">
    <?php
        $sqlfavourite = "SELECT tbl_favourite.favourite_id, tbl_favourite.book_id, tbl_audiobook.book_name, tbl_audiobook.book_author, tbl_audiobook.book_description, tbl_audiobook.book_cover FROM tbl_favourite INNER JOIN tbl_audiobook ON tbl_favourite.book_id = tbl_audiobook.book_id WHERE tbl_favourite.user_id=$user_id ORDER BY tbl_favourite.book_id ASC";
        $result = $conn->query($sqlfavourite);
            if ($result->num_rows >= 0)
                while ($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row["user_id"];
                    $book_id = $row["book_id"];
                    $book_name = $row["book_name"];
                    $book_author = $row["book_author"];
                    $book_description = $row["book_description"];
                    $book_cover = $row["book_cover"];
                    $favourite_id = $row["favourite_id"];
                
                    echo "<div class='w3-card-4 w3-round' style='margin:3px, width=100%;'>
                          <header class='w3-container w3-yellow h3'><h4><b>$book_name</b></h4></header>";
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($book_cover).'"
                        style="object-fit:contain;width:460px;height:460px;"/>';
                    echo "<div class='w3-container'>
                        <div class='large-font text-center'>
                            <button  class='large-font text-center btn' >
                            <a href='book_detail.php?id=$book_id'>
                                    <i  class='fa fa-bars'></i>
                                    </a>
                                </button>
                                 <button class='large-font text-center btn'>
                                 <i class='fa fa-trash-o' onClick='updateFavourite($favourite_id,\"delete\"); window.location.reload();'></i>
                                </button>
                        </div>
                    </div>
                </div>";
         }
    ?>
</div>

        <div>
            <hr>
            <div class="copyright">
                <p>Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
            </div>
            <hr>
        </div>
</body>
</html>