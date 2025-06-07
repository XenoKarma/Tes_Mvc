<?php

class Mahasiswa_model {

    private $dbh; // Database handler
    private $stmt; // Statement

    public function __construct() {
        //Data Source Name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        }
        catch (PDOException $e) {
            die('Gagal terhubung ke database: ' . $e->getMessage());
        }
        
    }
    


    public function getAllMahasiswa() 
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}