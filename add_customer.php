<?php
include 'config.php';
if(!isset($_SESSION['user_id'])) { header("Location: index.php"); exit(); }

if(isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gas_id = $_POST['gas_id'];
    
    $stmt = $conn->prepare("INSERT INTO customers (name, phone, address, gas_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $address, $gas_id);
    $stmt->execute();
    $success = "Customer Added Successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Add New Customer</h2>
        <a href="view_customer.php" class="btn btn-secondary mb-3">Back to Dashboard</a>
        
        <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
        
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Gas Connection ID</label>
                        <input type="text" name="gas_id" class="form-control" required>
                    </div>
                    <button type="submit" name="add_customer" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>