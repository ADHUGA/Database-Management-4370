<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "carService";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart Page</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="header">
    <h1>Your Current Cart</h1><br>
</div>

<ul id="navbar_div">
			<li><a class="active" href="home_page.php">Home</a></li>
			<li><a href="drinks_page.php">Cars</a></li>
			<li><a href="foods_page.php">Compare</a></li>
			<li><a href="Selection.php">Selection</a></li>
			<li><a href="add_car_form.php">Add Car</a></li>
			<li><a href="edit_car_form.php">Edit Car</a></li>
			<!--<li><a href="add_payment_form.php">Add Payment</a></li>-->
			<li><a href="AdditionFileForm.php">Add To Cart</a></li>
			<li><a href="LookAtCartForm.php">Cart</a></li>
			<li><a href="withdraw_from_cart_form.php">Withdraw</a></li>
			<li><a href="login_page.php">Login/Register</a></li>
		</ul>

<div class="content">
    <br><br>
    <?php
    $cart = "SELECT * FROM incart";
    $result = $conn->query($cart);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc() ){
            echo "Cart ID is " . $row["cartID"] ." and your Car ID is " .$row["carID"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    ?>

    <form action='LookAtCart.php' method='post'>

        <div class="shopping_cart">


        </div><br><br><br><br><br><br><br><br>


        <label for="cartID">Cart ID</label><br>
        <input type="text" placeholder="Cart's ID #" name="cartID" required><br>

        <button class='button' type="submit" name="submit">Checkout</button>


    </form>
</div>
</body>
</html>