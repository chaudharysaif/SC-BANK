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

    $sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    
    ?>

    <?php

    while ($row = mysqli_fetch_assoc($result)) {

        $accountnumber = $row['accountnumber'];
    }

    $sql = "SELECT `balance` FROM `account` WHERE account_no = $accountnumber";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $balance = $row['balance'];

    echo "Balance is : " . $balance;

    if (mysqli_query($conn, $sql)) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //header("Location:/Bank Management/login_page.php");

    mysqli_close($conn);
}
