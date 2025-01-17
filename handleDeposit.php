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
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }
    $accountnumber = mysqli_real_escape_string($conn, $_POST["accountnumber"]);

    $sql = "SELECT `balance`  FROM `account` where `account_no`= $accountnumber";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $balance = $row['balance'];
    $rupees = mysqli_real_escape_string($conn, $_POST["rupees"]);
    $balance = $balance + $rupees;
    $name = "self";


    $sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    $response = "";

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['account_no'] == $accountnumber) {

            // SQL query to insert data into the table
            $sql = "INSERT INTO passbook (names,credit,balance,accountnumber,user_id) VALUES ('$name','$rupees','$balance','$accountnumber','$id');
                    UPDATE `account` SET balance = '$balance' WHERE account_no = '$accountnumber'";


            if (mysqli_multi_query($conn, $sql)) {
                echo "success";
            } else {
                echo "Error";
            }

            // header("Location:/Bank Management/home_page.php");
        } else {

            echo "Account number Not Found";
        }
    }
   
    
}
?>