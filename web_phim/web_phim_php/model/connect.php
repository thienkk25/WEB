<?php
$hosting='localhost';
$username='thienphp';
$password='thien';
$database='php';

$conn= new mysqli($hosting,
$username,
$password,
$database);

if($conn->connect_error){
    echo 'error' . $conn->connect_error;
}
?>