<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
	<link rel="stylesheet" href="admin.css">

	<title>XinHome | Admin</title>
</head>
<body>

	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxl-baidu'></i>			
			<span class="text">XinHome | Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="admin.php">
				<i class='bx bxs-dog'></i>					
				<span class="text">Dashboard</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="admin_logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<?php
		session_start();

		if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
			header("Location: admin_login.php"); 
			exit;
		}

		$admin_username = $_SESSION['admin_username']; 
	?>

	<section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
			<div class="admin-info">
                <span><?php echo $admin_username; ?></span> 
            </div>
		</nav>

		<main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li><a class="active" href="#">Home</a></li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="boarding">
                <div class="head">
                    <h3>Cat Boarding Bookings</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Check-In Date</th>
                            <th>Check-In Time</th>
                            <th>Check-Out Date</th>
                            <th>Check-Out Time</th>
                            <th>Pet Name</th>
                            <th>Pet Sex</th>
                            <th>Breed</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = new mysqli('localhost', 'root', '', 'petshop');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT firstname, lastname, phone, email, address, check_in_date, check_in_time, check_out_date, check_out_time, cat_name, cat_sex, cat_breed, cat_age FROM cat_booking";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['firstname']} {$row['lastname']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['check_in_date']}</td>
                                        <td>{$row['check_in_time']}</td>
                                        <td>{$row['check_out_date']}</td>
                                        <td>{$row['check_out_time']}</td>
                                        <td>{$row['cat_name']}</td>
                                        <td>{$row['cat_sex']}</td>
                                        <td>{$row['cat_breed']}</td>
                                        <td>{$row['cat_age']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No bookings found</td></tr>";
                        }
                        ?>
                    </tbody>     
                </table>
            </div>

            <div class="boarding">
                <div class="head">
                    <h3>Dog Boarding Bookings</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Check-In Date</th>
                            <th>Check-In Time</th>
                            <th>Check-Out Date</th>
                            <th>Check-Out Time</th>
                            <th>Pet Name</th>
                            <th>Pet Sex</th>
                            <th>Breed</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT firstname, lastname, phone, email, address, check_in_date, check_in_time, check_out_date, check_out_time, dog_name, dog_sex, dog_breed, dog_age FROM dog_booking";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['firstname']} {$row['lastname']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['check_in_date']}</td>
                                        <td>{$row['check_in_time']}</td>
                                        <td>{$row['check_out_date']}</td>
                                        <td>{$row['check_out_time']}</td>
                                        <td>{$row['dog_name']}</td>
                                        <td>{$row['dog_sex']}</td>
                                        <td>{$row['dog_breed']}</td>
                                        <td>{$row['dog_age']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No bookings found</td></tr>";
                        }
                        ?>
                    </tbody>     
                </table>
            </div>

            <div class="boarding">
                <div class="head">
                    <h3>Hamster Boarding Bookings</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Check-In Date</th>
                            <th>Check-In Time</th>
                            <th>Check-Out Date</th>
                            <th>Check-Out Time</th>
                            <th>Pet Name</th>
                            <th>Pet Sex</th>
                            <th>Breed</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT firstname, lastname, phone, email, address, check_in_date, check_in_time, check_out_date, check_out_time, hamster_name, hamster_sex, hamster_breed, hamster_age FROM hamster_booking";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['firstname']} {$row['lastname']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['check_in_date']}</td>
                                        <td>{$row['check_in_time']}</td>
                                        <td>{$row['check_out_date']}</td>
                                        <td>{$row['check_out_time']}</td>
                                        <td>{$row['hamster_name']}</td>
                                        <td>{$row['hamster_sex']}</td>
                                        <td>{$row['hamster_breed']}</td>
                                        <td>{$row['hamster_age']}</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No bookings found</td></tr>";
                        }

                        $conn->close();
                        ?>
                        
                    </tbody>     
                </table>
            </div>
			
			 

                        
                    </tbody>     
                </table>
            </div>

        </div>
    </main>
</section>

<script src="admin.js"></script>
</body>
</html>
