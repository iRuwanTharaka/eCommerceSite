<?php
session_start();

// Check if ID is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $itemId = $_GET['id'];

    // Create connection
    $con = mysqli_connect("localhost", "root", "", "PPA");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Construct the SQL query to delete the item from userselect table
    $sql_delete_item = "DELETE FROM userselect WHERE num = $itemId";

    // Execute the delete query
    if (mysqli_query($con, $sql_delete_item)) {
        header("Location:cart.php"); // Replace 'previous_page.php' with the actual page
    } else {
        echo "Error deleting item: " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
} else {
    // If ID is not provided, redirect to the previous page or handle it appropriately
    header("Location:cart.php"); // Replace 'previous_page.php' with the actual page
    exit();
}
?>
