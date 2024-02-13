<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require __DIR__ . '/loadConfig.php';

require __DIR__ . '/includeTemplate.php';
require __DIR__ . '/validateUserRequest.php';

require __DIR__ . '/database/database.php';
require __DIR__ . '/database/addUser.php';
require __DIR__ . '/database/checkUser.php';



