

<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'post_db';
$port = 3307;

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
