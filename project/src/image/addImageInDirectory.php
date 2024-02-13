<?php
/**
 * @return void
 */
function addImageInDirectory(array $image, int $userId): void
{
    switch ($_SESSION['imageType']) {

        case IMAGETYPE_GIF:
            $file = imagecreatefromgif($image['tmp_name']);
            $format = 'gif';
            break;

        case IMAGETYPE_JPEG:
            $file = imagecreatefromjpeg($image['tmp_name']);
            $format = 'jpg';
            break;

        case IMAGETYPE_WEBP:
            $file = imagecreatefromwebp($image['tmp_name']);
            $format = 'webp';
            break;

        case IMAGETYPE_BMP:
            $file = imagecreatefromwbmp($image['tmp_name']);
            $format = 'wbmp';
            break;

        case IMAGETYPE_AVIF:
            $file = imagecreatefromavif($image['tmp_name']);
            $format = 'avif';
            break;

        case IMAGETYPE_PNG:
            $file = imagecreatefrompng($image['tmp_name']);
            $format = 'png';
            break;

        case IMAGETYPE_WBMP:
            $file = imagecreatefromwbmp($image['tmp_name']);
            $format = 'wbpm';
            break;

        case IMAGETYPE_XBM:
            $file = imagecreatefromxbm($image['tmp_name']);
            $format = 'xbm';
            break;
          
        default:
            $_SESSION['error'] = 'Проблема в создании картинки';
            break;
    }

    do { $fileName = createName($image); } while (checkImageName($fileName));

    // Размеры файла
    $width = imagesx($file);
	$height = imagesy($file);

    $t_im = imageCreateTrueColor($width,$height);
	imageCopyResampled($t_im, $file, 0, 0, 0, 0, $width, $height, $width, $height);
    unset($file);

    $href = '/project/upload/' . $fileName. '.' . $format;
    $request = [
        'name' => $fileName, 
        'href' => '/project/upload/', 
        'format' => $format
    ];

    switch ($_SESSION['imageType']) {

        case IMAGETYPE_GIF:
            imagegif($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_JPEG:
            imagejpeg($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_WEBP:
            imagewebp($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_BMP:
            imagebmp($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_AVIF:
            imageavif($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_PNG:
            imagepng($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_WBMP:
            imagewbmp($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;

        case IMAGETYPE_XBM:
            imagexbm($t_im, $_SERVER['DOCUMENT_ROOT'] . $href, 100);
            break;
          
        default:
            $_SESSION['error'] = 'Проблема в сохранении картинки в каталог';
            break;
    }
    imagedestroy($t_im);
    $_SESSION['type'] = '';
    
    addImageInBD($request, $userId);
    $request = [];
}
