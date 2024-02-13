<?php
/**
 * @return array | null
 */
function uploadImages() : array | null 
{
    $connect = connectToBD();

    $query = $connect->query('SELECT * FROM images');

    return $query->fetchAll(PDO::FETCH_ASSOC) ?: null;
}
