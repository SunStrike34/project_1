<?php
/**
 * @param array $user
 * @return boolean
 */
function validateUserRequest(array $user) : bool 
{
    if (empty((string)$user['email']) && !is_null($user['email'])) {
        $_SESSION['error'] = 'Не задан email';
        header('Location: http://localhost/20_tasks/15/index.php');
        exit;
    }

    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Не правильно указан email';
        header('Location: http://localhost/20_tasks/15/index.php');
        exit;
    }

    if (empty((string)$user['password']) && !is_null($user['password'])) {
        $_SESSION['error'] = 'Не задан пароль';
        header('Location: http://localhost/20_tasks/15/index.php');
        exit;
    }

    return true;
}