<?php

include 'connect.php';

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $cat = $_POST['option'];
  $price = $_POST['price'];
  $filename = $_FILES['file']['name'];
  $filetmp = $_FILES['file']['tmp_name'];
  $destination = "images/";
  $sql = "INSERT INTO products(product_name, product_cat, price, image) VALUES ('$title', $cat, $price, '$filename')";

  if (mysqli_query($connect, $sql)) {
    echo "

    <script>
    alert('successfully added');
     </script>";
    move_uploaded_file($filetmp, $destination.$filename);
  }
}
