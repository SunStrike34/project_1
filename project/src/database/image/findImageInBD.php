<?php
/**
 * @param integer $imageId
 * @return void
 */
function findImageInBD(int $imageId) : bool | array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM images WHERE id_image = :id LIMIT 1');
    $query -> bindParam(':id', $imageId, PDO::PARAM_STR);
    $query -> execute();

    $str = $query->fetch(PDO::FETCH_ASSOC) ?: null;

    if ($imageId == (is_array($str) ? $str['id'] : null)) {
        return $str;
    }

    return false;
}
