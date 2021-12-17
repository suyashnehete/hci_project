<?php 
 include 'config.php';
 session_start();
 $email = $_SESSION['name'];
 if (isset($_POST['btn_order'])) {
   $quantity = $_POST['quantity'];
   $mobile = $_POST['mobile'];
   $location = $_POST['location'];
   $flavour = $_POST['flavour'];
   if (mysqli_query($con,"INSERT INTO orders VALUES (NULL,'$email','$quantity','$mobile','$location','Pending','$flavour') ")) {
      echo "<script>alert('Your order is place successfully. expected delivery time is 30-40 mins');</script>";
   }else{
    echo  mysqli_error($con);
   }
 }
?>

<!DOCTYPE html>
<html lang="en">

<script>
    var flavourName = "";
    var flavourImage = "";
    var flavourAmount = "";
    function setFlavour(flavour){
        console.log(flavour)
        flavourName = flavour.replace("&nbsp;", " ").split("!")[0];
        flavourImage = flavour.replace("&nbsp;", " ").split("!")[1];
        flavourAmount = flavour.replace("&nbsp;", " ").split("!")[2];
        console.log(flavourName);
        console.log(flavourImage);
        console.log(flavourAmount);
        getFlavour();
    }

    function getFlavour(){
        document.getElementById("hidden").value = flavourName;
        document.getElementById("hidden1").value = flavourImage;
        document.getElementById("hidden2").value = flavourAmount;
        console.log(flavourName);
        console.log(flavourImage);
        console.log(flavourAmount);
    }
</script>

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
                        <a class="nav-link active" aria-current="page" href="./falvours.php">FLAVOURS</a>
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
            <div class="text-big1">OUR</div>
            <div class="text-big2">FLAVOURS</div>
        </div>
    </div>
    <div class="flavour-2 d-flex justify-content-center align-items-center flex-column">
        <div class="text1">ICE CREAM FLAVOUR</div>
        <div class="dash"></div>
        <div class="data d-flex justify-content-center align-items-center flex-wrap">
            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file.webp" alt="" srcset="">
                <div class="text2">OREO</div>
                <div class="dash1"></div>
                <p>Oreo ice cream is a flavor of ice cream made with oreo or oreo flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("OREO!./img/file.webp!60")>Buy Now</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file1.webp" alt="" srcset="">
                <div class="text2">CHOCOLATE & SEA SALT</div>
                <div class="dash1"></div>
                <p>Chocolate & Sea Salt ice cream is a flavor of ice cream made with chocolate or chocolate flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("CHOCOLATE&nbsp;&&nbsp;SEA&nbsp;SALT!./img/file1.webp!60",)>Buy Now</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file2.webp" alt="" srcset="">
                <div class="text2">VANILLA STRABERRY</div>
                <div class="dash1"></div>
                <p>Vanilla strawberry ice cream is a flavor of ice cream made with strawberry or strawberry flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("VANILLA&nbsp;STRABERRY!./img/file2.webp!60")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file3.webp" alt="" srcset="">
                <div class="text2">CHERRY CHEESECAKE</div>
                <div class="dash1"></div>
                <p>Cherry Cheesecake ice cream is a flavor of ice cream made with cherry or cherry flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("CHERRY&nbsp;CHEESECAKE!./img/file3.webp!60")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file4.webp" alt="" srcset="">
                <div class="text2">PISTACHIO</div>
                <div class="dash1"></div>
                <p>Pistachio ice cream is a flavor of ice cream made with pistachio or pistachio flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("PISTACHIO!./img/file4.webp!60")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file5.webp" alt="" srcset="">
                <div class="text2">HAZELNUT & COOKIES</div>
                <div class="dash1"></div>
                <p>Hazlenuts & cookies ice cream is a flavor of ice cream made with hazlenuts or hazlenuts flavoring. </p>
                <div class="text2">Rs. 60</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("HAZELNUT&nbsp;&&nbsp;COOKIES!./img/file5.webp!60")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file6.webp" alt="" srcset="">
                <div class="text2">SALTED CARAMEL SOY</div>
                <div class="dash1"></div>
                <p>Salted caramel soy ice cream is a flavor of ice cream made with caramel or caramel flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("SALTED&nbsp;CARAMEL&nbsp;SOY!./img/file6.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file7.webp" alt="" srcset="">
                <div class="text2">BRAMBLEBERRY SORBET</div>
                <div class="dash1"></div>
                <p>Brambleberry sorbet ice cream is a flavor of ice cream made with brambleberry or brambleberry flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("BRAMBLEBERRY&nbsp;SORBET!./img/file7.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file8.webp" alt="" srcset="">
                <div class="text2">BANANA & HONEY</div>
                <div class="dash1"></div>
                <p>Banana and honey ice cream is a flavor of ice cream made with banana and honey or banana and honey flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("BANANA&nbsp;&&nbsp;HONEY!./img/file8.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file9.webp" alt="" srcset="">
                <div class="text2">RASPBERRY SORBET</div>
                <div class="dash1"></div>
                <p>Raspberry sorbet ice cream is a flavor of ice cream made with raspberry or raspberry flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("RASPBERRY&nbsp;SORBET!./img/file9.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file10.webp" alt="" srcset="">
                <div class="text2">STRAWBERRY & COCONUT</div>
                <div class="dash1"></div>
                <p>Strawberry and coconut ice cream is a flavor of ice cream made with strawberry and coconut or strawberry and coconut flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("STRAWBERRY&nbsp;&&nbsp;COCONUT!./img/file10.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            <div class="item d-flex justify-content-center align-items-center flex-column">
                <img src="./img/file11.webp" alt="" srcset="">
                <div class="text2">LIME SORBET</div>
                <div class="dash1"></div>
                <p>Lime sorbet ice cream is a flavor of ice cream made with lime or limw flavoring. </p>
                <div class="text2">Rs. 100</div>

                <?php 
                       if (isset($_SESSION['name'])){
                        
                          echo ' <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal" onclick=setFlavour("LIME&nbsp;SORBET!./img/file11.webp!100")>
Buy Now
</button>';
                      }
                      else{
                        echo "<a href='login.php'  class='nav-link text'>Need to Login</a> ";
                      }  ?>


            </div>

            
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="checkout.php">
                        <div class="mb-3">
                            <fieldset disabled>
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required name="email" value="<?php echo $email; ?>">
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" required
                                name="quantity" min="1" max="100">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="mobile"
                                min="10" max="10" required>
                        </div>
                        <input type="hidden" class="form-control" id="hidden" required name="flavour">
                        <input type="hidden" class="form-control" id="hidden1" required name="image">
                        <input type="hidden" class="form-control" id="hidden2" required name="amount">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Please Enter Your Google Map Location
                                Link</label>
                            <input type="url" class="form-control" id="exampleInputPassword1" required name="location"
                                min="10" max="10" required>
                        </div>

                        <button type="submit" class="btn btn-dark" name="btn_order">Place Order</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
        <div class="modal fade" id="ordezxrHistory" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                                    <th scope="row"><?php echo $count; ?></th>
                                    <td><?php echo $data['iname'] ?></td>
                                    <td><?php echo $data['quantity'] ?></td>
                                    <td><?php echo $data['status'] ?></td>
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
                        <a href="" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="window.open('logout.php','_self')">Logout</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- this modal is for order history -->
    <div class="modal fade" id="orderHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
</body>

</html>