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
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img src="<?php echo $_POST['image']; ?>" height="250px" width="250px">
       </div> 
       <div class="col-sm-6">
           <h1><?php echo $_POST['flavour']; ?></h1>
           <div class="row">
                <P><h5>Quantity: <?php echo $_POST['quantity']; ?></h5></P>
           </div>
           <div class="row">
                <P><h5>Amount: RS.<?php echo $_POST['amount']; ?></h5></P>
           </div>
           <div class="row">
                <P><h5>Deliver To: <?php echo $email; ?></h5></P>
           </div>
           <div class="row">
                <P><h5>Phone: <?php echo $_POST['mobile']; ?></h5></P>
           </div>
           <div class="row">
                <P><h5>Delivery Map Link:</h5></P>
                <p> <?php echo $_POST['location']; ?></P>                
           </div> 
           <div class="row">
                <p></P>
           </div>  
           <div class="row">
           <button id="rzp-button1">Pay Rs.<?php echo $_POST['amount']; ?></button>
           </div> 
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
<script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        console.log("<?php echo $_POST['amodfunt']; ?>");
        var options = {
    "key": "rzp_test_tfgODImdrg43wj", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $_POST['amount']; ?>00", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Ice Cream",
    "description": "Test Transaction",
    "handler": function (response){
        document.getElementById("myForm").submit();
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
        "color": "#3399cc"
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
