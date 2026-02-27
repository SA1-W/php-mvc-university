<?php

class AuthController
{
    public function showLoginForm()
    {
        $cssPath = '/views/auth/sign-in.css';
        require_once __DIR__ .  '/../../views/auth/login.php';
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php");
            exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];


        $auth = new Auth();


        if ($auth->attempt($username, $password)) {
            header("Location: index.php?action=students");
            exit;
        }

        $_SESSION['error'] = "The username or password is incorrect";
        header("Location: index.php");
        exit;
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();

        header("Location: index.php");
        exit;
    }

    public function profile()
    {
        Access::role([1, 2, 3, 4]);
        $user = new User();
        $user->id = $_GET['id'];
        $user = $user->getById();
        View::render("auth/profile.php", ['user' => $user]);
    }
}
