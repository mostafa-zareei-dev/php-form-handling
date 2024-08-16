<?php

$config = [
    "host" => "localhost",
    "dbname" => "form-handling",
    "charset" => "UTF8",
    "port" => 3306,
];

$dsn = http_build_query($config, "", ";");
$dsn = "mysql:" . $dsn;

$username = "root";
$password = "";

return new PDO(
    $dsn,
    $username,
    $password,
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);
