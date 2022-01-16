<?php
if(session_id() == ''){
  session_start();
}
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    echo "<a href='login.php'>Account</a>";
  }
  else {
      echo "Welcome ".$_SESSION['username'];
      echo "<li> <a href='logout.php'> Logout </a> </li>";
  }
 ?>
