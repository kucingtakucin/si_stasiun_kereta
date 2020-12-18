<?php

class Database {
    public $dbh;
    public $stmt;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->dbh = new PDO("mysql:host=localhost;dbname=stasiun", 'root', '', $options);
    }
}