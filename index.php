<?php
session_start();
include 'config.php';

$message = '';


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location: dashboard.php");
    exit;
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password']; 

    $demoUser = 'admin';
    $demoPassHash = password_hash('admin123', PASSWORD_DEFAULT);

    
    if($username === $demoUser && password_verify($password, $demoPassHash)){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login - Gas Agency</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
    <h1>Gas Agency Login</h1>
    <?php if($message): ?>
        <div style="background:#e74c3c; color:#fff; padding:10px; border-radius:5px; margin-bottom:15px; text-align:center;">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; 
    
  ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required autocomplete="off" autofocus />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <input type="submit" value="Login" />
    </form>
    <p>New user? <a href="register.php">register here</a></p>
</div>

</body>
</html>
