<!DOCTYPE html>
<html>

<head>
    <title>Edit Car</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
  <div class="header">
    <h1>EDIT CAR INFO</h1><br>
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
    <form action='edit_car.php' method='post'>
      <label for="car id">Car ID :</label>
      
        <input type="number" id="car_id" name="car_id"><br><br>

        <label for="car name">Car Name :</label>
        
          <input type="text" id="car_Name" name="car_Name" size="40px"><br><br>

        <label for="car manufacturer"> Car Manufacturer :</label>

        <input type="text" id="car_manufacturer" name="car_manufacturer"><br><br>

        <label for="car mileage"> Car Mileage :</label>

        <input type="number" id="car_mileage" name="car_mileage"><br><br>

        <label for="car price"> Car Price :</label>

        <input type="number" id="car_price" name="car_price"><br><br>

        <label for="car description"> Car Description :</label>

        <input type="text" id="car_description" name="car_description"><br><br>

        <label for="car image"> Car Image :</label>

        <input type="text" id="car_imageOfCar" name="car_imageOfCar"><br><br>

        <label for="car quantity"> Car Quantity :</label>

        <input type="number" id="car_quantity" name="car_quantity"><br><br>

                <div class="button">
                  <input type="submit" value="Update" align="center">
                </div>
    </form>
  </div>
</body>

</html>