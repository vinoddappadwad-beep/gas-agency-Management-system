<?php
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];


    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Agency Register</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 30px;
            width: 300px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(128,128,128,0.3);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 8px 12px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            width: 100%;
            background-color: #0052cc;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #003d99;
        }
        .login-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Gas Agency Registration</h2>

   
    <?php if($message) echo " style='color:green;text-align:center;'>$message</p>";

    
?>
    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>
</div>

</body>
</html>
