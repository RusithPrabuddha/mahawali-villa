

<?php
header('Access-Control-Allow-Origin: *');
$host = "localhost"; 
$username = "root";  // Change if using a different user
$password = "";  // Change if using a password
$dbname = "mahawalidb"; 

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM guestinformation";
$result = $conn->query($sql);

$guests = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $guests[] = $row;
    }
}

// Return data as JSON
echo json_encode($guests);

$conn->close();
?>
