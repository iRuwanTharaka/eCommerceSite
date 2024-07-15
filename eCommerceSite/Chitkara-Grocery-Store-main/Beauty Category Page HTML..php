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
    <style>
        .navigation{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 35px;
    max-width: 1070px;
    width: 100%;
    margin: auto;
    margin-left: 90px;
}
.menu{
    display: flex;
	align-items:left;
}
.menu li a{
    padding: 3px 10px;
    margin: 0px 15px;
    color: #3b3b3b;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all ease 0.3s;
	
}
.logo{
    font-size: 1.4rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: #202020;
}
.logo span{
    color: #40aa54;
}
.right-nav{
    display: flex;
    grid-template-columns: auto auto;
    grid-gap: 25px;
}
.right-nav a{
    width:40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    position: relative;
}
.right-nav .like{
    background-color: #fff0ee;
    color: #ff6c57;
}
.right-nav .cart{
    background-color: #ecf7ee;
    color: #4eb060;
}
</style>
    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./Beauty Category Page CSS.css">
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
                    <a href="Home Page HTML.php">
                        
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

					<a href="About Us HTML.php">

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

                <!--like----->
               

                <!--cart----->
                <a href="Shopping Cart.php" class="cart">

                    <i class="fas fa-shopping-cart"></i>

                    <span>
                        
                        1
                    
                    </span>

                </a>

                <!--cart----->
                <a href="Profile HTML.php" class="user-profile">

                    <i class="fas fa-user"></i>

                    <span>

                        2

                    </span>

                </a>

            </div>

        </nav>

    <form method="post" action="Beauty Category Page HTML.php">
        <section id="popular-product">
            <!--heading----------->
            <div class="product-heading">
                <h2 class = 'fruits-heading'>Beauty Products</h2>
            </div>
            <!--box-container------>
            <div class="product-container">
                <!--box---------->
                <div class="product-box" style = "height: 95%;">
                    <img alt="Lakme Blush and Glow Face Wash" src="https://i.imgur.com/RulBeyf.jpg">
                    <strong>Lakme Blush and Glow Face Wash</strong>
                    <span class="quantity">100 g</span>
                    <span class="price">Rs. 144</span>
                    <!--cart-btn------->
                    <button name="choice" value="18" type="submit">Add to Cart</button>
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
                    <img alt="Ponds Men Pollution Out Facewash" src="https://i.imgur.com/azJYLRo.jpg">
                    <strong>Ponds Men Pollution Out Facewash</strong>
                    <span class="quantity">100 g</span>
                    <span class="price">Rs. 159</span>
                    <!--cart-btn------->
                    <button name="choice" value="19" type="submit">Add to Cart</button>
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
                    <img alt="Nivea Body Milk" src="https://i.imgur.com/XroaNlX.jpg">
                    <strong>Nivea Body Milk</strong>
                    <span class="quantity">200 ml</span>
                    <span class="price">Rs. 178</span>
                    <!--cart-btn------->
                    <!-- <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a> -->
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box">
                    <img alt="Nivea Lip Balm" src="https://i.imgur.com/0eK7qXj.jpg">
                    <strong>Nivea Lip Balm</strong>
                    <span class="quantity">1</span>
                    <span class="price">Rs. 151</span>
                    <!--cart-btn------->
                    <!-- <a href="Shopping Cart HTML.html" class="cart-btn" style = 'text-decoration: none;'>
                        <i class="fas fa-shopping-bag"></i> Add to Cart
                    </a> -->
                    <!--like-btn------->
                    <a class="like-btn" style = 'text-decoration: none;'>
                        <i class="far fa-heart"></i>
                    </a>
                </div>
                <!--box---------->
                <div class="product-box">
                    <img alt="Berado Hair Growth Oil" src="https://i.imgur.com/qnTjfBG.jpg">
                    <strong>Berado Hair Growth Oil</strong>
                    <span class="quantity">50 ml</span>
                    <span class="price">Rs. 585</span>
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
                    <img alt="Olay Total Effects Day Cream" src="https://i.imgur.com/Hmo66oR.jpg">
                    <strong>Olay Total Effects Day Cream</strong>
                    <span class="quantity">50 g</span>
                    <span class="price">Rs. 749</span>
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
