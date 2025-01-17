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

    //$accountnumber = mysqli_real_escape_string($conn, $_POST["accountnumber"]);

    $fromaccountno = mysqli_real_escape_string($conn, $_POST["fromaccountno"]);
    $toaccountno = mysqli_real_escape_string($conn, $_POST["toaccountno"]);

    $sql = "SELECT `balance`  FROM `account` where `account_no`= $fromaccountno";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $frombalance = $row['balance'];


    $sql = "SELECT `balance`  FROM `account` where `account_no`= $toaccountno";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $tobalance = $row['balance'];

    //from
    $fromname = mysqli_real_escape_string($conn, $_POST["fromname"]);
    $fromrupees = mysqli_real_escape_string($conn, $_POST["fromrupees"]);

    session_start();
    if ($_SESSION["user_id"]) {
        $id =  $_SESSION["user_id"];
    }

    if ( $frombalance > $fromrupees ) {

        $frombalance = $frombalance - $fromrupees;

        //to
        $toname = mysqli_real_escape_string($conn, $_POST["toname"]);
        $tobalance = $tobalance + $fromrupees;

        $sql = "SELECT `account_no` from account where account.user_id = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            if ($row['account_no'] == $fromaccountno) {

                $sql = "SELECT * from account where account_no = '$toaccountno'";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                $row = mysqli_fetch_assoc($result);

                    if ($row['account_no'] == $toaccountno) {

                        // SQL query to insert data into the table
                        $sql = "INSERT INTO passbook (names,debit,balance,accountnumber,user_id) VALUES ('$toname','$fromrupees','$frombalance','$toaccountno','$id');
                                UPDATE `account` SET balance = '$tobalance' WHERE account_no = '$toaccountno';
                                UPDATE `account` SET balance = '$frombalance' WHERE account_no = '$fromaccountno'";

                        if (mysqli_multi_query($conn, $sql)) {
                            echo "New record created successfully";

                            header("Location:/Bank Management/home_page.php");
                        
                        } 
                        else 
                        {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } 
                    else 
                    {
                        echo "Incorrect Account Number of To";
                        header("Location:/Bank Management/transfer_money.php");
                    }
                }
                else 
                {
                    echo "Not fount accountnumber in DB";
                    header("Location:/Bank Management/transfer_money.php");
                }
            }
            else 
            {
                echo "incorrect Account Number";
                header("Location:/Bank Management/transfer_money.php");
            }
        }
    }

    else {
        echo "Insufficient Balance" ;
        header("Location:/Bank Management/transfer_money.php");
    }

    mysqli_close($conn);
}
