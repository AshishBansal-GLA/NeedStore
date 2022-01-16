<?php
include 'connect.php';
if (isset($_POST['login']))
{
  $userid = $_POST['userid1'];
  $pass = $_POST['password1'];
  $hash = password_hash($pass, PASSWORD_DEFAULT);

  $sql = "SELECT * FROM users WHERE email= '$userid' or userid = '$userid' AND password= '$hash'";
  $result  = mysqli_query($connect, $sql);
  while($row = mysqli_fetch_array($result))
  {
    $username = $row['userid'];
  }
  $num = mysqli_num_rows($result);
  if ($num>0) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['userid'] = $userid;
    $_SESSION['username'] = $username;
    header('location: index.php');
  }
  else {
    echo "<script> alert('Check UserId or Password'); </script>";
  }
}


?>
