<?php

include('config.php'); 

if(isset($_POST['register'])){
    $u = $_POST['username'];
    $p = $_POST['password'];
    $r = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES ('$u', '$p', '$r')";
    
    if(mysqli_query($conn, $sql)){
        
        echo "<script>
                alert('Registion Successful! you can now login');
                window.location.href='index.php';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Gas Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

    <div class="login-container">
        <div class="login-card">
            <h3 class="text-center mb-4">Register User</h3>

            <form action="register.php" method="POST">
                <div class="mb-3 text-start">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Name" required>
                </div>
                
                <div class="mb-3 text-start">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>

                <div class="mb-3 text-start">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" name="register" class="btn btn-primary w-100 py-2">Register</button>
            </form>

            <div class="mt-4 text-center">
                <p>already have an account? <a href="index.php" class="text-decoration-none">Login Hear</a></p>
            </div>
        </div>
    </div>

</body>
</html>