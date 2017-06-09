<?php

  $mysqli = new mysqli(getenv("DB_HOST"), getenv("DB_USER"), getenv("DB_PASS"), getenv("DB_NAME"), getenv("DB_PORT"));
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (".$mysqli->connect_errno.") ". $mysqli->connect_error;
  } else {
    $query = "SELECT * FROM quotes ORDER BY RAND() LIMIT 1";
    if ($result = $mysqli->query($query)) {
      $row = $result->fetch_assoc();
      echo $row['body'];
      $result->close();
    } else {
      echo "No result";
    }
  }

?>
