<?php 
  session_start();
  unset($_SESSION["loginUser"]);
  unset($_SESSION["loginId"]);
  header("Location: index.php");
?>