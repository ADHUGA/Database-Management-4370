<?php
	session_start();

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

	$_SESSION['loginst'] = 0;
	$_SESSION['userID'] = 0;

	if (isset($_POST["submit"])) {
		$uemail = $_POST["uemail"] ?? '';
		$password = $_POST["password"] ?? '';
		$check = $_POST["check"] ?? '';
	} else {
		include('login_page.php');
	}
	
	$salted = "1444asajkasdlf".$password."42kldkfa43";
		
	$hashed = hash('sha512', $password);

	$query = "SELECT * FROM users WHERE email='$uemail' AND password='$hashed'";
	$data = $conn->query($query);


	//$query3 = "SELECT products.name, cart.quantity, cart.productID, products.price FROM cart JOIN products ON cart.productID = products.productID";
	$query3 = "SELECT products.carName, products_orders.quantity, products_orders.carID, products.price FROM products_orders JOIN products ON products_orders.carID = products.carID";
	$cartItems = $conn->query($query3);

	$query2 = "SELECT userID FROM users WHERE email='$uemail' AND password='$hashed'";
	mysqli_query($conn, $query2);

	
	$row_count = mysqli_num_rows($data);
	if($row_count > 0) {
		if($check=='1') {
			setcookie("mycookie", TRUE, time()+6);
		}
		$_SESSION['loginst'] = 1;
		foreach($data as $datas){
			$_SESSION['userID'] = $datas['userID'];
		}
		include('home_page.php');
	} else {
		include('error.html'); //getting stuck here
		$conn->close();
	}
	
?>