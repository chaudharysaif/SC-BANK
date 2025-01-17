<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="height: 50px;">
    <div class="container-fluid">
      <a class="navbar-brand text-light" style="background-color: rgb(12, 12, 162); font-weight: 600; width: 220px; text-align: center; border-radius: 5px;" href="#">SC BANK</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 63%;">
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

        <?php
        session_start();
        if ($_SESSION["name"]) {
          echo ' <span style="margin-right: 20px;"> Welcome, ' . $_SESSION["name"] . ' </span>';
        } else {
          header("Location:/Bank Management/login_page.php");
        }
        ?>
        <a href="logout.php" class="btn btn-success px-2">Logout</a>

      </div>
    </div>
  </nav>

  <?php

  if (isset($_SESSION['status'])) {

  ?>
    <div class="text-center alert alert-success alert-dismissible fade show mb-0" role="alert">
      <?php echo $_SESSION['status']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php
    unset($_SESSION['status']);
  }
  ?>

  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000" style="height: 600px;">
        <img src="carousel1.jpg" class="d-block w-100" alt="..." style="background-position: center; background-size: cover;">
        <div class="carousel-caption d-none d-md-block text-light fw-bolder mb-5">
          <h1 class="" style="font-weight: 600; font-family:'Times New Roman', Times, serif">SC BANK</h1>
          <p style="font-size: x-large;">Not for Profit, But for People.
          <p>
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="2000" style="height: 600px;">
        <img src="carousel2.jpg" class="d-block w-100" alt="..." style="background-position: center; background-size: cover;">
        <div class="carousel-caption d-none d-md-block text-light fw-bolder mb-5">
          <h1 class="" style="font-weight: 600; font-family:'Times New Roman', Times, serif">SC BANK</h1>
          <p style="font-size: x-large;">Not for Profit, But for People.</p>
        </div>
      </div>

      <div class="carousel-item" data-bs-interval="2000" style="height: 600px;">
        <img src="carousel3.jpg" class="d-block w-100" alt="..." style="background-position: center; background-size: cover;">
        <div class="carousel-caption d-none d-md-block text-light fw-bolder mb-5">
          <h1 class="" style="font-weight: 600; font-family:'Times New Roman', Times, serif">SC BANK</h1>
          <p style="font-size: x-large;">Not for Profit, But for People.</p>
        </div>
      </div>
    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container py-3" id="custom-cards">
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-4 pt-4">

      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('create.jpg'); background-position: center; background-size: cover; height: 280px;">
          <a href="create_account.html" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="create_acc_btn" style="background-color: rgb(12, 12, 162);">CREATE
              ACCOUNT</button>
          </a>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('account.jpg'); height: 280px; background-position: center; background-size: cover; height: 280px;">
          <a href="account_details.php" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="transfer_money_btn" style="background-color: rgb(12, 12, 162);">ACCOUNT DETAILS</button>
          </a>
        </div>
      </div>


      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('deposit.jpg'); background-position: center; background-size: cover; height: 280px;">
          <a href="deposit_money.html" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="deposit_money_btn" style="background-color: rgb(12, 12, 162);">DEPOSIT MONEY</button>
          </a>
        </div>
      </div>


      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('transfer.jpg');  background-position: center; background-size: cover; height: 280px;">
          <a href="transfer_money.php" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="transfer_money_btn" style="background-color: rgb(12, 12, 162);">TRANSFER MONEY</button>
          </a>
        </div>
      </div>


      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('istockphoto-1204108929-612x612.jpg'); background-position: center; background-size: cover; height: 280px;">
          <a href="passbook_verify.html" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="transfer_money_btn" style="background-color: rgb(12, 12, 162);">PASSBOOK</button>
          </a>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover h-150 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('atm.jpg'); background-position: center; background-size: cover; height: 280px;">
          <a href="atm_verify.html" style="margin: auto; margin-top: 220px;">
            <button class="btn btn-lg text-light" id="transfer_money_btn" style="background-color: rgb(12, 12, 162);">ATM</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-5 text-white" style="background-color:rgb(12, 12, 162); height:250px; border-radius:15px;display:flex; font-family:'Times New Roman', Times, serif">

    <div class="container pt-4" style="padding-left: 5%; width:50%">
      <h3 style="font-weight: bold; margin:0">SC BANK</h3><br>
      <a href="home_page.php" class="text-white" style="text-decoration:none;">
        <div>Home</div>
      </a><br>
      <a href="about.html" class="text-white" style="text-decoration:none;">
        <div>About</div>
      </a><br>
      <a href="contact.html" class="text-white" style="text-decoration:none;">
        <div>Contact</div>
      </a>
    </div>

    <div class="container pt-4">
      <div class="fs-4" style="font-weight: bold;">About</div><br>
      <div class="fs-5 mb-3" style="font-weight:600;">Not for profit, But for people</div>
      <p> Welcome to SC BANK, your go-to platform for secure <br> and user-friendly banking, accessible anytime, anywhere.</p>
    </div>

    <div class="container pt-4">

      <div class="fs-5" style="font-weight: 600; display:flex">Subscribe to our newsletter</div>

      <div class="text-white"><label for="email"></label>
        <input class="text-white px-2 w-50 mt-1" type="email" placeholder="Email" style="background-color: rgb(12, 12, 162); border:1px solid black; border-radius:5px">
        <div class="btn btn-light p-0 w-25 mb-1 mx-1" style="height: 28px;">Subscribe</div>

        <div class="mt-2">Follow us</div>
        <div class="mt-1" style="display: flex;">
          <div class="mx-1"><img style="height: 30px;" src="facebook.png" alt=""></div>
          <div class="mx-1"><img style="height: 30px;" src="twitter.png" alt=""></div>
          <div class="mx-1"><img style="height: 30px;" src="linkedin.png" alt=""></div>
          <div class="mx-1"><img style="height: 30px;" src="instagram.png" alt=""></div>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

</body>

</html>