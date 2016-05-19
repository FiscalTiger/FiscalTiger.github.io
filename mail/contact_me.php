<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$dbname = "ajing_productions";

// Create connection
$conn = new mysqli(
ini_get("mysql.default_host"),
ini_get("mysql.default_user"),
ini_get("mysql.default_password"),
$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use real_escape_string to avoid sql injection attacks
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$message = $conn->real_escape_string($_POST['message']);


$sql = "INSERT INTO contacts (name, email, phone, message) VALUES('$name', '$email', '$phone', '$message')";

// On success return true, else return false
if ($conn->query($sql) === TRUE) {
    $conn->close();
} else {
    echo "There was an error please try again later";
    $conn->close();
    return false;
}

return true;
?>
