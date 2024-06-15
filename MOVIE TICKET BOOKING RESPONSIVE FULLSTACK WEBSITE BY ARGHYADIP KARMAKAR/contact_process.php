<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["email"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $userType = $_POST["userType"];
    $problemType = $_POST["problemType"];
    $message = $_POST["message"];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie_ticket";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "INSERT INTO contact (email, name, mobile, userType, problemType, message)
            VALUES ('$email', '$name', '$mobile', '$userType', '$problemType', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Thanks for submitting your form! We will contact with you soon...");</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


    
    $conn->close();
} else {
    
    echo "Something went wrong.";
}
?>
