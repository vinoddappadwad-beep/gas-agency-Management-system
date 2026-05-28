<?php
session_start();
include 'config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

$message = '';
$customers = $conn->query("SELECT id, name FROM customers ORDER BY name");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = intval($_POST['customer_id']);
    $amount = floatval($_POST['amount']);
    $payment_date = $_POST['payment_date'];

    if ($customer_id && $amount > 0 && $payment_date) {
        $sql = "INSERT INTO payments (customer_id, amount, payment_date) VALUES ($customer_id, $amount, '$payment_date')";
        if ($conn->query($sql) === TRUE) {
            // SUCCESS: Auto redirect to view_customer.php with success message
            $_SESSION['success_message'] = "Payment of ₹" . number_format($amount, 2) . " added successfully.";
            header("Location: view_customer.php");
            exit;
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Please fill all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment - GAS_AGENCY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Add Payment</h1>
    
    <?php if ($message): ?>
        <div class="error-msg"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <form method="post" action="">
        <label for="customer_id">Select Customer:</label>
        <select id="customer_id" name="customer_id" required>
            <option value="">Choose Customer...</option>
            <?php while ($row = $customers->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
            <?php endwhile; ?>
        </select>
        
        <label for="amount">Amount (₹):</label>
        <input type="number" id="amount" name="amount" required step="0.01" min="0" placeholder="0.00" />
        
        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required />
        
        <input type="submit" value="Add Payment" />
    </form>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>
