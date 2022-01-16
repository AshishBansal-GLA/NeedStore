<?php
include 'connect.php';
if(isset($_POST['cart1']))
{
  include 'logincheck.php';
  $cart = $_POST['cartid'];
  $email = $_SESSION['userid'];
  $ss = "SELECT * FROM cart_item where email='$email' AND product_id='$cart'";
  $rr = mysqli_query($connect, $ss);
  $num = mysqli_num_rows($rr);
  if ($num>0) {
    echo "<script> alert('item already in cart'); </script>";
  }
  else {
    $sql = "SELECT * from products where product_id='$cart'";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) {
      $image = $row['image'];
      $price = $row['price'];
      $name = $row['product_name'];
      $id = $row['product_id'];
    $s = "INSERT INTO cart_item values('$email','$name', $id, $price, '$image',1)";
    $r = mysqli_query($connect, $s);
    if ($r) {
      echo "<script> alert('Item Added To Cart'); </script>";
    }
    }
  }

}
if(isset($_POST['buy1']))
{
  include 'logincheck.php';
  $buy = $_POST['cartid'];
  $email = $_SESSION['userid'];
  $sq = "SELECT * FROM products where product_id='$buy'";
  $re = mysqli_query($connect, $sq);
  $row = mysqli_fetch_array($re);
  $image = $row['image'];
      $price = $row['price'];
      $name = $row['product_name'];
      $id = $row['product_id'];
  
      $s = "INSERT INTO cart_item values('$email','$name', $id, $price, '$image',1)";
      $r = mysqli_query($connect, $s);
      if($r)
      {
        header('location: payment.php');
      }
}

?>
