<?php
session_start();
include 'config.php';
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $address = $conn->real_escape_string($_POST['address']);
    $phone = $conn->real_escape_string($_POST['phone']);

    if ($name && $address && $phone) {
        $sql = "INSERT INTO customers (name, address, phone) VALUES ('$name', '$address', '$phone')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Customer added successfully.";
            header("Location: view_customer.php");
            exit;
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Customer - Bharat Gas</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
   
    <div class="container">
        <div class="form-container">
            <h1>Add New Customer</h1>
            
            <?php if ($message): ?>
                <div class="error-msg"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <form method="post" action="">
                <label>👤 Customer Name:</label>
                <input type="text" name="name" placeholder="Enter customer name" required />
                
                <label>📍 Address:</label>
                <input type="text" name="address" placeholder="Enter complete address" required />
                
                <label>📞 Phone Number:</label>
                <input type="text" name="phone" placeholder="Enter phone number" required />
                
                <input type="submit" value="✅ Add Customer" />
            </form>

            <a href="dashboard.php" class="btn-back">← Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
