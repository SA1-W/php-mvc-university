<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Models/User.php';
Auth::$pdo = $pdo;

class Auth
{

    public static $pdo;

    public function attempt(string $username, string $password)
    {


        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();

        if (!$user) {
            return false;
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'role' => $user->role
        ];

        return true;
    }


    public function logout()
    {
        unset($_SESSION['user']);
    }
}
