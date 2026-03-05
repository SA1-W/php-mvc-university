<?php

class Database
{


    protected $servername;
    protected $username;
    protected $password;
    protected $database;

    protected $conn;


    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }


    public function connect()
    {

        if ($this->conn) {
            return $this->conn;
        }

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database;charset=utf8mb4", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
