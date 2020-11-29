<?php 
  session_start();
  unset($_SESSION["loginSession"]);
  header("Location: admin.php");
?>
