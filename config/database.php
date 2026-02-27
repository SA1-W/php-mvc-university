<?php

require_once 'config.php';


require_once ROOT_PATH . '/src/Core/Database.php';


$database = new Database("localhost", "root", "root", "oop_project_2");
$pdo = $database->connect();


// var_dump($database);

// var_dump(ROOT_FOLDER);
