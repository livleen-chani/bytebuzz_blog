<?php
  ob_start();
  
  $servername = "db";
  $username = getenv('MYSQL_USER');
  $password = getenv('MYSQL_PASSWORD');
  $dbname = getenv('MYSQL_DATABASE');
  
  mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
  
  try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    session_start();
    // session_destroy();
  } catch (mysqli_sql_exception $e) {
    header("Location: errorPage.php");
    die("Connection failed: " . $e->getMessage());
  }
  
  ob_end_flush();