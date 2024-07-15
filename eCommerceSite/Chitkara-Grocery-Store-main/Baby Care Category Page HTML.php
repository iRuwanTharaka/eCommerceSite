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

        Baby Care Products

    </title>

    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="Baby Care Category Page CSS.css">
    
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

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
            <a href="Home Page HTML.html" class="active">
                Home
            </a>
        </li>
        <li>
            <a href="#category">
                Categories
            </a>
        </li>
        <li>
            <a href="#popular-bundle-pack">
                Packages
            </a>
        </li>
        <li>
            <a href="Contact Form HTML.php">
                Contact&nbsp;Us
            </a>
        </li>
        <li>
            <a href="Feedback Form HTML.php">
                Feedback
            </a>
        </li>
        <li>
            <a href="About Us HTML.html">
                About&nbsp;us
            </a>
        </li>
        <li>
            <a href="Login And Registration HTML.html">
                Login
            </a>
        </li>
    </ul>
    <!--right-nav-(cart-like)-->
    <div class="right-nav">
        <!--cart----->
        <a href="Shopping Cart.php" class="cart">
            <i class="fas fa-shopping-cart"></i>
            <span id="cartItemsCount">0</span>
        </a>
        <!--cart----->
        <a href="Profile HTML.html" class="user-profile">
            <i class="fas fa-user"></i>
            <span>2</span>
        </a>
    </div>
</nav>

        <section id="popular-product">
            <!--heading----------->
            <div class="product-heading">
                <h2 class = 'fruits-heading'>Baby Care Products</h2>
            </div>
            <!--box-container------>
            <div class="product-container">
                <!--box---------->
                <div class="product-box" style = "height: 95%;">
                    <img alt="Johnson's Baby Oil" src="https://i.imgur.com/0LKWxiJ.jpg">
                    <strong>Johnson's Baby Oil</strong>
                    <span class="quantity">500 ml</span>
                    <span class="price">Rs. 425</span>
                    <!--cart-btn------->
                    <button name="choice" value="23" type="submit">Add to Cart</button>
                    <!-- <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a> -->
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box" style="height: 95%;">
                    <img alt="Little's Baby Wipes" src="https://i.imgur.com/6rlktPI.jpg">
                    <strong>Little's Baby Wipes</strong>
                    <span class="quantity">80 Wipes</span>
                    <span class="price">Rs. 95</span>
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
                    <img alt="Mama Earth Baby Moisturizer" src="https://i.imgur.com/DEONooZ.jpg">
                    <strong>Mama Earth Baby Moisturizer </strong>
                    <span class="quantity">400 ml</span>
                    <span class="price">Rs. 339.15</span>
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
                    <img alt="imalaya Baby Shampoo" src="https://i.imgur.com/fuAMCYN.jpg">
                    <strong>Himalaya Baby Shampoo</strong>
                    <span class="quantity">400 ml</span>
                    <span class="price">Rs. 230</span>
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
                    <img alt="Johnson's Baby Powder" src="https://i.imgur.com/HsECirZ.jpg">
                    <strong>Johnson's Baby Powder</strong>
                    <span class="quantity">200 g</span>
                    <span class="price">Rs. 155</span>
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
                    <img alt="Pampers Baby Pants" src="https://i.imgur.com/97mm2rX.jpg">
                    <strong>Pampers Baby Pants</strong>
                    <span class="quantity">58 Pants</span>
                    <span class="price">Rs. 699</span>
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
