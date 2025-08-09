<?php
    require 'connection.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $contact = $_POST['Contact_No'];
        $email = $_POST['email'];
        $reason = $_POST['customer_reason_contact'];
        $message = $_POST['customer_message'];

        $querry = "insert into contactinfo values('', '$name', '$contact', '$email', '$reason', '$message')";
        mysqli_query($con, $querry);
        echo 
        "
        <script> alert ('Successfully inserted your details..');</script>
        ";
        header("Location:indexx.html");
    }
?>