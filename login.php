<?php

include 'loginphp.php';
include 'signupphp.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="icon" href="https://static.thenounproject.com/png/423483-200.png" type="image/x-icon">
  </head>
  <body>
    <div class="head">
      <div class="navbar">
        <div class="logo">
          <marquee direction=""><!-- for floating right to left -->
          <?php include 'logo.php'; ?>
          </marquee>
        </div>
        <nav>
          <?php include 'nav.php'; ?>
        </nav>
        <?php include 'cartcount.php'; ?>
        <img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
      </div>
  </div>
    <div class="hero">
      <div class="form-box">
        <div class="button-box">
          <div id="btn"></div>
          <button type="button" name="button" class="toggle-btn" onclick="login()">Log In</button>
          <button type="button" name="button" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <div class="social-icons">
          <img src="login-reg-img/fb.png" alt="error">
          <img src="login-reg-img/tw.png" alt="error">
          <img src="login-reg-img/gp.png" alt="error">
        </div>
        <form id="login" class="input-group" action="login.php" method="post">
          <input type="text" class="input-field" name="userid1" value="" placeholder="Enter Email Id">
          <input type="password" class="input-field" name="password1" value="" placeholder="Enter password">
          <!-- <input type="checkbox" class="check-box" name="" value=""> <span>Remember Password</span> -->
          <br><br><br><br>
          <input type="submit" class="submit-btn" name="login" value="Log In">
        </form>
        <form id="register" class="input-group" action="login.php" method="post">
          <input type="text" class="input-field" name="userid" placeholder="Enter username" required>
          <input type="email" class="input-field" name="email" placeholder="Email Id" required>
          <input type="password" class="input-field" name="password" placeholder="Enter password" required>
          <input type="checkbox" class="check-box"> <span>I agree to the terms and conditions</span>
          <button type="submit" class="submit-btn" name="register">Register</button>
        </form>
      </div>
    </div>

    <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("btn");

      function register(){
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }

      function login(){
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
      }
    </script>

    <!-- -------------js for toggle menu ---------------- -->

    <script type="text/javascript">
      var m = document.getElementById("menuitems");

      m.style.maxHeight = "0px";
      //object.style.maxHeight -syntax
      // maxheight has effect only elements with absoluqte or fixed pos. the height of the element can never be greater than the value specified by maxheight
    // to set min height we have minHeight
      function menutoggle(){
        if (menuitems.style.maxHeight == "0px")
        {
          menuitems.style.maxHeight = "200px";
        }
        else {
          menuitems.style.maxHeight = "0px";
        }
      }
    </script>


    <!-- -------------js for toggle menu ---------------- -->

    <script type="text/javascript">
      var m = document.getElementById("menuitems");

      m.style.maxHeight = "0px";
      //object.style.maxHeight -syntax
      // maxheight has effect only elements with absoluqte or fixed pos. the height of the element can never be greater than the value specified by maxheight
    // to set min height we have minHeight
      function menutoggle(){
        if (menuitems.style.maxHeight == "0px")
        {
          menuitems.style.maxHeight = "200px";
        }
        else {
          menuitems.style.maxHeight = "0px";
        }
      }
    </script>
      </body>
    </html>
