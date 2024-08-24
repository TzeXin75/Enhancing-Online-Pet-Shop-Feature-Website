<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $conn = new mysqli('localhost', 'root', '', 'petshop');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO user (username, email, address, phoneNumber, password) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $username, $email, $address, $phoneNumber, $password);

    if ($stmt->execute()) {
        header("Location: login.html?success=Registration successful. Please login.");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
