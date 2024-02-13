<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require __DIR__ . '/loadConfig.php';
require __DIR__ . '/validateUserRequest.php';
require __DIR__ . '/authorization.php';
require __DIR__ . '/includeTemplate.php';
require __DIR__ . '/validateUserSecurityRequest.php';

require __DIR__ . '/image/addImageInDirectory.php';
require __DIR__ . '/image/checkError.php';
require __DIR__ . '/image/checkType.php';
require __DIR__ . '/image/createName.php';


require __DIR__ . '/database/database.php';
require __DIR__ . '/database/addUserInBD.php';
require __DIR__ . '/database/checkEmailUserInBD.php';
require __DIR__ . '/database/findUser.php';
require __DIR__ . '/database/editUser.php';
require __DIR__ . '/database/getUser.php';
require __DIR__ . '/database/getUsers.php';
require __DIR__ . '/database/deleteUserInBD.php';

require __DIR__ . '/database/image/addImageInBD.php';
require __DIR__ . '/database/image/checkImageName.php';
require __DIR__ . '/database/image/findImageInBD.php';

if (isset($_GET['delete']) && $_GET['delete']=== 'yes' && is_string($_GET['id'])) {
    if ($_SESSION['role'] == true) {
        deleteUserInBD($_GET['id']);
        redirectАuthorized();
    }elseif ($_SESSION['id'] == $_GET['id']) {
        deleteUserInBD($_GET['id']);
        logout();
    }else {
        redirectАuthorized();
    }
    
}

if (isset($_GET['logout']) && $_GET['logout'] === 'yes') {
    logout();
}