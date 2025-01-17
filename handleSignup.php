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
  $user_password = mysqli_real_escape_string($conn, $_POST["password"]);
  $cpassword = mysqli_real_escape_string($conn, $_POST["cpassword"]);

  // Check if passwords match
  if ($user_password !== $cpassword) {
    die("Error: Passwords do not match");
  }

  // Hash the password
  $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

  // SQL query to insert data into the table
  $sql = "INSERT INTO usertable (name, user_email, user_pass) VALUES ('$name', '$email', '$hashed_password')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  header("Location:/Bank Management/login_page.php");

  mysqli_close($conn);
}
