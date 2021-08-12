<?php


abstract class ModeleGenerique{

    protected $pdo;

    public function __construct(){
        $this->pdo = $this->connect();
    }

    public function connect(){
        return new PDO('mysql:host=localhost;dbname=lycee_projet', "root", "edmondIlci", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
   }
}
