<?php
/**
 * @param array $user
 * @return boolean
 */
function validateUserRequest(array $user) : bool 
{
    if (empty((string)$user['email']) && !is_null($user['email'])) {
        $_SESSION['error'] = 'Не задан email';
        return false;
    }

    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Не правильно указан email';
        return false;
    }

    if (empty((string)$user['password']) && !is_null($user['password'])) {
        $_SESSION['error'] = 'Не задан пароль';
        return false;
    }

    return true;
}