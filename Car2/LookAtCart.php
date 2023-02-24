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

if (isset($_POST['submit'])) {
    $cartID = $_POST['cartID'];

    $check = "DELETE FROM incart WHERE cartID = $cartID";
    $order = "INSERT INTO orders (userID, cartID) VALUES ($cartID, $cartID);";

     
      $query = "SELECT count(*) as totalcount FROM incart
              WHERE cartID = $cartID";

      $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_array($result);
      $totalcount = $row['totalcount'];

      if($totalcount != 0) {
        $checkout = $conn->query($check);
        $pushOrder = $conn->query($order);
      }
}

include('LookAtCartForm.php');

$conn->close();
?>