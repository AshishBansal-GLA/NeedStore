<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <!-- for responsive website we have to use meta tag like this  -->
    <title>RedStore Products</title>
    <link rel="stylesheet" href="productpage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="https://static.thenounproject.com/png/423483-200.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
  <style>
  .active{
    background: blue;
  }
  </style>
  </head>
  <body>
    <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <marquee direction="">
          <?php include 'logo.php'; ?>
          </marquee>
        </div>
        <nav>
          <?php include 'nav.php'; ?>
        </nav>
      <?php include 'cartcount.php'; ?>
        <img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
      </div>

      <!-- All products -->
      <div class="small_container">
        <div class="row row_2">
           <h2>All Products</h2>
           <form method="get">
           <section>
           <select name='catt' onchange="this.form.submit()">
           <option selected disabled>
           Category
           </option>
           <option value="0">
           ALL items
           </option>
           <option value="1">
           T-shirts
           </option>
           <option value="5">
           Foods
           </option>
           <option value="3">
           Pants
           </option>
           <option value="4">
           Socks
           </option>
           <option value="2">
           Gym
           </option>
           <option value="7">
           Watch
           </option>
           </select>
           </section>
           </form>
        </div>
         <div class="row">
           <?php
           include 'addtocart.php';
           $limit_per_page = 12;
           if(!isset($_GET['page']))
           {
             $page = 1;
           }
           else{
             $page = $_GET['page'];
           }
           $offset = ($page-1)*$limit_per_page;
           
           if(isset($_GET['catt']))
           {
             $cat = $_GET['catt'];
             $sql = "SELECT * from products  where product_cat='$cat' limit $offset, $limit_per_page";
              if($cat == 0)
              {
                $sql = "SELECT * FROM products limit $offset, $limit_per_page";
              }
             $result = mysqli_query($connect, $sql);
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
               <input  type='submit' class='add-to-cart' name='cart1' value='Add to cart'>
               <button type='button' class='add-to-cart'><a href ='payment.php'>Buy Now</a></button>
            </div></form>
            ";}
            
            ?>
            <?php 
            $sql = "SELECT * from products  where product_cat='$cat'";
            if($cat==0)
            {
              $sql = "SELECT * from products";
            }
             $r = mysqli_query($connect,$sql);
             $total_records = mysqli_num_rows($r);
            $total_pages = ceil($total_records/$limit_per_page);

            ?>
            <form method="get">
         <div class="page_btn " name="page">
            <?php 
            for($i = 1; $i<=$total_pages;$i++)
            {
              if($i==$page)
              {
                $class = "active";
              }
              else{
                $class = "";
              }
              echo '<a href="productpage1.php?page='.$i.'"><span>'.$i.'</span></a>';
            }
            ?>
         </div>
            </form>
            <?php
          }
           else{
            $sql = "SELECT * FROM products limit $offset, $limit_per_page";
            $result = mysqli_query($connect, $sql);
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
               <input  type='submit' class='add-to-cart' name='cart1' value='Add to cart'>
               <button type='button' class='add-to-cart'><a href ='payment.php'>Buy Now</a></button>
            </div></form>
            ";}
            ?><?php
            $s = "SELECT * from products";
            $r = mysqli_query($connect,$s);
            $total_records = mysqli_num_rows($r);
            $total_pages = ceil($total_records/$limit_per_page);
            ?>
            <form method="get">
         <div class="page_btn " name="page">
            <?php 
            for($i = 1; $i<=$total_pages;$i++)
            {
              if($i==$page)
              {
                $class = "active";
              }
              else{
                $class = "";
              }
              echo '<a href="productpage1.php?page='.$i.'"><span>'.$i.'</span></a>';
            }
            ?>
         </div>
            </form>
            <?php
            }?>
           
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
