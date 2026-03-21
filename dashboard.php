<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Agency - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { background-color: #343a40; min-height: 100vh; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: #fff; background-color: rgba(255,255,255,0.1); border-radius: 5px; }
        .card-stats { transition: 0.3s; }
        .card-stats:hover { transform: translateY(-3px); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar p-3">
            <h5 class="text-white text-center mb-4">Gas Agency</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="add_customer.php">Add Customer</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="view_customer.php">View Customers</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="add_booking.php">Add Booking</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="view_booking.php">View Bookings</a></li>
                <li class="nav-item mb-2"><a class="nav-link" href="add_payment.php">Payment Entry</a></li>
                <li class="nav-item mb-5"><a class="nav-link" href="create_password.php">System Settings</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="text-muted fs-5">Welcome, Bharat Gas</span> </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card card-stats bg-info text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Total Customers</h5>
                            <p class="card-text fs-2 fw-bold">150</p> <a href="view_customer.php" class="btn btn-light btn-sm">View List</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats bg-warning text-dark h-100">
                        <div class="card-body">
                            <h5 class="card-title">Pending Bookings</h5>
                            <p class="card-text fs-2 fw-bold">25</p> <a href="view_booking.php?status=Pending" class="btn btn-light btn-sm">Manage</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats bg-success text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Delivered (Today)</h5>
                            <p class="card-text fs-2 fw-bold">60</p> <a href="view_booking.php?status=Delivered" class="btn btn-light btn-sm">History</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title text-primary">System Notice</h5>
                    <p class="card-text text-muted">Aplya system chya stock chi counts update karu naka visaru. Cylinder deliveries sathi assign kara.</p>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.min.js"></script>
</body>
</html>