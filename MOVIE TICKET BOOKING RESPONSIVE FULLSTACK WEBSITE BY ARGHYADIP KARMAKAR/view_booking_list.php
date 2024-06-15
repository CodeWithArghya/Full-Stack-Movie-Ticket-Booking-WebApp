<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: adminlogin.php");
    exit();
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
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
    <h1 class="mb-4">Booking Details</h1>
    <table border="2">
        <tr>
            <th>Booking ID</th>
            <th>Movie Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Emergency Contact</th>
            <th>Age</th>
            <th>Address</th>
            <th>Ticket Quantity</th>
        </tr>
        <?php
        $sql = 'SELECT * FROM `bookings`';
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $row['booking_id']; ?></td>
                <td><?= $row['movie_name']; ?></td>
                <td><?= $row['full_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['mobile']; ?></td>
                <td><?= $row['emergency_contact']; ?></td>
                <td><?= $row['age']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['ticket_quantity']; ?></td>
                <td>
                <a class="btn btn-danger" href="delete_booking.php?id=<?= $row['booking_id']; ?>">Delete</a>

                    &nbsp;&nbsp;
                    <a class="btn btn-info" href="admindashboard.php">Back</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
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
