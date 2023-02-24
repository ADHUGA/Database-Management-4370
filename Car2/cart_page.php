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

$query = "SELECT products.name, cart.quantity, cart.productID, products.price FROM cart JOIN products ON cart.productID = products.productID";
$cartItems = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cart Page</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<div id='cartBody'>

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
        <div id="cart">
            <h2>REVIEW YOUR CART!</h2>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
                <!-- cart -->
                <?php
                $grandTotal = 0;
                foreach ($cartItems as $cartItem) :
                    $total = $cartItem['quantity'] * $cartItem['price'];
                    $productID = $cartItem['productID'];
                    $updateTotal = "UPDATE cart SET total = '$total' WHERE cart.productID = '$productID'";
                    mysqli_query($conn, $updateTotal);
                    $grandTotal = $grandTotal + $total;
                ?>
                    <tr>
                        <td><?php echo $cartItem['name']; ?></td>
                        <td>$<?php echo $cartItem['price']; ?></td>
                        <td><?php echo $cartItem['quantity']; ?></td>
                        <td>$<?php echo $total; ?></td>
                        <td>
                            <form action="deleteFromCart.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $cartItem['productID']; ?>" />
                                <input type="submit" name='submit' value="Delete" />
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php ?>
            </table>
            <h2>Grand Total: $<?php echo $grandTotal ?></h2>

            <form action="checkout_page.php" method="post">
                <button class='checkout'>Proceed to Checkout</button>
            </form>
        </div>
        <footer id="footer">
            <p>&copy; Motor Empire</p>
        </footer>
    </body>
</div>

</html>