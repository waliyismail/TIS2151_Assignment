<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "opniondb";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $db);
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

?>
