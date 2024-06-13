<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "demothanhtoan";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
else echo "Connection";
?>