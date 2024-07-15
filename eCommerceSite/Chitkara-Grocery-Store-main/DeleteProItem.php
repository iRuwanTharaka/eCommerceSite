<?php
session_start();

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $productId = intval($_GET['id']);

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ppa";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // SQL query to delete the product with the given ID
    $sql = "DELETE FROM `selectpro` WHERE num = $productId";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        // Redirect back to the shopping cart page after successful deletion
        header("Location: Shopping Cart.php");
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }

    // Close the database connection
    $con->close();
} else {
    // Redirect back to the shopping cart page if product ID is not provided
    header("Location: Home.php");
    exit();
}
?>
