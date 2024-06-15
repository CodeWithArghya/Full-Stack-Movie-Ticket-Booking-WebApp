<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: adminlogin.php");
    exit();
}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <title>Admin Dashboard</title>                                                                                  
  
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
        #center-outer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
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
        #cardbutton1:hover{
          color:red;
          background:yellow;
          transform:rotateY(360deg);
            transition:1.5s;
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
      <a class="navbar-brand text-light" id="navtitle" href="userdashboard.php"><b><i class="fas fa-film">Movie Website || Admin Dashboard</i></b></a>
      </div>
        <ul class="nav float-right">
            

                <li class="nav-items">
            <a href="insert_data.php" class="btn btn-danger">
            <i class="fas fa-upload"></i> Post Movie
            </a>
</li>

            <li class="nav-items">
                <a class="nav-link text-light" href="about.php"><b>About</b></a>
            </li>
            
          
            <li class="nav-items float-right">
                <a href="logout.php" class="btn btn-warning">
            <i class="fas fa-sign-in-alt"></i> Logout
            </a>
            </li>
            
        </div>
<div class="container-fluid text-center text-warning bg-dark" id="marq">
    <marquee><h3> || Welcome || Admin, Now you can Post Movie details like Movie Name, Venue, Time & Date of show. And also you Can see the form details like- Booking, Payment, Feedback, Contact posted by user. || स्वागत है || व्यवस्थापक, अब आप मूवी विवरण जैसे मूवी का नाम, स्थान, समय और शो की तारीख पोस्ट कर सकते हैं। और आप उपयोगकर्ता द्वारा पोस्ट किए गए फॉर्म विवरण जैसे- बुकिंग, भुगतान, फीडबैक, संपर्क भी देख सकते हैं। ||</h3></marquee>
</div>

<div class="container-fluid text-center text-light bg-success" id="tablename">
    <marquee direction="right"><h4>|| LIVE || Movie Show Time, Location & Current Seat Availability Status    || मूवी शो का समय, स्थान और वर्तमान सीट उपलब्धता स्थिति || LIVE ||</h4></marquee>
</div>
<div class="container-fluid">
    <table class="table bg-warning" id="table">
        <tr>
            <th class="bg-warning text-center text-dark border-3">Movie Name</th>
            <th class="bg-warning text-center text-dark border-3">Time & Date</th>
            <th class="bg-warning  text-center text-dark border-3">Venue (Location)</th>
            <th class="bg-warning text-center text-dark border-3">Current Seat Availability</th>
            <th class="bg-warning text-center text-dark border-3">Status</th>
        </tr>
        <tr>
        <td class="bg-danger text-center text-light border-3"><b>Jawan (Hindi)</b></td>
            <td class="bg-secondary text-center text-dark border-3"><b>26/09/2023 6:00 PM</b></td>
            <td class="bg-primary text-center text-light border-3"><b>Kolkata</b></td>
            <td class="bg-dark text-warning border-3"> <marquee direction="right"><b><h4>10 Seats Left Only (Book Fast)</h4></b></marquee></td>
            <td class="bg-dark text-center text-light border-3"><a href="#" class="btn btn-success btn-block"><i class="fas fa-check-circle text-success"></i>Active</a></td>
        </tr>
        <tr>
        <td class="bg-danger text-center text-light border-3"><b>Chander Pahar (Bengali)</b></td>
            <td class="bg-secondary text-center text-dark border-3"><b>28/09/2023 6:00 PM</b></td>
            <td class="bg-primary text-center text-light border-3"><b>Siliguri</b></td>
            <td class="bg-dark text-success text-center border-3"> <b><h4>Available</h4></b></td>
            <td class="bg-dark text-center text-light border-3"><a href="#" class="btn btn-success btn-block"><i class="fas fa-check-circle text-success"></i>Active</a></td>
        </tr>
        <tr>
        <td class="bg-danger text-center text-light border-3"><b>3 Idiots (Hindi)</b></td>
            <td class="bg-secondary text-center text-dark border-3"><b>02/10/2023 7:00 PM</b></td>
            <td class="bg-primary text-center text-light border-3"><b>Asansol</b></td>
            <td class="bg-dark text-warning border-3"> <marquee direction="left"><b><h4>20 Seats Left Only (Book Fast)</h4></b></marquee></td>
            <td class="bg-dark text-center text-light border-3"><a href="#" class="btn btn-success btn-block"><i class="fas fa-check-circle text-success"></i>Active</a></td>
        </tr>
        <tr>
        <td class="bg-danger text-center text-light border-3"><b>Pathaan(Hindi)</b></td>
            <td class="bg-secondary text-center text-dark border-3"><b>18/10/2023 5:00 PM</b></td>
            <td class="bg-primary text-center text-light border-3"><b>Durgapur</b></td>
            <td class="bg-dark text-success text-center border-3"> <b><h4>Available</h4></td>
            <td class="bg-dark text-center text-light border-3"><a href="#" class="btn btn-success btn-block"><i class="fas fa-check-circle text-success"></i>Active</a></td>
        </tr>
        <tr>
        <td class="bg-danger text-center text-light border-3"><b>DDLJ(Hindi)</b></td>
            <td class="bg-secondary text-center text-dark border-3"><b>15/10/2023 4:00 PM</b></td>
            <td class="bg-primary text-center text-light border-3"><b>Burdwan</b></td>
            <td class="bg-dark text-danger border-3"> <marquee direction="right"><b><h4>Booking Not Yet Started!</h4></b></marquee></td>
            <td class="bg-dark text-center text-light border-3"><a href="#" class="btn btn-danger btn-block"><i class="fas fa-check-circle text-danger"></i>IN-Active</a></td>
        </tr>
    </table>
</div>


<div class="row" id="rowabout">
  <div class="col-6 p-4">
    <p class="bg-info text-center p-2" id="abc"><b>Instructions for Admin</b></p>
    <p class="bg-warning text-justify p-4" id="abcd"><b>For Booking Movie Ticket Online, You just want to click Book Now Button. A new Booking Window will be open, you should fill the form (available in booking windows), after filling and attaching all the mandatory details along with payment screenshot, a new confirmation page will be availabe for printout. Take the print and enter movie hall (Date, Time, Venue will be mentioned in the ticket..), For Payment you have to scan the QR code (will be available during booking), details instruction will be Booking Window</b> <br><br> <b>मूवी टिकट ऑनलाइन बुक करने के लिए, आपको बस अभी बुक करें बटन पर क्लिक करना होगा। एक नई बुकिंग विंडो खुलेगी, आपको फॉर्म भरना चाहिए (बुकिंग विंडो में उपलब्ध), भुगतान स्क्रीनशॉट के साथ सभी अनिवार्य विवरण भरने और संलग्न करने के बाद, एक नया पुष्टिकरण पृष्ठ प्रिंटआउट के लिए उपलब्ध होगा। प्रिंट लें और मूवी हॉल में प्रवेश करें (दिनांक, समय, स्थान टिकट में उल्लिखित होगा..)|| भुगतान के लिए आपको क्यूआर कोड स्कैन करना होगा (बुकिंग के दौरान उपलब्ध होगा), विवरण निर्देश बुकिंग विंडो होगा </b></p>
      </div> 
  <div class="col-6 p-4">
  <p class="bg-info text-center p-2" id="abc">
  <b><i class="fas fa-bullhorn"></i> Offer Ongoing! <i class="fas fa-bullhorn"></i></b>
  <b>
    <ul class="bg-light text-justify p-4" id="ijkl">
       <marquee direction="up" scrollamount="1.9">
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> Book Min. 3 Tickets Online & Get 2 Snacks Free of Cost<br>
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> Get Instant 50 Rs. cashback on using Paytm Wallet (First Time User)<br>
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> Get up to 30% discount on using ICICI Credit Card<br>
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> Get 5% Instant Discount on using Mobiquick Wallet<br>
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> Get 5% Instant discount on using Any Debit Card <br>
       <img src="offer.gif" style="vertical-align: middle; width: 80px; height: 60px;"> New Offer Comming Soon.. Stay Stuned..<br>
       
       
      </marquee>
    </ul>
  </b>
</p>

      </div>
    
      <div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-success text-center text-dark p-2" id="abc"><b>Admin Panel</b></p>
    </div>
      
      <div class="container-fluid" id="main">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/ticket.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-danger text-center">CRUD Movie Details</h4>
                            <p class="card-text text-primary"><b>Post/Update/Delete/View Movie Details like- Movie Name, Cost, Venue, Time & Date</b></p>
                            <a href="view_movie.php" class="btn btn-success" id="cardbutton">CRUD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/theater.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-dark text-center">See Movie Booking List</h4>
                            <p class="card-text text-primary"><b>See Movie Ticket Booking List</b></p>
                            <a href="view_booking_list.php" class="btn btn-success" id="cardbutton">Check Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="card1">
                        <img src="img/login.jpg" alt="card">
                        <div class="card-body">
                            <h4 class ="card-title text-info text-center">See Contact us, Feedback form details</h4>
                            <p class="card-text text-primary"><b>View all details submitted by users</b></p>
                            <a href="view_contact_form.php" class="btn btn-success" id="cardbutton">View  Details</a>
                        </div>
                    </div>

            </div>
      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  FAQ's 
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">FAQ|| Frequently Asked Questions for Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li> <b>How Can I View Booking List of this Site ?</b></li>
          <b>Ans.-></b> You can Easily view Booking list from Admin Panel. Just click on View Movie Booking, A new window will be aappear in the screen with all details. <br>
          <li> <b>How to Delete/Add any Movie Data?</b></li>
          <b>Ans.-></b> You can Easily Create/Insert Movie Details as well as Update and Delete Posted Details from CRUD Admin Panel. <br>
          <li> <b>Am I able to view who is submitted form of contact/query ?</b></li>
          <b>Ans.-></b> You can Easily view who is submitted form regarding Help/Query/Feedback. CLick on View FAQ, Contact form tab.(In Admin Panel.). <br>
          <li> <b>Pay Later option is available in this Version ?</b></li>
          <b>Ans.-></b> Sorry. Currently this version does not support Pay Later. Very soon we will add this option...  <br>
          <li> <b>Can I Cancel a Confirm Ticket After Booking of user?</b></li>
          <b>Ans.-></b> You can Cancel any booking information. Delete any information of booking from portal  is always lead to Cancellation.</b> <br>
      </ul>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Got It</button>
      </div>
    </div>
  </div>
</div>
<br>
    </br>
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
                    <a class="text-primary" href="admindashboard.php" ><b>Dashboard</b> <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="">
                    <a class="text-primary" href="privacypolicy.html"><b>Privacy Policy</b> </a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
      
      
<?php
?>