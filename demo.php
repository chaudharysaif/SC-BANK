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

//print("Connected successfully");

// SQL query to insert data into the table

$sql = "SELECT * FROM packages";
$result = mysqli_query($conn, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-4">
        <div class="row">
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-md-4" >
                <div class="mb-3" style="border: 1px solid black; ">
                    <img src="<?php echo $row['image']; ?>" width="100%" height="250px" alt="image">
                      <div class="px-2"><?php echo '<br>'. "Package: " . $row['place'] . '<br>'; ?> </div>  
                        <div class="px-2"><?php echo "Duration: " . $row['duration'] . '<br>'; ?></div> 
                        <div class="px-2"><?php echo "Hotel: " . $row['hotel'] . '<br>'; ?></div> 
                        <div class="px-2"><?php echo "Seeing Sight: " . $row['sight'] . '<br>'; ?></div> 
                        <div class="px-2"><?php echo "Meal: " . $row['meal'] . '<br>'; ?></div> 
                        <div class="px-2"><?php echo "Mode: " . $row['mode'] . '<br>'; ?></div> 
                        <div class="px-2"><?php echo "Price: " . $row['price'] . '<br>'; ?></div>

                        <div class="mt-2 px-2" style="background-color: #d4d4d4; height:55px">
                            <button class="btn btn-primary mt-2">Book</button>
                        </div>
                </div>            
                </div>
            <?php
                }
            ?>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>