<?php
  ob_start();
  
  $dbServerName = "db";
  $dbUsername = getenv('MYSQL_USER');
  $dbPassword = getenv('MYSQL_PASSWORD');
  $dbName = getenv('MYSQL_DATABASE');

  $devKey = getenv('SIGNUP_KEY');
  
  print_r($_ENV);

  mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
  
  try {
    // Create connection
    $conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);
    session_start();
    // session_destroy();
  } catch (mysqli_sql_exception $e) {
    header("Location: errorPage.php");
    die("Connection failed: " . $e->getMessage());
  }
  
  ob_end_flush();