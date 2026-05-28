<?php
include 'config.php';

$password = "admin123";
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE users SET password = '$hash' WHERE username = 'admin'";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "Password Updated Successfully!";
    echo "<br>Hash: " . $hash;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
