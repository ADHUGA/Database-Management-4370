<?php include_once('session_header.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout Page</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body id="checkoutbody">
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
    <div id="checkout">
        <form action='complete_checkout.php' method='post'>
            <h2>Customer Information</h2>   

            <div id="fulllength" class="clear">
                <label for="saddress">Street Address</label><br>
                <input type="text" placeholder="e.g., 2222 Coffee Place" name="street_name" required><br>
            </div>

            <div class="together">
                <label for="">City</label><br>
                <input type="text" placeholder="e.g., Athens" name="city" required><br>
            </div>

            <div class="together">
                <label for="">State / Province</label><br>
                <input type="text" placeholder="e.g., Georgia" name="state" required><br>
            </div><br>

            <div class="together">
                <label for="">Postal Code</label><br>
                <input type="text" pattern="(?=.*\d).{5}" placeholder="e.g., 30078" name="zip_code" title="Enter a valid zip code" required><br>
            </div><br>

            <h2>Payment Information</h2>

            <div id="fulllength" class="clear">
                <label for="">Name on Card</label><br>
                <input type="text" placeholder="e.g., John Smith" required><br>
            </div>

            <div id="fulllength" class="clear">
                <label for="Card Number">Card Number</label><br>
                <input type="text" pattern="(?=.*\d).{15,16}" placeholder="xxxxxxxxxxxxxxxx" name="card_num" title="We only accept Visa, Mastercard, Discover, and American Express." required><br>
            </div>

            <div class="together">
                <label for="">Expiration Month</label><br>
                <input type="text" placeholder="e.g., September" required><br>
            </div>

            <div class="together">
                <label for="">Expiration Year</label><br>
                <input type="text" pattern="(?=.*\d).{4}" placeholder="e.g., 2021" title="Please enter a valid year." required><br>
            </div><br>

            <div class="together">
                <label for="">CVV</label><br>
                <input type="text" pattern="(?=.*\d).{3,4}" placeholder="xxx" title="CVV should be either 3 digits or 4 digits." required><br>
            </div>

            <div class="together">
                <label for="">Billing Zip Code</label><br>
                <input type="text" pattern="(?=.*\d).{5}" placeholder="e.g., 30078" required><br>
            </div><br>

            <button class='checkout' type="submit" name="submit">Submit Order</button>
        </form>
    </div>
    <footer id="footer">
        <p>&copy; Motor Empire</p>
    </footer>
</body>

</html>