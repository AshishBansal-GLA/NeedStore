<?php
include 'conn.php';
if (isset($_REQUEST['submit'])) {
  $name = $_POST['id'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM admin_info where user_id = '$name' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $count = 0;
  while ($row = mysqli_fetch_array($result)) {
    $count = $count+1;
  }
  if ($count==1) {
    header('Location: adminlogin.php');
  }
}

 ?>
