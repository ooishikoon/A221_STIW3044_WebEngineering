<?php


session_start();

if (!isset($_SESSION['username'])) {
    header("Location: admin.php");
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "astem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sqlread = "SELECT * FROM participants";
    $result = $conn->query($sqlread);
    // if ($result->num_rows > 0) {
    $count = 1;
   




        echo '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
     
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/table_paging.js"></script>
    <!--  <link rel="stylesheet" type="text/css" href="css/styles2.css"> -->
    <title>Report</title>
    <style> 
    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-image: linear-gradient(white, blue);
    color: white;
    text-align: center;
  }
</style>
</head>

<body>
    <div class="p-3 text-center mb-3" style="background-image: linear-gradient(blue, white);">
        <h3 style="color:white;">List of Participants</h3>
        <p style="color:blue;">Welcome '.$_SESSION['username'].'</p>
        <a href="logout.php"><button type="button" class="btn btn-outline-primary btn-sm">Logout</button></a>

    </div>
    
    <div class="center80">



        <div class="table-responsive; overflow-x:auto">
            <table id="Status" style="width:100%" class="table table-hover table-sm table-bordered border-black ">
                <thead>
                    <tr style="background-color:#FFA500">
                        <th style="text-align:center">
                            <font color=#000000>#</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Full Name</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>IC</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Email</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Institution</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Timestamp</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Status</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Passkey</font>
                        </th>




                    </tr>

                </thead>
                <tbody>';
                 while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <tr>
                <td style="text-align:center">' . $count++ . '</td>
                <td style="text-align:center">' . $row["fullname"] . '</td>
                <td style="text-align:center">' . $row["ic"] . '</td>
                <td style="text-align:center">' . $row["email"] . '</td>
                <td style="text-align:center">' . $row["institution"] . '</td>
                <td style="text-align:center">' . $row["timestamp"] . '</td>
                <td style="text-align:center">' . $row["status"] . '</td>
                <td style="text-align:center">' . $row["passkey"] . '</td>
                </tr>

';
    }
    echo '
                </tbody>
               
                <tfoot>
                    <tr style="background-color:#FFA500">

                    <tr style="background-color:#FFA500">
                        <th style="text-align:center">
                            <font color=#000000>#</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Full Name</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>IC</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Email</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Institution</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Timestamp</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Status</font>
                        </th>
                        <th style="text-align:center">
                            <font color=#000000>Passkey</font>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="footer">
        <p>Copyright @dramran(amran@uum.edu.my)</p>
      </div>
</body>

</html>';

    $conn->close();
}
