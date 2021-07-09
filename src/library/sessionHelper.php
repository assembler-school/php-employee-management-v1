<?php
session_start();

function goLogin()
{
    $url = $_SERVER['REQUEST_URI'];
    if (!str_contains($url, 'index.php')) {
        header("Location: ../index.php");
    }
}

function logout()
{
    unset($_SESSION['userId']);
    session_destroy();
    session_unset();
    goLogin();
    http_response_code(200);
}

$_SESSION['lifeTime'] = 600;
if (isset($_SESSION['userId'])) {
    if (time() - $_SESSION['time'] > $_SESSION['lifeTime']) {
        logout();
    } else {
        $url = $_SERVER['REQUEST_URI'];
        if (str_contains($url, 'index.php')) {
            header('Location: ./src/dashboard.php');
        }
    }
} else {
    goLogin();
}
