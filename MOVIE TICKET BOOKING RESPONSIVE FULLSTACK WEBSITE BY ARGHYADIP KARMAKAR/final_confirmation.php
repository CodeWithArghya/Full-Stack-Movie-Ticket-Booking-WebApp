<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION["name"];
?>
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'movie_ticket';


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$movieName = $date = $venue = "";


if (isset($_GET["movie_name"])) {
    $movieName = $_GET["movie_name"];

    
    $query = "SELECT date, venue FROM movies WHERE movie_name = ?";

    
    $stmt = mysqli_prepare($conn, $query);

    
    mysqli_stmt_bind_param($stmt, "s", $movieName);

    
    mysqli_stmt_execute($stmt);

    
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $date = $row['date'];
        $venue = $row['venue'];
    } else {
        
        $date = "Date not available";
        $venue = "Venue not available";
    }

    
    mysqli_stmt_close($stmt);
} else {
    
    $date = "Date not available";
    $venue = "Venue not available";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Ticket</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        .ticket {
            border: 1px solid #000;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
        }
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
    <div class="container mt-4">
        <div class="ticket">
            <h1 class="text-center bg-success">MOVIE TICKET</h1>
            <strong><p class="text-center bg-warning"><strong>Ticket ID:</strong> <span id="ticketID"></span></p><strong>
            <p class="text-center"><strong>Date & Time of Booking:</strong> <span id="ticketDate"></span></p>
            <h3 class="text-center">Movie Name: <?php echo $movieName; ?></h3>
            
            <strong><p>Movie Show Date: <?php echo $date; ?></p></strong>
            <strong><p>Venue: <?php echo $venue; ?></p></strong>
            
            <p>Full Name: <?php echo $_GET["full_name"]; ?></p>
            <p>Email: <?php echo $_GET["email"]; ?></p>
            <p>Mobile: <?php echo $_GET["mobile"]; ?></p>
            <p>Emergency Contact: <?php echo $_GET["emergency_contact"]; ?></p>
            <p>Age: <?php echo $_GET["age"]; ?></p>
            <p>Address: <?php echo $_GET["address"]; ?></p>
            <strong><p>Ticket Quantity: <?php echo $_GET["ticket_quantity"]; ?></p></strong>
            <strong><p>Total Cost: RS.(INR):- <?php echo $_GET["total_cost"]; ?></p>
            <p class="text-center bg-info"><strong>Instructions:</strong> Thank you for booking! Please call us at [Your Phone Number] for any inquiries.</p></strong>
            
        </div>
        <div class="text-center mt-3">
        <a href="payment.php" class="btn btn-danger">Make Payment</a>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
        function generateTicketID() {
            
            return Math.floor(Math.random() * 1000000);
        }

        /
        function getCurrentDateTime() {
            var now = new Date();
            return now.toLocaleString();
        }

        
        function updateTicketDetails() {
            var ticketID = generateTicketID();
            var ticketDate = getCurrentDateTime();
            
            document.getElementById('ticketID').textContent = ticketID;
            document.getElementById('ticketDate').textContent = ticketDate;
        }

        

        
        updateTicketDetails();
    </script>
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
