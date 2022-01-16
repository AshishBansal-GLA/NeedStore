<?php
include 'connect.php';
include 'logincheck.php';
$userid = $_SESSION['userid'];
if (isset($_POST['buttonremove'])) {
   $deleteid = $_POST['deleteid'];
  $sql = "DELETE from cart_item where product_id='$deleteid' AND email = '$userid'";
  if (mysqli_query($connect, $sql)) {
    echo "

    <script>

    alert('item deleted successfully');
    window.location = 'cart.php';
     </script>

     ";
  }
}
?>
