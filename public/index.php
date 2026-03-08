<?php

session_start();

const BASE_URL = '/oop_project_2/public';

require_once __DIR__ . '/../src/Controllers/AuthController.php';
require_once __DIR__ . '/../src/Controllers/StudentController.php';

$action = $_GET['action'] ?? 'login_form';

$authController = new AuthController();
$studentController = new StudentController();

switch ($action) {


    //AuthController Routes

    case 'login_form':
        $authController->showLoginForm();
        break;

    case 'login':
        $authController->login();
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'profile':
        $authController->profile();
        break;

    //StudentController Routes

    case 'students':
        $studentController->index();
        break;

    case 'create':
        $studentController->create();
        break;

    case 'store':
        $studentController->store();
        break;

    case 'edit':
        $studentController->edit();
        break;

    case 'update':
        $studentController->update();
        break;

    case 'delete':
        $studentController->delete();
        break;

    default:
        echo 'This Page is not found!';
        break;
}
