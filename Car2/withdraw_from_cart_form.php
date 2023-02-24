<!DOCTYPE html>
<html>

<head>
	<title>Withdraw Car Page</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="header">
        <h1>Withdraw Car From Cart</h1><br>
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

        <form action='withdraw_from_cart.php' method='post'>
            <h2>Remove Product from Cart</h2>



            <label for="carID">CarID</label><br>
            <input type="text" placeholder="" name="carID" required><br>

            <label for="quantity">Quantity</label><br>
            <input type="number" placeholder="0" name="quantity" required><br>

            <label for="email">Email</label><br>
            <input type="text" placeholder="gutenburg@aol.com" name="email" required><br>

            <label for="password">Password</label><br>
            <input type="text" placeholder="******" name="password" required><br><br>

            <button class='button' type="submit" name="submit">Withdraw It</button>
        </form>
    </div>
</body>

</html>