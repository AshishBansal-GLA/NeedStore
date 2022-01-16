<?php
include 'connect.php';

if (isset($_POST['register'])) {
  $username = $_POST['userid'];
  $password = $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $sql = "INSERT INTO users values(NULL,'$username', '$email', '$hash')";
  if (mysqli_query($connect, $sql)) {
    echo "<script> alert('Well done! You are successfully regisered'); </script>";
  }
  else {
    echo "<script> alert('try again! userid already exist!!!!'); </script>";
  }
}
?>
