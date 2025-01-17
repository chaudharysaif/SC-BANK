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
    
    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }

    $pin = mysqli_real_escape_string($conn, $_POST["pin"]);

    $sql = "SELECT pin from account where `id`= $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ( $row['pin'] == $pin) {

            //header("Location:/Bank Management/withdrawl.html");

            if (mysqli_multi_query($conn, $sql)) {
                echo "success";
            } else {
                echo "Error";
            }
        }
        else {
            echo "Incorrect PIN Number";
            //header("Location:/Bank Management/withdrawl_verify.html");
        }
    }
   
    mysqli_close($conn);
}

?>