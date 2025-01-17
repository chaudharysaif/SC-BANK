<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body style="background-image: url(loginimg.jpg);background-position: left; background-size: cover;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="height: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand text-light" style="background-color: rgb(12, 12, 162); font-weight: 600; width: 220px; text-align: center; border-radius: 5px;" href="#">SC BANK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 80%;">
                    <li class="nav-item nav-pills">
                        <a class="nav-link active text-light" style="font-weight: 600; background-color: rgb(12, 12, 162);" aria-current="page" href="home_page.php">Home</a>
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

    <div class="container m-auto">
        <h3 class="container text-center" style="background-color: rgb(12, 12, 162); color: white; width: 21%; border-radius: 5px;">
            TRANSFER MONEY</h3>

        <div class="container py-2 mt-3" style="border: 1px solid black; width: 50%;height:525px; border-radius: 10px; background-color: #eef7fe;">
            <form class="mx-3" action="handleTransfer.php" method="POST">
                <h4 class="text-center mt-3" style="background-color: rgb(12, 12, 162); color: white; width: 13%; border-radius: 5px;">FROM.</h4>

                <label for="label">Name:</label> <input type="text" required name="fromname" class="form-control mt-1" id="labelname" style="width: 35%;">
                <label for="label">Account Number:</label> <input type="number" required name="fromaccountno" class="form-control mt-1" id="labelname" style="width: 50%;">
                <label for="label">Rupees:</label> <input type="number" required class="form-control mt-1" name="fromrupees" id="labelname" style="width: 50%;">


                <h4 class="text-center mt-3" style="background-color: rgb(12, 12, 162); color: white; width: 7%; border-radius: 5px;">TO.</h4>

                <label for="label">Name:</label> <input type="text" required class="form-control mt-1" name="toname" id="labelname" style="width: 35%;">
                <label for="label">Account Number:</label> <input type="number" required class="form-control mt-1" name="toaccountno" id="labelname" style="width: 50%;">
                <button class="btn btn-success text-light mt-3" type="submit" id="proceed" style="border-radius: 5px;">Proceed</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
</body>

<!-- <script>
    function create() {
        Swal.fire({
            title: "Success!",
            text: "Transfer Succesfully",
            icon: "success"
        });
    }
</script> -->

</html>