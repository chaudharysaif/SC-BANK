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

    // Get form inputs
    session_start();
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $phone_num = mysqli_real_escape_string($conn, $_POST["phone_no"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $account_num = (rand(100000, 999999));
    $balance = 0;
   
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    } 

    // SQL query to insert data into the table
    $sql = "INSERT INTO account (name, email, address, city, dob, phone_no, account_type, account_no, balance,user_id) VALUES ('$name', '$email', '$address', '$city', '$dob', '$phone_num', '$type', '$account_num', '$balance','$id')";

    if (mysqli_query($conn, $sql)) {

       header("Location:/Bank Management/home_page.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
}
