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

    $accountnumber = mysqli_real_escape_string($conn, $_POST["accountnumber"]);

    $sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id where account.user_id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['account_no'] == $accountnumber) {

            //header("Location:/Bank Management/passbook.php");
            if (mysqli_multi_query($conn, $sql)) {
                echo "success";
            } else {
                echo "Error";
            }
            
        } else {

            echo "Incorrect Account Number";
            //header("Location:/Bank Management/passbook_verify.html");
        }
    }
}
