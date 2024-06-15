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


$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie Data</title>
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
        <h1>View/ CRUD Movie Data</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Movie Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>Cost Per Head</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['movie_id'] . "</td>";
                    echo "<td>" . $row['movie_name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['venue'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['cost_per_head'] . "</td>";
                    echo '<td><a href="edit_movie.php?movie_id=' . $row['movie_id'] . '" class="btn btn-primary">Edit</a>';
                    echo ' <a href="delete_movie.php?movie_id=' . $row['movie_id'] . '" class="btn btn-danger">Delete</a></td>';
                    
                    echo "</tr>";
                }
                ?>
                <a href="insert_data.php" class="btn btn-success">Add New Movie</a>
                <a href="admindashboard.php" class="btn btn-danger">Back</a>
            </tbody>
        </table>
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
