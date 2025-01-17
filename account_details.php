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

// print("Connected successfully");
// echo "<br>";

session_start();
if ($_SESSION["user_id"]) {
    $id =  $_SESSION["user_id"];
}

// SQL query to insert data into the table
$sql = "SELECT * FROM account LEFT JOIN usertable ON account.user_id = usertable.id WHERE account.user_id = $id";
$result = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-image: url(loginimg.jpg);background-position: center; background-size: cover;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="height: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="background-color: rgb(12, 12, 162); font-weight: 600;width: 220px; text-align: center;border-radius: 5px;" href="#">SC BANK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 80%;">
                    <li class="nav-item nav-pills">
                        <a class="nav-link active text-light" style="background-color: rgb(12, 12, 162);" aria-current="page" href="home_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" aria-current="page" href="about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" href="/">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 class="container fw-semibold" style="background-color: rgb(12, 12, 162); color: white; width: 22%; text-align: center; border-radius: 5px;">
        ACCOUNT DETAILS</h2>

    <div class="card-body" id="custom-cards">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-4 pt-3" style="margin: auto;">

            <div class="card text-light mb-3" style="width: 500px;height: 400px; margin: auto; background-color: rgb(30, 30, 150); border-radius: 15px;">
                <div class="card-header text-center" style="border-color: white;">ACCOUNT</div>
                <div class="card-body">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <div class="fs-5"> <?php echo "Name : " . $row['name'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Email : " . $row['email'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Address : " . $row['address'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "City : " . $row['city'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "DOB : " . $row['dob'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Contact : " . $row['phone_no'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Type : " . $row['account_type'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "PIN : " . $row['pin'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Account no : " . $row['account_no'] . '<br>'; ?> </div>
                        <div class="fs-5"> <?php echo "Balance : " . $row['balance'] . '<br>'; ?> </div>

                    <?php
                        break;
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>