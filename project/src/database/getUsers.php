<?php

function getUsers() : array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM users LEFT JOIN images ON users.image = images.id_image');
    $query -> execute();

    return $query -> fetchAll(PDO::FETCH_ASSOC) ?: [];
}
