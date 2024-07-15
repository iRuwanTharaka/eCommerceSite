<?php
session_start();

// Create connection
$con = mysqli_connect("localhost","root","","PPA");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

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


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if choice and quantity are set in POST data
    if (isset($_POST['choice']) && isset($_POST['quantity'])) {
        // Retrieve choice and quantity from POST data
        $choice = $_POST['choice'];
        $quantity = $_POST['quantity'];

        // Prepare SQL statement to insert the choice and quantity into database
        $sql = "INSERT INTO `userselect` (`id`, `num`, `quantity`) VALUES (NULL, '$choice', '$quantity')";

        // Execute SQL statement
        if ($con->query($sql) === TRUE) {
            echo "<script>document.getElementById('successMessage').innerHTML = 'Choice saved successfully.';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}

// Close database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customaition Page</title>
    <link rel="stylesheet" href="./Home Page CSS.css">
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2 {
            padding-top: 20px;
            text-align: center;
            font-weight: bold;
            font-family: 'Apple Chancery, cursive';
        }
        h4 {
            padding-left: 20px;
            padding-bottom: 20px;
            font-weight: bold;
        }
        .col-sm-2 {
            text-align: center;
            align-items: center;
        }
        .row button {
            height: 100px;
            width: 100px;
            border: transparent;
            border-radius: 50%;
        }

        .row button img {
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }
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
            margin-top: -20px;
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
        p{
            font-weight: bold;
        }
        a{
            text-decoration: none;
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
            <a href="Home Page.php">Home</a>
        </li>
        <li>
            <a href="#category">Categories</a>
        </li>
        <li>
            <a href="customaition.php" class="active">Lunch</a>
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
        <!--cart display----->
        <a href="./cart.php" class="cart">
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
    <h2>Customization Lunch</h2>
    <form method="post" action="customaition.php">
        <div>
            <h4>Your Chooise?</h4>
            <div class="row">
            <div class="col-sm-2">
                <button name="choice" value="1" type="submit"><img src="./image/whiterice.jpg"></button>
                <input type="hidden" name="quantity" value="1">
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <button name="choice" value="2" type="submit"><img src="./image/redrice.jpg"></button>
                <input type="hidden" name="quantity" value="1">
            </div>  
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <button name="choice" value="3" type="submit"><img src="./image/friedrice.jpg"></button>
                <input type="hidden" name="quantity" value="1">
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <button name="choice" value="4" type="submit"><img src="./image/noodle.jpg"></button>
                <input type="hidden" name="quantity" value="1">      
            </div>
                
                
            <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-2"><p>White Rice</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Red Rice</p></div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Fried Rice</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Noodle</p></div>       
                <div class="col-sm-1"></div>
            </div>
            <h4>Curries</h4>
            <div class="row">
                <div class="col-sm-2"><button name="choice" value="5" type="submit"><img src="./image/chicken.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="6" type="submit"><img src="./image/parippu.jpg"></button></div>  
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="7" type="submit"><img src="./image/polsambol.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="8" type="submit"><img src="./image/beetroot.jpg"></button></div>  
                <input type="hidden" name="quantity" value="1">      
                <div class="col-sm-1"></div>   
            </div>
            <div class="row">
                <div class="col-sm-2"><p>Chicken Curry</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>parippu Curry</p></div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Pol Sambola</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Beetroot Curry</p></div>       
                <div class="col-sm-1"></div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-sm-2"><button name="choice" value="9" type="submit"><img src="./image/kathurumurunga.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="10" type="submit"><img src="./image/ambulthiyal.jpg"></button></div> 
                <input type="hidden" name="quantity" value="1">  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="11" type="submit"><img src="./image/blackpork.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="12" type="submit"><img src="./image/cabbagecurry.jpg"></button></div>   
                <input type="hidden" name="quantity" value="1">     
                <div class="col-sm-1"></div>   
            </div>
            <div class="row">
                <div class="col-sm-2"><p>Kathurumurunga</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Malu Ambulthiyal</p></div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Black Pork Curry</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Cabbage Curry</p></div>       
                <div class="col-sm-1"></div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-sm-2"><button name="choice" value="13" type="submit"><img src="./image/egg.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="14" type="submit"><img src="./image/kajumaluwa.jpg"></button></div>  
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="15" type="submit"><img src="./image/okra.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button name="choice" value="16" type="submit"><img src="./image/prawn.jpg"></button></div>  
                <input type="hidden" name="quantity" value="1">      
                <div class="col-sm-1"></div>   
            </div>
            <div class="row">
                <div class="col-sm-2"><p>Egg</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Kajumalluma</p></div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Okra Curry</p></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><p>Prawn Curry</p></div>       
                <div class="col-sm-1"></div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-sm-2"><button name="choice" value="17" type="submit"><img src="./image/sausage.jpg"></button></div>
                <input type="hidden" name="quantity" value="1"> 
                <div class="col-sm-1"></div>
                <!-- <div class="col-sm-2"><button><img src="./kajumaluwa.jpeg"></button></div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button><img src="./okra.jpg"></button></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2"><button><img src="./prawn.jpg"></button></div>       
                <div class="col-sm-1"></div>    -->
            </div>
            <div class="row">
                <div class="col-sm-2">Sausage</div>
                <div class="col-sm-1"></div>
                <!-- <div class="col-sm-2">Kajumalluma</div>  
                <div class="col-sm-1"></div>
                <div class="col-sm-2">Okra Curry</div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">Prawn Curry</div>       
                <div class="col-sm-1"></div> -->
            </div>
        </div>
    </form>
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>