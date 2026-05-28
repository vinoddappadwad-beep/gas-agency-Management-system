<?php
session_start();
include 'config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

$message = '';
$customers = $conn->query("SELECT id, name FROM customers ORDER BY name");


$has_customers = $customers->num_rows > 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = intval($_POST['customer_id']);
    $booking_date = $_POST['booking_date'];

    if ($customer_id > 0 && $booking_date) {
        $sql = "INSERT INTO bookings (customer_id, booking_date) VALUES ($customer_id, '$booking_date')";
        if ($conn->query($sql) === TRUE) {
            
            $_SESSION['success_message'] = "Booking added successfully.";
            header("Location: view_customer.php");
            exit;
        } else {
            $message = "Database Error: " . $conn->error;
        }
    } else {
        $message = "Please select a customer and booking date.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking - GAS_AGENCY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Add New Booking</h1>
    
    <?php if ($message): ?>
        <div class="error-msg"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <?php if (!$has_customers): ?>
        <div class="warning-msg">
            <p>⚠️ No customers found! <a href="add_customer.php">Add customer first</a></p>
        </div>
    <?php else: ?>
        <form method="post" action="">
            <label for="customer_id">Select Customer:</label>
            <select id="customer_id" name="customer_id" required>
                <option value="">Choose Customer...</option>
                <?php 
                $customers->data_seek(0); 
                while ($row = $customers->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
            
            <label for="booking_date">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" required />
            
            <input type="submit" value="Add Booking" />
        </form>
    <?php endif; ?>
    
    <script></script><div style="text-align: center; margin-top: 20px;">
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        <a href="view_customer.php" class="back-btn">👥 View Customers</a>
    </div>
</div>
</body>
</html>
