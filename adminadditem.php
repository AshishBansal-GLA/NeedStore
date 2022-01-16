<?php
if(isset($_POST['btn']))
{
  include 'logincheck.php';
  $delete = $_POST['cartid'];
  $sql = "SELECT * from products where product_id='$delete'";
  $result = mysqli_query($connect, $sql);
  while ($row = mysqli_fetch_array($result)) {
    $image = $row['image'];
    $price = $row['price'];
    $name = $row['product_name'];
    $id = $row['product_id'];
  $s = "INSERT INTO products values('$name', $id, $price, '$image')";
  $r = mysqli_query($connect, $s);
  if ($r) {
    echo "<script> alert('Item Added To Cart'); </script>";
  }
}
}
?>
<!-- not done -->
