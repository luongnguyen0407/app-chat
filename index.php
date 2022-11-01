<?php
session_start();
ob_start();
require_once './app/Middleware.php';
$myApp = new App();
