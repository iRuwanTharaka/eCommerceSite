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
<head>
    <title>Medicines</title>
    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Medicine Category Page CSS.css">
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
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
            <a href="Contact Form HTML.html">
                Contact&nbsp;Us
            </a>
        </li>
        <li>
            <a href="Feedback Form HTML.html">
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
        <a href="Shopping Cart HTML.html" class="cart">
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
<form method="post" action="Medicine Category Page.php">
    
<section id="popular-product">
    <!--heading----------->
    <div class="product-heading">
        <h2 class="fruits-heading">Medicines</h2>
    </div>
    <!--box-container------>
    <div class="product-container">
        <!--box---------->
        <div class="product-box" style="height: 95%;">
            <img alt="pandol" src="images/Panadol-Tablets.jpg">
            <strong>Pandol 500 mg</strong>
            <span class="quantity">12 Tablets</span>
            <span class="price">Rs.100</span>
            <!--cart-btn------->
            <button name="choice" value="20" type="submit" class="cart-btn">Add to Cart</button>
            <!-- <button class="cart-btn" onclick="addToCart('Pandol 500mg')">
                <i class="fas fa-shopping-bag"></i> Add to Cart
            </button> -->
            <!--like-btn------->
            <a class="like-btn" style="text-decoration: none;">
                <i class="far fa-heart"></i>
            </a>
        </div>
        <!--box---------->
        <!-- Add more product boxes here -->
   
     <!--box---------->
     <div class="product-box">
        <img alt="asamodagam" src="images/Asamodagam.webp">
        <strong>Asamodagam</strong>
        <span class="quantity"></span>
        <span class="price">Rs.200</span>
        <!--cart-btn------->
        <button name="choice" value="21" type="submit" class="cart-btn">Add to Cart</button>
        <!-- <button class="cart-btn" onclick="addToCart('Asamodagam')">
            <i class="fas fa-shopping-bag"></i> Add to Cart
        </button> -->
        </a>
        <!--like-btn------->
        <a class="like-btn" style = 'text-decoration: none;'>
            <i class="far fa-heart"></i>
        </a>
    </div>
    <!--box---------->
    <div class="product-box" style="height: 95%;">
        <img alt="Cheston Cold" src="https://i.imgur.com/KqTyIOv.png">
        <strong>Cheston Cold </strong>
        <span class="quantity">10 Tablets</span>
        <span class="price">Rs. 34</span>
        <!--cart-btn------->
        <button name="choice" value="22" type="submit" class="cart-btn">Add to Cart</button>
        <!-- <button class="cart-btn" onclick="addToCart('Asamodagam')">
            <i class="fas fa-shopping-bag"></i> Add to Cart
        </button> -->
        <!--like-btn------->
        <a class="like-btn" style = 'text-decoration: none;'>
            <i class="far fa-heart"></i>
        </a>
    </div>
    <!--box---------->
    <div class="product-box">
        <img alt="Dolo 650" src="https://i.imgur.com/ZgxivW4.jpg">
        <strong>Dolo 650</strong>
        <span class="quantity">15 Tablets</span>
        <span class="price">Rs. 24.75</span>
        <!--cart-btn------->
        <button class="cart-btn" onclick="addToCart('Asamodagam')">
            <i class="fas fa-shopping-bag"></i> Add to Cart
        </button>
        <!--like-btn------->
        <a class="like-btn" style = 'text-decoration: none;'>
            <i class="far fa-heart"></i>
        </a>
    </div>
    <!--box---------->
    <div class="product-box">
        <img alt="Metolar XR 50" src="https://i.imgur.com/VfI11ZP.png">
        <strong>Metolar XR 50</strong>
        <span class="quantity">15 Tablets</span>
        <span class="price">Rs. 77.66</span>
        <!--cart-btn------->
        <button class="cart-btn" onclick="addToCart('Asamodagam')">
            <i class="fas fa-shopping-bag"></i> Add to Cart
        </button>
        <!--like-btn------->
        <a class="like-btn" style = 'text-decoration: none;'>
            <i class="far fa-heart"></i>
        </a>
    </div>
    <!--box---------->
    <div class="product-box">
        <img alt="Gelusil Tablets" src="https://i.imgur.com/v7EIJzM.jpg">
        <strong>Gelusil Chewable Tablets</strong>
        <span class="quantity">10 Tablets</span>
        <span class="price">Rs. 15.92</span>
        <!--cart-btn------->
        <button class="cart-btn" onclick="addToCart('Asamodagam')">
            <i class="fas fa-shopping-bag"></i> Add to Cart
        </button>
        <!--like-btn------->
        <a class="like-btn" style = 'text-decoration: none;'>
            <i class="far fa-heart"></i>
        </a>
    </div>
</div>

</section>
</form>


<script>
    function addToCart(itemName) {
        var cartItemsCount = parseInt(document.getElementById('cartItemsCount').textContent);
        document.getElementById('cartItemsCount').textContent = cartItemsCount + 1;
        alert(itemName + ' successfully added to cart.');
    }
</script>

</body>
</html>
