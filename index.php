<?php
    require 'connection.php';


    $checkIn=$_POST['checkIn'];
    $checkOut=$_POST['checkOut'];
    $persons=$_POST['persons'];


    $sql="insert into bookings (checkIn,checkOut,persons) values('$checkIn','$checkOut','$persons')";
    $result=mysqli_query($con,$sql);

    if($result){
        echo 
        "
        <script> alert ('Your details was saved.Stay informed soon about your booking...');</script>
        ";
        header("Location:booknow.html");
    }
    else{
        die (mysqli_error($con));
    }
?>