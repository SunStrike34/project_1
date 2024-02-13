<?php
/**
 * @param string $image
 * @return boolean
 */
function checkImageName(string $image) : bool 
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM images WHERE name = :name LIMIT 1');
    $query -> bindParam(':name', $image, PDO::PARAM_STR);
    $query -> execute();

    $str = $query->fetch(PDO::FETCH_ASSOC) ?: null;

    if ($image == (is_array($str) ? $str['name'] : null)) {
        return true;
    }

    return false;
}
