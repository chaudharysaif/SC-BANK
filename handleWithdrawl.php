<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";

    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>

    <?php

    $sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {

        $accountnumber = $row['account_no'];
    }

    $sql = "SELECT `balance` FROM `account` WHERE account_no = $accountnumber";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $balance = $row['balance'];
    $rupees = mysqli_real_escape_string($conn, $_POST["rupees"]);
    $balance = $balance - $rupees;
    $nameself = "self";

    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }

    if ($row['balance'] > $rupees ) {

        // SQL query to insert data into the table
        $sql = "INSERT INTO passbook (names,debit,balance,accountnumber,user_id) VALUES ('$nameself','$rupees','$balance','$accountnumber','$id');
                UPDATE `account` SET balance = '$balance' WHERE account_no =  $accountnumber";

        if (mysqli_multi_query($conn, $sql)) {
            echo "success";
        } else {
            echo "Error: ";
        }

        header("Location:/Bank Management/atm.html");

        mysqli_close($conn);
    }

    else{
        echo "Insufficient Balance" ;
    }
}
