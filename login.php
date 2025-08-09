<?php
session_start(); // Start session at the beginning

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from POST request
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Database connection
    $con = new mysqli('localhost', 'root', '', 'mahawalidb');

    // Check for connection errors
    if ($con->connect_error) {
        die("Database connection failed: " . $con->connect_error);
    }

    // Debugging: Check if form values are coming correctly
    if (empty($username) || empty($password)) {
        die("Username or password cannot be empty.");
    }

    // Prepare SQL statement to prevent SQL Injection
    $stmt = $con->prepare("SELECT * FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    // Debugging: Check if username exists
    if ($stmt_result->num_rows === 0) {
        die("Error: Username not found in the database.");
    }

    $data = $stmt_result->fetch_assoc();

    // Debugging: Check stored password format
    if (!isset($data['password'])) {
        die("Error: Password field is missing in the database.");
    }

    // Directly compare passwords without hashing
    if ($password === $data['password']) {
        // Set session
        $_SESSION['username'] = $username;

        // Redirect to admin page
        header("Location: mahawaliAdmin.html");
        exit();
    } else {
        die("Error: Incorrect password.");
    }

    // Close connections
    $stmt->close();
    $con->close();
}
?>
