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

    $oldpin = mysqli_real_escape_string($conn, $_POST["oldpin"]);
    $newpin = mysqli_real_escape_string($conn, $_POST["newpin"]);
    $cpin = mysqli_real_escape_string($conn, $_POST["cpin"]);

    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }

    $sql = "SELECT * from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ( $row['pin'] == $oldpin ) {

            if ( $newpin == $cpin ) {

                // $sql = "INSERT INTO account (pin) VALUES ('$setpin')";
                $sql = "UPDATE account SET pin = '$newpin' WHERE account.user_id = '$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                header("Location:/Bank Management/atm.html");
            } else {
                echo "Your setpin and confirmpin is doesn't match";
                header("Location:/Bank Management/changepin.html");
            }
        }
        else {
            echo "Incorrect Your Old PIN Number";
            header("Location:/Bank Management/changepin.html");
        }
    }

    mysqli_close($conn);
}
