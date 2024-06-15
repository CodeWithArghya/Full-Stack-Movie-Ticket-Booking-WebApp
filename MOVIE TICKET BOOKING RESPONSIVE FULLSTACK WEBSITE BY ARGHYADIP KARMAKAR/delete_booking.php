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

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    
    $sql = "DELETE FROM `bookings` WHERE `booking_id` = $bookingId";

    if (mysqli_query($conn, $sql)) {
        echo "Booking with ID $bookingId has been deleted successfully. Wait for page refresh.";

        
        echo "<script>
                setTimeout(function(){
                    window.location.href = 'view_booking_list.php'; 
                }, 2000); 
              </script>";
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
