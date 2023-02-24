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

//$query = "SELECT * FROM products WHERE type='drink'";
$query = "SELECT * FROM products";
$items = $conn->query($query);

$_SESSION['pageID'] = 1;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Select</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>

<h2>Motor Empire</h2>

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

<div class="row">
  <div class="column" style="background-color:#aaa;">
    <h2>Car 1</h2>
    <p>Some text..</p>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h2>Car 2</h2>
    <p>Some text..</p>
  </div>
</div>

</body>
</html>
