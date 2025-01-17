<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-image: url(loginimg.jpg);background-position: center; background-size: cover;">

    <div class="container mt-5" style="background-color:rgb(18,18,108); height: 600px; width: 45%; border-radius: 10px;">
        <form class="container d-grid text-light gap-2 col-lg-8 m-auto" action="handleSignup.php" method="POST">
            <h1 style="text-align: center;margin-top: 15px; font-weight: 600;">SIGN UP</h1>
            <br>
            <div class="container">
                <label for="label">Name:</label>
                <br>
                <input type="text" class="form-control" required placeholder="name" name="name" style="width: 100%;">
            </div>
            <div class="container mt-3">
                <label for="label">Email:</label>
                <br>
                <input type="email" class="form-control" required placeholder="example@gmail.com" aria-describedby="emailHelp" id="email" name="email" style="width: 100%;">
            </div>
            <div class="container mt-3">
                <label for="label">Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" id="password" name="password" style="width: 100%;">
            </div>
            <div class="container mt-3">
                <label for="label">Confirm Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" id="cpassword" name="cpassword" style="width: 100%;">
            </div>

            <button type="submit" class="container btn btn-light mt-4" style="width: 40%; border-radius: 10px;">SIGNUP</button>

            <div class="text-light text-center">
                <span>Already have an account? <a href="login_page.php">login</a></span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>