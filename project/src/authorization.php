<?php
/**
 * Undocumented function
 *
 * @param array $user
 * @return void
 */
function authorize(array $user = []) : void
{
    $_SESSION['auth'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
}

/**
 * Undocumented function
 *
 * @return boolean
 */
function isAuthorized() : bool
{
    return (bool) ($_SESSION['auth'] ?? false);
}

/**
 * Undocumented function
 *
 * @return void
 */
function logout() : void
{
    $_SESSION['auth'] = false;
    $_SESSION['email'] = '';
    $_SESSION['id'] = '';
    $_SESSION['role'] = '';
}

/**
 * Undocumented function
 *
 * @param string $location
 * @return void
 */
function redirectExited(string $location = 'page_login.php') : void
{
    if (! isAuthorized()) {
        header('Location: ' . '/project/' . $location);
        exit();
    }
}

/**
 * Undocumented function
 *
 * @param string $location
 * @return void
 */
function redirectАuthorized(string $location = 'users.php') : void
{
    if (isAuthorized()) {
        header('Location: '. '/project/' . $location);
        exit();
    }
}

/**
 * Undocumented function
 *
 * @return string
 */
function currentUser() : string
{
    return $_SESSION['fullname'] ?? '';
}
