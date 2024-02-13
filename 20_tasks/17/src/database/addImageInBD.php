<?php
/**
 * @param array $image
 * @return boolean
 */
function addImageInBD(array $image) : bool
{
    $connect = connectToBD();

    $query = $connect->prepare('INSERT INTO images (name, href, format) VALUES (:name, :href, :format)');
    $query -> bindParam(':name', $image['name'], PDO::PARAM_STR);
    $query -> bindParam(':href', $image['href'], PDO::PARAM_STR);
    $query -> bindParam(':format', $image['format'], PDO::PARAM_STR);

    return $query -> execute();
}
