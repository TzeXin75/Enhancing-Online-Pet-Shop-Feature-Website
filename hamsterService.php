<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XinHome | Pet Shop</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $check_in_date = trim($_POST['check_in_date']);
    $check_in_time = trim($_POST['check_in_time']);
    $check_out_date = trim($_POST['check_out_date']);
    $check_out_time = trim($_POST['check_out_time']);
    $hamster_name = trim($_POST['hamster_name']);
    $hamster_sex = trim($_POST['hamster_sex']);
    $hamster_breed = trim($_POST['hamster_breed']);
    $hamster_age = trim($_POST['hamster_age']);

    $conn = new mysqli('localhost', 'root', '', 'petshop');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO hamster_booking (firstname, lastname, phone, email, address, check_in_date, check_in_time, check_out_date, check_out_time, hamster_name, hamster_sex, hamster_breed, hamster_age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssss", $firstname, $lastname, $phone, $email, $address, $check_in_date, $check_in_time, $check_out_date, $check_out_time, $hamster_name, $hamster_sex, $hamster_breed, $hamster_age);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location.href='hamsterService.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

    <section id="header">
        <a href="#"><img src="img/logo2.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">  
                <li><a href="index.html">Home</a></li>
                <li><a href="pets.html">Pets</a></li>
                <li><a href="food&accessories.html">Food & Accessories</a></li>
                <li><a class="active" href="service.php">Service</a></li>
                <li id="lg-bag"><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                <li><a href="login.html"><i class="fa fa-user"></i></a></li>
                <a href="#" id="close"><i class="fa fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
            <i id="bar" class="fa fa-outdent"></i>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <br>
        <div>
            <ul id="sidebar">  
                <li><a href="service.php">Cat</a></li>
                <li><a href="dogService.php">Dog</a></li>
                <li><a class="active" href="hamsterService.php">Hamster</a></li>
            </ul>
        </div>
        <br>
        <div id="banner_service3" class="section-m1"></div>
    </section>

    <section id="boarding-form">
        <div class="boarding-box">
            <form method="POST" action="">
                <div class="booking-container" id="booking">
                    <div class="top">
                        <header>Hamster Boarding Booking Form</header>
                    </div>    
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="firstname" placeholder="Firstname" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="lastname" placeholder="Lastname" required>
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="phone" placeholder="Phone Number" required>
                            <i class="bx bx-phone"></i>
                        </div>
                        <div class="input-box">
                            <input type="email" class="input-field" name="email" placeholder="Email Address" required>
                            <i class='bx bx-envelope'></i>                    
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" name="address" placeholder="Address" required>
                        <i class="bx bx-map"></i>
                    </div>
                    <br>
                    <header>Booking Information</header>
                    <div class="datetime-forms">
                        <p>Check In Date & Time</p>
                        <div class="input-box">
                            <input type="date" class="input-field" name="check_in_date" required>
                        </div>
                        <div class="input-box">
                            <input type="time" class="input-field" name="check_in_time" required>
                        </div>
                    </div>
                    <br>
                    <div class="datetime-forms">
                        <p>Check Out Date & Time</p>
                        <div class="input-box">
                            <input type="date" class="input-field" name="check_out_date" required>
                        </div>
                        <div class="input-box">
                            <input type="time" class="input-field" name="check_out_time" required>
                        </div>
                    </div>
                    <br>
                    <header>Your Hamster's Details</header>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="hamster_name" placeholder="Name" required>
                            <i class='fa fa-paw'></i>                    
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="hamster_sex" placeholder="Sex" required>
                            <i class='fa fa-venus-mars'></i>                    
                        </div>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" class="input-field" name="hamster_breed" placeholder="Breed" required>
                            <i class='bx bxl-baidu'></i>                    
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="hamster_age" placeholder="Age" required>
                            <i class='bx bx-cake'></i>                    
                        </div>
                    </div>
                    <br>
                    <div class="input-box">
                        <input type="submit" class="submit" name="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img src="img/logo2.png" class="logo" alt="">
            <h4>Contact</h4>
            <p><strong>Address</strong></p>
            <p><strong>Phone</strong></p>
            <p><strong>Hours</strong></p>
        </div>

        <div class="col">
            <h4>Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" alt="">
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>
