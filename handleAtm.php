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

    $accountnumber = mysqli_real_escape_string($conn, $_POST["accountnumber"]);

    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }

    // $sql = "SELECT * from account where account_no ='$accountnumber'";
    $sql = "SELECT account_no,pin FROM account LEFT JOIN usertable ON usertable.id = account.user_id WHERE account.user_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['account_no'] == $accountnumber) {

            $sql = "INSERT INTO atm_verify (accountnumber) VALUES ($accountnumber)";
           
            if ($row['pin'] != null) {

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";

                    header("Location:/Bank Management/atm.html");

                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                header("Location:/Bank Management/create_pin.html");

            }
        } else {
            echo "incorrect Account Number";
            header("Location:/Bank Management/atm_verify.html");
        }
    }

    mysqli_close($conn);
}
