<?php
session_start();

date_default_timezone_set('UTC');

mb_internal_encoding('UTF-8');

$config_path = __DIR__ . '/../config/config.php';
if(file_exists($config_path)){
  require_once $config_path;
}else{
  require_once './config/config.default.php';
}

require_once 'vendor/flight/flight/Flight.php';
require_once 'database.php';
require_once 'authentication.php';
require_once 'localization.php';
require_once 'pages.php';

Localization::load('swedish');

Authentication::checkLogin();
