<?php
include('config.php'); 
$price_per_cylinder = 950;

if(isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    
    
    $query = "SELECT * FROM customers WHERE id = '$customer_id'";
    $result = mysqli_query($conn, $query);
    $customer_data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="mr">
<head>
    <meta charset="UTF-8">
    <title>Place New Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Place New Booking</h4>
        </div>
        <div class="card-body">

            
            <h5>Customer Details</h5>
            <p><strong>Name:</strong> <?php echo $customer_data['name']; ?></p>
            <p><strong>Phone:</strong> <?php echo $customer_data['phone']; ?></p>
            <p><strong>Gas ID:</strong> <?php echo $customer_data['gas_id']; ?></p>
            <hr>

            
            <form method="POST" action="process_booking.php">
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">

                
                <div class="mb-3">
                    <label class="form-label">Cylinders Required</label>
                    <input type="number" id="cylinders" name="cylinders" class="form-control" min="1" max="10" value="1" required>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Total Amount (₹<span id="price_per_cylinder"><?php echo $price_per_cylinder; ?></span> per cylinder)</label>
                    <input type="text" id="total_amount" name="amount" class="form-control" value="<?php echo $price_per_cylinder; ?>" readonly>
                </div>

                <button type="submit" name="place_order" class="btn btn-success">Place Order</button>
                <a href="view_customer.php" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>

<script>
const cylinderInput = document.getElementById('cylinders');
const amountInput = document.getElementById('total_amount');
const price = <?php echo $price_per_cylinder; ?>;


cylinderInput.addEventListener('input', function() {
    const quantity = parseInt(this.value) || 1;
    const total = quantity * price;
    amountInput.value = total;
});
</script>

</body>
</html>