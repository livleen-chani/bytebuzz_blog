<?php 
  ob_start();
  include "../Component/topBar.php";

  if(!isset($_SESSION['username'])) {
    header("Location: login.php");
  }

  ob_end_flush();
?>

