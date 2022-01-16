<?php
if(session_id() == ''){
  session_start();
}
  if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true)
  {
    header("location: admin.php");

  }
  else {
      echo "Welcome ".$_SESSION['adminusername'];
      echo "<li> <a href='logout.php'> Logout </a> </li>";
  }
 ?>
