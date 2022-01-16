<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>


    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">


    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="sign-in">

    <div class="container">
      
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                <a href="ind1.php" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Sign in</h2>
                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

<?php

$conn = mysqli_connect('localhost', 'ashish', 'ashish', 'website');
if (isset($_REQUEST['signin'])) {
  $username = $_POST['your_name'];
  $password = $_POST['your_pass'];

  $sql = "select 'email', 'password' from signup where email='$username' and password = '$password' limit=1";
   $conn->query($sql);
  if($sql)
  {
    $a=  "select * from signup where email='$username' and password = '$password' limit=1";
    $r = mysqli_query($conn, $a);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $count = mysqli_num_rows($r);
    if($count == 1){
            echo "<h1><center> Login successful </center></h1>";
       }
      else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
      }

  }
}

?>
