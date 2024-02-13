<?php

function getUser(string $userId) : array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM users LEFT JOIN images ON users.image = images.id_image WHERE id = :id LIMIT 1');
    $query -> bindParam(':id', $userId);
    $query -> execute();

    return $query -> fetch(PDO::FETCH_ASSOC) ?: [];
}
