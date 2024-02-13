<?php

function findUser(string $email) : array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $query -> bindParam(':email', $email);
    $query -> execute();

    return $query -> fetch(PDO::FETCH_ASSOC) ?: [];
}
