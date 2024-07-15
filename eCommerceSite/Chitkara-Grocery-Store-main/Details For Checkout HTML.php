
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ppa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['Name'], $_POST['Address'], $_POST['Email'], $_POST['phone'])) {
        // Get form data and sanitize it
        $name = mysqli_real_escape_string($conn, $_POST['Name']);
        $address = mysqli_real_escape_string($conn, $_POST['Address']);
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        

        // SQL query to insert data into database
        $sql = "INSERT INTO orderdetails (Name, Address, Email, phone, price) VALUES ('$name', '$address', '$email', '$phone','$price')";

        if ($conn->query($sql) === TRUE) {
            header("Location: Payment HTML.php");
            exit();
        } else {
            echo "<script>swal('Error!', 'Error occurred while inserting data: " . $conn->error . "', 'error');</script>";
        }        
    } else {
        echo "Error: All fields are required.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="contact-type" content="text/html; charset-utf-8"/>
    <meta name="viewport" content="width-device-width,initial-scale=1,mininmum-scale=1,maximum-scale=1,user-scalable=no">
    <title>Details for Delivery</title>
    <link href="Details For Checkout CSS.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="Details For Checkout JS.js"></script>

</head>
<body>
    <div class="contact-in">
        <div class="contact-form">
            <h1 align='center'>Details For Delivery</h1>
            <div id="error_message"></div>
            <form class='address_form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validate_form();">
                <input type="text" placeholder="Name" class="contact-form-txt" id='name' name='Name' required/>
                <input type="text" placeholder="Address" class="contact-form-txt" id='address' name='Address' required/>
                <input type="text" placeholder="Email-ID" class="contact-form-txt" id='email' name='Email' required/>
                <input type="text" placeholder="Contact No." class="contact-form-txt" id='phone' name='phone' required/>
                <input type="text" placeholder="Price" class="contact-form-txt" id='price' name='price' required/>
                <button type="submit" class="contact-form-btn" id='submit'>Submit</button>

            </form>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/sweetalert/dist/sweetalert.css">
</body>
</html>