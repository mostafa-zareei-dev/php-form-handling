<?php
session_start();

define("BASE_PATH", __DIR__ . "/../");
define("VIEW_PATH", BASE_PATH . "views/");

$requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);

if ($requestMethod === 'GET') {
    include VIEW_PATH . "index.view.php";
} elseif ($requestMethod === 'POST') {
    include BASE_PATH . "inc/register.action.php";
}
