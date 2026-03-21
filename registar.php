<?php
include("config.php");

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username,password) VALUES('$username','$password')";

    if(mysqli_query($conn,$sql)){
        echo "Registration Successful!";
    } else {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Register</h2>

    <form method="post">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" name="register" value="Register">
    </form>

    <a href="index.php">Back to Login</a>
</div>

</body>
</html>