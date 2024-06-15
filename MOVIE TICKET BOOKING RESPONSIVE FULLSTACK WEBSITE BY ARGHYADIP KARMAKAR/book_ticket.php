<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Tickets</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8); 
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; 
}


.preloader::after {
    content: "";
    border: 4px solid #3498db;
    border-top: 4px solid transparent;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite; 
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<div class="preloader">
        <div class="loader"></div>
    </div>
    <div class="container mt-5">
        <h1 class="mb-4">Book Movie Tickets</h1>
        <form action="process_booking.php" method="post">
            <div class="form-group">
            <label for="movie_name">Select Movie:</label>
                <select class="form-control" name="movie_name" required>
                    <option value="" disabled selected>Select a movie</option>
                    <?php
                    
                    $host = 'localhost:3306';
                    $username = 'root';
                    $password = 'Arghya@2002';
                    $database = 'movie_ticket';

                    $conn = mysqli_connect($host, $username, $password, $database);

                    
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    
                    $query = "SELECT movie_name FROM movies";
                    $result = mysqli_query($conn, $query);

                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['movie_name'] . "'>" . $row['movie_name'] . "</option>";
                    }

                    
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" placeholder="Enter your full name here" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your valid email here" required>
            </div>
            
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" class="form-control" name="mobile" placeholder="Enter your 10 Digit Mobile Number" required>
            </div>
            
            <div class="form-group">
                <label for="emergency_contact">Emergency Contact:</label>
                <input type="tel" class="form-control" name="emergency_contact" placeholder="Enter Alternate Contact for Emergency" required>
            </div>
            
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" placeholder="Enter your age " required>
            </div>
            
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" rows="4" placeholder="Enter your full address (Vill/Town/City, PS, Dist, State, PIN)" required></textarea>
            </div>
            <div class="form-group">
                <label for="ticket_quantity">Ticket Quantity:</label>
                <input type="number" class="form-control" name="ticket_quantity" min="1" placeholder="Enter Number of ticket you want to book (Like- 1,2,3..)" required>
            </div>
            <div class="form-group">
                <label for="total_cost">Total Cost:</label>
                <input type="text" class="form-control" name="total_cost" placeholder="It will be automatically Calculted" readonly>
            </div>
            
            <button type="submit" class="btn btn-primary">Book Tickets</button>
        </form>
    </div>

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    
    window.addEventListener('load', function () {
        setTimeout(function () {
            const preloader = document.querySelector('.preloader');
            preloader.style.display = 'none';
        }, 2000); 
    });
</script>
</body>
</html>
