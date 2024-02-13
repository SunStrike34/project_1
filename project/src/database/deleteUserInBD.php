<?php

function deleteUserInBD(string $userId) : bool
{
    $connect = connectToBD();

    $query = $connect->prepare('DELETE FROM users WHERE id = :id');
    $query -> bindParam(':id', $userId, PDO::PARAM_STR);

    return $query -> execute(); 
}