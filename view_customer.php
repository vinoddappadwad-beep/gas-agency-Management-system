<?php
session_start();
include 'config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

// Get success message from session
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
unset($_SESSION['success_message']);

$result = $conn->query("SELECT * FROM customers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers - GAS_AGENCY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Customer List</h1>
    
    <?php if ($success_message): ?>
        <div class="success-msg">
            ✅ <?= htmlspecialchars($success_message) ?>
        </div>
    <?php endif; ?>
    
    <div style="margin-bottom: 20px;">
        <a href="add_customer.php" class="add-btn">➕ Add New Customer</a>
        <a href="add_booking.php" class="add-btn">📅 Add Booking</a>
        <a href="add_payment.php" class="add-btn">💰 Add Payment</a>
        <a href="dashboard.php" class="back-btn">← Dashboard</a>
    </div>
    
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><strong><?= $row['id'] ?></strong></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['address']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td>
                        <a href="add_booking.php?customer=<?= $row['id'] ?>" class="action-btn">Book</a>
                        <a href="add_payment.php?customer=<?= $row['id'] ?>" class="action-btn">Pay</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="no-data">
            <p>No customers found. <a href="add_customer.php">Add first customer</a></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
