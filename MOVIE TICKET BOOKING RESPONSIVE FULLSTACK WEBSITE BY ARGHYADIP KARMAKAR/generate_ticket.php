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


if (isset($_GET["payment_id"])) {
    $paymentId = $_GET["payment_id"];

   
    $query = "SELECT paymentname, email, amount, ticketid, transaction FROM payment WHERE payment_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $paymentId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $paymentDetails = mysqli_fetch_assoc($result);
        }
    }
}
$movieName = isset($_GET['movieName']) ? urldecode($_GET['movieName']) : 'N/A';
$date = isset($_GET['date']) ? urldecode($_GET['date']) : 'Date not available';
$venue = isset($_GET['venue']) ? urldecode($_GET['venue']) : 'Venue not available';
$full_name = isset($_GET['full_name']) ? urldecode($_GET['full_name']) : 'N/A';
$email = isset($_GET['email']) ? urldecode($_GET['email']) : 'N/A';
$mobile = isset($_GET['mobile']) ? urldecode($_GET['mobile']) : 'N/A';
$emergency_contact = isset($_GET['emergency_contact']) ? urldecode($_GET['emergency_contact']) : 'N/A';
$age = isset($_GET['age']) ? urldecode($_GET['age']) : 'N/A';
$address = isset($_GET['address']) ? urldecode($_GET['address']) : 'N/A';
$ticket_quantity = isset($_GET['ticket_quantity']) ? urldecode($_GET['ticket_quantity']) : 'N/A';
$total_cost = isset($_GET['total_cost']) ? urldecode($_GET['total_cost']) : 'N/A';


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
            <h1 class="text-center bg-success">Payment Receipt</h1>
            <strong><p class="text-center text-danger bg-warning"><strong>Acknowledgement ID:</strong> <span id="ticketID"></span></p><strong>
            <p class="text-center text-success"><strong>Date & Time of Payment:</strong> <span id="ticketDate"></span></p>
            
           
            <p><strong>Payment By:</strong> <?php echo $paymentDetails['paymentname']; ?></p>
            <p><strong>Email:</strong> <?php echo $paymentDetails['email']; ?></p>
            <p><strong>Amount Paid:</strong> RS.(INR) <?php echo $paymentDetails['amount']; ?></p>
            <p><strong>Ticket ID:</strong> <?php echo $paymentDetails['ticketid']; ?></p>
            <p><strong>Payment Transaction Number:</strong> <?php echo $paymentDetails['transaction']; ?></p>


            <p class="text-center bg-info"><strong>Instructions:</strong> Thank you for Payment. Keep this Acknowledgement receipt with your Movie Ticket. It may subject to verification before enter in hall.</p></strong>
            
        </div>
        <div class="text-center mt-3">
            <button onclick="printTicket()" class="btn btn-primary">Print Receipt</button>
            
        </div>
        <br>
        <br>

        <p class="text-center text-danger bg-warning"><strong>NOTE:</strong> Do not Refresh this page or do not press F5...... </p></strong>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
        function generateTicketID() {
            
            return Math.floor(Math.random() * 1000000);
        }

        
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

        
        function printTicket() {
            window.print();
        }
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
