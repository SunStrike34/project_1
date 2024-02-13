<?php

function authorize(array $user = []) : void
{
    $_SESSION['auth'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
}

function isAuthorized() : bool
{
    return (bool) ($_SESSION['auth'] ?? false);
}

function logout() : void
{
    $_SESSION['auth'] = false;
    $_SESSION['email'] = '';
    $_SESSION['id'] = '';
    $_SESSION['role'] = '';
}

function redirectExited(string $location = 'page_login.php') : void
{
    if (! isAuthorized()) {
        header('Location: ' . '/project/' . $location);
        exit();
    }
}

function redirectАuthorized(string $location = 'users.php') : void
{
    if (isAuthorized()) {
        header('Location: '. '/project/' . $location);
        exit();
    }
}

function currentUser() : string
{
    return $_SESSION['fullname'] ?? '';
}
