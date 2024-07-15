<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "ppa");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: Login And Registration HTML.php"); // Change this to your login page URL
    exit();
}

// Retrieve logged-in user's information from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM `user` WHERE username = '$username'";
$result = mysqli_query($con, $sql);

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result); // Fetching the row here
} else {
    echo "User not found!";
    mysqli_close($con);
    exit; // Exiting the script as user not found
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Home Page CSS.css">
    <link rel="icon" href="../Image/Logo.png" type="Image/X-icon">
    <title>User Profile</title>
    <link rel="stylesheet" href="./CSS/UserStyle.css">
    <link rel="stylesheet" href="./Home Page CSS.css">
    <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
    
    <style>
        .rounded-circle {
            border-radius: 100% ;
        }
        .card-profile-image {
            position: relative;
        }
        
        .card-profile-image img {
            position: absolute;
            left: 50%;
            max-width: 180px;
            transition: all .15s ease;
            transform: translate(-50%, -30%);
            border-radius: 50%;
        }
        
        .card-profile-image img:hover {
            transform: translate(-50%, -33%);
        }
        .btn-secondary:hover {
            background-color: aquamarine;
            transition: 0.5s;
        }
    </style>
</head>
<body>
    <!--==Navigation================================-->
    <nav class="navigation">
    <!--logo-------->
    <a href="#" class="logo">
        <div><img src="logo/id logo.png" width="40%"></div>
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
            <a href="User.php" class="active">Login</a>
        </li>
        </ul>
    <!--right-nav-(cart-like)-->
    <div class="right-nav">
        <!--cart----->
        
    </div>
    </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./Image/Wel.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello <?php echo $row['first_name']; ?></h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                        <a href="#!" class="btn btn-info">Home</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                    <label for="input-file">
                                        <img src="./uploads/<?php echo $row['profile_photo']; ?>" id="profile-pic" class="rounded-circle">
                                    </label>
                            </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="./Login And Registration HTML.php" class="btn btn-sm btn-default float-right">Login Out</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading">3</span>
                                            <span class="description">Orders</span>
                                        </div>
                                        <div>
                                            <span class="heading">2500</span>
                                            <span class="description">Poins</span>
                                        </div>
                                        <div>
                                            <span class="heading"><?php echo $row['id']; ?></span>
                                            <span class="description">User ID</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i><?php echo $row['province']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="profile.php">
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Username</label>
                                                <input type="text" id="input-username" name="username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="Email Address" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">First name</label>
                                                <input type="text" id="input-first-name" name="first_name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $row['first_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Last name</label>
                                                <input type="text" id="input-last-name" name="last_name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $row['last_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input id="input-address" name="address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $row['address']; ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">Contact Number</label>
                                                <input type="text" id="input-city" name="contact_number" class="form-control form-control-alternative" placeholder="Contact Number" value="<?php echo $row['contact_number']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Province</label>
                                                <input type="text" id="input-country" name="province" class="form-control form-control-alternative" placeholder="Province" value="<?php echo $row['province']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal code</label>
                                                <input type="number" id="input-postal-code" name="postal_code" class="form-control form-control-alternative" placeholder="Postal Code" value="<?php echo $row['postal_code']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                    <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" name="profile_photo" style="display: none;">
                                    <input type="hidden" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        <button type="submit" class="btn btn-danger" name="reset">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <div class="buttons">
                                    <form method="post" action="User_generate_pdf.php">
                                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                                        <input type="submit" name="generate_pdf" value="Generate PDF Report" class="btn btn-secondary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("input-file");

        inputFile.onchange = function(){
            profilePic.src = URL.createObjectURL(inputFile.files[0]);
        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>