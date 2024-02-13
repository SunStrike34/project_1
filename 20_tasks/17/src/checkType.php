<?php
/**
 * @param array $file
 * @return boolean
 */
function checkType(array $file) : bool
{
    $type = exif_imagetype($file['tmp_name']);

    $arrayType = [
        1 =>	IMAGETYPE_GIF,
        2 =>	IMAGETYPE_JPEG,
        3 =>	IMAGETYPE_PNG,
        6 =>	IMAGETYPE_BMP,
        15 =>	IMAGETYPE_WBMP,
        16 =>	IMAGETYPE_XBM,
        18 =>	IMAGETYPE_WEBP,
        19 =>	IMAGETYPE_AVIF
    ];

    foreach ($arrayType as $index => $imageType) {
        if ($type == $index) {
            $_SESSION['imageType'] = $imageType;
            return true;
        }
    }

    $_SESSION['error'] = 'Не правильный формат файла';
    
    return false;
}
