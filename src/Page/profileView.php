<?php 
  ob_start();
  include "../Component/topBar.php";

  if(!isset($_SESSION['username'])) {
    header("Location: login.php");
  }

  ob_end_flush();
?>

  <head>
    <link rel="stylesheet" href="Style/profileView/profileView.css">
  </head>

  <div id="ProfileViewWrapper">
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
    <h1>HI</h1>
  </div>

<!-- End Div for topBar (Do not remove); -->
</div> 