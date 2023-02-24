<?php
$dsn = 'mysql:host=localhost; dbname=carService';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}






if (isset($_POST['carID'])) {
    $carID = $_POST['carID'];
    $quantity = $_POST['quantity'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$salted = "1444asajkasdlf".$password."42kldkfa43";
		
$hashed = hash('sha512', $password);



$query = "SELECT userID FROM users WHERE email='$email'";
$statement = $db->prepare($query);
$statement->execute();
$temp1 = $statement->fetchAll();
$selectuser = $temp1[0][0];


$query = "INSERT INTO incart (cartID, carID) VALUES ('$selectuser', '$carID')";
$statement = $db->prepare($query);
$statement->execute();
$temp1 = $statement->fetchAll();
include("AdditionFileForm.php");

