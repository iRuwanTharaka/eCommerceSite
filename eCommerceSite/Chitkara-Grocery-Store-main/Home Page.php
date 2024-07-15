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

// Fetch count of items from database table
$sql_count = "SELECT COUNT(*) AS total_items FROM selectpro";
$result = $con->query($sql_count);

if ($result->num_rows > 0) {
    // Fetching count of items
    $row = $result->fetch_assoc();
    $total_items = $row["total_items"];
} else {
    $total_items = 0;
}

// Close database connection
$con->close();
?>
<DOCTYPE html>

<html>

    <head>

    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

    <!--==Title==================================-->
    <title>

       ID Trade Centre

    </title>

    <!--==Stylesheet=============================-->
    <link rel="stylesheet" type="text/css" href="Home Page CSS.css">

    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" href="images/fav-icon.png"/>

    <!--==Using-Font-Awesome=====================-->
    <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>

    <script src = 'Home Page JS.js' defer></script>
	    
   <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <style>
        body{
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            background-color: #E0E0E0;
        }
        .category-box{
            margin: 5px;
            border: 1px solid black;
        }
        #popular-bundle-pack{
            border: 1px solid black;
        }
    </style>
    </head>

    <body>

        <!--==Navigation================================-->
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
            <a href="Home Page.php" class="active">Home</a>
        </li>
        <li>
            <a href="#category">Categories</a>
        </li>
        <li>
            <a href="customaition.php">Lunch</a>
        </li>
        <li>
            <a href="Contact Form HTML.php">Contact&nbsp;Us</a>
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
        <a href="Shopping Cart.php" class="cart">
            <i class="fas fa-shopping-cart"></i>
            <span><?php echo $total_items; ?></span> 
        </a>
        <!--cart----->
        <a href="User.php" class="user-profile">
            <i class="fas fa-user"></i>
            <span>@</span>
        </a>
        <a href="market-main/adminLogin.php" class="user-profile" style="color: blueviolet;">
        <i class="fas fa-user-cog"></i>
        </a>
    </div>
    </nav>

        <!--nav-end--------------------->
               <section id="search-banner">

            <!--bg--------->
            <img alt="bg" class="bg-1" src="https://i.imgur.com/h8pXo1s.png">

            <img alt="bg" class="bg-1_rev" src="https://i.imgur.com/h8pXo1s.png">

            <img alt="bg-2" class="bg-2" src="https://i.imgur.com/2smuQIz.png">

            <!--text------->
            <div class="search-banner-text">

                <h1>
                    
                    Welcome to ID Trade Centre
                
                </h1>

                <strong>
                    
                    Discover a wide range of products at our shop.
                
                </strong>

                <!--search-box------>
                <form action="" class="search-box">

                    <!--icon------>
                    <i class="fas fa-search"></i>

                    <!--input----->
                    <input type="text" class="search-input" placeholder="Search" name="search" size = "80px" required>

                    <!--btn------->
                    <input type="submit" class="search-btn" value="Search">

                </form>

               

               
            </div>

        </section>

       

        
        <!--==category=========================================-->
        <section id="category">

            <!--heading---------------->
            <div class="category-heading">

                <h2>
                    
                    Category
                
                </h2>

                <span>
                    
                    All
                
                </span>

            </div>

            <!--box-container---------->
            <div class="category-container">

                <!--box---------------->
                <a class="category-box" href = 'Fruits Category Page HTML.php'>
					<img alt="Fruits and Vegetables" src="img/12.png">
					<span>Foods<br>ආහාර</span>
				</a>
				<!--box---------------->
                <a class="category-box" href = 'Medicine Category Page.php'>
                    <img alt="Medicines" src="https://i.imgur.com/4sjlmg3.png">
                    <span>Snacks<br>කෙටි ආහාර</span>
                </a>
                <!--box---------------->
                <a class="category-box" href="Baby Care Category Page HTML.php">
                    <img alt="Baby Care Products" src="https://i.imgur.com/uvd01HH.png">
                    <span>Baby Care<br>ළදරු භාණ්ඩ</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Office Category Page HTML.php'>
                    <img alt="Fish" src="https://i.imgur.com/N5a3WUT.png">
                    <span>Stationary<br>ලිපි ද්‍රව්‍ය </span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Beauty Category Page HTML.php'>
                    <img alt="Beauty Products" src="https://i.imgur.com/Bm0yLex.png">
                    <span>Beauty<br>ආලේපන</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Gardening Category Page HTML.php'>
                    <img alt="Gardening Products" src="https://i.imgur.com/AjGulv5.png">
                    <span>Medicine<br>ඖෂධ</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Medicine Category Page HTML.php'>
                    <img alt="Medicines" src="https://i.imgur.com/4sjlmg3.png">
                    <span>Beverages<br>බීම</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'Medicine Category Page HTML.php'>
                    <img alt="Medicines" src="https://i.imgur.com/4sjlmg3.png">
                    <span>Frozen foods<br>ශීත කළ ආහාර</span>
                </a>
                <!--box---------------->
                <a class="category-box" href = 'grocery.html'>
                    <img alt="Medicines" src="https://i.imgur.com/4sjlmg3.png">
                    <span>Grocery<br>සිල්ලර බඩු</span>
                </a>

            </div>
            
        </section>
        <!--category-end----------------------------------->
        <form method="post" action="Home page.php">
        <!--==Products====================================-->
        <section id="popular-bundle-pack">
        
            <div class="product-heading">
                <h3>Popular Product</h3>
            </div>
            <div class="product-container">

            <?php
                // PHP code for database connection
                $servername = "localhost"; // Change this to your database server name
                $username = "root"; // Change this to your database username
                $password = ""; // Change this to your database password
                $dbname = "ppa"; // Change this to your database name

                // Create connection
                $con = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if (mysqli_connect_errno()) {
                    die("Failed to connect to MySQL: " . mysqli_connect_error());
                }

                // SQL Query to retrieve all advertisements from the database
                $sql = "SELECT * FROM `product_details`";

                // Execute the query against the database
                $result = mysqli_query($con, $sql);

                // Check if there are any advertisements found
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and display the advertisements
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="product-box">';
                        echo "<img alt='apple' src='". $row['image'] . "'>";
                        echo "<strong>".$row['Name']."</strong>";
                        echo "<span class='quantity'>".$row['Quantity']."</span>";
                        echo "<span class='price'>Rs.".$row['Price']."</span>";
                        echo "<button name='choice' value=".$row['product_ID']." type='submit' class='cart-btn'>Add to Cart</button>";
                        echo "</div>";
                    }
                } else {
                    echo "No advertisements found.";
                }

                // Close the database connection
                mysqli_close($con);
                ?>
            </div>
        </section>
</form>

                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p></Str></p>
                </div>
                <!--box------------->
                <div class="client-box">
                    <!--==profile===-->
                    <div class="client-profile">
                        <!--img--->
                        <img alt="client" src="https://i.imgur.com/3yv9Hkj.jpg">
                        <!--text-->
                        <div class="profile-text">
                            <strong>Buddhi bhashana</strong>
                            <span>Software Developer</span>
                        </div>
                    </div>
                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p>ID Trade Centre is just amazing. I can buy all my groceries from a single place. The groceries are available at very affordable prices. And, the groceries are delivered at the time slot you choose and prefer.</p>
                </div>
                <!--box------------->
                <div class="client-box">
                    <!--==profile===-->
                    <div class="client-profile">
                        <!--img--->
                        <img alt="client" src="https://i.imgur.com/Rk5RDey.jpg">
                        <!--text-->
                        <div class="profile-text">
                            <strong>Rashmi Paboda</strong>
                            <span>Marketer</span>
                        </div>
                    </div>
                    <!--==Rating======-->
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <!--==comments===-->
                    <p>At ID Trade Centre, you can get every foods and groceries. And it is not only about foods and groceries, you can buy all kinds of stuff here.</p>
                </div>
            </div>

            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img alt="client" src="https://i.imgur.com/3yv9Hkj.jpg">
                    <!--text-->
                    <div class="profile-text">
                        <strong>Naduni Janadini</strong>
                        <span>web designer</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>ID Trade centre is the best. Id Trade Centre never fails to dissapoint me. Grocery shopping has become so easy with ID Trade Centre.</p>
            </div>
           
        </section>
        <!--client-section-end---------->
        <!--==Partnre-logo================================-->
        <section id="partner">
            <!--heading------------>
            <div class="partner-heading">
                <h3>Our Trusted Product brands</h3>
            </div>
            <!--logo-container----->
            <div class="logo-container">
                <img alt="logo" src="https://i.imgur.com/iUOPVpm.png">
                <img alt="logo" src="https://i.imgur.com/kyp2UKO.png">
                <img alt="logo" src="https://i.imgur.com/072qc5v.png">
                <img alt="logo" src="https://i.imgur.com/AADIKZS.png">
            </div>
        </section>
        
        <footer>
            <div class="footer-container">
                <!--logo-container------>
                <div class="footer-logo">
                    <a href="file:///C:/Users/RAGHAV/Desktop/Coding/Grocery/Logo.png"><span>ID</span>Trade Centre</a>
                    <!--social----->
                    <div class="footer-social">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/?lang=en-in"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <!--links------------------------->
            <div class="footer-links">
                <strong>Product</strong>
                <ul>
                    <li><a href="#">Grocery</a></li>
                    <li><a href="#">Packages</a></li>
                    <li><a href="#">Popular</a></li>
                    <li><a href="#">New</a></li>
                </ul>
            </div>
            <!--links------------------------->
            <div class="footer-links">
                <strong>Category</strong>
                <ul>
                    <li><a href="#">Beauty</a></li>
                    <li><a href="#">Vegetables</a></li>
                    <li><a href="#">Baby</a></li>
                    <li><a href="#">Medicine</a></li>
                </ul>
            </div>
            <!--links-------------------------->
            <div class="footer-links">
                <strong>Contact</strong>
                <ul>
                    <li><a href="#">Phone : +94779445895</a></li>
                    <li><a href="#">Email : idtradecentre@gmail.com</a></li>
                    <li><a href="#">Cities we serve</a></li>
                </ul>
				<br><p style="color: aliceblue;">Copyright ©2023 | All Rights Reserved</p>
            </div>
            </div>
        </footer>
    </body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
