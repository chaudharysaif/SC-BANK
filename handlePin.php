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
    
    $setpin = mysqli_real_escape_string($conn, $_POST["setpin"]);
    $cpin = mysqli_real_escape_string($conn, $_POST["cpin"]);
    
    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }
    
    $sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE account.user_id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ( $setpin == $cpin ) {

            $sql = "UPDATE account SET pin = '$setpin' WHERE account.user_id = '$id'";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            header("Location:/Bank Management/atm.html");

        } else {
            echo "Incorrect Account Number";
            header("Location:/Bank Management/create_pin.html");
        }
    } 
   
    mysqli_close($conn);
}
