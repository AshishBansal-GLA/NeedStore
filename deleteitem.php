<?php
include 'connection.php';
if (isset($_POST['delete_button'])) {
   $deleteid = $_POST['deleteid'];
  $sql = "DELETE from add_item where product_id='$deleteid'";
  if (mysqli_query($connect, $sql)) {
    echo "

    <script>

    alert('item deleted successfully');
    window.location = 'index.php';
     </script>

     ";
  }
}
?>
