<?php

function authorize(array $user = []) : void
{
    $_SESSION['auth'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['id'] = $user['id'];
}

function isAuthorized() : bool
{
    return (bool) ($_SESSION['auth'] ?? false);
}

function logout() : void
{
    $_SESSION['auth'] = false;
    $_SESSION['email'] = '';
}

function redirectExited(string $location = 'http://localhost/20_tasks/15/') : void
{
    if (! isAuthorized()) {
        header('Location: ' . $location);
        exit();
    }
}

function redirectАuthorized(string $location = 'http://localhost/20_tasks/15/account/') : void
{
    if (isAuthorized()) {
        header('Location: ' . $location);
        exit();
    }
}

function currentUser() : string
{
    return $_SESSION['email'] ?? '';
}