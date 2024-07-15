<?php
session_start(); // Start the session

// Include the database configuration file
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists with provided username and password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if ($result) {
        // Check if any row is returned
        if (mysqli_num_rows($result) > 0) {
            // User exists, set session variables
            $_SESSION['username'] = $username;
            // Redirect to home page or profile page
            header("Location: Home Page.php"); // Change this according to your home page or profile page URL
            exit();
        } else {
            // User not found, display error message and redirect to login page
            echo '<script>alert("User not found. Please check your credentials."); window.location.href = "Login And Registration HTML.php";</script>';
            exit();
        }
    } else {
        // Error in query execution
        echo "Error: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>

<!--This is a login page made up with HTML,CSS and javascript-->

<html>

    <head>

        <title>
            
            Login In/Sign Up
        
        </title>

        <link type="text/css" rel="stylesheet" href="Login And Registration CSS.css">

        <script src="https://kit.fontawesome.com/5471644867.js" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    </head>

    <body>

        <section class="imp">

            <section>

            <div class="login show" id="one">

                <div class="textbox slide-left2">

                <div class="head">

                    <h1>
                        
                        Sign In to ID Trade Centre
                    
                    </h1>

                    <ul>

                        <li>
                            
                            <i class="fab fa-facebook-f" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-google-plus-g" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-linkedin-in" style = "cursor: pointer;"></i>
                        
                        </li>

                    </ul>

                    <h3 style = "cursor: pointer;">
                        
                        or use your E-mail ID
                    
                    </h3>

                </div>

                    <form action="./Login And Registration HTML.php" method="post">

                        <input type="text" name="username" id="username" placeholder="User Name" required>
                        <input type="password" name="password" id="password" placeholder="PASSWORD" required>

                        <button id="b">
                            
                            <a href="#" style = "cursor: pointer;">
                                
                                Forgot password?
                            
                            </a>
                        
                        </button>

                        <button type="submit" class = 'sign_in_btn' value="Login">
                                SIGN IN
                        </button>

                    </form>

                </div>

            </div>

            <div class="sec show" id="two">

                <div class="textbox slide-left">

                <h1>
                    
                    Not a member?
                
                </h1>

                <p>
                    
                    Sign up and start shopping.
                
                </p>

                <button id="b1" style = "cursor: pointer;" class = 'prompt_sign_up'>
                    
                    SIGN UP
                
                </button>

                </div>

            </div>

        </section>
        
        <section>

            <div class="sec hide" id="three">

                <div class="textbox slide-left">

                    <h1>
                        
                        Already a member?
                    
                    </h1>

                <p>
                    
                    Login to keep shopping.
                
                </p>

                <button id="b2" style = "cursor: pointer;" class = 'prompt_sign_in'>
                    
                    SIGN IN
                
                </button>

                </div>

            </div>

            <div class="login hide" id="four">

                <div class="textbox slide-right">

                <div class="head">

                    <h1>
                        
                        Create Account 
                    
                    </h1>

                    <ul>

                        <li>
                            
                            <i class="fab fa-facebook-f" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-google-plus-g" style = "cursor: pointer;"></i>
                        
                        </li>

                        <li>
                            
                            <i class="fab fa-linkedin-in" style = "cursor: pointer;"></i>
                        
                        </li>

                    </ul>

                    <h3 style = "cursor: pointer;">
                        
                        or use your E-mail ID
                    
                    </h3>

                    </div>

                    <form action="./register.php" method="post">

                        <input type="text" name="username" id="username"  placeholder="NAME" required>
                        
                        <br>

                        <input type="text" name="email" id="email"  placeholder="EMAIL" required>
                        
                        <br>

                        <input type="password" name="password" id="password"  placeholder="PASSWORD" required>

                        <br>

                        <input type="text" name="contact_number" id="contact_number"  placeholder="PHONE NO. (optional)">

                        <br>

                        <button type="submit" style = "cursor: pointer;" class = 'sign_up_btn'>
                            SIGN UP          
                        </button>

                    </form>

                </div>

            </div>

        </section>

        </section>

        
    <script src="Login And Registration JS.js"></script>

    </body>

</html>
