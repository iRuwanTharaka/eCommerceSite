<?php
include 'db_config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $rating = $_POST["rating1"]; // Corrected the input name
    
    // Insert feedback into database (consider using prepared statements to prevent SQL injection)
    $sql = "INSERT INTO feedback (rating) VALUES ('$rating')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: Feedback Form Confirm HTML and CSS.php"); // Corrected the file name
        exit(); // Added exit after header redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>

<html>

    <head>

        <title>
            
            Feedback
        
        </title>

        <link rel="stylesheet" type="text/css" href="Feedback Form CSS.css">

        <link rel="stylesheet" href="">

        <script src="https://kit.fontawesome.com/9088cc6401.js" crossorigin="anonymous"></script>
        
        <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    </head>

    <body>

    <div class="rating-css">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div style = "font-family: 'Poppins', sans-serif;">
            
            Feedback
            
            <br>
            
            Form
        
        </div>

        <div class="star-icon">

            <input type="radio" name="rating1" id="rating1" value="1">

            <label for="rating1" class="fa fa-star"></label>
            

            <input type="radio" name="rating1" id="rating2" value="2">

            <label for="rating2" class="fa fa-star"></label>
            

            <input type="radio" name="rating1" id="rating3" value="3">

            <label for="rating3" class="fa fa-star"></label>
            

            <input type="radio" name="rating1" id="rating4" value="4">

            <label for="rating4" class="fa fa-star"></label>
            

            <input type="radio" name="rating1" id="rating5" value="5">

            <label for="rating5" class="fa fa-star"></label>
            

            <button type="submit" class="btn">Submit</button>
            
        </div>
    </form>
    </div>

    </body>
    
</html>
