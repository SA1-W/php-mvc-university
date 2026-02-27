<?php

require_once __DIR__  . '/../../config/database.php';
User::$database = $pdo;

class User
{

    public static $database;

    public $id;
    public $username;
    protected $password;
    public $role;



    public function getById()
    {
        $stmt = self::$database->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        if (!$stmt->execute()) {
            return false;
        }
        $user = $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch();

        return $user;
    }
}
