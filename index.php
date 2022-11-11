<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once './app/Middleware.php';
$myApp = new App();
