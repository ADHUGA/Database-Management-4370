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




if (isset($_POST["submit"])) {
    $carName = $_POST['carName'];
    $manufacturer = $_POST['manufacturer'];
    $mileage = $_POST['mileage'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $imageOfCar = $_POST['imageOfCar'];
    $quantity = $_POST['quantity'];
} else {
    include('add_product_form.php');
}

$query = "INSERT INTO products (carName, manufacturer, mileage, price, description, imageOfCar, quantity) VALUES ('$carName', '$manufacturer', '$mileage', '$price', '$description', '$imageOfCar', '$quantity')";
$statement1 = $db->prepare($query);
$statement1->execute();
$temp3 = $statement1->fetchAll();

include('add_car_form.php');