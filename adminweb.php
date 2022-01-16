<?php
include 'adminsession.php';
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
  <!-- for responsive website we have to use meta tag like this  -->
  <title>RedStore</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
  <link rel="icon" href="https://static.thenounproject.com/png/423483-200.png" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <marquee direction=""><!-- for floating right to left -->
            <?php include 'logo.php'; ?>
          </marquee>
        </div>
        <nav>
          <?php include 'adminnav.php'; ?>
        </nav>
        <img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
      </div>

      <!--single  product details -->
      <div class="row">
        <div class="col-2">
          <h1>Give Your Workout <br>A New  Style!</h1>
          <p>
            Success isn't always about greatness.It's about
            consistency. Consistent <br>hard work gains success. Greatness will come.</p>
            <a href="productpage1.php" class="btn"> Explore Now &#8594;</a>
            <!-- for icon &$8594 -->
          </div>
          <div class="col-2">
            <img  src="images/image1.png" alt="error" >
          </div>
        </div>
      </div>
    </div>
    <!-- features categories -->
    <div class="categories">
      <div class="small-container">
        <div class="row">
          <?php
          $sql = "SELECT * from category";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result))
          {
            $image = $row['image'];
            echo "
            <div class='col-3'>
            <img src='images/$image'>
            </div>
            ";}
            ?>
          </div>
        </div>
      </div>


      <!-- features products -->

      <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="wrapper"></div>
        <span><i class="shopping-cart"></i></span>
        <div class="clear"></div>
        <div class="row">

          <?php
          include 'itemdelete.php';
          $sql = "SELECT * from products order by product_id limit 0,8";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result))
          {
            $image = $row['image'];
            $name = $row['product_name'];
            $price = $row['price'];
            $id = $row['product_id'];
            echo "
            <div class='col-4'>
            <form action='adminweb.php' method='post' enctype='multipart/form-data'>

            <img src='images/$image'>
            <textarea name='cartid' hidden> $id </textarea>
            <h4>$name</h4>
            <p>Rs. $price</p>
            <input type = 'submit' class='add-to-cart' name='buttonremove' value='Delete'>
            </form>
            </div>

            ";
          }
          ?>
        </div>
        <!-- latest products -->

        <!-- <textarea name="name" rows="8" cols="80" hidden></textarea> -->
        <h2 class="title">Latest Products</h2>
        <div class="row">
          <?php
          $sql = "SELECT * from products  order by product_id limit 8,8";
          $result = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result))
          {
            $image = $row['image'];
            $name = $row['product_name'];
            $price = $row['price'];
            $id = $row['product_id'];
            echo "
            <div class='col-4'>
            <form method='post' action='adminweb.php'  enctype='multipart/form-data'>
            <img src='images/$image'>
            <h4>$name</h4>
            <textarea name='cartid' hidden> $id </textarea>
            <p>Rs. $price </p>
            <input type = 'submit' class='add-to-cart' name='buttonremove' value='Delete'>
           
            </form>
            </div>
            ";
          }
          ?>
        </div>
      </div>


      <!-- offers -->

      <div class="offer">
        <div class="small-container">
          <div class="row">
            <div class="col-2">
              <img src="images/exclusive.png" class="offer-img">
            </div>
            <div class="col-2">
              <p>Exculsively Availabe on RedStore</p>
              <h1>Smart Band 4</h1>

              <small>The Mi Smart band 4 features a 39.9% larger(than Mi band 3) AMOLED color full-touch
                display with adjustable brightness,so everything is clear as can be.</small>
              </div>
            </div>
          </div>
        </div>

        <!-- testimonial -->

        <div class="testimonial">
          <div class="small-container">
            <div class="row">
              <?php
              $sql = "SELECT * from testimonial";
              $result = mysqli_query($connect, $sql);
              while($row = mysqli_fetch_array($result))
              {
                $image = $row['image'];
                $about = $row['about'];
                $name = $row['name'];
                echo "
                <div class='col-3'>
                <i class='fa fa-quote-left'></i><br>
                <center>$about</center>
                <img src='images/$image'>
                <h3>$name</h3>
                </div>
                ";
              }
              ?>
            </div>
          </div>
        </div>

        <!-- brands -->

        <div class="brands">
          <div class="small-container">
            <div class="row">
              <?php
              $sql = "SELECT * from logo";
              $result = mysqli_query($connect, $sql);
              while($row = mysqli_fetch_array($result))
              {
                $image = $row['image'];
                echo "
                <div class='col-5'>
                <img src='images/$image'>
                </div>
                ";
              }
              ?>
            </div>
          </div>
        </div>

        <!--footer---------->

        <div class="footer">
          <div class="container">
            <div class="row">
              <div class="footer-col-1">
                <h3>Download our App</h3>
                <p>Download App for Android and ios moblie phone.</p>
                <div class="app-logo">
                  <a href="#"><img src="images/play-store.png" alt=""></a>
                  <a href="#"><img src="images/app-store.png" alt=""></a>
                </div>
              </div>
              <div class="footer-col-2">
                <img src="logo.png" alt="">
                <p>Our Purpose to Sustainably Make the Pleasure and
                  Benefts of Sports Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                  <h3>Useful Links  </h3>
                  <ul>
                    <a href="#"><li>Coupons</li></a>
                    <a href="#"><li>Blog Post</li></a>
                    <a href="#"><li>Return Policy</li></a>
                    <a href="#"><li>Coupons</li></a>
                    <a href="#"><li>Join Affiliate</li></a>
                  </ul>
                </div>
                <div class="footer-col-4">
                  <h3>  Follow us</h3>
                  <ul>
                    <a href="#"><li>Facebook</li></a>
                    <a href="#"><li>twitter</li></a>
                    <a href="#"><li>Instagram</li></a>
                    <a href="#"><li>YouTube</li></a>
                  </ul>
                </div>
              </div>
              <hr>
              <!-- hr for horizontal line  -->
              <p class="copyright">Copyright 2021</p>
            </div>
          </div>

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
