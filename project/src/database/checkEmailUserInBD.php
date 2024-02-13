<?php
/**
 * @param string $user
 * @return boolean
 */
function checkEmailUserInBD(string $user) : bool 
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT email FROM users WHERE email = :email LIMIT 1');
    $query -> bindParam(':email', $user, PDO::PARAM_STR);
    $query -> execute();

    $str = $query->fetch(PDO::FETCH_ASSOC) ?: null;

    if ($user == (is_array($str) ? $str['email'] : null)) {
        $_SESSION['error'] = 'Такой email уже существует';
        return false;
    }

    return true;
}