<?php
session_start();
include 'GeneratePdf.php';

// PHP code for database connection
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

// Fetch details of selected items from another database table
$sql_select_items = "SELECT * FROM `product_details` WHERE product_ID IN (SELECT num FROM `selectpro`)";
$result = $con->query($sql_select_items);

$totalCost = 0;
$totalItems = 0;

?>

<!DOCTYPE html>


<html>
  <head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="./Home Page CSS.css">
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
	font-family: 'Poppins', sans-serif;
	margin:0;
	padding:0;
	box-sizing: border-box;
}
body{
	background: #c8efd1;
	overflow:hidden;
	overflow: auto; 
}
nav a {
  text-decoration: none;
}

.container{
	max-width:1200px;
	margin: 0 auto;
}
.container > h1{
	padding: 20px 0;
}
.cart{
	display: flex;
}
.products{
	flex: 0.75;
}
.product{
	display: flex;
	width: 100%;
	height: 200px;
	overflow: hidden;
  border-radius: 20px;
	margin-bottom: 20px;
}
.product:hover{
	border: none;
  border: 1px solid black;
  border-radius: 20px;
	box-shadow: 2px 2px 4px rgba(0,0,0,0.2);
	transform: scale(1.01);
    transition: 0.3s all ease;
}
.product > img{
	width:300px;
	height: 200px;
	object-fit: cover;
}
.product > img:hover{
	transform: scale(1.04);
    transition: 0.3s all ease;
}
.product-info{
	padding: 20px;
	width: 100%;
	position: relative;
}

.product-name, .product-price, .product-offer{
	margin-bottom: 20px;
}
.btn1 {
  background-color: transparent;
  border: transparent;
}
.product-remove{
	position: absolute;
	bottom: 20px;
	right: 20px;
	padding: 10px 25px;
	background-color: red;
	color: white;
	cursor: pointer;
	border-radius: 5px;
}
.product-remove:hover{
	background-color: white;
	color: red;
	font-weight: 600;
	border: 1px solid red;
}

.product-buy {
	position: absolute;
	bottom: 20px;
	right: 200px;
	padding: 10px 25px;
	background-color: green;
	color: white;
	cursor: pointer;
	border-radius: 5px;
	transition: transform 0.2s ease-in-out, font-size 0.2s ease-in-out;
}

.product-buy:hover {
	background-color: darkgreen;
	font-size: 16px; /* Increase font size on hover */
	transform: scale(1.1); /* Scale up on hover */
}

.product-quantity > input{
	width: 40px;
	padding: 5px;
	text-align: center;
}
.list
{
  list-style: none;
}
.btn1
{
  margin: 0 15px;
}
.btn2
{
  position: absolute;
	bottom: 30px;
	right: 200px;
	padding: 10px 25px;
	background-color: red;
	color: white;
	cursor: pointer;
	border-radius: 5px;
	transition: transform 0.2s ease-in-out, font-size 0.2s ease-in-out;
}
  

#quantity
{
  padding:0 20px;
  background-color:white;
  border-radius:5px solid black;
}
.fas{
	margin-right: 5px;
}
.cart-total{
	flex: 0.25;
	margin-left: 20px;
	padding:20px;
	height: 240px;
	border: 1.5px solid black;
	border-radius: 10px;
}
.cart-total p{
	display: flex;
	justify-content: space-between;
	margin-bottom: 30px;
	font-size: 20px;
}
.cart-total a{
	display: block;
	text-align: center;
	height: 40px;
	line-height: 40px;
	background-color: #32b350;
	color: white;
	text-decoration: none;
}
.cart-total a:hover{
	background-color: #74d88b;
}
.btn-outline-primary {
  margin: 20px;
}
.btn2 a {
  text-decoration: none;
  color: white;
}
.btn2 {
  border: transparent;
}
.btn2:hover{
  border: 1px solid red;
  background-color: transparent;
}
.btn2:hover a{
  color: red;
}
@media screen and (max-width: 700px){
	.remove{
		display: none;
	}
	.product{
		height: 150px;
	}
	.product > img{
		height: 150px;
		width: 200px;
	}
	.product-name, .product-price, .product-offer{
		margin-bottom: 10px;
	}
}
@media screen and (max-width: 900px){
	.cart{
		flex-direction: column;
	}
	.cart-total{
		margin-left: 0;
		margin-bottom: 20px;
}
@media screen and (max-width: 12220px){
	.container{
		max-width: 95%;
    }
}
.qut{
    width: 25px;
    height: 25px;
    font-size: 1em;
    background: transparent;
    border: transparent;
    margin: 5px;
}
}
	
    </style>
    
    <script
      src="https://kit.fontawesome.com/9088cc6401.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <link
    rel="shortcut icon"
    type="image/jpg"
    href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"
  />
  

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
        <a href="#" class="user-profile" style="color: blueviolet;">
        <i class="fas fa-user-cog"></i>
        </a>
    </div>
    </nav>
    <div class="container">
      <h1>Shopping Cart</h1>

      <div class="cart">
        <div class="products">
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . $row['image'] . "' />";
                    echo "<div class='product-info'>";
                    echo "<ul class='list'>";
                    echo "<li><h3 class='product-name'>" . $row['Name'] . "</h3></li>";
                    echo "<li><h4 class='product-price'>RS:" . $row['Price'] . ".00/=</h4></li>";
                    echo "<li><p>" . $row['Quantity'] . "</p></li>";
                    
                    echo "<li><button class='btn1' onclick='decreaseQuantity(" . $row['product_ID'] . ", " . $row['Price'] . ")'><ion-icon name='remove-circle'></ion-icon></button>";
                    // Assuming you have a session variable to hold the quantity
                    echo "<span id='quantity_" . $row['product_ID'] . "'>1</span>";
                    echo "<button class='btn1' onclick='increaseQuantity(" . $row['product_ID'] . ", " . $row['Price'] . ")'><ion-icon name='add-circle'></ion-icon></button></li>";

                    echo "<li><button class='btn2'><a href='DeleteProItem.php?id=" . $row['product_ID'] . "'>Delete</a></button></li>";
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    // Add price of the item to the total cost
                    $totalCost += $row['Price'];
                    $totalItems++;
                      
                        
                    }
                }
             else {
                echo "<h2 colspan='5'>No items selected yet.</h2>";
            }
            ?>
        </div>
        <div class="cart-total">
              <p>
              <span>Total Price</span>
                <span id="totalPrice">RS:<?php echo $totalCost; ?>.00/=</span>
              </p>
              <a href="Details For Checkout HTML.php">Proceed to Checkout</a>
              <form method="post" action="">
                <button type="submit" class="btn btn-outline-primary" name="generate_pdf">Generate PDF</button>
              </form>
            </div>
        
      </div>
    </div>
    <script>
    function decreaseQuantity(itemId, price) {
        var quantityElement = document.getElementById('quantity_' + itemId);
        var quantity = parseInt(quantityElement.innerHTML);
        if (quantity > 1) {
            quantity--;
            quantityElement.innerHTML = quantity;
            // Update total cost and price
            updateTotalCost(-price);
        }
    }

    function increaseQuantity(itemId, price) {
        var quantityElement = document.getElementById('quantity_' + itemId);
        var quantity = parseInt(quantityElement.innerHTML);
        quantity++;
        quantityElement.innerHTML = quantity;
        // Update total cost and price
        updateTotalCost(price);
    }

    function updateTotalCost(priceDifference) {
        var totalCostElement = document.getElementById('totalPrice');
        var totalCost = parseFloat(totalCostElement.innerHTML);
        totalCost += priceDifference;
        totalCostElement.innerHTML = totalCost.toFixed(2); // Assuming you want to display total cost up to 2 decimal places
    }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
<?php
// Close database connection
$con->close();
?>