<?php
include 'connect.php';
if(isset($_POST['cart1']))
{
  include 'logincheck.php';
  $userid = $_SESSION['userid'];
$sql = "SELECT * FROM cart_item where email='$userid'";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);
if ($num>0) {
  echo $num;
}
}
 ?>
