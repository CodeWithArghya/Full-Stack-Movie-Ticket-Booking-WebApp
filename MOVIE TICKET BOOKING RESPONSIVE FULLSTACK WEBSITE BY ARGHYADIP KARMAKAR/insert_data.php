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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_name = $_POST['movie_name'];
    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $time = $_POST['time'];
    $price = $_POST['price'];
    $cost_per_head = $_POST['cost_per_head']; 

    
    $sql = "INSERT INTO movies (movie_name, date, venue, time, price, cost_per_head) VALUES ('$movie_name', '$date', '$venue', '$time', '$price', '$cost_per_head')";

    if (mysqli_query($conn, $sql)) {
        echo "Movie data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movie Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h1>Post Movie Details</h1>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="movie_name">Movie Name:</label>
                            <input type="text" class="form-control" name="movie_name" placeholder="Enter Movie Name Here" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" name="date" placeholder="Select/Enter Movie Show Date Here" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="venue">Venue:</label>
                            <input type="text" class="form-control" name="venue" placeholder="Enter Venue Details / Cinema Hall" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="time">Time:</label>
                            <input type="text" class="form-control" name="time" placeholder="Enter Movie Show Time (example- 05.30 PM)" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" step="0.01" placeholder="Enter Ticket Fixed Price Here (0.00)" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="cost_per_head">Cost Per Head:</label>
                            <input type="number" class="form-control" name="cost_per_head" step="0.01" placeholder="Enter Cost/Price Per Head (18+) (0.00)" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <br>
                            <a href="view_movie.php" class="btn btn-danger btn-block">Exit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
