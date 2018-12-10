<?php include "data/functions.php"; ?>
<?php include "data/config.php"; ?>
<?php if (!$getContents) { echo ""; } ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_hotel.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet"> 

    <title>Hotel reservation form</title>

</head>
<body>

    <?php

        $days;
        $firstName;
        $surName;
        $hotelSelect;

        $hotelPrice;
        $totalPrice;
        $hotelName;

        $hotels = [

            "Hotel Kaak" => 20,
            "Epsilon Hotel" => 600,
            "Hotel California" => 250,
            "El Cheapo Hotel" => 10,
            "Hotel Grande" => 160,
            "Chingy Hotel" => 90

        ];

        if (isset($_POST['submit'])) {

            if ($_POST['firstName'] && $_POST['surName'] && $_POST['hotel-select'] && $_POST['days'] != null) {

                $days = $_POST['days'];
                $firstName = $_POST['firstName'];
                $surName = $_POST['surName'];
                $hotelSelect = $_POST['hotel-select'];

                foreach ($hotels as $hotel => $price) {

                    if ($hotelSelect == $price) {
                        
                        $hotelName = $hotel;
                        $hotelPrice = $price;

                        $totalPrice = total($hotelPrice, $days);
                        check_duplicate_record($firstName, $surName, $hotelName, $days, $totalPrice);

                    }

                }
            
            }

        }
    
    ?>

    <!-- Main container -->
    <div class="container">
        <!-- Contents at the left. -->
        <div class="container-left">
            <!-- Heading of the form. -->
            <h1 class="container-heading">Hotel Reservations</h1>

            <form action="" method="post" onsubmit="return validateName();">
                
                <!-- Name input -->
                <div class="first-name-container">
                    <h3 class="first-name-heading">First name</h3>
                    <input type="text" name="firstName" id="first-name-input" placeholder="Type your name here..." required />
                </div>
                <!-- Surname input -->
                <div class="surname-container">
                    <h3 class="surname-heading">Surname</h3>
                    <input type="text" name="surName" id="surname-input" placeholder="Type your surname here..." required />
                </div>
                <!-- Choose which hotel you want. -->
                <div class="container-hotel-dropdown">
                    <h3 class="hotel-dropdown-heading">Select your hotel</h3>
                    <select name="hotel-select" id="hotel-select">
                        <option value="20">Hotel Kaak</option>
                        <option value="600" selected>Epsilon Hotel</option>
                        <option value="250">Hotel California</option>
                        <option value="10">El Cheapo Hotel</option>
                        <option value="160">Hotel Grande</option>
                        <option value="90">Chingy Hotel</option>
                    </select>
                </div>
                <!-- Choose how many days. -->
                <div class="container-days">
                    <h3 class="days-heading">Number of days</h3>
                    <input type="number" name="days" id="days-id" placeholder="How many days..." />
                </div>
                <!-- Submit button -->
                <div class="container-submit-button">
                    <button type="submit" name="submit" value="" class="submit-button" onclick="getHotel(); getDays(); return validateName();">Submit</button>
                </div>

            </form>

        </div>
        <!-- Contents at the right. -->
        <div class="container-right">
            <div class="container-output">
                <p>Number of days : <span id="output-num-of-days">None</span></p>
                <p>Daily rate : <span id="output-daily-rate">None</span></p>
                <p>Total : <span id="output-total">None</span></p>
            </div>
        </div>
        
    </div>

    <script src="js/script_hotel.js"></script>
    
</body>
</html>