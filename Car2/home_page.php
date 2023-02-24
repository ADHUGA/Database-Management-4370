<?php include_once('session_header.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
	<div id="background_img1">
		<h1>Motor Empire</h1>
	</div>
	<?php if($_SESSION['loginst'] == 0) { ?>
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
	<div id='images_div'>
		<img src='images/RX7.jpg' alt='Middle of website'>
		<img src='images/Lambo.jpg'>
		<img src='images/FordMustang.jpg'>
	</div>
	<div id='menu_div'>
		<form action="redirection_page.php" method="post">
			<h2>Explore our catalog!</h2>
			<p>We host a wide selection of vehicles that will make the crowd go WOW!</p>
			<button type="submit" class='menu_items_button' name="drinks">Cars</button>
			<button type="submit" class='menu_items_button' name="food">Compare</button>
		</form>
	</div>
	<footer id='footer'>
		<p>&copy; Motor Empire</p>
	</footer>
</body>




</html>