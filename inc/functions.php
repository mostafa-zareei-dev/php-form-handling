<?php

function redirect(string $url, int $statusCode = 303): void
{
    header('Location: ' . $url, true, $statusCode);
    die();
}


function notFound(): void
{
    header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    die();
}
