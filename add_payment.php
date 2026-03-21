<?php
include 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: index.php"); exit(); }

if(isset($_POST['add_payment'])) {
    $order_id = $_POST['order_id'];
    $amount = $_POST['amount'];
    $method = $_POST['payment_method'];
    
    $stmt = $conn->prepare("INSERT INTO payments (order_id, amount, payment_method) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $order_id, $amount, $method);
    $stmt->execute();
    
    $stmt2 = $conn->prepare("UPDATE orders SET status = 'delivered' WHERE id = ?");
    $stmt2->bind_param("i", $order_id);
    $stmt2->execute();
    
    $success = "Payment Recorded Successfully!";
}

$orders = mysqli_query($conn, "SELECT * FROM orders WHERE status = 'pending'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Record Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Record Payment</h2>
        <a href="view_customer.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
        
        <div class="card">
            <div class="card-body">
                <h5>Pending Orders</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Cylinders</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($order = mysqli_fetch_assoc($orders)): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['customer_id']; ?></td>
                            <td><?php echo $order['cylinder_count']; ?></td>
                            <td>₹<?php echo $order['total_amount']; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="showPaymentForm(<?php echo $order['id']; ?>, <?php echo $order['total_amount']; ?>)">Pay</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>