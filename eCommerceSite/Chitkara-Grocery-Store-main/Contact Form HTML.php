<?php
include 'db_config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    // SQL to insert data into ContactUs table
    $sql = "INSERT INTO ContactUs (name, email, phone_number, message)
    VALUES ('$name', '$email', '$phone_number', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Contact Form Confirm HTML and CSS.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="Contact Form CSS.css">
    <link rel="stylesheet" type="text/css" href="Home Page CSS.css">
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
   
</head>
<body>
    <nav class="navigation">
        <!--logo-------->
        <a href="#" class="logo">
            <div><img src="logo/id logo.png" width="100%"></div>
            <span>ID</span>Trade Centre
        </a>
        <!--menu-btn---->
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon"></span>
        </label>
        <!--menu-------->
        <ul class="menu">
            <li>
                <a href="Home Page.php">Home</a>
            </li>
            <li>
                <a href="#category">Categories</a>
            </li>
            <li>
                <a href="customaition.php">Lunch</a>
            </li>
            <li>
                <a href="Contact Form HTML.php" class="active">Contact&nbsp;Us</a>
            </li> 
            <li>
                <a href="Feedback Form HTML.php">Feedback</a>
            </li>
            <li>
                <a href="About Us HTML.php">About&nbsp;us</a>
            </li>
            <li>
                <a href="Login And Registration HTML.php">Login</a>
            </li>
        </ul>
        <!--right-nav-(cart-like)-->
        <div class="right-nav">
            <!--cart----->
            <a href="./cart.php" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span>2</span> 
            </a>
            <!--cart----->
            <a href="User.php" class="user-profile">
                <i class="fas fa-user"></i>
                <span>@</span>
            </a>
            <a href="#" class="user-profile" style="color: blueviolet;">
                <i class="fas fa-user-cog"></i>
            </a>
        </div>
    </nav>

    <div id="error_message"></div>

    <form method="post" action="Contact Form HTML.php">
        <div class="container">
            <div class="contact-box">
                <div class="left">
                </div>
                <div class="right">
                    <h2>Contact Us</h2>
                    <input type="text" class="field" name="name" placeholder="Your Name" required>
                    <input type="email" class="field" name="email" placeholder="Your Email" required>
                    <input type="text" class="field" name="phone_number" placeholder="Your Phone number" required>
                    <textarea class="field area" name="message" placeholder="Message"></textarea>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
