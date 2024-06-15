<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $movieName = $_POST["movie_name"];
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $emergencyContact = $_POST["emergency_contact"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $ticketQuantity = $_POST["ticket_quantity"];
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'movie_ticket';

    
    $conn = mysqli_connect($host, $username, $password, $database);

   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
    function calculateTotalCost($movieName, $ticketQuantity, $conn) {
       
        $query = "SELECT price FROM movies WHERE movie_name = '$movieName'";
        
        
        $result = mysqli_query($conn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $ticketPrice = $row['price'];
    
            
            $totalCost = $ticketQuantity * $ticketPrice;
    
            return $totalCost;
        } else {
            
            return 0; 
        }
    }

    
    $totalCost = calculateTotalCost($movieName, $ticketQuantity, $conn);

    
    $query = "INSERT INTO bookings (movie_name, full_name, email, mobile, emergency_contact, age, address, ticket_quantity, total_cost)
              VALUES ('$movieName', '$fullName', '$email', '$mobile', '$emergencyContact', '$age', '$address', '$ticketQuantity', '$totalCost')";

    if (mysqli_query($conn, $query)) {
        
        header("Location: final_confirmation.php?movie_name=$movieName&full_name=$fullName&email=$email&mobile=$mobile&emergency_contact=$emergencyContact&age=$age&address=$address&ticket_quantity=$ticketQuantity&total_cost=$totalCost");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
} else {
    
    header("Location: userdashboard.php");
    exit();
}
?>
