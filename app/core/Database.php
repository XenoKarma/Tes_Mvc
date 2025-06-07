<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh; // Database handler
    private $stmt; // Statement

        public function __construct() {
        //Data Source Name
        $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->db_name;

        //buat opsi koneksi
        $option = [
            PDO::ATTR_PERSISTENT => true, // Koneksi persisten
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Mode error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch mode default
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4' // Set karakter encoding
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        }
        catch (PDOException $e) {
            die('Gagal terhubung ke database: ' . $e->getMessage());
        }
        
    }


    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }
}