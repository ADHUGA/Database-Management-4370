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
	  $productID = $_POST["productToAdd"];
	  $quantity = $_POST['quantity'];
	  //$insertProduct = "INSERT INTO cart (orderID, quantity, productID) VALUES ('1', '$quantity', '$productID')";
	  $insertProduct = "INSERT INTO products_orders (orderID, quantity, carID) VALUES ('1', '$quantity', '$carID')";
	  mysqli_query($conn, $insertProduct);

	  //$updateProduct = "UPDATE products SET quantity = quantity - '$quantity' WHERE productID = '$productID'";
	  $updateProduct = "UPDATE products SET quantity = quantity - '$quantity' WHERE carID = '$carID'";
	  mysqli_query($conn, $updateProduct);

	  if (isset($_SESSION['pageID']) && $_SESSION['pageID'] == 1){
		include('drinks_page.php');
	  }
	  elseif (isset($_SESSION['pageID']) && $_SESSION['pageID'] == 2){
		include('foods_page.php');
	  }
	  else {
		include('cart_page.php');
	  }
	} else {
	  echo 'ERROR';
	}

	// $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
	// $stmt->bind_param("i", $productID);
	// $stmt->execute();
	// $stmt->close();

	$conn->close();

?>