<?php
include 'connect.php';
if (isset($_POST['buttonremove'])) {
   $deleteid = $_POST['cartid'];
  $sql = "DELETE from products where product_id='$deleteid'";
  if (mysqli_query($connect, $sql)) {
    echo "

    <script>

    alert('item deleted successfully');
     </script>

     ";
  }
}
?>
