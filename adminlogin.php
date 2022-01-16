<?php
if(session_id() != ''){
  session_start();
  session_unset();
  session_destroy();
}

else {
include 'connect.php';
$_SESSION['adminloggedin'] = false;
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $sql = "SELECT * from admininfo where id='$email' and password = '$pass'";
  $result = mysqli_query($connect, $sql);
  $num = mysqli_num_rows($result);
  while($row= mysqli_fetch_array($result))
  {
    $ausername = $row['name'];
  }
  if ($num>0) {
    session_start();
    $_SESSION['adminloggedin'] = true;
    $_SESSION['id'] = $email;
    $_SESSION['adminusername'] = $ausername;
    header('location: adminweb.php');

  }
  else {
    echo "<script> alert('Check UserId or Password'); </script>";
  }
}
}
?>
