<?php
	include_once('session_header.php');

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "carService";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	if (isset($_POST["submit"])) {
	  $street_name = $_POST['street_name'];
	  $city = $_POST['city'];
	  $state = $_POST['state'];
	  $zipcode = $_POST['zip_code'];
	} else {
	  header("location: checkout_page.html");
	}

  $full_addr = "$street_name" . ", " . "$city" . ", " . "$state" . " " . "$zipcode";
  $userID = $_SESSION['userID'] ?? '0';
  $total = 100.91;

  $stmt = "INSERT INTO order_summary (paymentStatus, grandTotal, userID, address) VALUES ('true', '$total', '$userID', '$full_addr')";
  mysqli_query($conn, $stmt);

//   echo $userID;
  include('home_page.php');



//header("location: home_page.html");

$conn->close();
