<?php include 'connect.php'; include 'adminsession.php'; include 'additem.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <!-- for responsive website we have to use meta tag like this  -->
    <title>RedStore admin Products</title>
    <link rel="stylesheet" href="productpage.css">
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
          <img src="images/logo.png" width="125px" alt="">
          </marquee>
        </div>
        <nav>
          <?php include 'adminnav.php'; ?>
        </nav>
        <img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
      </div>

      <!-- All products -->
      <div class="small_container">
        <div class="row row_2">
           <h2>All Products</h2>
        </div>
         <div class="row">
         <?php
         include 'connect.php';
include 'itemdelete.php';
$limit_per_page = 8;
if(!isset($_GET['page']))
{
  $page = 1;
}
else{
  $page = $_GET['page'];
}
$offset = ($page-1)*$limit_per_page;
$sql = "SELECT * FROM products limit $offset, $limit_per_page";
$result = mysqli_query($connect, $sql);
$s = "SELECT * from products";
$r = mysqli_query($connect,$s);
$total_records = mysqli_num_rows($r);
$total_pages = ceil($total_records/$limit_per_page);
while($row = mysqli_fetch_array($result))
{
  $image = $row['image'];
  $name = $row['product_name'];
  $price = $row['price'];
  $id = $row['product_id'];
  echo "
 <div class='col4'>
   <form method='post' enctype='multipart/form-data'>
    <img src='images/$image'>
    <h4>$name</h4>
    <p>Rs.$price</p>
    <textarea name='cartid' hidden> $id </textarea>
    <input type = 'submit' class='add-to-cart' name='buttonremove' value='Delete'>
 </div></form>
 ";
 }
 ?>

<form method="get">
<div class="page_btn " name="page">
   <?php 
   for($i = 1; $i<=$total_pages;$i++)
   {
     echo '<a href="product1admin.php?page='.$i.'"><span>'.$i.'</span></a>';
   }
   ?>
</div>
   </form>
   <div>
   
            <?php include 'a.php'; ?>
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
              <img src="images/logo.png" alt="">
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
