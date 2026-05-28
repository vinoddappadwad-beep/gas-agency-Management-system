<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Dashboard - Bharat Gas</title>
<style>
    
    body, html {
        margin: 0; padding: 0; height: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                    url('https://images.unsplash.com/photo-1558618047-3c8c76ca7e87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
    }

    /* Navbar */
    nav {
        position: fixed;
        top: 0; left: 0; right: 0;
        height: 70px;
        background: linear-gradient(90deg, #003366, #0066cc);
        display: flex;
        align-items: center;
        padding: 0 30px;
        font-weight: 800;
        font-size: 26px;
        letter-spacing: 2px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        z-index: 1000;
    }

    /* Main container */
    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 70px);
        padding-top: 70px;
        gap: 60px;
    }

    /* Left navigation container */
    .nav-container {
        background: rgba(0, 51, 102, 0.9);
        border-radius: 20px;
        padding: 50px 40px;
        width: 380px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(10px);
    }

    .nav-container h1 {
        margin: 0 0 45px 0;
        font-weight: 800;
        font-size: 30px;
        color: #00d8ff;
        text-align: center;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }

    /* Navigation links */
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    ul li {
        background: linear-gradient(45deg, #007bff, #0056b3);
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,123,255,0.4);
    }
    ul li a {
        display: block;
        padding: 18px 25px;
        font-weight: 700;
        font-size: 16px;
        color: white;
        text-decoration: none;
        text-align: center;
        letter-spacing: 1px;
    }
    ul li:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,123,255,0.6);
    }

    /* Logout button */
    .logout {
        margin-top: 45px;
        display: block;
        background: linear-gradient(45deg, #dc3545, #c82333);
        color: white;
        padding: 16px 32px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 17px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(220,53,69,0.4);
    }
    .logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(220,53,69,0.6);
    }

    /* Right side - Calendar */
    .calendar-container {
        width: 420px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        backdrop-filter: blur(10px);
    }
    .calendar-container img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .main-container {
            flex-direction: column;
            height: auto;
            padding: 40px 20px 80px;
            gap: 40px;
        }
        .nav-container, .calendar-container {
            width: 100%;
            max-width: 400px;
        }
    }
</style>
</head>
<body>

<nav>
    <div class="nav-brand">Bharat Gas Agency IND</div>
    <div class="nav-auth">
        
        <a href="index.php" class="auth-btn">Login</a>
        <a href="register.php" class="auth-btn">Register</a>
    </div>
</nav>
<div class="main-container">
    <!-- Left Navigation -->
    <div class="nav-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <ul>
            <li><a href="add_customer.php">👥 Add Customer</a></li>
            <li><a href="add_booking.php">📅 Add Booking</a></li>
            <li><a href="add_payment.php">💰 Add Payment</a></li>
            <li><a href="view_customer.php">📋 View Customers</a></li>
        </ul>
        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>

    <!-- Right Calendar -->
    <div class="calendar-container">
        <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Calendar">
    </div>
</div>

</body>
</html>
