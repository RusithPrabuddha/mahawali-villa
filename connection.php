<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "mahawalidb"; // Updated database name

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
