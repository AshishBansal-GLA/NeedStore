!
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact us</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0 "> -->
    <link rel="stylesheet" href="contactstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="https://static.thenounproject.com/png/423483-200.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
        <marquee direction=""><!-- for floating right to left -->
          <a href="index.php" ><img src="images/logo.png" width="125px" alt="no"></a>
        </marquee>
      </div>
      <nav>
      <?php include 'nav.php'; ?>
      </nav>
      <a href="#"><img src="images/cart.png" alt="" width="30px" height="30px"></a>
      <img src="images/menu.png" class="menu-icon" alt="no image" onclick="menutoggle()">
    </div>
    <div class="container">
      <h1>Connect with Us</h1>
      <p>We would love to respond to your queries and help you succeed. <br>Feel
      free to get in touch with us.</p>
      <div class="box">
        <div class="contact-left">
          <h3>Send your request</h3>
          <form action="contact.php" method="post" onsubmit="return val()">
            <div class="input-row">
              <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter your name" required>
              </div>
              <div class="input-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" placeholder="Enter phone number" minlength="10" maxlength="10" required>
              </div>
            </div>
            <div class="input-row">
              <div class="input-group">
                <label for="email">Email:</label>
                  <input type="email" name="email" id="email" placeholder="contactus@example.com" required >
              </div>
              <div class="input-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" placeholder="Enter Subject" >
              </div>
            </div>
            <label for="message">Message</label>
            <textarea name="message" rows="8" cols="80" id="message" placeholder="Your Message" required></textarea>

            <button class="btn" type="submit" name="send">Send</button>
          </form>
        </div>
        <div class="contact-right">
          <h3>Reach Us</h3>
          <table>
            <tr>
              <td>Email</td>
              <td>contactus@example.com</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td>+91 8954840635<br>
              +91 9837180269 <br>
              +91 9675814273</td>
            </tr>
            <tr>
              <td>Address</td>
              <td>17km Stone,NH-2,Mathura-Delhi Road Mathura, <br>
              Chaumuhan,uttar Pradesh,281406<br>
            </td>
            </tr>

          </table>
        </div>
      </div>
    </div>

    <!-- -------------js for toggle menu ---------------- -->

<script type="text/javascript">
function val()
{
  var c = document.getElementById('phone').value;
  if(isNaN(c))
  {
    alert('please check phone number');
    document.getElementById('phone').focus();
    return false;
  }
}
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
<?php 
include 'connect.php';
if(isset($_POST['send']))
{

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql = "INSERT INTO contact values(NULL,'$name',$phone,'$email','$subject','$message')";
  $result = mysqli_query($connect, $sql);
  if($result)
  {
    echo "<script>alert('Great!!! We will contact you soon');</script>";
    header('location: index.php');
  }
  
}

?>