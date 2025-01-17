<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bank";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  print("Connected successfully <br>");

  // Get form inputs

  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $accountno = mysqli_real_escape_string($conn, $_POST["accountno"]);
  $rupees = mysqli_real_escape_string($conn, $_POST["rupees"]);
  $type = "Debit";
 
  // SQL query to insert data into the table
  $sql = "INSERT INTO transaction (name, account_no, rupees,type) VALUES ('$name', '$accountno', '$rupees','$type')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
