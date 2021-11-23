<?php 
//warning !! this project does not follow secure code don't use it for commercial purpose this is just "karaycha ahe mahun kela ahe "
  include 'config.php';
  if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($check_user =mysqli_query($con,"SELECT * FROM users WHERE email= '$email' AND password='$password' ")) {
      if (mysqli_num_rows($check_user)==1) {
        header('location:./');
        session_start();
        $_SESSION['name']=$email;
      }else{
        echo "<script>alert('Invalid Details');</script>";
      }
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
      <div class="container">
          <div class="login">
            <div class="cross">&times;</div>
            <div class="data d-flex justify-content-center align-items-center flex-column">
                <div class="text1 mt-5">LOG IN</div>
                <div class="text2 mt-5">New to this site? <a href="signup.php"><span class="golden">Sign Up</span></a></div>
                <div class="social-btn mt-4" style="background-color: blue;">
                    <div class="icon"><i class="fab fa-facebook-f"></i></div>
                    <div class="text">Facebook</div>
                </div>
                <div class="social-btn mt-3" style="background-color: royalblue;">
                    <div class="icon" style="color: royalblue;"><i class="fab fa-google"></i></div>
                    <div class="text">Google</div>
                </div>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <div class="dash me-3"></div>
                    <div class="text3">or</div>
                    <div class="dash ms-3"></div>
                </div>
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
Login with Email
</button>
            </div>
          </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required name="password">
  </div>
 
  <button type="submit" class="btn btn-dark" name="btn_login">Login</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
      <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/all.min.js"></script>
  </body>
</html>
