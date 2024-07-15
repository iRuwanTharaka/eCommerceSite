<?php
session_start();

// PHP code for database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "ppa"; // Change this to your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if choice is set in POST data
if (isset($_POST['choice'])) {
    // Retrieve choice from POST data
    $choice = $_POST['choice'];

    // Prepare SQL statement to insert the choice into database
    $sql = "INSERT INTO `selectpro` (`id`, `num`) VALUES (NULL, '$choice')";

    // Execute SQL statement
    if ($con->query($sql) === TRUE) {
        echo "Choice successfully recorded!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close database connection
$con->close();
?>

<!DOCTYPE html>

<html>

    <title>

        Office Products

    </title>

    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="Baby Care Category Page CSS.css">
    
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    <body>

        <section id="popular-product">
            <!--heading----------->
            <div class="product-heading">
                <h2 class = 'fruits-heading'>Office Products</h2>
            </div>
            <!--box-container------>
            <div class="product-container">
                <!--box---------->
                <div class="product-box" style = "height: 95%;">
                    <img alt="Kangaroo Stapler No.-10" src="https://i.imgur.com/mZtkksq.jpg">
                    <strong>Kangaroo Stapler No.-10</strong>
                    <span class="quantity">5</span>
                    <span class="price">Rs. 210</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box" style="height: 95%;">
                    <img alt="Kangaroo Punching Machine" src="https://i.imgur.com/KkYKE2x.jpg">
                    <strong>Kangaroo Punching Machine</strong>
                    <span class="quantity">1</span>
                    <span class="price">Rs. 142</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box" style="height: 95%;">
                    <img alt="Natraj HB Pencils" src="https://i.imgur.com/fFUTngw.jpg">
                    <strong>Natraj HB Pencils</strong>
                    <span class="quantity">Pack of 10</span>
                    <span class="price">Rs. 300</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box">
                    <img alt="Natraj Ball Pens" src="https://i.imgur.com/yl5NWbN.jpg">
                    <strong>Natraj Ball Pens</strong>
                    <span class="quantity">Pack of 10</span>
                    <span class="price">Rs. 167</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box">
                    <img alt="Post It Sticky Notes" src="https://i.imgur.com/tHqNkY2.jpg">
                    <strong>Post It Sticky Notes</strong>
                    <span class="quantity">Pack of 6</span>
                    <span class="price">Rs. 358</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box">
                    <img alt="Kangaroo Stapler Pins No.-10" src="https://i.imgur.com/BZfAFQm.jpg">
                    <strong>Kangaroo Stapler Pins No.-10</strong>
                    <span class="quantity">Pack of 5</span>
                    <span class="price">Rs. 237</span>
                    <!--cart-btn------->
                    <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a>
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
            </div>
        </section>

    </body>

</html>
