<?php
// db.php
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = 'eammysqL3712';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
