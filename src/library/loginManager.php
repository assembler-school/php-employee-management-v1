<?php

function getUsers(): array
{
    return json_decode(file_get_contents('../../resources/users.json'), true)['users'];
}

function getUserData($email, $users)
{
    return array_filter($users, function ($user) use ($email) {
        return $user['email'] === $email;
    })[0];
}

function checkUserPass($email, $users)
{
    $password = $_POST['password'];
    $pwHash = array_reduce($users, function ($carry, $user) use ($email) {
        if ($user['email'] === $email) {
            return $user['password'];
        };
    }, '');
    return password_verify($password, $pwHash);
}

function checkUser($email, $users)
{
    $userData = getUserData($email, $users);
    if ($userData && checkUserPass($email, $users)) {
        http_response_code(200);
        session_start();
        $_SESSION['userId'] = $userData['userId'];
        $_SESSION['time'] = time();
    } else {
        http_response_code(401);
    }
}

$users = getUsers();
$email = $_POST['email'];
checkUser($email, $users);
