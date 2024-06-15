<?php
$con=mysqli_connect('localhost', 'root', '', 'movie_ticket');
if(!$con){
    echo "Connection Failed".mysqli_error($con);
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user_account (email, password, name, contact, country, gender, dob) VALUES ('$email', '$hashed_password', '$name', '$contact', '$country', '$gender', '$dob')";
    if(mysqli_query($con, $sql)){
        session_start();
        $_SESSION['success']='User Successfully Registered.';
        header("Location: welcome.php");
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
    <title>Signup || Movie Website</title>
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
        <img src="img/signupimage.png"
          class="img-fluid" alt="Sample image">
            <div class="d-none d-md-block">
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
                <form action="signup.php" method="POST">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email address" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter Your Full Name" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contact No.</label>
                        <input type="number" class="form-control" id="exampleInputMobile" name="contact" placeholder="Enter 10 digit Mobile Number(without Country Code)" required >
                        
                    </div>
                    <div class="form-group">
                         <label for="country" class="form-label">Select your Country</label>
                         <select class="form-control" id="country" name="country">
                                <option>Select Here</option>
                                <option value="in">India</option>
                                <option value="bd">Bangladesh</option>
                                 <option value="np">Nepal</option>
                                 <option value="bh">Bhutan</option>
                                <option value="us">United States of America</option>
                                 <option value="au">Australia</option>
                                 <option value="other">Others (Not in the list)</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="form-label">Select Your Gender</label>
                        <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" >
                    <label class="form-check-label" for="male">
                     Male
                     </label>
                    </div>
                    <div class="form-check">
                         <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                        <label class="form-check-label" for="female">
                         Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" >
                        <label class="form-check-label" for="other">
                         Other
                        </label>
                    </div>
                </div>
                <div class="form-group">
                 <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
                </div>


                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1"> I have accept all <a href="termscondition.html">terms & conditions</a></label>
                    </div>
                    <div class="mb-3">
                            Already Have an account? <a href="login.php">Login Now</a>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Signup</button>
                    <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                    <a href="index.php" class="btn btn-danger btn-block">Exit</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-warning text-center p-2" id="abc"><b>Signup Instructions</b></p>
    <p class="bg-success text-justify p-4" id="abcd"><b> || Dear User, Fill the above form, all details are mandatory. Remaind that we are taking all the informations just for signup purpose. We will not share any personal credentials entered by you. We respect our user's privacy. If you want to know more or feel any issue regarding privacy, you may contact with us. || <br>   || प्रिय उपयोगकर्ता, उपरोक्त फॉर्म भरें, सभी विवरण अनिवार्य हैं। ध्यान रखें कि हम सारी जानकारी केवल साइनअप उद्देश्य के लिए ले रहे हैं। हम आपके द्वारा दर्ज किए गए किसी भी व्यक्तिगत क्रेडेंशियल को साझा नहीं करेंगे। हम अपने उपयोगकर्ता की गोपनीयता नीति का सम्मान करते हैं। यदि आप अधिक जानना चाहते हैं या गोपनीयता लीक होने का डर है तो आप हमसे संपर्क कर सकते हैं ||</b></p>
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
