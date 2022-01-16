<?php 
session_start();
include 'connect.php';
$price = $_POST['price'];
$id = $_POST['id'];
$qty = $_POST['qty'];
$email = $_SESSION['userid'];

$sql = "UPDATE cart_item set qty='$qty' where product_id='$id' and email='$email' ";
$result = mysqli_query($connect,$sql);
$total = "SELECT * from cart_item where email='$email'";
$r = mysqli_query($connect,$total);
$totall = 0;
while($rr = mysqli_fetch_array($r))
{
    $pricee = $rr['price'];
    $qtyy = $rr['qty'];
    $subtotall = $pricee * $qtyy;
    $totall = $subtotall+$totall;
}
echo "Rs. ".$totall;

?>