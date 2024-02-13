<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

define('APP_DIR', dirname(__DIR__));

require __DIR__ . '/loadConfig.php';