<?php
$con=mysqli_connect('localhost', 'root', '', 'movie_ticket');
if(!$con){
    echo "Connection Failed".mysqli_error($con);
}
if(isset($_POST['submit'])){
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    
    
    $hashed_password = password_hash($admin_password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO admin_account (admin_email, admin_password) VALUES ('$admin_email', '$hashed_password')";
    if(mysqli_query($con, $sql)){
        session_start();
        $_SESSION['success']='User Successfully Registered.';
        header("Location: adminlogin.php");
    }else{
        echo "Something went wrong".mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Admin Singup|| Movie Website</title>
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
    </style>
</head>
<body>
<div class="preloader">
        <div class="loader"></div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <img src="img/login.jpg"
          class="img-fluid" alt="Sample image">
            <div class="d-none d-md-block">
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
                <form action="adminsignup.php" method="POST">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="admin_email" placeholder="Enter Email address" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="admin_password" placeholder="Enter Password" required>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Signup</button>
                    <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                    <a href="index.php" class="btn btn-danger btn-block">Exit</a>
                </form>
            </div>
        </div>
    </div>
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
