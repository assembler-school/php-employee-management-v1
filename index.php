<!DOCTYPE html>
<html lang="en">
<?php require_once('./src/library/sessionHelper.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon-16x16.png">
    <link rel="manifest" href="./assets/images/site.webmanifest">
    <link rel="mask-icon" href="./assets/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>PHP Employee Management V1</title>
</head>

<body>
    <div class="d-flex login-container align-items-center justify-content-center">
        <div class="login-form p-5 rounded">
            <h3>Login</h3>
            <form id="formLogin" action="" method="post">
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" required />
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Your Password *" name="password" value="" required />
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btnSubmit" value="Login" />
                </div>
            </form>
            <div class="text-danger"></div>
        </div>
    </div>
</body>
<script src="./assets/js/index.js"></script>

</html>