<?php
include 'config.php';
session_start(); 
$email = $_SESSION['name'];
   $quantity = $_POST['quantity'];
   $mobile = $_POST['mobile'];
   $location = $_POST['location'];
   $flavour = $_POST['flavour'];
   $amount = $_POST['amount'];

    function addToDattabase(){
        if (mysqli_query($con,"INSERT INTO orders VALUES (NULL,'$email','$quantity','$mobile','$location','Pending','$flavour',$amount) ")) {
            echo "<script>e.preventDefault(); alert('Your order is place successfully. expected delivery time is 30-40 mins');</script>";
         }else{
          echo  mysqli_error($con);
         }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./falvours.php">FLAVOURS</a>
                    </li>
                    <?php
            if (isset($_SESSION['name'])){
                        
                        echo "<li class='nav-item'>
              <a class='nav-link' href=''  data-bs-toggle='modal' data-bs-target='#orderHistory'>ORDERS</a>
            </li>";
                    
                    }
                    ?>
                </ul>
                <span class="navbar-text d-lg-flex d-md-block">
                    <div class="login d-flex justify-content-center align-items-center">
                        <div class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fa fa-user-circle"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="nav-item">
                        
                                 <?php
                            if (isset($_SESSION['name'])){

                            echo "<div class='dropdown'>
                            <button class='nav-link text dropdown-toggle' style='border: none;' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>"
                            .$_SESSION['name'].
                            "</button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                              <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                            </ul>
                          </div>";

                            }
                            else{
                            echo "<a href='login.php' class='nav-link text '>Login</a> ";
                            } ?>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </nav>
    <div class="header-address">
        <h4>
        Shop No 1, Mariplex Mall, Marigold, Near Axis Bank, Kalyani Nagar, Pune-411014 | Daily 10AM-10PM
        </h4>
    </div>
    <div class="flavour-1">
        <div class="flavour-1-2">Ice Corner</div>
        <div class="flavour-1-1">
            <div class="text-big2">CHECKOUT</div>
        </div>
    </div>
<div class="m-5 d-flex justify-content-center align-content-center">
    <div class="row w-100">
        <div class="col-lg-4 d-flex justify-content-center">
            <img src="<?php echo $_POST['image']; ?>" width=350 height=350>
       </div> 
       <div class="col-lg-8">
           <h1><?php echo $_POST['flavour']; ?></h1>
                <P><h5>Quantity: <span class="remove-weight"><?php echo $_POST['quantity']; ?></span></h5></P>
           
                <P><h5>Amount: <span class="remove-weight">RS.<?php echo $_POST['amount']; ?></span></h5></P>
           
                <P><h5>Deliver To: <span class="remove-weight"><?php echo $email; ?></span></h5></P>
           
                <P><h5>Phone: <span class="remove-weight"><?php echo $_POST['mobile']; ?></span></h5></P>
           
                <P><h5>Delivery Map Link:</h5></P>
                <p style="word-wrap: break-word"> <?php echo $_POST['location']; ?></P>                
           
        
           <button id="rzp-button1" class="btn btn-dark">Pay Rs.<?php echo $_POST['amount']; ?></button>
        </div>
        </div>
    </div>
</div>
<form method="POST" action="index.php" id="myForm">
    <input type="hidden" name="mobile" value="<?php echo $_POST['mobile']; ?>">
    <input type="hidden" name="quantity" value="<?php echo $_POST['quantity']; ?>">
    <input type="hidden" name="location" value="<?php echo $_POST['location']; ?>">
    <input type="hidden" name="flavour" value="<?php echo $_POST['flavour']; ?>">
    <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
</form>
<div class="footer">
        <div class="row">
            <div class="address col-md-6 col-sm-12 col-12">
            Shop No 1, Mariplex Mall,<br>Marigold, Near Axis Bank,<br>Kalyani Nagar, Pune-411014<br />
                +91 9836452618           </div>
            <div class="social col-sm-12 col-md-6 col-12">
                Social
                <div class="row">
                    <div>
                        <a href="http://"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                    </div>
                    <div>
                        <a href="http://"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    </div>
                    <div>
                        <a href="http://"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">&copy; Group 13</div>
    </div>
<script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
    "key": "rzp_test_tfgODImdrg43wj", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $_POST['amount']; ?>00", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Ice Cream",
    "description": "Test Transaction",
    "handler": function (response){
        document.getElementById("myForm").submit();
        mail("someone@example.com","My subject",$msg);
    },
    "prefill": {
        "name": "Suyash Nehete",
        "email": "suyashnehete78@gmail.com",
        "contact": "9834147148"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#212529"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
    </script>
</body>
</html>
