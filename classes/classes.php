<?php

class dbPDO {
    private string $server = 'localhost';
    private string $username = 'root';
    private string $password = '';
    private string $database = 'test';

    public function connect(): ?PDO {
        try {
            self::$db = new PDO('mysql:host=$this->server;dbname=$this->database;charset=utf8', $this->username, $this->password);
            self::$ds->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Erreur de connexion à la db : " . $e->getMessage();
            return null;
        }
        return $db;
    }
}

