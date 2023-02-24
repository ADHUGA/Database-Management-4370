<?php
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
	
	//Bucket-List
	//Make sure username is unique. (Already does this but better error message could be shown
	//Make sure password is long enough
	//BONUS adjust phone
	
	//-Adjusted the Styles sheet for adding registration to login page (can be easily adjusted to look better)
	//-Added insert_login.php to add users
	//-Added 

	
	if (isset($_POST["REGsubmit"])) {
		//$user = $_POST["user"] ?? '';
		$REGEMAIL = $_POST["REGEMAIL"] ?? '';
		$pswd = $_POST["pswd"] ?? '';
		$phone = $_POST["phone"] ?? '';
		$REGFIRST = $_POST["REGFIRST"] ?? '';
		//$REGSTATE = $_POST["REGSTATE"] ?? '';
	} else {
		include('login_page.php');
	}
	/*
	if(strlen($pswd) < 5 ) 
	{
		echo "Password is less than 5 characters";
		include('login_page.php');
	}
	*/
	
	if(!empty($_POST["REGFIRST"]) or !empty($_POST["phone"]) or !empty($_POST["REGEMAIL"]) or !empty($_POST["pswd"]))
	{
		$salted = "1444asajkasdlf".$pswd."42kldkfa43";
		
		$hashed = hash('sha512', $pswd);
		
		$sql = "INSERT INTO users (email, name, password, phoneNumber) VALUES ('$REGEMAIL', '$REGFIRST', '$hashed', '$phone')";
		//$sql = "INSERT INTO users (name, state, username, password, phoneNum) VALUES ('$REGFIRST', '$REGSTATE', '$user', '$hashed', '$phone')";
		
		if(mysqli_query($conn, $sql)){
			echo "Account Succesfully Created!";
			include('login_page.php');
			}
			else
			{
				echo "ERROR: Duplicate email";
				include('login_page.php');
			}
	}
	else
	{
		echo "Please fill in the required fields before signing up";
		include('login_page.php');
	}

	$conn->close();
?>