<?php
$servername = "db";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

$connectionSuccess = false;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "<h1>CONNECTION FAIL</h1>";
  $connectionSuccess = false;
} else {
  $connectionSuccess = true;
}
