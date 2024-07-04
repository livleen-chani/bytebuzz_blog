<?php 
  ob_start();
  include "../Component/topBar.php";

  session_destroy();
  header("Location: feed.php");
  ob_end_flush();
?>