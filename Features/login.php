<?php
include("server.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Info</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS-->
    <link href="assets/css/login.css" rel="stylesheet" />

    <!-- Core theme JS-->
</head>

<body>
    <main>
        <h1>Login</h1>

        <form method="post" action="login.php">
            <div class="wrapper-input">
                <input type="text" name="username" placeholder="Username" required>
                <i class="fa fa-user fa-lg icon"></i>
            </div>

            <div class="wrapper-input">
                <input type="password" name="password" placeholder="Password" required>
                <i class="fa fa-key fa-lg icon"></i>
            </div>

            <button class="btn-login" id="btn" type="submit" name="login">Log in</button>
        </form>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>