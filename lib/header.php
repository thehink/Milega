<?php
session_start();
require_once 'config.php';
require_once 'flight/Flight.php';
require_once 'database.php';
require_once 'authentication.php';

Authentication::checkLogin();
