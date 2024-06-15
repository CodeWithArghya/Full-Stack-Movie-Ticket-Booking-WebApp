<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$name = $_SESSION["name"];
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
    $paymentname = mysqli_real_escape_string($conn, $_POST['paymentname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $ticketid = mysqli_real_escape_string($conn, $_POST['ticketid']);
    $transaction = mysqli_real_escape_string($conn, $_POST['transaction']);

    $sql = "INSERT INTO payment (paymentname, email, amount, ticketid, transaction) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssdss', $paymentname, $email, $amount, $ticketid, $transaction);
        if (mysqli_stmt_execute($stmt)) {
            
            header("Location: generate_ticket.php?payment_id=" . mysqli_insert_id($conn));
            exit();
        }
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Payment Page || Movie Website</title>
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
        <img src="img/paymentqr.jpg"
          class="img-fluid" alt="Sample image">
            <div class="d-none d-md-block">
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-container">
            <form action="payment.php" method="POST">
                <form>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Payment By:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="paymentname" placeholder="Write the Name by whome payment is done" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter an Email ID" required >
                        
                    </div>
                    <div class="mb-3">
                        <label for="amountpaid" class="form-label">Amount Paid:</label>
                        <input type="text" class="form-control" id="amount"name="amount" placeholder="Write amount Exactly showed in confirmation Page" required>
                    </div>
                    <div class="mb-3">
                        <label for="ticketid" class="form-label">Ticket ID:</label>
                        <input type="text" class="form-control" id="ticketid"name="ticketid" placeholder="Write your TICKET_ID as given in Ticket" required>
                    </div>
                    <div class="mb-3">
                        <label for="transaction" class="form-label">Payment Transaction Number:</label>
                        <input type="text" class="form-control" id="transaction"name="transaction" placeholder="Enter the UPI Transaction Number" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit Details</button>
                                        <a href="userdashboard.php" class="btn btn-danger btn-block">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="rowabout">
  <div class="col-12 p-4">
    <p class="bg-warning text-center p-2" id="abc"><b>Payment Instructions</b></p>
    <p class="bg-success text-justify p-4" id="abcd"><b> || Dear User, Scan this QR code and make payment using your UPI Like- Amazon Pay, Bharat Pay, Phonepe, Gpay, Paytm etc. Make sure to note down the UPI Transaction number, which is required to fill this payment form. After submitting all valid details a payment acknowledgement slip will be generated automatically. Take a printout of the acknowledge slip (required before entry in Moview Hall with Ticket)  || <br>   || प्रिय उपयोगकर्ता, इस क्यूआर कोड को स्कैन करें और अपने यूपीआई जैसे- अमेज़ॅन पे, भारत पे, फोनपे, जीपे, पेटीएम आदि का उपयोग करके भुगतान करें। यूपीआई लेनदेन संख्या को नोट करना सुनिश्चित करें, जो इस भुगतान फॉर्म को भरने के लिए आवश्यक है। सभी वैध विवरण जमा करने के बाद एक भुगतान पावती पर्ची स्वचालित रूप से उत्पन्न हो जाएगी। पावती पर्ची का प्रिंटआउट लें (टिकट के साथ मोव्यू हॉल में प्रवेश से पहले आवश्यक)
 ||</b></p>
      </div> 
      
      <script>
    
    window.addEventListener('load', function () {
        setTimeout(function () {
            const preloader = document.querySelector('.preloader');
            preloader.style.display = 'none';
        }, 2000); 
    });
</script>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data submitted successfully.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
