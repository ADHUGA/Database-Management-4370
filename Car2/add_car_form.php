<!DOCTYPE html>
<html>

<head>
    <title>Add Car</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="header">
        <h1>Add Car</h1><br>
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

        <form action='add_car.php' method='post'>
            <h2>Product Information</h2>

            <label for="carName">Car Name</label><br>
            <input type="text" placeholder="RX7" name="carName" required><br>

            <label for="manufacturer">Manufacturer</label><br>
            <input type="manufacturer" placeholder="4" name="manufacturer" required><br>

            <label for="mileage">Mileage</label><br>
            <input type="number" placeholder="10000" name="mileage" required><br>

            <label for="price">Price</label><br>
            <input type="number" placeholder="70,0000" name="price" required><br>

            <label for="description">Description</label><br>
            <input type="text" placeholder="Pretty" name="description" required><br>

            <label for="imageOfCar">Image of Car</label><br>
            <input type="text" placeholder="images/(name).(filetype)" name="imageOfCar" required><br>

            <label for="quantity">Quantity</label><br>
            <input type="number" name="quantity" required><br><br>

            <button class='button' type="submit" name="submit">Add Car</button>
        </form>
    </div>
</body>

</html>