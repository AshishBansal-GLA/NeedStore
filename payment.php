<?php
include 'logincheck.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="payment.css">
    <link rel="icon" href="https://static.thenounproject.com/png/423483-200.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  </head>
  <body>
  
    <form action="payment.php" method="post" onsubmit="return check()">
      <h1>Payment </h1>
      <label for="cardnum">Card Number</label><br>
      <input class="box1" type="text" name="number" id="number" placeholder="1234 1234 1234 1234" maxlength="16" minlength="16"><br>
      <div class="div1">
        <label for="cardexp">Card expiry month</label><br>
        <input class="box2" type="text" name="month" id="month" placeholder="MM" maxlength="2"><br>
      </div>
      <div class="div1">
        <label for="cardyear">Card expiry year</label><br>
        <input type="text" class="box2" placeholder="yyyy" maxlength="4" minlength="4" name="year" id="year">
      </div>
      <div class="div1">
        <label for="cardcvv">Card CVV</label><br>
        <input class="box2" type="password" name="cvv" placeholder="CVV " maxlength="3" minlength="3" id='cvv'><br>
      </div>
      <input type="submit" class="btn" name="pay" value="pay now">
      <a href='cart.php'><input type="button" value="Back To Cart" class="btn"></a>
    </form>

  </body>
  <script>
  function check(){
    
    var a = document.getElementById('number').value;
    var b = document.getElementById('month').value;
    var c = document.getElementById('year').value;
    var d = document.getElementById('cvv').value;
    if(a=="" || b=="" || c=="" || d=="")
    {
      alert('field can\'t be empty' );
      return false;
    }
    if(isNaN(a))
    {
      document.getElementById("number").focus();
      return false;
    }
    if(isNaN(b))
    {
      document.getElementById("month").focus();
      return false;
    }
    if(isNaN(c))
    {
      document.getElementById("year").focus();
      return false;
    }
    if(isNaN(d))
    {
      document.getElementById("cvv").focus();
      return false;
    }
    if(c>2020 || c<1990)
    {
      document.getElementById("year").focus();
      return false;
    }
    if(b>12 || b<1)
    {
      document.getElementById("month").focus();
      return false;
    }
    
  }
  </script>
</html>

<?php
include 'connect.php';
include 'logincheck.php';
if(isset($_POST['pay']))
{
$email = $_SESSION['userid'];
$number = $_POST['number'];
$month = $_POST['month'];
$year = $_POST['year'];
$cvv = $_POST['cvv'];

$sql = "INSERT INTO payment VALUES('$email',$number,$month,$year,$cvv)";
$result = mysqli_query($connect, $sql);
$a= false;
if($result)
$_SESSION['a'] = $a;
{
  $a = true;
  $_SESSION['a'] = $a;
  $e = $_SESSION['userid'];

  $sq = "SELECT * from cart_item where email='$e'";
        $resul = mysqli_query($connect, $sq);
        while($row = mysqli_fetch_array($resul))
        {
            $image = $row['image'];
            $price = $row['price'];
            $name = $row['product_name'];
            $id = $row['product_id'];
            $qty = $row['qty'];
          $ss = "INSERT INTO orders values(NULL,'$email','$name', $id, $price, '$image',$qty)";
          mysqli_query($connect, $ss);
        }

  $s = "DELETE FROM cart_item where email='$e'";
  $r = mysqli_query($connect,$s);
  if($r)
  {
    header('location: orders.php');
  }
}
}
?>