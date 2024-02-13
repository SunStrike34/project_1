<?php
/**
 * @param integer $imageId
 * @return boolean
 */
function deleteImageInBD(int $imageId) : bool
{
    $connect = connectToBD();

    $query = $connect->prepare('DELETE FROM images WHERE id= :id');
    $query -> bindParam(':id', $imageId, PDO::PARAM_STR);

    return $query -> execute();
}
