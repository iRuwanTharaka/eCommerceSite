<?php

$con = mysqli_connect("localhost","root","","PPA");


// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to handle profile photo upload
function uploadProfilePhoto($file) {
    $image = "Image/" . basename($file["name"]);
    $target_file = $image;

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($file_extension, $allowed_extensions)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Function to update user details
function updateUserDetails($con, $username, $email, $first_name, $last_name, $address, $contact_number, $province, $postal_code, $profile_photo) {
    $sql = "UPDATE `user` SET email='$email', first_name='$first_name', last_name='$last_name', address='$address', contact_number='$contact_number', province='$province', postal_code='$postal_code', profile_photo='$profile_photo' WHERE username='$username'";
    if (mysqli_query($con, $sql)) {
        header("Location: user.php");
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Function to reset user details
function resetUserDetails($con, $username) {
    $sql = "UPDATE `user` SET email='', first_name='', last_name='', address='', contact_number='', province='', postal_code='', profile_photo='' WHERE username='$username'";
    if (mysqli_query($con, $sql)) {
        header("Location: user.php");
    } else {
        echo "Error resetting record: " . mysqli_error($con);
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle profile photo upload
    if (isset($_FILES["fileToUpload"])) {
        $uploaded_file = uploadProfilePhoto($_FILES["fileToUpload"]);
        // Update user's profile photo in the database
        updateUserDetails($con, $_POST['username'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['contact_number'], $_POST['province'], $_POST['postal_code'], $uploaded_file);
    }

    // Handle user details update
    if (isset($_POST['update'])) {
        
        updateUserDetails($con, $_POST['username'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['address'], $_POST['contact_number'], $_POST['province'], $_POST['postal_code'], $_POST['profile_photo']);
    }

    // Handle user details reset
    if (isset($_POST['reset'])) {
        resetUserDetails($con, $_POST['username']);
    }
}

// Close MySQL connection
mysqli_close($con);
?>
