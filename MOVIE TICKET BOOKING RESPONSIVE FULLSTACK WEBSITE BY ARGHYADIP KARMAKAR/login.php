<?php
session_start();


if (isset($_SESSION['id'])) {
    header("Location: userdashboard.php");
    exit;
}


$con = mysqli_connect('localhost', 'root', '', 'movie_ticket');
if (!$con) {
    echo "Connection Failed: " . mysqli_error($con);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM user_account WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header("Location: userdashboard.php");
            exit;
        } else {
            echo "Invalid Password";
        }
    } else {
        echo "User not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Login || Movie Website</title>
    <style>
      
      #rowabout{
          margin-left:20px;

        }
       
        #abcd{
          position:relative;
          border: 2px;
          border-radius:20px;
          
        }
        #abc{
          border:8px;
          border-radius:20px;
          
        }

        .container {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
        }

        
        @media (max-width: 740px) {
            body {
                background-size: contain; 
                background-attachment: scroll; 
            }

            .form-container {
                background-color: rgba(255, 255, 255, 0.95); 
            }
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
    <div class="row">
        <div class="col-md-6">
        <img src="img/loginimage.png"
          class="img-fluid" alt="Sample image">
            <div class="d-none d-md-block">
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
            <form action="login.php" method="POST">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email address" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="mb-3">
                            Don't Have an account? <a href="signup.php">Signup Now</a>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                        <a href="index.php" class="btn btn-danger btn-block">Exit</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-warning text-center p-2" id="abc"><b>Login Instructions</b></p>
    <p class="bg-success text-justify p-4" id="abcd"><b> || Dear User, Enter your email id as username and password to login, all details are mandatory. Remaind that we are taking all the informations just for login purpose. We will not share any personal credentials entered by you. We respect our user's privacy. If you want to know more or feel any issue regarding privacy, you may contact with us. || <br>   || लॉगिन करने के लिए उपयोगकर्ता नाम और पासवर्ड के रूप में अपना ईमेल आईडी दर्ज करें, सभी विवरण अनिवार्य हैं। ध्यान रखें कि हम सारी जानकारी केवल साइनअप उद्देश्य के लिए ले रहे हैं। हम आपके द्वारा दर्ज किए गए किसी भी व्यक्तिगत क्रेडेंशियल को साझा नहीं करेंगे। हम अपने उपयोगकर्ता की गोपनीयता नीति का सम्मान करते हैं। यदि आप अधिक जानना चाहते हैं या गोपनीयता लीक होने का डर है तो आप हमसे संपर्क कर सकते हैं ||</b></p>
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
