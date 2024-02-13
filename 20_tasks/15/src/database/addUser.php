<?php
/**
 * @param array $user
 * @return boolean
 */
function addUser(array $user) : bool
{
    if (validateUserRequest($user) && checkUser($user['email'])) {
        $connect = connectToBD();

        $password = password_hash($user['password'], PASSWORD_DEFAULT);

        $query = $connect->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
        $query -> bindParam(':email', $user['email'], PDO::PARAM_STR);
        $query -> bindParam(':password', $password, PDO::PARAM_STR);

        return $query -> execute();
    } else {
        return false;
    }
}