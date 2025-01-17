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


// SQL query to insert data into the table
$sql = "SELECT * FROM `transaction`";
$result = mysqli_query($conn, $sql);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="height: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand text-light" style="background-color: rgb(12, 12, 162); font-weight: 600; width: 220px; text-align: center;border-radius: 5px;" href="#">BANK MANAGEMENT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 68%;">
                    <li class="nav-item">
                        <a class="nav-link" style="color: rgb(12, 12, 162);" aria-current="page" href="home_page.php">Home</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link active" style="background-color: rgb(12, 12, 162);" href="/">Transaction
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

    <div class="text-light my-1">
        <h2 class="container fw-semibold" style="background-color: rgb(12, 12, 162); color: white; width: 18%; text-align: center; border-radius: 5px;">
            TRANSACTION</h2>
        <table class="container table table-striped-columns">
            <thead class="table-primary">
                <tr>
                    <th scope="col" style="text-align: center; border-bottom: 1px;">DATE</th>
                    <th scope="col" style="text-align: center; border-bottom: 1px;">NAME</th>
                    <th scope="col" style="text-align: center; border-bottom: 1px;">ACCOUNT NUMBER</th>
                    <th scope="col" style="text-align: center; border-bottom: 1px;">RUPEES</th>
                    <th scope="col" style="text-align: center; border-bottom: 1px;">TYPE</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <!-- <th scope="row"></th> -->
                        <td class="text-center"> <?php echo $row['date']; ?> </td>
                        <td class="text-center"> <?php echo $row['name']; ?> </td>
                        <td class="text-center"> <?php echo $row['account_no']; ?> </td>
                        <td class="text-center"> <?php echo $row['rupees']; ?> </td>
                        <td class="text-center"> <?php echo $row['type']; ?> </td>
                    </tr>
                <?php
                }
                ?>

                <!-- <tr>
                    <th scope="row">14</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>