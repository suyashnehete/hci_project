<?php
include 'config.php';
session_start(); 
$email = $_SESSION['name'];
   $quantity = $_POST['quantity'];
   $mobile = $_POST['mobile'];
   $location = $_POST['location'];
   $flavour = $_POST['flavour'];
   $amount = $_POST['amount'];

  if($quantity!=''){
    if (mysqli_query($con,"INSERT INTO orders VALUES (NULL,'$email','$quantity','$mobile','$location','Completed','$flavour','$amount') ")) {
      echo "<script>alert('Your order is place successfully. expected delivery time is 30-40 mins');</script>";
         }else{
          echo  mysqli_error($con);
         }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ice Cream Palour</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./falvours.php">FLAVOURS</a>
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
                <a class="nav-link" href="#"
                  ><i class="fa fa-user-circle" aria-hidden="true"></i
                ></a>
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
       <!--      <div class="social d-flex  justify-content-center align-items-center">
              <div class="nav-item">
                <a class="nav-link" href="#"
                  ><i class="fab fa-facebook-f" aria-hidden="true"></i
                ></a>
                  </div>
              <div class="nav-item">
                <a class="nav-link" href="#"
                  ><i class="fab fa-twitter" aria-hidden="true"></i
                ></a>
                  </div>
              <div class="nav-item">
                <a class="nav-link" href="#"
                  ><i class="fab fa-instagram" aria-hidden="true"></i
                ></a>
                  </div>
            </div> -->
          </span>
        </div>
      </div>
    </nav>
    <div class="header-address">
      <h4>
      Shop No 1, Mariplex Mall, Marigold, Near Axis Bank, Kalyani Nagar, Pune-411014 | Daily 10AM-10PM
      </h4>
    </div>
    <div class="header-1">
      <div class="header-1-2">Ice Corner</div>
      <div class="header-1-1">
        <div class="text-big1">HAND CRAFTED</div>
        <div class="text-big2">ICE CREAM</div>
        <a href="./falvours.php"><div class="btn">MENU</div></a>
      </div>
    </div>
    <div class="header-2">
      <div class="row">
        <div class="ice col-lg-6 col-md-12">
          <img src="./img/ice-cream2.webp" alt="" srcset="" />
        </div>
        <div class="ice1 col-lg-6 col-md-12">
          <div class="ice2">
            <div class="text1">OUR FLAVORS</div>
            <div class="text2">Fresh n Tasty!</div>
            <p>
            Rich and luscious in nature with extraordinary inclusions, Treat scoops are our special range that are made so that you can indulge a bit more. We try to add a special touch to your happiness with our specially prepared range of novelties.
            </p>
            <a href="./falvours.php"><div class="btn">MENU</div></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-3">
      <div class="text1">ENJOY</div>
      <div class="text2">DAIRY FREE</div>
      <a href="./falvours.php"><div class="btn">MENU</div></a>
    </div>
    <div class="header-4">
      <div class="row">
        <div class="ice1 col-lg-6 col-md-12">
          <div class="ice2">
            <div class="text1">OUR PLACE</div>
            <div class="text2">Ice cream by the sea</div>
            <p>
            Weddings, birthdays, anniversaries, or any get-together; memorable occasions deserve mouth-watering flavours. So, place a Party Order, and we’ll bring to the bowl a variety of ice cream flavours that compliments every event. Ice Corner adds MORE scoops of sweetness to all your celebrations.
            </p>
            <a href="./falvours.php"><div class="btn">MENU</div></a>
          </div>
        </div>
        <div class="ice col-lg-6 col-md-12">
          <img src="./img/ice-cream4.webp" alt="" srcset="" />
        </div>
      </div>
    </div>
    <div class="header-5">
      <div class="text1">GET YOURS</div>
      <div class="text2">WE DELIVER</div>
      <div class="btn">ORDER ONLINE</div>
    </div>
    <div class="header-2">
      <div class="row">
        <div class="ice col-lg-6 col-md-12">
          <img src="./img/ice-cream6.webp" alt="" srcset="" />
        </div>
        <div class="ice1 col-lg-6 col-md-12">
          <div class="ice2">
            <div class="text1">DESSERTS</div>
            <div class="text2">Ice cream goodies</div>
            <p>
            With their tangy, tantalizing and yummy taste, they are relished by young as well as the old. Treat an impressive range of more than 10 lip-smacking flavours. The wide ranges of sundaes are topped with tempting ripples and fresh ingredients which makes eating them a heavenly experience.
            </p>
            <a href="./falvours.php"><div class="btn">MENU</div></a>
          </div>
        </div>
      </div>
    </div>
    <div class="header-6">
      <div class="header-6-1">#DOUBLE TAP</div>
      <img src="./img/ice-cream7.webp" alt="" srcset="" />
    </div>
    <div class="header-7">
      <div class="img-wrap">
        <img src="./img/01.jpg" />
        <div class="description">#OREO</div>
      </div>
      <div class="img-wrap">
        <img src="./img/02.jpg" />
        <div class="description">#CHOCOLATE & SEA SALT</div>
      </div>
      <div class="img-wrap">
        <img src="./img/03.jpg" />
        <div class="description">#VANILLA STRABERRY</div>
      </div>
      <div class="img-wrap">
        <img src="./img/04.jpg" />
        <div class="description">#CHERRY CHEESECAKE</div>
      </div>
    </div>
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
      <!-- this modal is for order history -->
        <div class="modal fade w-70" id="orderHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">Order History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-dark">
     <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count=0;
    include 'config.php';
    $email = $_SESSION['name'];
    if ($result =mysqli_query($con,"SELECT * FROM orders WHERE email = '$email' ")) {
      if ($row = mysqli_num_rows($result)>0) {
        while ($data =mysqli_fetch_assoc($result)) {
          $count++;
          ?>
           <tr>
           <form method="POST" action="checkout.php">
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $data['iname'] ?></td>
      <td><?php echo $data['quantity'] ?></td>
      <td><?php echo $data['status'] ?></td>
      <input type="hidden" name="mobile" value="<?php echo $data['mobile']; ?>">
    <input type="hidden" name="quantity" value="<?php echo $data['quantity']; ?>">
    <input type="hidden" name="location" value="<?php echo $data['location']; ?>">
    <input type="hidden" name="flavour" value="<?php echo $data['iname']; ?>">
    <input type="hidden" name="amount" value="<?php echo $data['payment']; ?>">
    <input type="hidden" name="image" value="./img/file.webp">
      <td><button type="submit" class="btn btn-dark" name="btn_order">REORDER</button></td>
        </form>
    </tr>
        <?php 
      }
      }
    }
    ?>
 
    
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
  </body>
</html>

