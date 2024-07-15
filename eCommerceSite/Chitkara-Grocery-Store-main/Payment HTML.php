<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>

        Complete Your Purchase

    </title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Payment CSS.css">
    
    <link rel="shortcut icon" type="image/jpg" href="C:\Users\hp\Desktop\College\First Semester\Introduction To Web Technologies\Notepad ++ Files\Project\favicon.ico"/>

    <style>
        /* Styles for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #000000;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
    </style>

</head>

<body>

<div class="container">

    <div class="card-container">

        <div class="front">

            <div class="image">

                <img src="https://i.imgur.com/iPjGMpM.png" alt = "chip">

                <img src="https://i.imgur.com/HDMROff.png" alt = 'visa'>

            </div>

            <div class="card-number-box">
                
                ################
            
            </div>

            <div class="flexbox">

                <div class="box">

                    <div class="card-holder-name">
                        
                        Name of card holder
                
                    </div>

                </div>

                <div class="box">

                    <span>
                        
                        expiry
                    
                    </span>

                    <div class="expiration">

                        <span class="exp-month">
                            
                            mm / 
                        
                        </span>

                        <span class="exp-year">
                            
                            yyyy
                        
                        </span>

                    </div>

                </div>

            </div>

        </div>
        

        <div class="back">

            <div class="stripe"> </div>

            <div class="box">

                <span>
                    
                    cvv
                
                </span>

                <div class="cvv-box"> </div>

                <img src="https://i.imgur.com/HDMROff.png" alt = "Visa">

            </div>

        </div>

    </div>

    <form action="">

        <div class="inputBox">

            <span>
                
                card number
            
            </span>

            <input type="text" maxlength="16" class="card-number-input" required>

        </div>

        <div class="inputBox">

            <span>
                
                name on card
            
            </span>

            <input type="text" class="card-holder-input" required>

        </div>

        <div class="flexbox">

            <div class="inputBox">

                <span>
                    
                    expiry mm
                
                </span>

                <select name="" id="" class="month-input" required>

                    <option value="month" selected disabled>
                        
                        month
                    
                    </option>

                    <option value="01">
                        
                        01
                    
                    </option>

                    <option value="02">
                        
                        02
                    
                    </option>

                    <option value="03">
                        
                        03
                    
                    </option>

                    <option value="04">
                        
                        04
                    
                    </option>

                    <option value="05">
                        
                        05
                    
                    </option>

                    <option value="06">
                        
                        06
                    
                    </option>

                    <option value="07">
                        
                        07
                    
                    </option>

                    <option value="08">
                        
                        08
                    
                    </option>

                    <option value="09">
                        
                        09
                    
                    </option>

                    <option value="10">
                        
                        10
                    
                    </option>

                    <option value="11">
                        
                        11
                    
                    </option>

                    <option value="12">
                        
                        12
                    
                    </option>

                </select>

            </div>

            <div class="inputBox">

                <span>
                    
                    expiry yy
                
                </span>

                <select name="" id="" class="year-input" required>

                    <option value="year" selected disabled>
                        
                        year
                    
                    </option>

                    <option value="2022">
                        
                        2022
                    
                    </option>

                    <option value="2023">
                        
                        2023
                    
                    </option>

                    <option value="2024">
                        
                        2024
                    
                    </option>
                    
                    <option value="2025">
                        
                        2025
                    
                    </option>
                    
                    <option value="2026">
                        
                        2026
                    
                    </option>
                    
                    <option value="2027">
                        
                        2027
                    
                    </option>
                    
                    <option value="2028">
                        
                        2028
                    
                    </option>
                    
                    <option value="2029">
                        
                        2029
                    
                    </option>
                    
                    <option value="2030">
                        
                        2030
                    
                    </option>
                    
                    <option value="2031">
                        
                        2031
                    
                    </option>

                </select>

            </div>

            <div class="inputBox">

                <span>
                    
                    cvv
                
                </span>

                <input type="text" maxlength="4" class="cvv-input" required>

            </div>

        </div>

        <button type="button" id="popupButton" class="submit-btn">
                
                Submit
        
        </button>
        
    </form>
    <div id="popup" class="popup">
        <p>This is a popup message!</p>
        <button onclick="closePopup()">Close</button>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Function to show the Swal notification
    function showPopup() {
        if (validateForm()) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "payment is Successfully done!!",
                showConfirmButton: false,
                timer: 1500
            });
        }
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }

    // Function to validate form
    function validateForm() {
        var cardNumber = document.querySelector('.card-number-input').value;
        var cardHolder = document.querySelector('.card-holder-input').value;
        var month = document.querySelector('.month-input').value;
        var year = document.querySelector('.year-input').value;
        var cvv = document.querySelector('.cvv-input').value;

        if (cardNumber === "" || cardHolder === "" || month === "month" || year === "year" || cvv === "") {
            alert("Please fill in all fields.");
            return false;
        }
        return true;
    }

    // Event listener for the button click
    document.getElementById("popupButton").addEventListener("click", showPopup);
</script>
<script src = 'Payment JS.js'> </script>

</body>
</html>

