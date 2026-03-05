<?php

require_once 'config.php';


require_once ROOT_PATH . '/src/Core/Database.php';
$config = require ROOT_PATH . '/config/db_config.php';


$database = new Database(
    $config['servername'],
    $config['username'],
    $config['password'],
    $config['database']
);

$pdo = $database->connect();


// var_dump($database);

// var_dump(ROOT_FOLDER);
