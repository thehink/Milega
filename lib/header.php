<?php
session_start();
require_once './config/config.php';
require_once 'flight/Flight.php';
require_once 'database.php';
require_once 'authentication.php';
require_once 'localization.php';

Localization::load('swedish');

Authentication::checkLogin();
