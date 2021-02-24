<?php

# Development
// localhost
// $servername = "localhost";
// $dbName = "page_app";
// $username = "root";
// $password = "";

# Production
// Heroku
$servername = "us-cdbr-east-03.cleardb.com";
$dbName = "heroku_058feb507ebc8c6";
$username = "be0860eb2c1765";
$password = "4f0ffbe8";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>