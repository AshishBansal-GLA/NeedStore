<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <form method="post">
    <input type="text" name="a">
    <input type="text" name="b">
    <input type="submit" name="submit">
  </form>
</body>

</html>
<?php

$conn = mysqli_connect('localhost', 'ashish', 'ashish', 'account');

if (isset($_REQUEST['submit'])) {
  $a = $_POST['a'];
  $b = $_POST['b'];

  $sql = "SELECT first from a where second='$b'";
  $conn->query($sql);
  if ($sql) {
    $a =  "select * from acount where email='$username' and password = '$password'";
    $r = mysqli_query($conn, $a);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $count = mysqli_num_rows($r);
    if ($count == 1) {
      while ($co) {
        // code...
      }
    } else {
      echo "<h1> Login failed. Invalid username or password.</h1>";
    }
  }
}
?>