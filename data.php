<?php 
    $con = new mysqli('localhost','root','','mahawalidb');
    if($con ->connect_error){
        die ("Failed to connect".$con->connect_error);
    }
    
    $sql = "select * from bookingsAvalability";
    $result = $con -> query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["no"]."</td></tr><tr><td>".$row["checkIn"]."</td></tr><tr><td>".$row["checkOut"]."</td></tr><tr><td>".$row["adults"]."</td></tr><tr><td>".$row["children"]."</td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 results";
    }

    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>