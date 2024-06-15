<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" />
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <title>About|| Movie Website</title>                                                                                  
  
    <style>
        #header h1{
            height: 70px;
            line-height: 71px;
        }
        #header h1:hover{
            background: yellow;
            color: red;
            transform: scale(0.8);
            transition: 0.5s;
        }
        #navtitle{
          font-size:35px;
          
        }
        #row1{
            margin-top: 100px;
            margin-left: 15px;
            margin-right: 15px;
        }
        #marq{
            margin-top:auto;
            
            padding:0px;
        }
        #marq h3:hover{
            color:cyan;
            transform:scale(1.2);
            transition:0.5s;
        }
       #nav{
        margin:auto;
       }
        #navtitle {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  }

      
       #tablename{
        margin-top:5px;
       }
       #table{
        margin-top:10px;
        border:5px dashed black;
        background-color: yellow;
       }
        
       #description{
            text-align: center;
            color: darkcyan;
            margin-left: 650px;
            font-weight: 500;
            font-size: 130%;
        }
        #tablename:hover{
            transform: scale(0.9);
            transition: 0.5s;
            background:cyan;
            color:dark;
            position: center;   
        }
        .carousel {
          max-width: 100%;
          height: auto;
        }

        .carousel-inner {
           text-align: center;
        }

        .carousel-item img {
          max-width: 100%;
          height: auto;
          margin: 0 auto;
        }

        #rowabout{
          margin-left:20px;

        }
        #carousel:hover{
                transform: scale(0.9);
                transition: 0.5s;
            
        }
        #abcd{
          position:relative;
          border: 2px;
          border-radius:20px;
          
        }
        #ijkl{
          position:relative;
          border: 2px;
          border-radius:20px;
          color:brown;
          
        }
        #abc{
          border:8px;
          border-radius:20px;
          
        }
        #notice{
          box:5px;

        }
        #card1:hover{
            transform:rotateY(360deg);
            transition:1.5s;
        }
        #cardbutton:hover{
          color:red;
          background:yellow;
          transform:scale(1.3);
          transition:0.5s;
        }
        #footer{
            margin-top: 50px;
            position:center;
        }
        #footer:hover{
            transform: scale(0.9);
            transition: 0.5s;
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
<nav class="navbar" id="navdesign">
  <div class="container-fluid bg-dark">
    <div class="navbar-header">
      <a class="navbar-brand text-light" id="navtitle" href="index.php"><b><i class="fas fa-film">Movie Website (v 1.0.0)</i></b></a>
      </div>
        <ul class="nav float-right">
            <li class="nav-items">
                <a class="nav-link text-light" href="index.php"><b>Home</b></a>
            </li>
            <li class="nav-items">
                <a class="nav-link text-light" href="about.php"><b>About/Service</b></a>
            </li>
            <li class="dropdown">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Book Now</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="book_ticket.php">Book Ticket</a>
                    
                  
                               </div>
            </li>
            <li class="nav-items">
                <a class="nav-link text-light" href="contact.php"><b>Contact</b></a>
            </li>
            
          
            <li class="nav-items float-right">
            <a href="signup.php" class="btn btn-success">
            <i class="fas fa-user"></i> Signup
            </a>
            <a href="login.php" class="btn btn-warning">
            <i class="fas fa-sign-in-alt"></i> Login
            </a>
            </li>
            
        </div>
<div class="container-fluid text-center text-warning bg-dark" id="marq">
    <marquee><h3> || Namaste || Welcome All to Movie Website (v 1.0.0) || Now You can easily book Online Movie Ticket & See Movie Review Online... Just Signup (Create a User Account Free of Cost & Access Site) || नमस्ते || मूवी वेबसाइट में आप सभी का स्वागत है...|| अब आप आसानी से ऑनलाइन मूवी टिकट बुक कर सकते हैं और मूवी रिव्यू ऑनलाइन देख सकते हैं... बस साइनअप करें (एक उपयोगकर्ता खाता निःशुल्क बनाएं और साइट तक पहुंचें)</h3></marquee>
</div>
    
<div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-info text-center p-2" id="abc"><b>About Us</b></p>
    <p class="bg-warning text-justify p-4" id="abcd"><b>This is a demo Website where you can get different type of Bollywood, Hollywood and Tollywood Movie Review, By Signup (Creating a free account) you can access this site & can book a moview ticket in advance. From the Time, Venue Table,  you will upated get the details of Moview Show Date, Time, Venue and also you will get details about Availability of Seat. The Content availabe in this website is not copied from any other sites, if anything match with any other property then remaind that we did not used intensionally.. Hope you all like this website.. <br><br> यह एक डेमो वेबसाइट है जहां आप विभिन्न प्रकार की बॉलीवुड, हॉलीवुड और टॉलीवुड मूवी समीक्षा प्राप्त कर सकते हैं, साइनअप करके (एक निःशुल्क खाता बनाकर) आप इस साइट तक पहुंच सकते हैं और पहले से मूवी टिकट बुक कर सकते हैं। समय, स्थान तालिका से, आपको मोव्यू शो की तारीख, समय, स्थान का विवरण मिलेगा और आपको सीट की उपलब्धता के बारे में भी विवरण मिलेगा। इस वेबसाइट में उपलब्ध सामग्री किसी अन्य साइट से कॉपी नहीं की गई है, यदि कुछ भी किसी अन्य संपत्ति से मेल खाता है तो हमने जानबूझकर इसका उपयोग नहीं किया है.. आशा है कि आप सभी को यह वेबसाइट पसंद आएगी..</b></p>
      </div> 
      <div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-success text-center text-dark p-2" id="abc"><b>Our Services</b></p>
    </div>
      
      <div class="container-fluid" id="main">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/ticket.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-danger text-center">Book Ticket Online</h4>
                            <p class="card-text text-primary"><b>Anytime can Book Movie Ticket Online</b></p>
                            <a href="login.php" class="btn btn-success" id="cardbutton">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/theater.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-dark text-center">Online Live Status of Seat Availability</h4>
                            <p class="card-text text-primary"><b>Online Check Live Seat Availability (Live Update)</b></p>
                            <a href="index.php" class="btn btn-success" id="cardbutton">Check Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/login.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-info text-center">FAQ, Login-Signup System (Responsive)</h4>
                            <p class="card-text text-primary"><b>Top Ticket Sale!! (#2 on Trending)</b></p>
                            <a href="login.php" class="btn btn-success" id="cardbutton">Login Now</a>
                        </div>
                    </div>

            </div>
            <section class="info_section bg-dark">
    <div class="info_container layout_padding2">
        <div class="info_main">
          <div class="row">
            <div class="col-md-3 col-lg-2">
              <div class="info_link-box text-light">
                <h5>
                  Useful Link
                </h5>
                <ul>
                  <li class= " active">
                    <a class="text-primary" href="index.php" ><b>Home</b> <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="">
                    <a class="text-primary" href="about.php"><b>About/Service</b> </a>
                  </li>
                  <li class="">
                    <a class="text-primary" href="contact.php"><b> Contact</b> </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 text-light">
              <h5>
                Movie Website (v 1.0.0)
              </h5>
              <p>
                This site is for Booking Movie Ticket Online.
                This is a demo website (learning purpose), Not for Commercial Uses.
              </p>
            </div>
            <div class="col-md-3 text-light">
              <h5>
                Last Update::
              </h5>
              <p>
                This is the Version 1.0.0, Last update on- 25/09/2023
              </p>
            </div>
          </div>
          
        </div>
        
        <marquee class="text-warning"><h5> || This site is Developed & Designed by Arghyadip Karmakar || यह साइट अर्घ्यदीप कर्माकर द्वारा विकसित और डिज़ाइन की गई है || @2023 Movie Website(v1.0.0) All rights reserved@ ||</h5></marquee>
    </div>
</div>
    </section>
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
