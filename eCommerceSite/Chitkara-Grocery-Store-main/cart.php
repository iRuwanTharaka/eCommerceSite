<?php
session_start();

// Create connection
$con = mysqli_connect("localhost", "root", "", "PPA");

// Fetch count of items from database table
$sql_count = "SELECT COUNT(*) AS total_items FROM userselect";
$result = $con->query($sql_count);

if ($result->num_rows > 0) {
    // Fetching count of items
    $row = $result->fetch_assoc();
    $total_items = $row["total_items"];
} else {
    $total_items = 0;
}

// Fetch details of selected items from another database table
$sql_select_items = "SELECT * FROM `tblcustomaition` WHERE id IN (SELECT num FROM `userselect`)";
$result = $con->query($sql_select_items);

$totalCost = 0; // Initialize total cost
$totalItems = 0;

// Close database connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Home Page CSS.css">
    <link rel="stylesheet" href="./CSS/cart.CSS">
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #E0E0E0;
        }
        .select {
            position: fixed;
            justify-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-left: 94%;
            margin-top: 10px;
        }
        .select:hover {
            background-color: green;
            box-shadow: 5px 5px 4px rgba(0,0,0,0.2);
        }
        .select img {
            align-items: center;
            width: 50px;
            height: 50px;
        }
        .cart-total{
            margin-top: 200px;
        }
        .product-remove:hover{
            background-color: transparent;
        }
        a{
            text-decoration: none;
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
            background-color: 	#9ACD32;
        }
        .btn-secondary{
            margin: 20px;
            margin-left: 0;
        }
        .cart-total{
            position: fixed;
            top: 100px;
            margin-left: 45%;
            padding:20px;
            width: 45%;
            border: 1.5px solid black;
            border-radius: 10px;
            height: auto;
        }
    </style>    
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
                        echo "<img src='./image/" . $row['image'] . "'>";
                        echo "<div class='product-info'>";
                        echo "<h3 class='product-name'>". $row['title'] ."</h3>";
                        echo "<h4 class='product-price'>Rs:". $row['price'] . ".00/=</h4>";
                        echo "<p class='product-quantity'>Qnt:</p>";
                        echo "<button class='qut' onclick='decreaseQuantity(" . $row['id'] . ", " . $row['price'] . ")'><ion-icon name='remove-circle'></ion-icon></button>";
                        // Assuming you have a session variable to hold the quantity
                        echo "<span id='quantity_" . $row['id'] . "'>1</span>";
                        echo "<button class='qut' onclick='increaseQuantity(" . $row['id'] . ", " . $row['price'] . ")'><ion-icon name='add-circle'></ion-icon></button>";
                        echo "<a href='Deleteitem.php?id=".$row['id']."'><button class='product-remove'><i class='fas fa-trash-alt'></i> Remove </button></a>";
                        echo "</div>";
                        echo "</div>";
                        // Add price of the item to the total cost
                        $totalItems++;
                        $totalCost += $row['price'];
                        
                    }
                } else {
                    echo "<tr><td colspan='5'>No items selected yet.</td></tr>";
                }
                ?>
            </div>
            <div class="cart-total">
                <p>
                    <span>Total Price</span>
                    <span id="totalPrice">Rs. <?php echo $totalCost; ?>.00/=</span>
                </p>
                <p>
                    <span>No. of Items</span>
                    <span id="totalItems"><?php echo $totalItems; ?></span>
                </p>
                <a href="Details For Checkout HTML.html">Proceed to Checkout</a>
                <!-- report generation button -->
                <form method="post" action="Cart_generate_pdf.php">
                    <input type="submit" name="cart_generate_pdf" value="Payment Bill" class="btn btn-secondary">
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
            updateTotalCost(-price, itemId);
        }
    }

    function increaseQuantity(itemId, price) {
        var quantityElement = document.getElementById('quantity_' + itemId);
        var quantity = parseInt(quantityElement.innerHTML);
        quantity++;
        quantityElement.innerHTML = quantity;
        // Update total cost and price
        updateTotalCost(price, itemId);
    }

    function updateTotalCost(priceDifference, itemId) {
        var totalPriceElement = document.getElementById('totalPrice');
        var totalPrice = parseFloat(totalPriceElement.innerHTML.replace('Rs. ', '').replace('.00/=',''));
        totalPrice += priceDifference;
        totalPriceElement.innerHTML = 'Rs. ' + totalPrice.toFixed(2) + '/=';
    }

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
