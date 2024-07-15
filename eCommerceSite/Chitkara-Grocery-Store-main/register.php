<?php
session_start();
include 'db_config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    
    // Escape user inputs for security
    $name = $_POST["username"];
	$number = $_POST["contact_number"];
	$email = $_POST["email"];
	$password = $_POST["password"];
    
    $sql = "INSERT INTO `user` (`username`, `contact_number`, `email`, `password`) VALUES ('".$name."', '".$number."', '".$email."', '".$password."');";

	//Execute the query against the database
	mysqli_query($conn,$sql);

    header('Location: Login And Registration HTML.php');

    // Close database connection
    mysqli_close($conn);
}
?>
