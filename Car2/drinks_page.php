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
	<title>Drinks</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<div id='productBody'>
	<body>
		<div id="background_img1">
			<h1>Motor Empire</h1>
		</div>
		<?php if ($_SESSION['loginst'] == 0) { ?>
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
		<?php } else { ?>
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
		<?php }; ?>
		<!-- <div class="row">
			<div class="column left">
				<h2>Your Cart:</h2>
				<div class="container1">
					<div class="center1">
						<a href="checkout_page.php">
							<button>Proceed to Checkout</button>
					</div>
				</div>
				</a>
			</div> -->
			<div style="background-color:#bbb;">
				<h2 style='text-align: center';>Our Car Selection</h2>
				<div class="pics">
					<?php foreach ($items as $item) { ?>
						<div class="textbox">
							<a>
								<figure>
									<!--<img src="<?php echo $item['image']; ?>" />-->
									<img src="<?php echo $item['imageOfCar']; ?>" />
									<form action="addToCart.php" method="post">
										<!--<figcaption> <?php echo $item['name']; ?> <br>-->
										<figcaption> <?php echo $item['carName']; ?> <br>
											<input type='number' name='quantity' min=1 max=<?php echo $item['quantity']; ?> value='1' />
											<input type="hidden" name="productToAdd" value="<?php echo $item['carID']; ?>" />
											<input type="submit" name="submit" value="Add to Cart" />
										</figcaption>
									</form>
								</figure>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		<!-- </div> -->
		<footer id='footer'>
			<p>&copy; Motor Empire</p>
		</footer>
	</body>
</div>

</html>