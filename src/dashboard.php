<!DOCTYPE html>
<html lang="en" class="h-100">
<?php require_once('./library/sessionHelper.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="../node_modules/jsgrid/dist/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
    <link rel="manifest" href="../assets/images/site.webmanifest">
    <link rel="mask-icon" href="../assets/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Dashboard</title>
</head>

<body class="d-flex flex-column h-100">
    <?php
    include "../assets/html/header.html";
    ?>

    <div class="container-fluid">

        <main class="col-lg-10 p-2 mx-auto gy-2">
            <div>
                <h2>Employees</h2>
            </div>
            <div id="jsGrid"></div>
        </main>
    </div>


    <?php
    include "../assets/html/footer.html";
    ?>
</body>

<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>
<script type="text/javascript" src="../assets/js/jsgrid.js"></script>

</html>