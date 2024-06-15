<?php
session_start();
if (!isset($_SESSION["admin_id"])) {
    header("Location: adminlogin.php");
    exit();
}

?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_ticket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $idToDelete = $_POST["delete"];
    
    $deleteSql = "DELETE FROM contact WHERE id = $idToDelete";
    if ($conn->query($deleteSql) === TRUE) {
        echo '<script>alert("Contact record deleted successfully.");</script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Submitted Contact Form Data:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Email</th><th>Mobile</th><th>User Type</th><th>Problem Type</th><th>Message</th><th>Action</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["mobile"] . "</td>";
        echo "<td>" . $row["userType"] . "</td>";
        echo "<td>" . $row["problemType"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo '<td><form method="POST" action=""><button type="submit" name="delete" value="' . $row["id"] . '">Delete</button></form></td>';
        echo "</tr>";
    }
    
    echo "</table>";
    
    echo '<br><a href="admindashboard.php">Back to Dashboard</a>';
} else {
    echo "No contact form submissions found.";
    echo '<br><a href="admindashboard.php">Back to Dashboard</a>';
}

$conn->close();
?>
