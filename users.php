<!DOCTYPE html>
<html>
<head>
	<title>cart item details</title>
	<link rel="stylesheet" type="text/css" href="order.css">
	<link rel="stylesheet" href="style.css">
	<script src="bootstrap.js"></script>

<body>
	<div class="navbar" style="width:100%;">
		<div class="logo">
			<marquee direction=""><!-- for floating right to left -->
				<?php include 'logo.php'; ?>
			</marquee>
		</div>
		<nav>
			<?php include 'adminnav.php'; ?>
		</nav>
		<?php include 'cartcount.php'; ?>
		<img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()"></div>
        <div class="cart-name">
	<table>
		<tr>

		<th style="width: 15%; padding-left:16px;">ID</th>
		<th style="width: 40%">Name</th>
		<th style="width: 40%">Email</th>
        </tr>
        <?php 
        
        include 'connect.php';
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);
        if($result)
        {
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>
                <td style='padding-left: 16px;'>$row[ID]</td>
                <td> $row[userid] </td>
                <td style='text-align: left;'>$row[email]</td>
                </tr>";
            }
        }

        ?>
    </table>
    <?php 
    
    if(mysqli_num_rows($result)>5)
            {

                echo '<div class="footer" style=" width: 100%">
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
                ';
            }
            else
            {
                echo '
                <div class="footer" style="position: fixed; bottom:0px; width: 100%">
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
          </div>';
            }
    ?>

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
        
		