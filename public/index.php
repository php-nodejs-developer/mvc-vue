<?php
require_once '../vendor/autoload.php';

if (preg_match('/\.(css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

\Mountains\Kernel\Router::start();
