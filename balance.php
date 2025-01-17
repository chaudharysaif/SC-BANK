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

session_start();
if ($_SESSION["user_id"]) {
    $id =  $_SESSION["user_id"];
}

//print("Connected successfully <br>");

$sql = "SELECT account_no from account LEFT JOIN usertable ON usertable.id = account.user_id WHERE user_id = $id";
$result = mysqli_query($conn, $sql);


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-image: url(loginimg.jpg);background-position: center; background-size: cover;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="height: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand text-light" style="background-color: rgb(12, 12, 162); font-weight: 600; width: 220px; text-align: center;border-radius: 5px;" href="#">BANK MANAGEMENT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 68%;">
                    <li class="nav-item nav-pills">
                        <a class="nav-link active text-light" style="font-weight: 600; background-color: rgb(12, 12, 162);" aria-current="page" href="home_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" href="transaction_history.php">Transaction
                            History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" href="contact.html">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="container py-2 mt-4 text-center" style="border: 1px solid black; width: 60%; border-radius: 10px; background-color: #eef7fe ;height: 450px;">
            <p class="text-success text-center fw-semibold" style="font-size: large;">*Your Balance</p>

            <form class="container d-grid text-light" style="width: 500px;" action="handlebalance.php" method="post">

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $accountnumber = $row['account_no'];
                }
                ?>
                <label for="label" class="fw-bold mt-5 m-auto" style="font-size: xx-large;color: rgb(12, 12, 162)">BALANCE:</label><br>
                <?php
                $sql = "SELECT `balance` FROM `account` WHERE account_no = $accountnumber";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);

                $balance = $row['balance'];
                ?>
                <div class="fs-3 mt-1 text-dark"> <?php echo $balance; ?> </div>


            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>