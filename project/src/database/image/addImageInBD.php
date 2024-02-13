<?php
/**
 * @param array $image
 * @return boolean
 */
function addImageInBD(array $image, int $userId) : bool
{
    $connect = connectToBD();

    $query = $connect->prepare('INSERT INTO images (name, href, format) VALUES (:name, :href, :format)');
    $query -> bindParam(':name', $image['name'], PDO::PARAM_STR);
    $query -> bindParam(':href', $image['href'], PDO::PARAM_STR);
    $query -> bindParam(':format', $image['format'], PDO::PARAM_STR);
    $query -> execute();

    $imageId = $connect -> lastInsertId();

    $query = $connect->prepare('UPDATE users SET image =:image WHERE id =:id');
    $query -> bindParam(':image', $imageId);
    $query -> bindParam(':id', $userId);

    return $query -> execute();
}
