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

$movie_name = "";
$date = "";
$venue = "";
$time = "";
$price = "";
$cost_per_head = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve movie details for editing
    $sql = "SELECT * FROM movies WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $movie_name = $row['movie_name'];
        $date = $row['date'];
        $venue = $row['venue'];
        $time = $row['time'];
        $price = $row['price'];
        $cost_per_head = $row['cost_per_head'];
    } else {
        echo "Movie not found.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie Data</title>
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
    <div class="container">
        <h1>Edit Movie Data</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
            <div class="form-group">
                <label for="movie_name">Movie Name:</label>
                <input type="text" class="form-control" name="movie_name" value="<?php echo $movie_name; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value="<?php echo $date; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" class="form-control" name="venue" value="<?php echo $venue; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" class="form-control" name="time" value="<?php echo $time; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" step="0.01" value="<?php echo $price; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="cost_per_head">Cost Per Head:</label>
                <input type="number" class="form-control" name="cost_per_head" step="0.01" value="<?php echo $cost_per_head; ?>" required>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save Changes">
                <a href="view_movie.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
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
