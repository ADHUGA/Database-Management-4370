<?php

$dcp = 'mysql:host=localhost; dbname=carService';
$username = 'root';
$password = '';

try {
    $db = new PDO($dcp, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}

if (isset($_POST['car_id'])) {
    $car_id = $_POST['car_id'];
    $car_Name = $_POST['car_Name'];
    $car_manufacturer= $_POST['car_manufacturer'];
    $car_mileage = $_POST['car_mileage'];
    $car_price = $_POST['car_price'];
    $car_description = $_POST['car_description'];
    $car_imageOfCar = $_POST['car_imageOfCar'];
    $car_quantity = $_POST['car_quantity'];
} else {
    $car_id = NULL;
    $car_Name = NULL;
    $car_manufacturer= NULL;
    $car_mileage = NULL;
    $car_price = NULL;
    $car_description = NULL;
    $car_imageOfCar = NULL;
    $car_quantity = NULL;
}

$query = "SELECT * FROM products WHERE carID='$car_id'";
$statement = $db->prepare($query);
$statement->execute();
$temp = $statement->fetchAll();
$carprod = $temp[0][0];

if ($carprod != NULL) {
    $query = "UPDATE Products SET carName = '$car_Name', manufacturer = '$car_manufacturer', mileage = '$car_mileage', price = '$car_price', description = '$car_description', imageOfCar = '$car_imageOfCar', quantity = '$car_quantity' WHERE carID = '$car_id'";
    $statement = $db->prepare($query);
    $statement->execute();
    $temp = $statement->fetchAll();
}

include("edit_car_form.php");