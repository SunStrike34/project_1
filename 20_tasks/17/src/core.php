<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require __DIR__ . '/loadConfig.php';
require __DIR__ . '/checkError.php';
require __DIR__ . '/checkType.php';
require __DIR__ . '/createName.php';
require __DIR__ . '/addImageInDirectory.php';
require __DIR__ . '/deleteImage.php';

require __DIR__ . '/database/database.php';
require __DIR__ . '/database/checkImageName.php';
require __DIR__ . '/database/addImageInBD.php';
require __DIR__ . '/database/uploadImages.php';
require __DIR__ . '/database/findImageInBD.php';
require __DIR__ . '/database/deleteImageInBD.php';

if (isset($_GET['delete']) && $_GET['delete']=== 'yes' && is_string($_GET['id'])) {
    
    $image = findImageInBD($_GET['id']);

    if (is_array($image) && file_exists($_SERVER['DOCUMENT_ROOT'] . $image['href'] . $image['name'] . '.' . $image['format'])) { deleteImage($image);}
}
