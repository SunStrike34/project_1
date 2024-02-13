<?php
/**
 * @param array $user
 * @return boolean
 */
function addUserInBD(array $user) : bool
{
    $connect = connectToBD();

    $password = password_hash($user['password'], PASSWORD_DEFAULT);

    $query = $connect->prepare('INSERT INTO users (email, password, role) VALUES (:email, :password, 0)');
    $query -> bindParam(':email', $user['email'], PDO::PARAM_STR);
    $query -> bindParam(':password', $password, PDO::PARAM_STR);

    return $query -> execute(); 
}