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
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $account_no = mysqli_real_escape_string($conn, $_POST["account_no"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);

  // SQL query to insert data into the table
  $sql = "INSERT INTO contactus (name, email, account_no, message) VALUES ('$name', '$email', '$account_no','$message')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
