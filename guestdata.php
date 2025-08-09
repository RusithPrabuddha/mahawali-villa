<?php
require 'connection.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $id_no = mysqli_real_escape_string($con, $_POST['id_no']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $persons = (int)$_POST['persons'];
    $gender = $_POST['gender'];

    // Insert data into database
    $query = "INSERT INTO guestinformation (name, country, address, nationality, id_no, contact, email, check_in, check_out, persons, gender) 
              VALUES ('$name', '$country', '$address', '$nationality', '$id_no', '$contact', '$email', '$check_in', '$check_out', '$persons', '$gender')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Successfully inserted your details.'); window.location.href='displaylast.html';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
