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

if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];

    
    $check_sql = "SELECT * FROM movies WHERE movie_id = '$movie_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) == 1) {
        
        $delete_sql = "DELETE FROM movies WHERE movie_id = '$movie_id'";
        
        if (mysqli_query($conn, $delete_sql)) {
            echo "Movie record deleted successfully!";
        } else {
            echo "Error: " . $delete_sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Movie not found.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
