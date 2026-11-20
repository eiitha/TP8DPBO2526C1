<?php

class Database
{
    private static ?Database $instance = null;
    private mysqli $conn;

    private string $host = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "db_tp8";

    private function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): mysqli
    {
        return $this->conn;
    }

    private function __clone() {}
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }
}
