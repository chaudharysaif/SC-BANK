<?php

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
echo "<br>";


// SQL query to insert data into the table
$sql = "SELECT * FROM `account`";
$result = mysqli_query($conn, $sql);


// //find the number of rows
// $num = mysqli_num_rows($result);
// echo "Number of rows is " . $num . "<br>" . "<br>";

// Row returned by the sql query
while ($row = mysqli_fetch_assoc($result)) {

    echo $row['name'] . '<br>';
    echo $row['email'] . '<br>';
    echo $row['address'] . '<br>';
    echo $row['city'] . '<br>';
    echo $row['dob'] . '<br>';
    echo $row['phone_no'] . '<br>';
    echo $row['account_no'] . '<br>';
    echo $row['balance'] . '<br>';
    echo '<br>';
}

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
