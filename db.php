<?php
$host = "YOUR_HOST_HERE";
$user = "YOUR_USERNAME_HERE";
$pass = "YOUR_PASSWORD_HERE";
$dbname = "YOUR_DATABASE_NAME_HERE";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>