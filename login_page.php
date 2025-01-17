<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-image: url(loginimg.jpg);background-position: center; background-size: cover;">

    <div class="container" style="background-color:rgb(18,18,108); height: 500px; width: 45%; border-radius: 10px; margin-top: 8%;">

        <form class="d-grid text-light gap-2 col-lg-8 m-auto" action="handleLogin.php" method="POST">
            <h1 style="text-align: center;margin-top: 15px; font-weight: 600;">LOGIN</h1>
            <br>
            <div class="mt-1">
                <label for="label">Email:</label>
                <br>
                <input type="text" class="form-control" required placeholder="example@gmail.com" name="loginEmail" id="loginEmail" aria-describedby="emailHelp" style="width: 100%;">
            </div>
            <div class="mt-4">
                <label for="label">Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" name="loginPassword" id="loginPassword" style="width: 100%;">
            </div>
            <div class="mt-1 d-flex justify-content-between">
                <span id="rememberme" style="font-size:small;"><input type="checkbox" name="myEligiblity" unchecked>&nbsp;Remember me</span>
            </div>

            <button type="submit" class="container btn btn-light mt-5" style="width: 40%; border-radius: 10px;">LOGIN</button>

            <div class="text-light text-center">
                <span>Create an account? <a href="sign_up.php">sign up</a></span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>