<!DOCTYPE html>
<html leng="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="Profile CSS.css">
    <script src="https://kit.fontawesome.com/cacf32ff12.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>
</head>
<body>



    <div class="container">
        <div class="leftbox">
            <nav>
                <a onclick="tabs(0)" class="tab active">
                    <i class="fas fa-user"></i>
                </a>
                <a onclick="tabs(1)" class="tab">
                    <i class="far fa-credit-card"></i>
                </a>
                <a onclick="tabs(2)" class="tab">
                    <i class="fas fa-tv"></i>
                </a>
                <a onclick="tabs(3)" class="tab">
                    <i class="fas fa-tasks"></i>
                </a>
                <a onclick="tabs(4)" class="tab">
                    <i class="fas fa-cog"></i>
                </a>
            </nav>
        </div>
        <div class="rightbox">
            <div class="profile tabShow">
                <h1>Personal Information</h1>
                <h2>Name</h2>
                <input type="text" class="input" value="Dheeraj Sharma">
                <h2>Gender</h2>
                <input type="text" class="input" value="August 26, 1990">
                <h2>Birthday</h2>
                <input type="text" class="input" value="Male">
                <h2>Email</h2>
                <input type="email" class="input" value="dheerajsharma@gmail.com">
                <h2>Password</h2>
                <input type="password" class="input" >
                <button class="btn">
                    update
                </button>
            </div>
            <div class="Payment tabShow">
                <h1>Shipment Information</h1>
                <h2>Billing Adress</h2>
                <input type="text" class="input" placeholder="402, Sector 19, Noida, Uttar Pradesh">
                <h2>Pincode</h2>
                <input type="text" class="input" placeholder="190125">
                <h2>Last Order Shipped On</h2>
                <input type="number" class="input" placeholder="January 10, 2022">
                <h2>Reedem Card</h2>
                <input type="text" class="input" placeholder="enter gift code" >
                <button class="btn">
                    update
                </button>
            </div>
            <div class="Subscription tabShow">
                <h1>Subscription Information</h1>
                <h2>Payment Date</h2>
               <p>December 10,2021 </p>
                <h2>Date of Next Payment</h2>
                <p>December 10, 2022</p>
                <h2>Plan</h2>
                <p>Yearly</p>
                <button class="btn">
                    update
                </button>
            </div>
            <div class="Privacy tabShow">
                <h1>Privacy Setting</h1>
                <h2>Manage Email Notification</h2>
               <p></p>
                <h2>Manage Privacy Settings</h2>
                <p></p>
                <h2>Terms Of Use</h2>
                <p></p>
                <button class="btn">
                    update
                </button>
            </div>
            <div class="settings tabShow">
                <h1>Account Setting</h1>
                <h2>Hold Subscription</h2>
                <p></p>
                <h2>Cancel Subscription</h2>
                <p></p>
                <h2>Your Devices</h2>
                <p></p>
                <h2>Referrals</h2>
                <p></p>
                <button class="btn">
                    update
                </button>
            </div>

        </div>
    </div>

    <script src="Profile JS.js"></script>

</body>
</html>
