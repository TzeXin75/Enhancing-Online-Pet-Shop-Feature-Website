<?php
session_start();

$default_username = "lim";
$default_password = "lim"; 

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php"); 
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if ($username === $default_username && $password === $default_password) {
        
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;

        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XinHome | Admin Login</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section id="header">
        <a href="#"><img src="img/logo2.png" class="logo" alt=""></a>
        

        <div>
            <ul id="navbar">  
                <li><a href="#">Admin</a></li>
            </ul>
        </div>
    </section>

    <section id="hero_background">
            <div class="form-box">
                <form method="POST" action="admin_login.php">
                    <div class="login-container" id="admin_login">
                        <div class="top">
                            <header>Admin Login</header>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name="username" placeholder="Username" required>
                            <i class="bx bx-user"></i>
                        </div>
                        <BR>
                        <div class="input-box">
                            <input type="password" class="input-field" name="password" placeholder="Password" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <BR>
                        <div class="input-box">
                            <input type="submit" class="submit" name="login" value="Sign In">
                        </div>
                    </div>
                </form>
    </section>
</body>
</html>
