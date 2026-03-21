<?php
include('config.php');

if(isset($_POST['place_order'])) {
    $customer_id = $_POST['customer_id'];
    $cylinders = $_POST['cylinders'];
    $amount = $_POST['amount'];
    $booking_date = date('Y-m-d H:i:s');
    $status = "Pending";

    $sql = "INSERT INTO bookings (customer_id, cylinders, amount, booking_date, status) 
            VALUES ('$customer_id', '$cylinders', '$amount', '$booking_date', '$status')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Booking Successful!'); window.location.href='view_customer.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>