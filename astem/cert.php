<?php

if(isset($_POST["submit"])) {

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astem";

$email = $_POST['email'];

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
     alert("Email anda tiada dalam rekod kami");
    // location.replace("https://dramran.com/astem/pre.html");
     </script>
     ';
     die;
    }
    
    $sqlread1 = "SELECT email FROM pre WHERE email='" . $email . "'";
    $check1 = $conn->query($sqlread1);
    $sqlread2 = "SELECT email FROM post WHERE email='" . $email . "'";
    $check2 = $conn->query($sqlread2);
    if ($check1->num_rows == 0) {
        echo '
    <script>
     alert("Kehadiran anda tiada dalam rekod kami");
     //location.replace("https://dramran.com/astem/pre.html");
     </script>
     ';
     die;
    }
    elseif($check2->num_rows == 0) {
     echo '
        <script>
     alert("Anda belum mengisi post test");
     location.replace("https://dramran.com/astem/post.html");
     </script>
     ';
    }
else {
    $sqlread = "SELECT * FROM participants WHERE email='" . $_POST['email'] . "'";
$result = $conn->query($sqlread);

$row = mysqli_fetch_assoc($result);

if ($result->num_rows > 0){
//	if ($row['passkey'] == $_POST['passkey']) {
		echo '
        <script>
     alert("Jika error, sila tutup tab ini dan ikuti arahan untuk regenerate cert Atau sila allow Pop-up blocker");
     //location.replace("https://dramran.com/astem/post.html");
     </script>
     ';
	

?>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge; chrome=1"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>e-cert</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.5/vfs_fonts.js"></script>


	<style>
		#viewPdf {
			position: fixed;
			top: 10px;
			left: 10px;
			display: block;
			padding: 0px;
			border: 0px;
			margin: 0px;
			width: 100%;
			height: 100%;
		}
	</style>
</head>

<body>
	<center>
		<h5>Click Browser REFRESH button to Regenerate the E-Cert.
			<br>Click Browser BACK button to Return Back to Previous Page.
		</h5>
	</center>


	<img id="image-preview" src="images/CETIFICATE.png" hidden>

	<iframe id="viewPdf" name="viewPdf"></iframe>

	<script>
		var fonts = {
			Roboto: {
				normal: "Roboto-Regular",
				bold: "Roboto-Medium",
				italics: "Roboto-Italic",
				bolditalics: "Roboto-MediumItalic"
			}
		};


		//	window.alert("If you are having a blank Pdf, please retry again. Sorry for any inconvenience");
		var yourString = "Testing 123"; //replace with your string.

		var length = yourString.length;

		//	document.write(length + " " + line);
		var maxLength = 50 // maximum number of characters to extract
		var collection = "";

		//else if(line==3){
		if (yourString.length < maxLength)
			collection = "\\n(" + yourString + ")";

		else {
			collection = "(";
			do {

				trimmedString = yourString.substr(0, maxLength);
				trimmedString = trimmedString.substr(0, Math.min(trimmedString.length, trimmedString.lastIndexOf(" ")));
				collection += trimmedString;
				yourString = yourString.substr(trimmedString.length, yourString.length);
				if (yourString.length < maxLength) {
					collection += "\\n" + yourString;
					break;
				} else
					collection += "\\n";

			} while (true);
			collection += ")";
		}

		var name = <?php echo json_encode(strtoupper($row['fullname'])); ?>;
		var ic = <?php echo json_encode($row['ic']); ?>;
		var combine = name + "\n" + ic;
		var pdfImage = getDataUrl(document.querySelector("#image-preview"));

		var docDefinition = {
			info: {
				title: "E-Cert",
				author: "@dramran"

			},

			version: "1.7ext3",
			//userPassword: "123",
			ownerPassword: "Pax6628@#2022",
			permissions: {
				printing: "highResolution", //lowResolution
				modifying: false,
				copying: false,
				annotating: false,
				fillingForms: false,
				contentAccessibility: false,
				documentAssembly: false

			},


			pageSize: "A4",
			pageOrientation: "potrait",
			fontSize: 15,
			pageMargins: [10, 10, 10, 10],


			background: {
				image: pdfImage,
				fit: [900, 830],
				alignment: "center"
			},
			
			content: [{
					text: combine,
					absolutePosition: {
						x: 0,
						y: 220
					},
					alignment: "center",
					bold: true,
					fontSize: 18
				},
				
			],


		};

		pdfMake.createPdf(docDefinition).open(window.frames["viewPdf"]);
		//location.replace("https://i-ria.my/2022/medalist/");


		function getDataUrl(imgSource) {
			const canvas = document.createElement("canvas");
			const context = canvas.getContext("2d");
			canvas.width = imgSource.width;
			canvas.height = imgSource.height;
			context.drawImage(imgSource, 0, 0);
			return canvas.toDataURL("image/jpeg");
		}
	</script>

</body>

</html>
<?php
  }
   /* else {
        echo "<script>alert('Your email or passkey is incorrect.');
        history.back();
        </script>"; 
        
    } */

}


}
else{
?>
	<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

   <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>e-cert</title>
</head>

<body>
    <div class="alert alert-warning" role="alert">
       
    </div>

    <div class="container">
        <form method="POST" >
            <div class="center30 card">
	<div class="card-header">Generate e-Cert</div>
	<div class="card-body">

		<form>
<!-- Input type text -->
<div class="form-group">
	<label for="input_id_0">Email</label>
	<input type="text" class="form-control" name="email" id="input_id_0" placeholder="email" required>
</div>

<!-- Input type text 
<div class="form-group">
	<label for="input_id_1">Passkey</label>
	<input type="password" class="form-control mt-1" name="passkey" id="input_id_1" placeholder="passkey" required>
	(Please check your email for passkey, send by us after the registration)
</div> -->

<button type="submit" class="btn btn-primary mt-1" name="submit" id="button_id_3">Submit</button>
		</form>


	</div>
</div>

            </div>
            <!-- <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p> -->
        </form>
    </div>
</body>

</html>
<?php
}
?>