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

    print("Connected successfully");

    // Get form inputs

    $image = mysqli_real_escape_string($conn, $_POST["image"]);
    $place = mysqli_real_escape_string($conn, $_POST["place"]);
    $duration = mysqli_real_escape_string($conn, $_POST["duration"]);
    $hotel = mysqli_real_escape_string($conn, $_POST["hotel"]);
    $sight = mysqli_real_escape_string($conn, $_POST["sight"]);
    $meal = mysqli_real_escape_string($conn, $_POST["meal"]);
    $mode = mysqli_real_escape_string($conn, $_POST["mode"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $type = "domestic";

    // SQL query to insert data into the table
    $sql = "INSERT INTO packages (type ,image ,place, duration, hotel, sight, meal, mode, price) VALUES ('$type','$image','$place', '$duration','$hotel','$sight','$meal','$mode','$price')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
