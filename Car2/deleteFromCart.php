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
	  $productID = $_POST["product_id"];
	  $deleteProduct = "DELETE FROM cart WHERE productID = $productID";
      $insertQuantity = "UPDATE products p JOIN cart c ON c.productID = p.productID SET p.quantity = p.quantity + c.quantity WHERE p.productID = '$productID'";
      mysqli_query($conn, $insertQuantity);
	  mysqli_query($conn, $deleteProduct);



	  include('cart_page.php');

	} else {
	  echo 'ERROR';
	}

	// $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
	// $stmt->bind_param("i", $productID);
	// $stmt->execute();
	// $stmt->close();

	$conn->close();

?>